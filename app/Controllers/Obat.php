<?php

namespace App\Controllers;

class Obat extends BaseController
{
    public function index()
    {
        $data['actView'] = "Obat/index";
        return view('template', $data);
    }
    public function tambah()
    {
        $mObat = $this->mObat;
        $id_obat = "OBT-" . time();
        // $nik_obat = $this->request->getVar('nik');
        $nama_obat = $this->request->getVar('nama_obat');
        // $no_telp = $this->request->getVar('notelp');
        // $alamat = $this->request->getVar('alamat');
        $ket_obat = $this->request->getVar('ket_obat');

        $sql = $mObat->query("INSERT INTO tb_obat (id_obat,nama_obat,ket_obat) VALUES ('$id_obat','$nama_obat','$ket_obat')");
        session()->setFlashdata('scs', 'Berhasil menambahkan data obat ');
        return redirect()->to('obat')->withInput();
    }
    public function del($id)
    {
        $mObat = $this->mObat;
        $sql = $mObat->query("UPDATE tb_obat SET is_active=0 WHERE id_obat='$id'");
    }
    public function edit($id)
    {
        $mObat = $this->mObat;
        $sql = $mObat->query("SELECT * FROM tb_obat WHERE id_obat='$id'");
        $row = $sql->getResult();
        $data['row'] = $row;
        $data['actView'] = "Obat/edit";
        return view('template', $data);
    }
    public function editprocess($id)
    {
        $mObat = $this->mObat;
        // $id_obat = "OBT-" . time();
        $nama_obat = $this->request->getVar('nama_obat');
        $ket_obat = $this->request->getVar('ket_obat');
        $sql = $mObat->query("UPDATE tb_obat SET nama_obat='$nama_obat', ket_obat='$ket_obat' WHERE id_obat='$id'");
        session()->setFlashdata('scs', 'Berhasil update data!');
        return redirect()->to('obat')->withInput();
    }
}
