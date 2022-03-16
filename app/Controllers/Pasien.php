<?php

namespace App\Controllers;

class Pasien extends BaseController
{
    public function index()
    {
        $data['actView'] = "Pasien/index";
        return view('template', $data);
    }
    public function del($id)
    {
        $mDokter = $this->mDokter;
        $sql = $mDokter->query("UPDATE tb_pasien SET is_active=0 WHERE id_pasien='$id'");
    }
    public function tambah()
    {
        $mpasien = $this->mPasien;
        $id_pasien = "PS-" . time();
        $nik_pasien = $this->request->getVar('nik');
        $nama_pasien = $this->request->getVar('nama');
        $no_telp = $this->request->getVar('notelp');
        $alamat = $this->request->getVar('alamat');
        $jenis_kelamin = $this->request->getVar('gender');
        $data =
            // [
            //     'nik_pasien' => $this->request->getVar('nik'),
            //     'nama_pasien' => $this->request->getVar('nama'),
            //     'no_telp' => $this->request->getVar('notelp'),
            //     'alamat' => $this->request->getVar('alamat'),
            //     'jenis_kelamin' => $this->request->getVar('gender'),
            // ];
            $sql = $mpasien->query("INSERT INTO tb_pasien (id_pasien,nik_pasien,nama_pasien,no_telp,alamat,jenis_kelamin) VALUES ('$id_pasien','$nik_pasien','$nama_pasien','$no_telp','$alamat','$jenis_kelamin')");
        session()->setFlashdata('scs', 'Berhasil menambahkan pasien');
        return redirect()->to('Pasien')->withInput();
    }
    public function edit($id)
    {
        $mPasien = $this->mPasien;
        $sql = $mPasien->query("SELECT * FROM tb_pasien WHERE id_pasien='$id'");
        $row = $sql->getResult();
        $data['row'] = $row;
        $data['actView'] = "Pasien/edit";
        return view('template', $data);
    }
    public function editprocess($id)
    {
        $mPasien = $this->mPasien;
        // $id_obat = "OBT-" . time();
        $nama_pasien = $this->request->getVar('nama_pasien');
        // $nik_pasien = $this->request->getVar('nik_pasien');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $alamat = $this->request->getVar('alamat');
        $no_telp = $this->request->getVar('notelp');
        $sql = $mPasien->query("UPDATE tb_pasien SET nama_pasien='$nama_pasien', jenis_kelamin='$jenis_kelamin',alamat='$alamat',no_telp='$no_telp' WHERE id_pasien='$id'");
        session()->setFlashdata('scs', 'Berhasil update data!');
        return redirect()->to('Pasien')->withInput();
    }
}
