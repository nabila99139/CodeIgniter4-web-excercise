<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected MahasiswaModel $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index(): string
    {
        return view('mahasiswa/index', [
            'mahasiswa' => $this->mahasiswaModel->orderBy('nim', 'ASC')->findAll(),
        ]);
    }

    public function form(): string
    {
        return view('mahasiswa/form', [
            'title'      => 'Tambah Mahasiswa',
            'action'     => base_url('mahasiswa/simpan'),
            'mahasiswa'  => [],
            'validation' => session('validation'),
        ]);
    }

    public function simpan()
    {
        if (! $this->validate($this->rules())) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nim'         => $this->request->getPost('nim'),
            'nama'        => $this->request->getPost('nama'),
            'prodi'       => $this->request->getPost('prodi'),
            'universitas' => $this->request->getPost('universitas'),
            'no_hp'       => $this->request->getPost('no_hp'),
        ];

        $this->mahasiswaModel->insert($data);

        return redirect()->to(base_url('mahasiswa'))->with('pesan', 'Data mahasiswa berhasil ditambahkan.');
    }

    public function edit(string $nim): string
    {
        $mahasiswa = $this->mahasiswaModel->find($nim);

        if (! $mahasiswa) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa/form', [
            'title'      => 'Ubah Mahasiswa',
            'action'     => base_url('mahasiswa/update/' . $nim),
            'mahasiswa'  => $mahasiswa,
            'validation' => session('validation'),
        ]);
    }

    public function update(string $nim)
    {
        if (! $this->validate($this->rules($nim))) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        $data = [
            'nim'         => $this->request->getPost('nim'),
            'nama'        => $this->request->getPost('nama'),
            'prodi'       => $this->request->getPost('prodi'),
            'universitas' => $this->request->getPost('universitas'),
            'no_hp'       => $this->request->getPost('no_hp'),
        ];

        $this->mahasiswaModel->update($nim, $data);

        return redirect()->to(base_url('mahasiswa'))->with('pesan', 'Data mahasiswa berhasil diubah.');
    }

    public function hapus(string $nim)
    {
        $this->mahasiswaModel->delete($nim);

        return redirect()->to(base_url('mahasiswa'))->with('pesan', 'Data mahasiswa berhasil dihapus.');
    }

    private function rules(?string $oldNim = null): array
    {
        $nimRules = 'required|min_length[3]|max_length[20]';

        if ($oldNim === null || $this->request->getPost('nim') !== $oldNim) {
            $nimRules .= '|is_unique[tb_mahasiswa.nim]';
        }

        return [
            'nim'         => $nimRules,
            'nama'        => 'required|min_length[3]|max_length[100]',
            'prodi'       => 'required|max_length[100]',
            'universitas' => 'required|max_length[120]',
            'no_hp'       => 'required|max_length[20]',
        ];
    }
}
