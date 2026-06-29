<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ProductModel;
use Dompdf\Dompdf;

class ProdukController extends BaseController
{
    protected $productModel; 

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        return view('produk/index', [
            'products' => $this->productModel->findAll()
        ]);
    }

    public function create()
    {
        $dataFoto = $this->request->getFile('foto');

        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah') 
        ];

        if ($dataFoto->isValid()) {
            $fileName = $dataFoto->getRandomName(); 
            $dataFoto->move('img/', $fileName);
            
            $dataForm['foto'] = $fileName;
        }

        $this->productModel->insert($dataForm);

        // 🎥 PASANG CCTV: Rekam penambahan produk baru
        log_activity('PRODUCT', 'CREATE', "Menambahkan produk baru: " . $dataForm['nama'] . " (Stok: " . $dataForm['jumlah'] . ")", null, 'INFO');

        return redirect('produk')->with('success', 'Data Berhasil Ditambah');
    } 

    public function edit($id)
    {
        // Data lama sebelum diubah
        $dataProduk = $this->productModel->find($id);

        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah') 
        ];

        if ($this->request->getPost('check') == 1) {
            if ($dataProduk['foto'] != '' and file_exists("img/" . $dataProduk['foto'])) {
                unlink("img/" . $dataProduk['foto']);
            }

            $dataFoto = $this->request->getFile('foto');

            if ($dataFoto->isValid()) {
                $fileName = $dataFoto->getRandomName();
                $dataFoto->move('img/', $fileName);
                
                $dataForm['foto'] = $fileName;
            }
        }

        $this->productModel->update($id, $dataForm);

        // 🎥 PASANG CCTV (DETEKSI PERUBAHAN HARGA):
        $pesanLog = "Mengubah data produk: " . $dataProduk['nama'];
        $severity = 'INFO';

        // Jika harga baru beda dengan harga lama, catat detilnya!
        if ($dataProduk['harga'] != $dataForm['harga']) {
            $pesanLog .= " | PERUBAHAN HARGA dari Rp" . number_format($dataProduk['harga']) . " menjadi Rp" . number_format($dataForm['harga']);
            $severity = 'WARNING'; // Naikkan status jadi peringatan karena harga sensitif
        }

        log_activity('PRODUCT', 'UPDATE', $pesanLog, $id, $severity);

        return redirect('produk')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataProduk = $this->productModel->find($id);

        if ($dataProduk && $dataProduk['foto'] != '' && file_exists("img/" . $dataProduk['foto'])) {
            unlink("img/" . $dataProduk['foto']);
        }

        $this->productModel->delete($id);

        // 🎥 PASANG CCTV: Rekam penghapusan produk
        $namaProduk = $dataProduk ? $dataProduk['nama'] : 'ID ' . $id;
        log_activity('PRODUCT', 'DELETE', "Menghapus produk: " . $namaProduk . " dari sistem", $id, 'CRITICAL');

        return redirect('produk')->with('success', 'Data Berhasil Dihapus');
    }

    public function download()
    {
        // Ambil data produk dari database
        $products = $this->productModel->findAll();

        // Render view menjadi HTML
        $html = view('produk/download_pdf', [
            'products' => $products
        ]);

        // Nama file PDF
        $filename = date('Y-m-d-H-i-s') . '-produk.pdf';

        // Inisialisasi Dompdf
        $dompdf = new Dompdf();

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Setting ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Generate PDF
        $dompdf->render();

        // Download / tampilkan PDF
        $dompdf->stream($filename, [
            'Attachment' => true
        ]);
    }
}