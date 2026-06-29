<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SettingModel;

class MaintenanceFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $settingModel = new SettingModel();
        $setting = $settingModel->find(1);

        // Jika saklar Maintenance menyala (ON)
        if ($setting && $setting['is_maintenance'] == 1) {
            
            // 1. Pengecualian Khusus ROOT (Root bebas keluar masuk)
            if (session()->get('role') === 'root') {
                return; // Loloskan
            }

            // 2. Force Logout (Hancurkan sesi Admin / Guest jika mereka sedang login)
            if (session()->get('role') === 'admin' || session()->get('role') === 'guest') {
                session()->destroy();
            }

            // 3. Tampilkan Halaman Lockdown / Karantina
            $response = service('response');
            $response->setBody(view('errors/maintenance', ['setting' => $setting]));
            return $response; // Hentikan proses, cegah masuk ke Controller tujuan
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu diisi
    }
}