<?php

namespace App\Controllers\Root;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\AuditModel;
use App\Models\SettingModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $userModel    = new UserModel();
        $productModel = new ProductModel();
        $auditModel   = new AuditModel();
        $settingModel = new SettingModel();

        // Tangkap tanggal hari ini untuk menghitung aktivitas harian
        $today = date('Y-m-d');

        $data = [
            'hlm'            => 'Dashboard Utama',
            'total_users'    => $userModel->countAllResults(),
            'total_products' => $productModel->countAllResults(),
            'logs_today'     => $auditModel->like('created_at', $today)->countAllResults(),
            
            // Ambil 5 aktivitas terbaru dari CCTV
            'recent_logs'    => $auditModel->orderBy('created_at', 'DESC')->findAll(5),
            
            // Cek status Maintenance/Lockdown
            'setting'        => $settingModel->find(1),
            
            // Data Sistem Otomatis
            'ci_version'     => \CodeIgniter\CodeIgniter::CI_VERSION,
            'php_version'    => phpversion()
        ];

        return view('root/v_dashboard', $data);
    }
}