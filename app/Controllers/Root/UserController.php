<?php

namespace App\Controllers\Root;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'hlm'   => 'User Management',
            // Mengambil semua data user dari database
            'users' => $this->userModel->findAll()
        ];

        return view('root/v_users', $data);
    }

    public function delete($id)
    {
        // Proteksi: Root tidak boleh menghapus dirinya sendiri
        if ($id == session()->get('id')) {
            return redirect()->to(base_url('root/users'))->with('failed', 'FATAL ERROR: Anda tidak dapat menghapus akun Anda sendiri!');
        }

        $this->userModel->delete($id);

        // 🎥 PASANG CCTV : Rekam Penghapusan User
        log_activity('USER', 'DELETE', "Menghapus User ID: $id dari sistem", $id, 'CRITICAL');

        return redirect()->to(base_url('root/users'))->with('success', 'User berhasil ditendang dari sistem!');
    }

    public function updateRole($id)
    {
        // PROTEKSI TINGKAT DEWA & ANTI-KUDETA
        // 1. Root tidak boleh bunuh diri (mengedit datanya sendiri dari sini)
        if ($id == session()->get('id')) {
            return redirect()->to(base_url('root/users'))->with('failed', 'FATAL ERROR: Anda tidak diizinkan mengubah data Anda sendiri dari panel ini!');
        }

        // 2. Anti-Kudeta: Tidak ada Root lain yang boleh menyentuh ID 11 (Absolute Overlord)
        if ($id == 11) {
            return redirect()->to(base_url('root/users'))->with('failed', 'ACCESS DENIED: Ini adalah akun Absolute Overlord. Anda tidak memiliki izin untuk mengusiknya!');
        }

        // ========================================================
        // 1. ATURAN VALIDASI KEAMANAN DATA
        // ========================================================
        $rules = [
            'username' => [
                // Minimal 6 karakter, dan harus unik (kecuali milik user ini sendiri)
                'rules' => "required|min_length[6]|is_unique[user.username,id,$id]",
                'errors' => [
                    'required'   => 'Gagal: Username tidak boleh kosong!',
                    'min_length' => 'Gagal: Username minimal harus terdiri dari 6 karakter!',
                    'is_unique'  => 'Gagal: Username tersebut sudah dipakai oleh pengguna lain!'
                ]
            ],
            'email' => [
                // Harus format email valid, dan harus unik (kecuali milik user ini sendiri)
                'rules' => "required|valid_email|is_unique[user.email,id,$id]",
                'errors' => [
                    'required'    => 'Gagal: Email tidak boleh kosong!',
                    'valid_email' => 'Gagal: Format email tidak valid!',
                    'is_unique'   => 'Gagal: Email tersebut sudah terdaftar di sistem!'
                ]
            ]
        ];

        // ========================================================
        // 2. JALANKAN PENGECEKAN
        // ========================================================
        if (!$this->validate($rules)) {
            // Jika ada yang melanggar aturan, ambil pesan error pertama
            $pesanError = $this->validator->getErrors();
            $errorPertama = reset($pesanError); 
            
            // Tendang kembali ke halaman dengan membawa pesan error tersebut
            return redirect()->to(base_url('root/users'))->with('failed', $errorPertama);
        }

        // ========================================================
        // 3. EKSEKUSI UPDATE (JIKA LOLOS VALIDASI)
        // ========================================================
        $newUsername = $this->request->getPost('username');
        $newEmail    = $this->request->getPost('email');
        $newRole     = $this->request->getPost('role');
        
        $this->userModel->update($id, [
            'username' => $newUsername,
            'email'    => $newEmail,
            'role'     => $newRole
        ]);

        // 🎥 PASANG CCTV : Rekam Perubahan Hak Akses (Gunakan variabel $newRole)
        log_activity('ROLE', 'UPDATE', "Mengubah data/hak akses User ID: $id menjadi " . strtoupper($newRole), $id, 'CRITICAL');

        return redirect()->to(base_url('root/users'))->with('success', 'Akses berhasil diperbarui!');
    }
}