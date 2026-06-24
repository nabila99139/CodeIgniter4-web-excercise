<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    public function form(): string
    {
        return view('form_mahasiswa');
    }

    public function simpan(): string
    {
        $data = [
            'nim'   => $this->request->getPost('nim'),
            'nama'  => $this->request->getPost('nama'),
            'prodi' => $this->request->getPost('prodi'),
        ];

        return view('form_mahasiswa', [
            'mahasiswa' => $data,
            'pesan'     => 'Data mahasiswa berhasil dikirim.',
        ]);
    }
}
