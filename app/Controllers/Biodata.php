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
        // Data ini dikirim dari Controller ke View via parameter kedua view().
        // Ganti nilai di bawah dengan data pribadi kamu.
        $data = [
            // 'nama'  => 'Nabila',
            // 'nim'   => '2211001',
            // 'kelas' => 'TI-A',
            // 'prodi' => 'Teknik Informatika',
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
