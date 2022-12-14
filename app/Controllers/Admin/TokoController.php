<?php

namespace App\Controllers\Admin;

use CodeIgnite\Controllers;
use App\Models\TokoModel;

use  App\Controllers\BaseController;

class TokoController extends BaseController
{
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Data Toko Indomart',
    //         'isi' => 'v_data',
    //     ];
    //     return view('admin/dashboard/toko');
    // }
    public function __construct()
    {
        helper('form');
        $this->Toko= new TokoModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Index',
            'toko' => $this->Toko->get_all_data(),
            // 'konten' => 'index',

        ];
        echo view('admin/dashboard/index', $data);
    }

    public function data()
    {
        $data = [
            'title' => 'Toko',
            'toko' => $this->Toko->get_all_data(),

        ];
        echo view('admin/dashboard/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Toko',

        ];
        echo view('admin/dashboard/tambah', $data);
    }

    public function save()
    {
        $valid = $this->validate([
            'nama_toko' => [
                'label' => 'Nama Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'alamat' => [
                'label' => 'Alamat Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'lat' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'long' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'deskripsi' => [
                'label' => 'Deskripsi Toko',
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto,5200]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!'
                ],
            ],
            'foto' => [
                'label' => 'Foto Toko',
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto,5200]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!'
                ],
            ],

        ]);
        if (!$valid) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('toko/add'));
        } else {
            $image = $this->request->getFile('foto');
            $name = $image->getRandomName();
            $data = [
                'nama_toko' => $this->request->getPost('nama_toko'),
                'alamat' => $this->request->getPost('alamat'),
                'lat' => $this->request->getPost('lat'),
                'long' => $this->request->getPost('long'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'foto' => $name,
            ];
            $image->move(ROOTPATH . '/public/foto', $name);
            $this->Toko->insertdata($data);
            session()->setFlashdata('success', 'Data Toko Berhasil Ditambahkan!!!');
            return redirect()->to(base_url('toko/data'));
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Data Toko',
            'toko' => $this->Toko->detail($id),

        ];
        echo view('admin/dashboard/edit', $data);
    }

    public function update($id)
    {
        $valid = $this->validate([
            'nama_toko' => [
                'label' => 'Nama Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'alamat' => [
                'label' => 'Alamat Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'lat' => [
                'label' => 'Latitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'long' => [
                'label' => 'Longitude',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'deskripsi' => [
                'label' => 'Deskripsi Toko',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ],
            ],
            'foto' => [
                'label' => 'Foto Toko',
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]|max_size[foto,5200]',
                'errors' => [
                    'uploaded' => '{field} Wajib Diisi!',
                    'max_size' => '{field} Max 5MB'
                ],
            ],

        ]);
        $toko = $this->Toko->detail($id);
        if (!$valid) {
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('admin/TokoController/edit/' . $toko['id']));
        } else {
            $image = $this->request->getFile('foto');
            $name = $image->getRandomName();
            $data = [
                'nama_toko' => $this->request->getPost('nama_toko'),
                'alamat' => $this->request->getPost('alamat'),
                'lat' => $this->request->getPost('lat'),
                'long' => $this->request->getPost('long'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'foto' => $name,
            ];
            $image->move(ROOTPATH . 'public/foto', $name);
            $this->Toko->update_toko($data, $id);
            session()->setFlashdata('success', 'Data Toko Berhasil Diupdate!!!');
            return redirect()->to(base_url('toko/data'));
        }
    }

    public function delete($id)
    {
        $this->Toko->delete_toko($id);
        session()->setFlashdata('success', 'Data TokoBerhasil di Hapus!!!');
        return redirect()->to(base_url('toko/data'));
    }
}
