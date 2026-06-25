<?php

namespace App\Controllers;

class Biodata extends BaseController
{
    /**
     * Tugas BAB 3 - View HTML pada CodeIgniter 4.
     * Method ini mengirim data biodata mahasiswa dari Controller ke View.
     */
    public function index(): string
    {
        $data = [
            'nama'  => 'Nabila Anindya Hassya',
            'nim'   => '32602400080',
            'prodi' => 'Teknik Informatika',
            'matakuliah' => 'Web Programming',
            'dosen' => 'dosen 1',
            'asistendosen' => 'asdos 1'
        ];

        return view('biodata', $data);
    }
}
