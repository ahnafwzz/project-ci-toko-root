<?= $this->extend('layout_root') ?>

<?= $this->section('content') ?>

<style>
    /* =========================================
       ✨ SKILL DEWA: CSS ANIMATION & STYLING ✨
       ========================================= */
    /* Desain Toggle Switch Mulus */
    .log-switcher {
        position: relative;
        display: flex;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 50px;
        padding: 5px;
        border: 1px solid rgba(212, 175, 55, 0.2);
        box-shadow: inset 0 2px 10px rgba(0,0,0,0.5);
    }

    .log-switcher input[type="radio"] {
        display: none;
    }

    .log-switcher label {
        position: relative;
        z-index: 2;
        padding: 8px 20px;
        margin: 0;
        font-size: 13px;
        font-weight: 600;
        color: #94A3B8;
        cursor: pointer;
        transition: color 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .log-switcher input[type="radio"]:checked + label {
        color: #111827; /* Teks jadi gelap saat aktif karena background emas */
    }

    /* Slider Emas yang Berjalan */
    .switcher-slider {
        position: absolute;
        top: 5px;
        bottom: 5px;
        left: 5px;
        width: calc(50% - 5px);
        background: linear-gradient(135deg, #D4AF37, #FBF5B7);
        border-radius: 50px;
        transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); /* Efek memantul mulus */
        box-shadow: 0 0 15px rgba(212, 175, 55, 0.4);
        z-index: 1;
    }

    #tab-auth:checked ~ .switcher-slider {
        transform: translateX(100%);
    }

    /* Animasi Tabel Muncul (Fade & Slide Up) */
    .table-container {
        display: none;
        animation: fadeSlideUp 0.5s ease forwards;
    }
    
    .table-container.active {
        display: block;
    }

    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card" style="background-color: #1F2937; border: 1px solid rgba(212, 175, 55, 0.2); box-shadow: 0 4px 20px rgba(0,0,0,0.3); border-radius: 12px; overflow: hidden;">
            
            <div class="card-header d-flex flex-wrap justify-content-between align-items-center" style="border-bottom: 1px solid rgba(255,255,255,0.05); background-color: #111827; padding: 15px 20px;">
                
                <div class="d-flex align-items-center gap-3 mb-2 mb-md-0">
                    <h5 class="text-uppercase m-0" style="color: #D4AF37; letter-spacing: 1px; font-weight: 700;">
                        <i class="bi bi-hdd-network"></i> Central Monitor
                    </h5>
    
                    <span class="badge" style="background-color: rgba(212, 175, 55, 0.1); color: #D4AF37; border: 1px solid rgba(212, 175, 55, 0.3); padding: 5px 10px; border-radius: 6px;">
                        <span class="spinner-grow spinner-grow-sm" style="width: 10px; height: 10px; margin-right: 5px;" role="status"></span> Live
                    </span>
    
                    <a href="<?= base_url('root/audit/pdf') ?>" target="_blank" class="btn btn-sm" style="background-color: rgba(220, 53, 69, 0.1); color: #dc3545; border: 1px solid rgba(220, 53, 69, 0.5); font-weight: 600; box-shadow: 0 0 10px rgba(220, 53, 69, 0.2); margin-left: 10px;">
                        <i class="bi bi-file-earmark-pdf-fill"></i> EXPORT REPORT
                    </a>
                </div>

                <div class="log-switcher">
                    <input type="radio" name="logType" id="tab-system" checked onchange="switchTab('system')">
                    <label for="tab-system"><i class="bi bi-shield-check"></i> System Logs</label>
                    
                    <input type="radio" name="logType" id="tab-auth" onchange="switchTab('auth')">
                    <label for="tab-auth"><i class="bi bi-person-bounding-box"></i> Auth Logs</label>
                    
                    <div class="switcher-slider"></div>
                </div>
                
            </div>
            
            <div class="card-body mt-2">
                
                <div id="system-logs-container" class="table-container active table-responsive">
                    <table class="table table-hover table-borderless align-middle" style="color: #E5E7EB;">
                        <thead style="background-color: #111827; color: #94A3B8; border-bottom: 2px solid #374151;">
                            <tr>
                                <th>Waktu Kejadian</th>
                                <th>Pelaku</th>
                                <th>Kategori</th>
                                <th>Aktivitas</th>
                                <th>IP Address</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($logs)): ?>
                                <tr>
                                    <td colspan="6" class="text-center py-5" style="color: #6B7280;">Belum ada aktivitas sistem yang terekam.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach($logs as $log): ?>
                                    <tr style="border-bottom: 1px solid #374151;">
                                        <td style="font-size: 13px;">
                                            <i class="bi bi-clock"></i> <?= date('d M Y, H:i', strtotime($log['created_at'])) ?>
                                        </td>
                                        <td>
                                            <strong><?= esc($log['username']) ?></strong>
                                            <?php if($log['user_id']): ?>
                                                <br><span style="font-size: 11px; color: #6B7280;">ID: <?= $log['user_id'] ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary"><?= esc($log['category']) ?></span>
                                            <br><span style="font-size: 11px; color: #94A3B8;"><?= esc($log['action']) ?></span>
                                        </td>
                                        <td style="font-size: 14px; max-width: 300px;">
                                            <?= esc($log['description']) ?>
                                        </td>
                                        <td style="font-size: 12px; color: #94A3B8; font-family: monospace;">
                                            <i class="bi bi-globe"></i> <?= esc($log['ip_address']) ?>
                                        </td>
                                        <td>
                                            <?php if($log['severity'] == 'CRITICAL'): ?>
                                                <span class="badge" style="background-color: rgba(220, 53, 69, 0.2); color: #dc3545; border: 1px solid #dc3545;">CRITICAL</span>
                                            <?php elseif($log['severity'] == 'WARNING'): ?>
                                                <span class="badge" style="background-color: rgba(255, 193, 7, 0.2); color: #ffc107; border: 1px solid #ffc107;">WARNING</span>
                                            <?php else: ?>
                                                <span class="badge" style="background-color: rgba(46, 202, 106, 0.2); color: #2eca6a; border: 1px solid #2eca6a;">INFO</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div id="auth-logs-container" class="table-container text-center py-5">
                    <div style="font-size: 40px; color: rgba(212, 175, 55, 0.5); margin-bottom: 15px;">
                        <i class="bi bi-fingerprint"></i>
                    </div>
                    <h4 style="color: #D4AF37; font-weight: 600;">Auth & Session Logs</h4>
                    <p style="color: #94A3B8; max-width: 400px; margin: 0 auto;">
                        Sensor keamanan sedang dikalibrasi. Pemantauan status <strong>User Online</strong> dan jejak <strong>Login/Logout</strong> akan segera aktif di sini.
                    </p>
                    <div class="mt-4">
                        <span class="badge" style="background-color: rgba(255,255,255,0.05); color: #6B7280; padding: 8px 15px; border: 1px dashed #374151;">
                            Menunggu Instruksi Overlord (Sesi Besok)
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        // Ambil elemen tabel
        const systemContainer = document.getElementById('system-logs-container');
        const authContainer = document.getElementById('auth-logs-container');

        // Reset class active
        systemContainer.classList.remove('active');
        authContainer.classList.remove('active');

        // Aktifkan tabel sesuai pilihan dengan trik setTimeout kecil agar animasi reset
        if (tabName === 'system') {
            setTimeout(() => { systemContainer.classList.add('active'); }, 10);
        } else {
            setTimeout(() => { authContainer.classList.add('active'); }, 10);
        }
    }
</script>

<?= $this->endSection() ?>