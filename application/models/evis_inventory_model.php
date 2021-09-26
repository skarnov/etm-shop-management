<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Evis_Inventory_Model extends CI_Model {
    
    public function save_brand_info()
    {
        $data=array();
        $data['brand_name'] = $this->input->post('brand_name', true);
        $this->db->insert('tbl_brand',$data);
    }
    
    public function select_all_brand($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_brand ORDER BY brand_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_brand_by_id($brand_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_id',$brand_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_brand_info()
    {
        $data=array();
        $data['brand_name'] = $this->input->post('brand_name', true);
        $brand_id = $this->input->post('brand_id', true);
        $this->db->where('brand_id',$brand_id);
        $this->db->update('tbl_brand',$data);
    }
    
    public function delete_brand_by_id($brand_id)
    {
        $this->db->where('brand_id',$brand_id);
        $this->db->delete('tbl_brand');
    }
    
    public function save_model_info()
    {
        $data=array();
        $data['model_name'] = $this->input->post('model_name', true);
        $data['brand_id'] = $this->input->post('brand_id', true);
        $this->db->insert('tbl_model',$data);
    }
    
    public function select_all_model($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_model AS m, tbl_brand AS b WHERE m.brand_id=b.brand_id ORDER BY m.model_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_model_by_id($model_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_model');
        $this->db->where('model_id',$model_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_model_info()
    {
        $data=array();
        $data['model_name'] = $this->input->post('model_name', true);
        $model_id = $this->input->post('model_id', true);
        $this->db->where('model_id',$model_id);
        $this->db->update('tbl_model',$data);
    }
    
    public function delete_model_by_id($model_id)
    {
        $this->db->where('model_id',$model_id);
        $this->db->delete('tbl_model');
    }
    
    public function all_brand()
    {
        $sql = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function all_model()
    {
        $sql = "SELECT * FROM tbl_model ORDER BY model_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_model_by_brand_id($id)
    {
        $sql = "SELECT * FROM tbl_model AS m, tbl_brand AS b WHERE m.brand_id='$id' AND m.brand_id=b.brand_id ORDER BY m.model_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function add_inventory()
    {
        $data = array();
        $data['title'] = 'New Inventory';
        $data['dashboard'] = $this->load->view('inventory/add_inventory', $data, true);
        $this->load->view('master', $data);
    }
    
    public function save_inventory()
    {
        $this->evis_inventory_model->save_inventory_info();
        $sdata = array();
        $sdata['save_inventory'] = 'Inventory Saved';
        $this->session->set_userdata($sdata);
        redirect('evis_inventory/add_inventory');
    }
    
    public function manage_inventory()
    {
        $data = array();
        $data['title'] = 'Manage Inventory';
        $config['base_url'] = base_url() . 'evis_erp/manage_inventory/';
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
        $data['all_inventory'] = $this->evis_inventory_model->select_all_inventory($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('inventory/manage_inventory', $data, true);
        $this->load->view('master', $data);
    }
    
    public function edit_inventory($inventory_id) 
    {
        $data = array();
        $data['title'] = 'Edit Inventory';
        $data['inventory_info'] = $this->evis_inventory_model->select_inventory_by_id($inventory_id);
        $data['dashboard'] = $this->load->view('inventory/edit_inventory', $data, true);
        $sdata = array();
        $sdata['edit_inventory'] = 'Update Inventory Product Successfully';
        $this->session->set_userdata($sdata);
        $this->load->view('master', $data);
    }

    public function update_inventory() 
    {
        $this->evis_inventory_model->update_inventory_info();
        redirect('evis_inventory/manage_inventory');
    }
    
    public function delete_inventory($inventory_id) 
    {
        $this->evis_inventory_model->delete_inventory_by_id($inventory_id);
        redirect('evis_inventory/manage_inventory');
    }

    public function save_inventory_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['brand_id'] = $this->input->post('brand_id', true);
        $data['model_id'] = $this->input->post('model_id', true);
        $data['buying_price'] = $this->input->post('buying_price', true);
        $data['selling_price'] = $this->input->post('selling_price', true);
        $data['balance_qty'] = $this->input->post('balance_qty', true);
        $this->db->insert('tbl_inventory',$data);
    }
    
    public function select_all_inventory($per_page, $offset)
    {
        if ($offset == NULL)
        {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_inventory AS i, tbl_brand AS b, tbl_model AS m WHERE i.brand_id=b.brand_id AND i.model_id=m.model_id ORDER BY inventory_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_inventory_by_id($inventory_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_inventory');
        $this->db->where('inventory_id',$inventory_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_inventory_info()
    {
        $data=array();
        $data['product_name'] = $this->input->post('product_name', true);
        $data['brand_id'] = $this->input->post('brand_id', true);
        $data['model_id'] = $this->input->post('model_id', true);
        $data['buying_price'] = $this->input->post('buying_price', true);
        $data['selling_price'] = $this->input->post('selling_price', true);
        $data['balance_qty'] = $this->input->post('balance_qty', true);
        $inventory_id = $this->input->post('inventory_id', true);
        $this->db->where('inventory_id',$inventory_id);
        $this->db->update('tbl_inventory',$data);
    }
    
    public function delete_inventory_by_id($inventory_id)
    {
        $this->db->where('inventory_id',$inventory_id);
        $this->db->delete('tbl_inventory');
    }
    
    public function select_total_inventory()
    {
        $sql = "SELECT * FROM tbl_inventory AS i, tbl_brand AS b, tbl_model AS m WHERE i.brand_id=b.brand_id AND i.model_id=m.model_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
}