<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Lockdown | Under Maintenance</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="<?= base_url('niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    
    <style>
        body { background-color: #0B0F19; color: #E5E7EB; font-family: 'Nunito', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .lockdown-box { background-color: #111827; border: 1px solid rgba(220, 53, 69, 0.4); box-shadow: 0 0 30px rgba(220, 53, 69, 0.15); border-radius: 12px; padding: 40px; max-width: 600px; text-align: center; }
        .icon-warning { font-size: 80px; color: #dc3545; margin-bottom: 20px; animation: pulse 2s infinite; }
        h1 { color: #D4AF37; font-weight: 700; font-size: 32px; margin-bottom: 15px; }
        .reason-box { background-color: #1F2937; border-left: 4px solid #D4AF37; padding: 15px; margin: 20px 0; font-size: 16px; color: #94A3B8; text-align: left; }
        .eta-box { display: inline-block; background-color: rgba(212, 175, 55, 0.1); border: 1px solid rgba(212, 175, 55, 0.3); color: #D4AF37; padding: 8px 20px; border-radius: 50px; font-weight: bold; margin-top: 15px; }
        
        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>
<body>

    <div class="lockdown-box">
        <i class="bi bi-shield-lock-fill icon-warning"></i>
        <h1>SYSTEM LOCKDOWN</h1>
        <p>Mohon maaf, sistem saat ini tidak dapat diakses dan sedang dalam mode perbaikan darurat.</p>
        
        <div class="reason-box">
            <strong><i class="bi bi-info-circle"></i> Pesan dari Overlord:</strong><br>
            <?= nl2br(esc($setting['maintenance_reason'])) ?>
        </div>

        <?php if (!empty($setting['maintenance_end'])) : ?>
            <div class="eta-box">
                <i class="bi bi-clock-history"></i> Estimasi Selesai: <?= date('d M Y - H:i', strtotime($setting['maintenance_end'])) ?> WIB
            </div>
        <?php endif; ?>
    </div>

</body>
</html>