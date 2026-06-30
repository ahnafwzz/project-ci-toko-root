<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UserModel;
use App\Models\TransactionModel;

class SearchController extends BaseController
{
    public function index()
    {
        helper('number');
        $keyword = $this->request->getGet('q'); 
        
        $productModel     = new ProductModel();
        $userModel        = new UserModel();
        $transactionModel = new TransactionModel();

        $hasilProduk    = [];
        $hasilUser      = [];
        $hasilTransaksi = [];

        if (!empty($keyword)) {
            $hasilProduk = $productModel->like('nama', $keyword)->findAll();
            $hasilUser = $userModel->like('username', $keyword)->orLike('email', $keyword)->findAll();
            $hasilTransaksi = $transactionModel->like('id', $keyword)->orLike('alamat', $keyword)->findAll();
        } else {
            $hasilProduk = $productModel->findAll();
        }

        $data = [
            'hlm'       => 'Hasil Pencarian',
            'keyword'   => $keyword,
            'produk'    => $hasilProduk,
            'users'     => $hasilUser,
            'transaksi' => $hasilTransaksi
        ];

        // MENGUBAH TARGET VIEW KE FILE BARU
        return view('v_search_result', $data); 
    }

    // FUNGSI BARU: Untuk Live Search / Autocomplete ala Google
    public function suggestions()
    {
        $keyword = $this->request->getGet('q');
        if (empty($keyword)) {
            return $this->response->setJSON([]);
        }

        $suggestions = [];

        // 1. CARI PRODUK (Semua Kasta bisa melihat ini)
        $productModel = new ProductModel();
        $produk = $productModel->like('nama', $keyword)->findAll(4); // Batasi 4 data saja
        
        foreach ($produk as $item) {
            $suggestions[] = [
                'text' => $item['nama'],
                'url'  => base_url('search?q=' . urlencode($item['nama'])),
                'icon' => 'bi-box'
            ];
        }

        // 2. CARI USER (KEAMANAN: Hanya Kasta Root atau Admin yang boleh melihat ini!)
        $role = session()->get('role');
        if ($role === 'root' || $role === 'admin') {
            $userModel = new UserModel();
            $users = $userModel->like('username', $keyword)
                               ->orLike('email', $keyword)
                               ->findAll(3); // Batasi 3 data saja
            
            foreach ($users as $user) {
                $suggestions[] = [
                    'text' => 'User: ' . $user['username'],
                    'url'  => base_url('search?q=' . urlencode($user['username'])),
                    'icon' => 'bi-person-circle'
                ];
            }
        }

        // Kirim semua gabungan saran ke Javascript dalam format JSON
        return $this->response->setJSON($suggestions);
    }
}