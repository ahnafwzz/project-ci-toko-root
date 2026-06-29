<?= $this->extend('layout_root') ?>
<?= $this->section('content') ?>

<style>
    /* ... (Biarkan kode CSS <style> sama persis seperti sebelumnya) ... */
    :root {
        --dark-bg: #0B1120; --card-bg: #1E293B; --card-border: rgba(255,255,255,0.05);
        --text-main: #F8FAFC; --text-muted: #94A3B8; --accent-gold: #D4AF37;
        --safe-green: #10B981; --warn-yellow: #F59E0B; --danger-red: #EF4444;
        --cyber-blue: #0EA5E9; --cyber-purple: #8B5CF6;
    }
    .root-card { background-color: var(--card-bg); border: 1px solid var(--card-border); border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.5); color: var(--text-main); overflow: hidden; }
    .root-card-header { border-bottom: 1px solid var(--card-border); background-color: rgba(15, 23, 42, 0.5); padding: 15px 20px; font-weight: 600; letter-spacing: 0.5px; }
    .metric-card { background-color: var(--card-bg); border: 1px solid var(--card-border); border-radius: 12px; padding: 20px; display: flex; align-items: center; box-shadow: 0 4px 15px rgba(0,0,0,0.2); transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .metric-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.4); }
    .metric-icon { width: 55px; height: 55px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin-right: 18px; }
    .pulse-item { padding: 12px 15px; border-bottom: 1px solid rgba(255,255,255,0.02); display: flex; justify-content: space-between; align-items: center; }
    .pulse-item:last-child { border-bottom: none; }
    .status-dot { height: 8px; width: 8px; border-radius: 50%; display: inline-block; box-shadow: 0 0 8px currentColor; margin-right: 5px; }
    .btn-emergency { background-color: rgba(239, 68, 68, 0.1); color: var(--danger-red); border: 1px solid rgba(239, 68, 68, 0.3); transition: all 0.3s; }
    .btn-emergency:hover { background-color: var(--danger-red); color: #fff; box-shadow: 0 0 15px rgba(239, 68, 68, 0.4); }
    .live-feed { border-left: 2px solid rgba(148, 163, 184, 0.2); margin-left: 10px; padding-left: 20px; }
    .feed-item { position: relative; margin-bottom: 20px; }
    .feed-item::before { content: ''; position: absolute; left: -26px; top: 4px; width: 10px; height: 10px; border-radius: 50%; background-color: var(--card-bg); border: 2px solid var(--text-muted); }
    .feed-item.critical::before { border-color: var(--danger-red); background-color: var(--danger-red); box-shadow: 0 0 8px var(--danger-red); }
    .feed-item.warning::before { border-color: var(--warn-yellow); background-color: var(--warn-yellow); box-shadow: 0 0 8px var(--warn-yellow); }
    .feed-item.info::before { border-color: var(--safe-green); }
    .feed-time { font-size: 11px; color: var(--text-muted); font-family: monospace; }
    .feed-actor { font-weight: bold; color: var(--accent-gold); }
    .feed-desc { font-size: 14px; color: #cbd5e1; margin-top: 3px; }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="mb-0" style="color: var(--text-main); font-weight: 700; letter-spacing: 1px;">
            <i class="bi bi-terminal-split" style="color: var(--accent-gold);"></i> COMMAND CENTER
        </h3>
        <!-- REVISI 1: Mengambil ID dan Username dari Session (Otomatis menyesuaikan siapa yang login) -->
        <span class="small text-uppercase" style="color: var(--text-muted); font-family: monospace;">
            ROOT ACCESS // <?= session()->get('id_user') ?? 'WAITING' ?>_<?= session()->get('username') ?? 'SESSION' ?>
        </span>
    </div>
</div>

<div class="row g-3 mb-4">
    <!-- Users -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card" style="border-bottom: 3px solid var(--cyber-blue);">
            <div class="metric-icon" style="background: rgba(14, 165, 233, 0.1); color: var(--cyber-blue);">
                <i class="bi bi-people-fill"></i>
            </div>
            <div>
                <h3 class="m-0 fw-bold" style="color: var(--text-main);"><?= $total_users ?></h3>
                <!-- REVISI 2: Bahasa disesuaikan -->
                <span class="small" style="color: var(--text-muted);">Akun Terdaftar</span>
            </div>
        </div>
    </div>
    <!-- Products -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card" style="border-bottom: 3px solid var(--safe-green);">
            <div class="metric-icon" style="background: rgba(16, 185, 129, 0.1); color: var(--safe-green);">
                <i class="bi bi-box-seam-fill"></i>
            </div>
            <div>
                <h3 class="m-0 fw-bold" style="color: var(--text-main);"><?= $total_products ?></h3>
                <span class="small" style="color: var(--text-muted);">Total Produk</span>
            </div>
        </div>
    </div>
    <!-- Online Users -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card" style="border-bottom: 3px solid var(--cyber-purple);">
            <div class="metric-icon" style="background: rgba(139, 92, 246, 0.1); color: var(--cyber-purple);">
                <i class="bi bi-wifi"></i>
            </div>
            <div>
                <h3 class="m-0 fw-bold" style="color: var(--cyber-purple);">--</h3>
                <span class="small" style="color: var(--text-muted);">User Online Saat Ini</span>
            </div>
        </div>
    </div>
    <!-- Logs Today -->
    <div class="col-xl-3 col-md-6">
        <div class="metric-card" style="border-bottom: 3px solid var(--warn-yellow);">
            <div class="metric-icon" style="background: rgba(245, 158, 11, 0.1); color: var(--warn-yellow);">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <h3 class="m-0 fw-bold" style="color: var(--text-main);"><?= $logs_today ?></h3>
                <span class="small" style="color: var(--text-muted);">Log Audit Hari Ini</span>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- KOLOM KIRI -->
    <div class="col-lg-4">
        <!-- System Pulse -->
        <div class="root-card mb-4">
            <div class="root-card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-heart-pulse text-info"></i> System Pulse</span>
                <span style="font-size: 10px; padding: 2px 8px; border-radius: 10px; background: rgba(16,185,129,0.1); color: var(--safe-green); border: 1px solid var(--safe-green);">HEALTHY</span>
            </div>
            <div class="card-body p-0">
                <div class="pulse-item">
                    <span class="text-muted small">Core Engine</span>
                    <span class="small" style="color: var(--text-main); font-family: monospace;">CI <?= $ci_version ?></span>
                </div>
                <div class="pulse-item">
                    <span class="text-muted small">Server Env</span>
                    <span class="small" style="color: var(--text-main); font-family: monospace;">PHP <?= $php_version ?></span>
                </div>
                <div class="pulse-item">
                    <span class="text-muted small">Status Database</span>
                    <span class="small" style="color: var(--safe-green);"><span class="status-dot"></span> Online</span>
                </div>
                <div class="pulse-item">
                    <span class="text-muted small">Sensor Autentikasi</span>
                    <span class="small" style="color: var(--warn-yellow);"><i class="bi bi-tools"></i> Calibrating</span>
                </div>
            </div>
        </div>

        <!-- Threat Center -->
        <div class="root-card">
            <div class="root-card-header text-danger">
                <i class="bi bi-radar"></i> Threat Center
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h6 class="m-0 text-light">Anomali Terdeteksi</h6>
                        <small class="text-muted">Dalam 24 Jam Terakhir</small>
                    </div>
                    <h2 class="m-0" style="color: var(--safe-green);">0</h2>
                </div>
                
                <div class="p-2 mb-2" style="background: rgba(0,0,0,0.2); border-radius: 6px; border-left: 3px solid var(--text-muted);">
                    <div class="d-flex justify-content-between small">
                        <span style="color: var(--text-muted);">Gagal Login (Brute Force)</span>
                        <span class="text-light">0</span>
                    </div>
                </div>
                <div class="p-2 mb-2" style="background: rgba(0,0,0,0.2); border-radius: 6px; border-left: 3px solid var(--text-muted);">
                    <div class="d-flex justify-content-between small">
                        <span style="color: var(--text-muted);">Akun Terkunci</span>
                        <span class="text-light">0</span>
                    </div>
                </div>
                <div class="p-2" style="background: rgba(0,0,0,0.2); border-radius: 6px; border-left: 3px solid var(--text-muted);">
                    <div class="d-flex justify-content-between small">
                        <span style="color: var(--text-muted);">Aktivitas Mencurigakan</span>
                        <span class="text-light">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- KOLOM KANAN -->
    <div class="col-lg-8">
        <!-- Emergency Center -->
        <div class="root-card mb-4" style="border-color: rgba(239,68,68,0.2);">
            <div class="root-card-header d-flex justify-content-between align-items-center" style="background: rgba(239,68,68,0.05);">
                <span class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Emergency Actions</span>
                <?php if($setting['is_maintenance']): ?>
                    <span class="badge bg-danger blink-animation">LOCKDOWN ACTIVE</span>
                <?php endif; ?>
            </div>
            <div class="card-body p-3">
                <div class="row g-2">
                    <div class="col-md-4">
                        <a href="<?= base_url('root/settings') ?>" class="btn btn-emergency w-100 py-2" style="font-size: 13px;">
                            <i class="bi bi-shield-lock-fill d-block fs-4 mb-1"></i> Mode Perbaikan
                        </a>
                    </div>
                    <div class="col-md-4">
                        <!-- REVISI 3: Menunggu ID Session besok untuk bisa berfungsi -->
                        <button class="btn btn-emergency w-100 py-2 disabled" style="font-size: 13px; opacity: 0.5;">
                            <i class="bi bi-box-arrow-right d-block fs-4 mb-1"></i> Force Logout All
                        </button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-emergency w-100 py-2 disabled" style="font-size: 13px; opacity: 0.5;">
                            <i class="bi bi-person-x-fill d-block fs-4 mb-1"></i> Lock Admin Accounts
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Live Root Feed -->
        <div class="root-card">
            <div class="root-card-header d-flex justify-content-between align-items-center">
                <span><i class="bi bi-activity text-success"></i> Live Audit Feed</span>
                <a href="<?= base_url('root/audit') ?>" class="badge" style="background: rgba(212,175,55,0.1); color: var(--accent-gold); border: 1px solid var(--accent-gold); text-decoration: none;">Lihat Semua Log</a>
            </div>
            <div class="card-body" style="height: 330px; overflow-y: auto;">
                <div class="live-feed mt-2">
                    <?php if(empty($recent_logs)): ?>
                        <div class="text-muted small italic"><i class="bi bi-info-circle"></i> Sistem memonitor pergerakan... Belum ada aktivitas terdeteksi hari ini.</div>
                    <?php else: ?>
                        <?php foreach($recent_logs as $log): 
                            $class = strtolower($log['severity']);
                        ?>
                            <div class="feed-item <?= $class ?>">
                                <div class="feed-time"><?= date('H:i:s', strtotime($log['created_at'])) ?> &mdash; <?= esc($log['category']) ?></div>
                                <div class="feed-actor">@<?= esc($log['username']) ?></div>
                                <div class="feed-desc">
                                    <?php if($log['severity'] == 'CRITICAL'): ?>
                                        <span class="badge bg-danger" style="font-size: 9px; margin-right: 5px;">CRITICAL</span>
                                    <?php elseif($log['severity'] == 'WARNING'): ?>
                                        <span class="badge bg-warning text-dark" style="font-size: 9px; margin-right: 5px;">WARN</span>
                                    <?php endif; ?>
                                    <?= esc($log['description']) ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>