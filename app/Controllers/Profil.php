<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index(): string
    {
        $data = [
            'nama'  => 'Nabila Anindya Hassya',
            'nim'   => '32602400080',
            'kelas' => 'Teknik Informatika',
            'mata kuliah' => 'Web Programming',
            'dosen' => 'Bagas Afza Joko Ariyanto, S.Kom',
            'asisten dosen' => 'saya ga tau'
        ];

        return view('profil', $data);
    }
}
