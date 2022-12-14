<?php

namespace App\Controllers;
use App\Models\Model_Auth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_Auth= new Model_Auth();
    }

    public function register()
    {
        $data = array(
            'tittle' => 'Register',
        );
        return view('register', $data);
    }

    public function save_register()
    {
        if($this->validate([
            'nama_user'=> [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajin diisi dan tidak boleh kosong!'
                ]
            ],
            'email'=> [
                'label' => 'e-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajin diisi dan tidak boleh kosong!'
                ]
            ],
            'password'=> [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajin diisi dan tidak boleh kosong!'
                ]
            ],
            'repassword'=> [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajin diisi dan tidak boleh kosong!',
                    'matches' => '{field} Password Tidak Sama'
                ]
            ]
        ])){
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'level' => 2
            );
            $this->Model_Auth->save_register($data);
            return redirect()->to(base_url('Auth/register'));
            session()->setFlashdata('pesan', 'Pendaftaran Berhasil');
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    public function login()
    {
        $data = array(
            'tittle' => 'Login',
        );
        return view('login', $data);
    }

    public function cek_login()
    {
        if($this->validate([
            'email'=> [
                'label' => 'e-Mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajin diisi dan tidak boleh kosong!'
                ]
            ],
            'password'=> [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajin diisi dan tidak boleh kosong!'
                ]
            ],
        ])){
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $cek = $this->Model_Auth->login($email, $password);
            if ($cek){
                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('email', $cek['email']);
                session()->set('level', $cek['level']);
                return redirect()->to(base_url(''));
            }else{
                session()->setFlashdata('pesan', 'Login Gagal');
                return redirect()->to(base_url('auth/login'));
            }
        }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/login'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Anda Berhasil Keluar');
        return redirect()->to(base_url('auth/login'));
    }
}