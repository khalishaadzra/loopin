# Loopin - Web Belanja Thrifting (Second-Hand Fashion)

**Nama Anggota Kelompok** :

1. Khalisha Adzraini Arif (2308107010031)
2. Zalvia Inasya Zulna (2308107010041)

**Loopin** adalah aplikasi web pembelian barang berbasis Laravel yang menyediakan berbagai barang fashion thrifting (second-hand) seperti atasan, bawahan, dress, dan sepatu. Aplikasi ini memudahkan pengguna untuk membeli pakaian bekas berkualitas secara online dengan antarmuka yang simpel dan modern.

## Teknologi yang Digunakan

-   **Frontend**:
    -   Blade Template Engine (Laravel)
    -   HTML, CSS, JavaScript
-   **Backend**:
    -   PHP (Laravel Framework)
    -   Routing, Controller, Middleware, dan Model Laravel
    -   Database: MySQL dengan nama Loopin (database)

## Fitur Utama & Halaman

### 1. Landing Page

-   Gambar besar (hero banner) yang memperkenalkan Loopin.
-   Navigasi ke halaman login dan register.
-   Terdiri dari section hero, keunggulan, about us dan juga categories

---

### 2. Halaman Register

-   Formulir pendaftaran:
    -   Nama lengkap
    -   Email
    -   Alamat
    -   Password
    -   Konfirmasi Password
-   Validasi input.
-   Setelah daftar, otomatis redirect ke login.

### 3. Halaman Login

-   Form login pengguna.
-   Redirect ke halaman **beranda user** setelah berhasil login.

---

### 4. Beranda / Home

-   Menampilkan beberapa produk thrifting yang tersedia dengan kategori tertentu
-   Produk ditampilkan dalam bentuk grid (gambar, nama, harga,dll).

---

### 5. Halaman Produk Per Kategori

-   Kategori yang tersedia:
    -   **Atasan**
    -   **Bawahan**
    -   **Dress**
    -   **Sepatu**
-   Produk ditampilkan sesuai dengan kategori yang dipilih user.

---

### 6. Halaman Detail Produk

-   Menampilkan informasi lengkap:
    -   Gambar produk
    -   Nama barang
    -   Harga
    -   Deskripsi
    -   Ukuran
    -   Ketersediaan stok
-   Tombol **"Tambah ke Keranjang"**

---

### 7. Halaman Keranjang

-   Daftar produk yang sudah dipilih user.
-   Dapat menghapus produk dari keranjang.
-   Total harga ditampilkan di bagian bawah.
-   Tombol untuk lanjut ke **checkout**.

---

### 8. Halaman Checkout

-   Form input data pembeli:
    -   Nama penerima
    -   Alamat lengkap
    -   No. HP
    -   Metode pembayaran
-   Setelah submit, akan muncul halaman konfirmasi.

---

### 9. Halaman Riwayat Transaksi

-   Menampilkan daftar pesanan yang pernah dilakukan.
-   Setiap riwayat menampilkan:
    -   Nama produk
    -   Total pembayaran
    -   Status transaksi

---

### 10. Halaman Profil

-   Menampilkan dan mengedit informasi user.
-   User bisa ubah nama, email, password.

## Operasi CRUD (Create, Read, Update, Delete)

Berikut adalah ringkasan operasi CRUD berdasarkan fungsionalitas website dari sisi pengguna:

-   **Pengguna (User):**

    -   **Create:** Registrasi akun baru.
    -   **Read:** Login, Melihat detail profil.
    -   **Update:** Mengedit informasi profil, Mengubah password.

-   **Produk & Kategori (Product & Category):**

    -   **Read:** Melihat daftar produk/kategori, detail produk, mencari & memfilter produk, melihat produk per kategori.

-   **Keranjang Belanja (Cart):**

    -   **Create:** Menambahkan produk ke keranjang.
    -   **Read:** Melihat isi keranjang.
    -   **Update:** Mengubah jumlah/item di keranjang.
    -   **Delete:** Menghapus produk dari keranjang.

-   **Transaksi/Pesanan (Order):**
    -   **Create:** Melakukan checkout (membuat pesanan baru).
    -   **Read:** Melihat riwayat pesanan di profil.
