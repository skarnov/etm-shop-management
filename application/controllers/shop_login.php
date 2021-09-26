<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Shop_login extends CI_Controller {
    
    private $error;
    public function __construct()
    {
        parent::__construct();
        //MY_Output class's nocache() method
        $this->output->nocache();
        $shop_id = $this->session->userdata('shop_id');
        if ($shop_id != NULL)
        {
            redirect('evis_shop', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('shop_login');
    }

    public function check_shop_login()
    {
        $data = array();
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[250]|xss_clean');
        if($this->form_validation->run() == False)
        {
            $this->load->view('shop_login');
        }
        else
        {
            $result = $this->shop_model->shop_login_check($data);
            $sdata = array();
            if ($result)
            {
                $sdata['shop_id'] = $result->shop_id;
                $sdata['shop_name'] = $result->shop_name;
                $this->session->set_userdata($sdata);
                redirect('evis_shop');
            } 
            else
            {
                $sdata['exception'] = 'Your Email / Password Invalide !';
                $this->session->set_userdata($sdata);
                redirect('shop_login');
            }
        }
    }
    
    public function forgot_password() 
    {
        $this->load->view('forgot_password');
    }
    
    public function reset_password()
    {
        $this->load->library('email');
        $data = $this->input->post('email', true);
        $result = $this->shop_model->check_password($data);
        $password = $result->password;
        if ($password) {
            $mdata = array();
            $mdata['from_address'] = 'arnov@evistechnology.com';
            $mdata['admin_full_name'] = 'Sheikh Arnov';
            $mdata['to_address'] = $data;
            $mdata['subject'] = 'Punjab Forget Password';
            $mdata['admin_password'] = $password;
            $this->shop_model->forget_password($mdata, 'forget_password_email');
            redirect('shop_login/forgot_password');
        } else {
            echo 'Your password is not exists our Database';
            redirect('shop_login/forgot_password');
        }
    }
}