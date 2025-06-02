<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('loopin.myprofile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'address' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.index')
                        ->withErrors($validator, 'updateProfile')
                        ->withInput();
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if ($request->filled('address')) {
            $user->address = $request->address;
        } else {
            $user->address = null;
        }

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        if ($user->isDirty()) {
            $user->save(); 
            return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect()->route('profile.index')->with('info', 'Tidak ada perubahan pada profil.');
        }
    }

    /**
     * Memproses pembaruan password pengguna (Versi Lebih Simpel).
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('Password saat ini yang Anda masukkan tidak cocok.');
                }
            }],
            'new_password' => [
                'required',
                'string',
                Password::min(6)->mixedCase()->numbers(),
                'confirmed'
            ],
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'new_password.required' => 'Password baru wajib diisi.',
            'new_password.min' => 'Password baru minimal harus 6 karakter.',
            'new_password.mixedCase' => 'Password baru harus mengandung huruf besar dan kecil.',
            'new_password.numbers' => 'Password baru harus mengandung angka.',
            'new_password.confirmed' => 'Konfirmasi password baru tidak cocok dengan password baru.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.index')
                        ->withErrors($validator, 'updatePassword')
                        ->withInput();
        }

       
        if (Hash::check($request->new_password, $user->password)) {
            return redirect()->route('profile.index')
                        ->with('infoPassword', 'Password baru tidak boleh sama dengan password lama Anda.') 
                        ->withInput();
        }
       

        $user->password = Hash::make($request->new_password);

        try {
            $user->save();

            return redirect()->route('profile.index')->with('successPassword', 'Password berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('PASSWORD_SAVE_ERROR: Failed to save new password for user: ' . $user->email . ' - ' . $e->getMessage());
            return redirect()->route('profile.index')
                ->with('errorPassword', 'Terjadi kesalahan pada server saat mencoba menyimpan password baru. Silakan coba lagi.')
                ->withInput();
        }
    }


    /**
     * Menampilkan halaman daftar riwayat pesanan pengguna.
     */
    public function orders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)
                       ->with('items.product')
                       ->latest()
                       ->paginate(10);
        return view('loopin.myorders', compact('user', 'orders'));
    }

    /**
     * Menampilkan detail satu pesanan.
     */
    public function showOrder($orderId)
    {
        $order = Order::with('items.product')->find($orderId);

        if (!$order) {
            abort(404, 'Order tidak ditemukan');
        }

        return view('loopin.myorder_detail', compact('order'));
    }

    public function showOrderDetail($orderNumber) {
        $order = Order::with('items.product.category')->where('order_number', $orderNumber)->firstOrFail();
        return view('loopin.myorder_detail', compact('order'));
    }
}