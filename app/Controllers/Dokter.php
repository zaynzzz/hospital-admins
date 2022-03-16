<?php

namespace App\Controllers;

class Dokter extends BaseController
{
    public function index()
    {
        $data['actView'] = "Dokter/index";
        return view('template', $data);
    }
    public function tambah()
    {
        $mDokter = $this->mDokter;
        $id_dokter = "PS-" . time();
        // $nik_pasien = $this->request->getVar('nik');
        $nama_dokter = $this->request->getVar('nama');
        $no_telp = $this->request->getVar('notelp');
        $alamat = $this->request->getVar('alamat');
        $spesialis = $this->request->getVar('spesialis');

        $sql = $mDokter->query("INSERT INTO tb_dokter (id_dokter,nama_dokter,no_telp,alamat,spesialis) VALUES ('$id_dokter','$nama_dokter','$no_telp','$alamat','$spesialis')");
        session()->setFlashdata('scs', 'Berhasil menambahkan data dokter ');
        return redirect()->to('Dokter')->withInput();
    }
    public function del($id)
    {
        $mDokter = $this->mDokter;
        $sql = $mDokter->query("UPDATE tb_dokter SET is_active=0 WHERE id_dokter='$id'");
    }
    public function edit($id)
    {
        $mDokter = $this->mDokter;
        $sql = $mDokter->query("SELECT * FROM tb_dokter WHERE id_dokter='$id'");
        $row = $sql->getResult();
        $data['row'] = $row;
        $data['actView'] = "Dokter/edit";
        return view('template', $data);
    }
    public function editprocess($id)
    {
        $mDokter = $this->mDokter;
        // $id_dokter = "OBT-" . time();
        $nama = $this->request->getVar('nama');
        $spesialis = $this->request->getVar('spesialis');
        $alamat = $this->request->getVar('alamat');
        $notelp = $this->request->getVar('notelp');
        $sql = $mDokter->query("UPDATE tb_dokter SET nama_dokter='$nama', spesialis='$spesialis',alamat='$alamat',no_telp='$notelp' WHERE id_dokter='$id'");
        session()->setFlashdata('scs', 'Berhasil update data!');
        return redirect()->to('dokter')->withInput();
    }
}
