<?php

namespace App\Controllers;

class Praktikum extends BaseController
{
    public function form(): string
    {
        return view('form_praktikum');
    }

    public function simpan(): string
    {
        $data = [
            'nama'              => $this->request->getPost('nama'),
            'nim'               => $this->request->getPost('nim'),
            'kelas'             => $this->request->getPost('kelas'),
            'matakuliah'        => $this->request->getPost('matakuliah'),
            'dosen_pengampu'    => $this->request->getPost('dosen_pengampu'),
            'asisten_praktikum' => $this->request->getPost('asisten_praktikum'),
        ];

        return view('hasil_praktikum', ['data' => $data]);
    }
}
