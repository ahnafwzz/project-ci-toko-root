<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Security Audit Report</title>
    <style>
        /* CSS Khusus Dompdf (Harus Inline/Internal, tidak bisa pakai Bootstrap external) */
        body { font-family: Helvetica, Arial, sans-serif; font-size: 10pt; color: #333; }
        .header { text-align: center; border-bottom: 2px solid #000; padding-bottom: 10px; margin-bottom: 20px; }
        .confidential { color: #dc3545; font-weight: bold; font-size: 14pt; letter-spacing: 2px; text-transform: uppercase; }
        .title { font-size: 18pt; font-weight: bold; margin: 5px 0; color: #111827; }
        
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #666; padding: 8px; text-align: left; vertical-align: top; }
        th { background-color: #111827; color: #ffffff; font-size: 10pt; text-transform: uppercase; }
        
        .sev-critical { color: #dc3545; font-weight: bold; }
        .sev-warning { color: #d39e00; font-weight: bold; }
        .sev-info { color: #28a745; font-weight: bold; }
        
        .footer { margin-top: 30px; font-size: 8pt; color: #555; text-align: right; border-top: 1px solid #ccc; padding-top: 5px; }
        .actor-name { font-weight: bold; color: #000; }
        .timestamp { font-family: monospace; font-size: 9pt; }
    </style>
</head>
<body>

    <div class="header">
        <div class="confidential">[ RESTRICTED / CONFIDENTIAL DATA ]</div>
        <div class="title">SYSTEM AUDIT & SECURITY REPORT</div>
        <div>
            <strong>Authorized by:</strong> OVERLORD SYSTEM | 
            <strong>Root Access:</strong> <?= session()->get('id_user') ?? 'WAITING' ?>_<?= session()->get('username') ?? 'SESSION' ?>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th width="15%">Waktu & Tanggal</th>
                <th width="15%">Identitas Pelaku</th>
                <th width="15%">Kategori Aksi</th>
                <th width="35%">Deskripsi Detail</th>
                <th width="10%">IP Address</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($logs)): ?>
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px;">Sistem aman. Belum ada rekam jejak aktivitas.</td>
                </tr>
            <?php else: ?>
                <?php foreach($logs as $log): ?>
                    <tr>
                        <td class="timestamp"><?= date('d M Y', strtotime($log['created_at'])) ?><br><?= date('H:i:s', strtotime($log['created_at'])) ?> WIB</td>
                        <td>
                            <span class="actor-name">@<?= esc($log['username']) ?></span><br>
                            <span style="font-size: 8pt; color: #666;">ID: <?= $log['user_id'] ?></span>
                        </td>
                        <td>
                            <strong><?= esc($log['category']) ?></strong><br>
                            <span style="font-size: 9pt;">[<?= esc($log['action']) ?>]</span>
                        </td>
                        <td><?= esc($log['description']) ?></td>
                        <td class="timestamp"><?= esc($log['ip_address']) ?></td>
                        
                        <?php 
                            // Warnai status sesuai level bahaya
                            $sevClass = 'sev-info';
                            if ($log['severity'] == 'CRITICAL') $sevClass = 'sev-critical';
                            if ($log['severity'] == 'WARNING') $sevClass = 'sev-warning';
                        ?>
                        <td class="<?= $sevClass ?>"><?= esc($log['severity']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="footer">
        Dokumen dicetak pada: <?= date("Y-m-d H:i:s") ?> WIB <br>
        <em>Ini adalah laporan dokumen otomatis (System-Generated). Dilarang menyebarluaskan tanpa izin Root Master.</em>
    </div>

</body>
</html>