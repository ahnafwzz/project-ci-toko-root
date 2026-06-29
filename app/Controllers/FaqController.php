<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FaqController extends BaseController
{
    public function index()
    {
        $data = [
            // Pastikan teks ini utuh sebelum di-save
            'hlm' => 'Frequently Asked Questions'
        ];

        return view('v_faq', $data);
    }
}
