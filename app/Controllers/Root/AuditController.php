<?php

namespace App\Controllers\Root;

use App\Controllers\BaseController;
use App\Models\AuditModel;
use Dompdf\Dompdf; // 📄 Memanggil mesin cetak PDF

class AuditController extends BaseController
{
    public function index()
    {
        $auditModel = new AuditModel();
        
        $data = [
            'hlm'  => 'Audit Logs',
            'logs' => $auditModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('root/v_audit', $data);
    }

    // Fungsi Cetak Laporan Keamanan
    public function downloadPdf()
    {
        $auditModel = new AuditModel();
        
        // Ambil semua data log CCTV
        $logs = $auditModel->orderBy('created_at', 'DESC')->findAll();

        // Lempar data ke halaman template rahasia
        $html = view('root/v_audit_pdf', [
            'logs' => $logs
        ]);

        // Buat nama file ala dokumen militer/cybersecurity
        $filename = 'CONFIDENTIAL_AUDIT_REPORT_' . date('Ymd_His') . '.pdf';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        
        // Atur ukuran kertas ke A4 dan Landscape (Melebar) agar tabel lega
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename, [
            'Attachment' => true
        ]);
    }
}