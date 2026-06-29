<?php

if (!function_exists('log_activity')) {
    /**
     * Global Helper untuk mencatat Audit Logs (CCTV Sistem) - VERSI FINAL
     */
    function log_activity($category, $action, $description, $target_id = null, $severity = 'INFO')
    {
        // Panggil service bawaan CI4 untuk koneksi Database, Request (IP & Browser), dan Session
        $db      = \Config\Database::connect();
        $request = \Config\Services::request();
        $session = session();

        // Siapkan paket data untuk dikirim ke database (Tanpa old_data & new_data)
        $data = [
            'user_id'     => $session->get('id') ?? $session->get('id_user') ?? $session->get('user_id'),
            'username'    => $session->get('username') ?? 'Guest', // Tangkap nama user atau jadikan Guest
            'category'    => $category,
            'action'      => $action,
            'target_id'   => $target_id,
            'description' => $description,
            'severity'    => $severity,
            'ip_address'  => $request->getIPAddress(), // Canggih: Tangkap IP langsung
            'user_agent'  => $request->getUserAgent()->getAgentString() // Canggih: Tangkap jenis browser/OS
        ];

        // Eksekusi insert secara diam-diam (background)
        $db->table('audit_logs')->insert($data);
    }
}