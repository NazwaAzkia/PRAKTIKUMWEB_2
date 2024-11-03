<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        $this->load->view('Login/index');
    }

    public function dologin()
    {
        $user = $this->input->post('email');
        $pswd = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $user])->row_array(); //mencari user berdasarkan email
        if ($user) { //jika user terdaftar
            if (password_verify($pswd, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                $userid = $user['id'];
                $this->session->set_userdata($data);
                if ($user['role'] == 'PEMILIK') { //memeriksa role
                    $this->_updateLastLogin($userid);
                    redirect('menu');
                } else if ($user['role'] == 'ADMIN') {
                    $this->_updateLastLogin($userid);
                    redirect('user');
                } else if ($user['role'] == 'KASIR') {
                    $this->_updateLastLogin($userid);
                    redirect('kasir');
                } else {
                    redirect('Login');
                }
            } else { //jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <b> Error :</b> Password Salah! </div>');
                redirect('menu');
            }
        } else { //jika user tidak terdaftar
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <b>error :</b> User Tidak Terdaftar! </div>');
            redirect('/');
        }
    }

    private function _updateLastLogin($userid)
    {
        $sql = "UPDATE user SET last_login = now() WHERE id=$userid";
        $this->db->query($sql);
    }
}
