<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index(): string
    {
        $data = [
            'nama'  => 'Budi',
            'nim'   => '2211001',
            'kelas' => 'TI-A',
        ];

        return view('profil', $data);
    }
}
