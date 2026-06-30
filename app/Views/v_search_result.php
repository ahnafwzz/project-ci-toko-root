<?php $temaLayout = (session()->get('role') === 'root') ? 'layout_root' : 'layout'; ?>
<?= $this->extend($temaLayout) ?>
<?= $this->section('content') ?>

<div class="mb-4">
    <h3 style="color: #E5E7EB;">Hasil Pencarian untuk: <span style="color: #D4AF37;">"<?= esc($keyword) ?>"</span></h3>
</div>

<ul class="nav nav-tabs nav-tabs-bordered d-flex" id="searchTabs" role="tablist">
    <li class="nav-item flex-fill" role="presentation">
        <button class="nav-link w-100 active" id="produk-tab" data-bs-toggle="tab" data-bs-target="#produk" type="button" role="tab">
            <i class="bi bi-box"></i> Produk (<?= count($produk) ?>)
        </button>
    </li>
    <?php if(session()->get('role') === 'root' || session()->get('role') === 'admin'): ?>
    <li class="nav-item flex-fill" role="presentation">
        <button class="nav-link w-100" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab">
            <i class="bi bi-people"></i> Users (<?= count($users) ?>)
        </button>
    </li>
    <li class="nav-item flex-fill" role="presentation">
        <button class="nav-link w-100" id="transaksi-tab" data-bs-toggle="tab" data-bs-target="#transaksi" type="button" role="tab">
            <i class="bi bi-receipt"></i> Transaksi (<?= count($transaksi) ?>)
        </button>
    </li>
    <?php endif; ?>
</ul>

<div class="tab-content pt-4" id="searchTabsContent">
    
    <div class="tab-pane fade show active" id="produk" role="tabpanel">
        <?php if(empty($produk)): ?>
            <div class="alert alert-warning" style="background: rgba(255,193,7,0.1); border: 1px solid #ffc107; color: #ffc107;">Produk tidak ditemukan.</div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($produk as $item): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card h-100" style="background: #1F2937; border: 1px solid rgba(212,175,55,0.2);">
                            <img src="<?= base_url('img/' . $item['foto']) ?>" class="card-img-top" style="padding: 10px; border-radius: 15px;" alt="<?= $item['nama'] ?>">
                            <div class="card-body">
                                <h6 class="card-title p-0 m-0" style="color: #D4AF37;"><?= $item['nama'] ?></h6>
                                <p class="card-text mt-2" style="color: #E5E7EB;"><?= number_to_currency($item['harga'], 'IDR') ?></p>
                                <a href="<?= base_url('keranjang/tambah/' . $item['id']) ?>" class="btn btn-sm" style="background: #D4AF37; color: #111827; font-weight: bold;">Beli</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if(session()->get('role') === 'root' || session()->get('role') === 'admin'): ?>
    <div class="tab-pane fade" id="users" role="tabpanel">
        <?php if(empty($users)): ?>
            <div class="alert alert-warning" style="background: rgba(255,193,7,0.1); border: 1px solid #ffc107; color: #ffc107;">User tidak ditemukan.</div>
        <?php else: ?>
            <div class="list-group list-group-flush">
                <?php foreach($users as $user): ?>
                    <!-- Mengubah <li> menjadi <a> agar bisa diklik -->
                    <a href="<?= base_url('root/users') ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="background: #1F2937; color: #E5E7EB; border-bottom: 1px solid rgba(255,255,255,0.05); text-decoration: none;">
                        <div>
                            <i class="bi bi-person-circle me-2" style="color: #D4AF37; font-size: 1.5rem;"></i>
                            <strong><?= $user['username'] ?></strong> <br>
                            <small style="color: #94A3B8;"><?= $user['email'] ?></small>
                        </div>
                        <span class="badge bg-secondary"><?= $user['role'] ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="tab-pane fade" id="transaksi" role="tabpanel">
        <?php if(empty($transaksi)): ?>
            <div class="alert alert-warning" style="background: rgba(255,193,7,0.1); border: 1px solid #ffc107; color: #ffc107;">Transaksi tidak ditemukan.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-borderless text-white">
                    <thead style="background: #111827;">
                        <tr><th>ID</th><th>Username</th><th>Alamat</th><th>Total</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach($transaksi as $trx): ?>
                            <tr>
                                <td style="color: #D4AF37;">#<?= $trx['id'] ?></td>
                                <td><?= $trx['username'] ?></td>
                                <td><?= $trx['alamat'] ?></td>
                                <td><?= number_to_currency($trx['total_harga'], 'IDR') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>

</div>
<?= $this->endSection() ?>