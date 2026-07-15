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

    public function show($nim): string
    {
        $mahasiswaModel = new \App\Models\MahasiswaModel();
        $mahasiswa = $mahasiswaModel->find($nim);

        if (!$mahasiswa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Mahasiswa dengan NIM $nim tidak ditemukan.");
        }

        return view('biodata', [
            'nama'  => $mahasiswa['nama'],
            'nim'   => $mahasiswa['nim'],
            'prodi' => $mahasiswa['prodi'],
            'matakuliah' => 'Web Programming',
            'dosen' => 'dosen 1',
            'asistendosen' => 'asdos 1'
        ]);
    }
}
