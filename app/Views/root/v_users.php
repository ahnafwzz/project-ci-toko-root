<?= $this->extend('layout_root') ?>

<?= $this->section('content') ?>

<style>
    /* Warna teks kiri bawah (Showing 1 to X) */
    .dataTable-info { color: #94A3B8 !important; }
    /* Form search dan dropdown (entries per page) */
    .dataTable-search input, .dataTable-selector {
        background-color: #111827 !important;
        color: #E5E7EB !important;
        border: 1px solid rgba(255, 255, 255, 0.2) !important;
    }
    .dataTable-search input:focus, .dataTable-selector:focus {
        border-color: #D4AF37 !important;
        outline: none !important;
        box-shadow: none !important;
    }
    /* Tombol Pagination */
    .dataTable-pagination a { color: #94A3B8 !important; border: transparent !important;}
    .dataTable-pagination a:hover { background-color: rgba(212, 175, 55, 0.1) !important; color: #D4AF37 !important; }
    .dataTable-pagination .active a, .dataTable-pagination .active a:hover { 
        background-color: rgba(212, 175, 55, 0.2) !important; 
        color: #D4AF37 !important; 
    }
</style>

<?php if (session()->getFlashData('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: rgba(46, 202, 106, 0.1); border-color: #2eca6a; color: #2eca6a;">
        <i class="bi bi-check-circle me-1"></i> <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashData('failed')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: rgba(220, 53, 69, 0.1); border-color: #dc3545; color: #dc3545;">
        <i class="bi bi-exclamation-octagon me-1"></i> <?= session()->getFlashData('failed') ?>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-12">
        <div class="card recent-sales overflow-auto">
            <div class="card-body">
                <h5 class="card-title">System Users <span>| All Roles</span></h5>

                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Registered</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                            <tr>
                                <th scope="row"><a href="#" style="color: #94A3B8;">#USR-<?= $u['id'] ?></a></th>
                                <td class="fw-bold" style="color: #E5E7EB;"><?= $u['username'] ?></td>
                                <td style="color: #94A3B8;"><?= $u['email'] ?></td>
                                <td>
                                    <?php if ($u['role'] === 'root') : ?>
                                        <span class="badge" style="background-color: rgba(212, 175, 55, 0.2); color: #D4AF37; border: 1px solid #D4AF37;">ROOT</span>
                                    <?php elseif ($u['role'] === 'admin') : ?>
                                        <span class="badge bg-primary">ADMIN</span>
                                    <?php else : ?>
                                        <span class="badge bg-secondary">GUEST</span>
                                    <?php endif; ?>
                                </td>
                                <td style="color: #94A3B8;"><?= date('d M Y', strtotime($u['created_at'])) ?></td>
                                <td>
                                    <?php if ($u['id'] == session()->get('id')) : ?>
                                        <span class="badge bg-success">Current Session</span>
                                    <?php else : ?>
                                        <button type="button" class="btn btn-sm btn-outline-warning" title="Edit Akses" data-bs-toggle="modal" data-bs-target="#editModal<?= $u['id'] ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <a href="<?= base_url('root/users/delete/' . $u['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ROOT COMMAND: Yakin ingin menendang user ini dari sistem?');" title="Hapus User">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($users as $u) : ?>
    <div class="modal fade" id="editModal<?= $u['id'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="background-color: #1F2937; border: 1px solid rgba(212, 175, 55, 0.3);">
                <div class="modal-header" style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <h5 class="modal-title" style="color: #D4AF37;"><i class="bi bi-shield-lock"></i> Edit Data: <?= $u['username'] ?></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('root/users/updateRole/' . $u['id']) ?>" method="POST">
                    <div class="modal-body">
                        <p style="color: #94A3B8;">Ubah data profil dan hak akses pengguna ini.</p>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #E5E7EB;">Username</label>
                            <input type="text" name="username" class="form-control" value="<?= $u['username'] ?>" 
                                   minlength="6" title="Username wajib minimal 6 karakter!" 
                                   style="background-color: #111827; color: #E5E7EB; border: 1px solid rgba(255,255,255,0.1);" required>
                            <small style="color: #94A3B8; font-size: 12px;">*Minimal 6 karakter tanpa spasi.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #E5E7EB;">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= $u['email'] ?>" 
                                   pattern="[a-zA-Z0-9._%+\-]+@[a-zA-Z0-9.\-]+\.[a-zA-Z]{2,}"
                                   title="Gagal! Format email wajib memiliki '@' dan diakhiri dengan ekstensi domain (Contoh: .com, .id, .sch.id)" 
                                   style="background-color: #111827; color: #E5E7EB; border: 1px solid rgba(255,255,255,0.1);" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold" style="color: #E5E7EB;">Role / Kasta</label>
                            <select name="role" class="form-select" style="background-color: #111827; color: #E5E7EB; border: 1px solid rgba(255,255,255,0.1);">
                                <option value="guest" <?= ($u['role'] == 'guest') ? 'selected' : '' ?>>GUEST (Pembeli Biasa)</option>
                                <option value="admin" <?= ($u['role'] == 'admin') ? 'selected' : '' ?>>ADMIN (Pengelola Toko)</option>
                                <option value="root" <?= ($u['role'] == 'root') ? 'selected' : '' ?>>ROOT (Overlord System)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid rgba(255,255,255,0.05);">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn" style="background-color: #D4AF37; color: #0B0F19; font-weight: bold;">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->endSection() ?>