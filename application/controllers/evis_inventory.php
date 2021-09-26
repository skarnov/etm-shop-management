<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Inventory extends CI_Controller {
    
    private $error;
    public function __construct() 
    {
        parent::__construct();
        //MY_Output class's nocache() method
        $this->output->nocache();
        $shop_id = $this->session->userdata('shop_id');
        if ($shop_id == NULL)
        {
            redirect('shop_login', 'refresh');
        }
    }
    
    public function add_brand()
    {
        $data = array();
        $data['title'] = 'New Brand';
        $data['dashboard'] = $this->load->view('inventory/add_brand', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function save_brand()
    {
        $this->evis_inventory_model->save_brand_info();
        $sdata = array();
        $sdata['save_brand'] = 'Brand Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_brand');
    }
    
    public function manage_brand()
    {
        $data = array();
        $data['title'] = 'Manage Brand';
        $config['base_url'] = base_url() . 'evis_inventory/manage_brand/';
        $config['total_rows'] = $this->db->count_all('tbl_brand');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_brand'] = $this->evis_inventory_model->select_all_brand($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_brand', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function edit_brand($brand_id) 
    {
        $data = array();
        $data['title'] = 'Edit Brand';
        $data['brand_info'] = $this->evis_inventory_model->select_brand_by_id($brand_id);
        $data['dashboard'] = $this->load->view('inventory/edit_brand', $data, true);
        $this->load->view('shop', $data);
    }

    public function update_brand() 
    {
        $sdata = array();
        $sdata['update_brand'] = 'Update Brand Product Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_inventory_model->update_brand_info();
        redirect('evis_inventory/manage_brand');
    }
    
    public function delete_brand($brand_id) 
    {
        $this->evis_inventory_model->delete_brand_by_id($brand_id);
        redirect('evis_inventory/manage_brand');
    }

    public function add_model()
    {
        $data = array();
        $data['title'] = 'New Model';
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['dashboard'] = $this->load->view('inventory/add_model', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function save_model()
    {
        $this->evis_inventory_model->save_model_info();
        $sdata = array();
        $sdata['save_model'] = 'Model Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_model');
    }
    
    public function manage_model()
    {
        $data = array();
        $data['title'] = 'Manage Model';
        $config['base_url'] = base_url() . 'evis_inventory/manage_model/';
        $config['total_rows'] = $this->db->count_all('tbl_model');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_model'] = $this->evis_inventory_model->select_all_model($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_model', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function edit_model($model_id) 
    {
        $data = array();
        $data['title'] = 'Edit Model';
        $data['model_info'] = $this->evis_inventory_model->select_model_by_id($model_id);
        $data['dashboard'] = $this->load->view('inventory/edit_model', $data, true);
        $this->load->view('shop', $data);
    }

    public function update_model() 
    {
        $sdata = array();
        $sdata['update_model'] = 'Update Model Product Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_inventory_model->update_model_info();
        redirect('evis_inventory/manage_model');
    }
    
    public function delete_model($model_id) 
    {
        $this->evis_inventory_model->delete_model_by_id($model_id);
        redirect('evis_inventory/manage_model');
    }

    public function add_inventory()
    {
        $data = array();
        $data['title'] = 'New Inventory';
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['dashboard'] = $this->load->view('inventory/add_inventory', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function select_brand_model($id) 
    {      
        $data = array();
        $data['all_model'] = $this->evis_inventory_model->select_model_by_brand_id($id);
        echo $this->load->view('inventory/model', $data, true);
    }
    
    public function save_inventory()
    {
        $this->evis_inventory_model->save_inventory_info();
        $sdata = array();
        $sdata['save_inventory'] = 'Inventory Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_inventory');
    }
    
     public function search_inventory() 
    {
        $data = array();
        $data['title'] = 'Sale Inventory';
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['search_inventory_list'] = $this->shop_model->search_inventory_list();
        $data['dashboard'] = $this->load->view('inventory/search_inventory', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function manage_inventory()
    {
        $data = array();
        $data['title'] = 'Manage Inventory';
        $config['base_url'] = base_url() . 'evis_inventory/manage_inventory/';
        $config['total_rows'] = $this->db->count_all('tbl_inventory');
        $config['per_page'] = '8';
        /** STYLE PAGINATION **/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /** END STYLE PAGINATION **/
        $this->pagination->initialize($config);
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['all_inventory'] = $this->evis_inventory_model->select_all_inventory($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_inventory', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function edit_inventory($inventory_id) 
    {
        $data = array();
        $data['title'] = 'Edit Inventory';
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['all_model'] = $this->evis_inventory_model->all_model();
        $data['inventory_info'] = $this->evis_inventory_model->select_inventory_by_id($inventory_id);
        $data['dashboard'] = $this->load->view('inventory/edit_inventory', $data, true);
        $this->load->view('shop', $data);
    }

    public function update_inventory() 
    {
        $sdata = array();
        $sdata['update_inventory'] = 'Update Inventory Product Successfully';
        $this->session->set_userdata($sdata);
        $this->evis_inventory_model->update_inventory_info();
        redirect('evis_inventory/manage_inventory');
    }
    
    public function delete_inventory($inventory_id) 
    {
        $this->evis_inventory_model->delete_inventory_by_id($inventory_id);
        redirect('evis_inventory/manage_inventory');
    }
    
    public function total_inventory()
    {
        $data = array();
        $data['title'] = 'Total Inventory';;
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['all_inventory'] = $this->evis_inventory_model->select_total_inventory();
        $data['dashboard'] = $this->load->view('inventory/total_inventory', $data, true);
        $this->load->view('shop', $data);
    }
}