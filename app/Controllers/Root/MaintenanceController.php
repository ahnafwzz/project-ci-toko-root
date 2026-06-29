<?php

namespace App\Controllers\Root;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class MaintenanceController extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index()
    {
        $data = [
            'hlm'     => 'Maintenance Mode',
            'setting' => $this->settingModel->find(1) 
        ];

        return view('root/v_maintenance', $data);
    }

    public function update()
    {
        $is_maintenance = $this->request->getPost('is_maintenance') ? 1 : 0;
        
        $this->settingModel->update(1, [
            'is_maintenance'     => $is_maintenance,
            'maintenance_reason' => $this->request->getPost('maintenance_reason'),
            'maintenance_end'    => $this->request->getPost('maintenance_end')
        ]);

        $status = $is_maintenance ? 'DIKUNCI (MAINTENANCE ON)' : 'DIBUKA (MAINTENANCE OFF)';

        // 🎥 PASANG CCTV : Rekam Status Karantina
        $pesan_log = $is_maintenance ? 'MENGAKTIFKAN System Lockdown' : 'MEMATIKAN System Lockdown';
        log_activity('SYSTEM', 'UPDATE', $pesan_log, null, 'CRITICAL');

        // Redirectnya dikembalikan ke halaman maintenance
        return redirect()->to(base_url('root/maintenance'))->with('success', "SYSTEM COMMAND EXECUTED: Sistem berhasil $status!");
    }
}