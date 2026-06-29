<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Role implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // 1. Jika belum login, arahkan ke halaman Login 
        if (!session()->has('isLoggedIn')) {
            return redirect()->to(site_url('login'));
        }

        // 2. Jika sudah login tapi rolenya "admin", tolak akses dan arahkan ke Home 
        if (session()->get('role') == 'admin') {
            return redirect()->to(site_url('/'));
        }

        // Jika rolenya "guest", biarkan lewat (tidak perlu blok kode khusus) 
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
