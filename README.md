Nama : Firyal shafa salsabila 
Kelas : C
Nim : 20230140224
 

# ucp 1

Project ini adalah aplikasi manajemen inventaris sederhana yang dibangun menggunakan **Laravel 11** dan **Laravel Breeze** (Tailwind CSS). Aplikasi ini menerapkan sistem **Role-Based Access Control (RBAC)** untuk membedakan hak akses antara Admin dan User biasa.

## 📝 Deskripsi Tugas
Project ini bertujuan untuk mengelola data produk dan kategori dengan ketentuan:
- **Admin**: Memiliki akses penuh (CRUD) pada Kategori dan Produk.
- **User**: Hanya dapat melihat daftar produk (Read-only) dan tidak dapat mengakses menu Kategori.
- **Security**: Menggunakan Gate dan Policy untuk otorisasi akses.

## 📂 Struktur Project (Penting)
Berikut adalah folder dan file utama yang dikerjakan dalam project ini:
```text
app/
├── Http/
│   ├── Controllers/
│   │   ├── CategoryController.php  # CRUD Kategori
│   │   └── ProductController.php   # CRUD Produk + Logic Otorisasi
│   └── Requests/
│       └── StoreProductRequest.php # Validasi Input Produk
├── Models/
│   ├── Category.php                # Relasi HasMany ke Product
│   └── Product.php                 # Relasi BelongsTo ke Category
├── Policies/
│   └── ProductPolicy.php           # Aturan akses (Update/Delete)
└── Providers/
    └── AppServiceProvider.php      # Definisi Gate (manage-product, manage-category)

database/
└── migrations/                     # Struktur tabel MySQL

resources/views/
├── layouts/
│   └── navigation.blade.php        # Logika tampilan menu navigasi
├── products/                       # View CRUD Produk
├── category/                       # View CRUD Kategori
└── dashboard.blade.php             # Tampilan Role User

```
## 📸 Screenshots
tampilan dashboard admin
<img width="1919" height="970" alt="Screenshot 2026-04-24 144741" src="https://github.com/user-attachments/assets/0b9e6ddb-bb34-4365-abc1-eb7559d9c4d9" />|
halaman category
<img width="1919" height="891" alt="Screenshot 2026-04-24 135859" src="https://github.com/user-attachments/assets/42be3df0-4e20-4033-8a2d-b15cbb1c632d" />
halaman tambah category
<img width="1915" height="650" alt="Screenshot 2026-04-24 135918" src="https://github.com/user-attachments/assets/e6aa60c6-39ff-4a07-83e8-de687939c486" />
hasil tambah category
<img width="1919" height="832" alt="image" src="https://github.com/user-attachments/assets/8508a462-3e7a-48ca-ac05-72bc02b30c35" />
halaman product
<img width="1917" height="725" alt="image" src="https://github.com/user-attachments/assets/53a03051-dd8f-4217-b05e-8a9893c8a822" />
halaman tambah product
<img width="1917" height="861" alt="image" src="https://github.com/user-attachments/assets/de96f338-32a5-4472-934e-d59ee10084b3" />

tampilan user 
<img width="1918" height="614" alt="image" src="https://github.com/user-attachments/assets/c264b0a5-f125-4765-bd73-66f59d075249" />
