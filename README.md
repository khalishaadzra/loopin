# Loopin - Web Belanja Thrifting (Second-Hand Fashion)

**Nama Anggota Kelompok** :
1. Khalisha Adzraini Arif (2308107010031)
2. Zalvia Inasya Zulna    (2308107010041)

**Loopin** adalah aplikasi web e-commerce berbasis Laravel yang menyediakan berbagai barang fashion thrifting (second-hand) seperti atasan, bawahan, dress, dan sepatu. Aplikasi ini memudahkan pengguna untuk membeli pakaian bekas berkualitas secara online dengan antarmuka yang simpel dan modern.

## Teknologi yang Digunakan
- **Frontend**:
  - Blade Template Engine (Laravel)
  - HTML, CSS, JavaScript
- **Backend**:
  - PHP (Laravel Framework)
  - Routing, Controller, Middleware, dan Model Laravel
  - Database: MySQL

## Fitur Utama & Halaman

### 1. Landing Page
- Gambar besar (hero banner) yang memperkenalkan Loopin.
- Navigasi ke halaman login dan register.
- Tombol **“Belanja Sekarang”** mengarah ke halaman produk.

---

### 2. Halaman Register
- Formulir pendaftaran:
  - Nama lengkap
  - Email
  - Password
  - Konfirmasi Password
- Validasi input.
- Setelah daftar, otomatis redirect ke login.

### 3. Halaman Login 
- Form login pengguna.
- Redirect ke halaman **beranda user** setelah berhasil login.

---

### 4. Beranda / Home
- Menampilkan semua produk thrifting yang tersedia.
- Produk ditampilkan dalam bentuk grid (gambar, nama, harga).
- Terdapat tombol **"Detail"** untuk melihat info produk lengkap.

---

### 5. Halaman Produk Per Kategori 
- Kategori yang tersedia:
  - **Atasan**
  - **Bawahan**
  - **Dress**
  - **Sepatu**
- Produk ditampilkan sesuai dengan kategori yang dipilih user.

---

### 6. Halaman Detail Produk 
- Menampilkan informasi lengkap:
  - Gambar produk
  - Nama barang
  - Harga
  - Deskripsi
  - Ukuran
  - Ketersediaan stok
- Tombol **"Tambah ke Keranjang"**

---

### 7. Halaman Keranjang 
- Daftar produk yang sudah dipilih user.
- Dapat menghapus produk dari keranjang.
- Total harga ditampilkan di bagian bawah.
- Tombol untuk lanjut ke **checkout**.

---

### 8. Halaman Checkout 
- Form input data pembeli:
  - Nama penerima
  - Alamat lengkap
  - No. HP
  - Metode pembayaran
- Setelah submit, akan muncul halaman konfirmasi.

---

### 9. Halaman Riwayat Transaksi 
- Menampilkan daftar pesanan yang pernah dilakukan.
- Setiap riwayat menampilkan:
  - Nama produk
  - Total pembayaran
  - Status transaksi

---

### 10. Halaman Profil
- Menampilkan dan mengedit informasi user.
- User bisa ubah nama, email, password.

## Fitur CRUD dalam Aplikasi

| Entitas / Data       | Create (C)           | Read (R)                   | Update (U)               | Delete (D)               |
|----------------------|----------------------|----------------------------|--------------------------|--------------------------|
| **User**             | Register             | Login & lihat profil       | Edit profil              | –                        |
| **Produk**           | – (Hanya bisa lihat) | Tampil di semua halaman    | –                        | –                        |
| **Keranjang**        | Tambah produk        | Lihat isi keranjang        | Edit Pesanan             | Hapus produk             |
| **Transaksi**        | Buat saat checkout   | Lihat di riwayat           | –                        | –                        |
