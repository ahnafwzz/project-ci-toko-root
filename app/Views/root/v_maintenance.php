<?= $this->extend('layout_root') ?>

<?= $this->section('content') ?>

<style>
    .form-switch .form-check-input {
        width: 3.5em;
        height: 1.75em;
        background-color: #374151;
        border-color: #1F2937;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }
    .form-switch .form-check-input:checked {
        background-color: #dc3545; /* Merah Tanda Bahaya/Lockdown */
        border-color: #dc3545;
        box-shadow: 0 0 15px rgba(220, 53, 69, 0.5);
    }
    .form-switch .form-check-input:focus {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
    }
</style>

<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: rgba(46, 202, 106, 0.1); border-color: #2eca6a; color: #2eca6a;">
        <i class="bi bi-shield-check me-1"></i> <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-8 col-12">
        <div class="card" style="background-color: #1F2937; border: 1px solid rgba(212, 175, 55, 0.2); box-shadow: 0 4px 20px rgba(0,0,0,0.3);">
            <div class="card-header" style="border-bottom: 1px solid rgba(255,255,255,0.05); background-color: #111827;">
                <h5 class="card-title text-uppercase m-0" style="color: #D4AF37; letter-spacing: 1px;">
                    <i class="bi bi-cpu"></i> Emergency Ops Control
                </h5>
            </div>
            
            <div class="card-body mt-4">
                <form action="<?= base_url('root/maintenance/update') ?>" method="POST">
                    
                    <div class="d-flex justify-content-between align-items-center p-3 mb-4 rounded" style="background-color: rgba(0,0,0,0.2); border-left: 4px solid <?= $setting['is_maintenance'] ? '#dc3545' : '#2eca6a' ?>;">
                        <div>
                            <h4 style="color: #E5E7EB; margin: 0; font-weight: bold;">System Lockdown Status</h4>
                            <p style="color: #94A3B8; margin: 0; font-size: 14px;">Aktifkan untuk menendang semua user dan menutup akses web.</p>
                        </div>
                        <div class="form-check form-switch fs-4 m-0">
                            <input class="form-check-input" type="checkbox" name="is_maintenance" id="maintenanceSwitch" <?= $setting['is_maintenance'] ? 'checked' : '' ?>>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" style="color: #D4AF37;"><i class="bi bi-chat-square-text"></i> Pesan Maintenance (Reason)</label>
                        <p style="color: #94A3B8; font-size: 13px; margin-top:-5px;">Pesan ini akan dibaca oleh user yang mencoba login.</p>
                        <textarea name="maintenance_reason" class="form-control" rows="3" style="background-color: #111827; color: #E5E7EB; border: 1px solid rgba(255,255,255,0.1);" required><?= $setting['maintenance_reason'] ?></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold" style="color: #D4AF37;"><i class="bi bi-clock-history"></i> Estimasi Selesai (Opsional)</label>
                        <input type="datetime-local" name="maintenance_end" class="form-control" value="<?= $setting['maintenance_end'] ?>" style="background-color: #111827; color: #E5E7EB; border: 1px solid rgba(255,255,255,0.1); color-scheme: dark;">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-lg" style="background-color: #D4AF37; color: #0B0F19; font-weight: bold; width: 200px;">
                            <i class="bi bi-lightning-charge"></i> EKSEKUSI
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-12">
        <div class="card" style="background-color: #111827; border: 1px dashed rgba(212,175,55,0.5);">
            <div class="card-body mt-3">
                <h6 style="color: #D4AF37; font-weight: bold;"><i class="bi bi-info-circle"></i> Protokol Sistem</h6>
                <p style="color: #94A3B8; font-size: 14px; text-align: justify;">
                    Jika <strong>Lockdown</strong> diaktifkan, semua Middleware/Filter akan otomatis memblokir arus lalu lintas jaringan ke aplikasi. 
                </p>
                <p style="color: #94A3B8; font-size: 14px; text-align: justify;">
                    Hanya Super-User dengan hak akses <strong>ROOT</strong> yang tidak terpengaruh oleh sistem karantina ini.
                </p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>