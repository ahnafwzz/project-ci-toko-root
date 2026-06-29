<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RootFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika yang login BUKAN root, tendang balik ke halaman produk!
        if (session()->get('role') !== 'root') {
            return redirect()->to(base_url('produk'))->with('error', 'Akses Ditolak! Area Khusus Root Master.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Biarkan kosong
    }
}