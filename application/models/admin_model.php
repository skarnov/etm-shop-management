<?php

class Admin_Model extends CI_Model {

    public function admin_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('email', $data['email']);
        $this->db->where('password', ($data['password']));
        $this->db->where('status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_profile_by_id($admin_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_admin');
        $this->db->where('admin_id',$admin_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_user_info($data)
    {
        $this->db->update('tbl_admin',$data);
    }
    
    public function save_shop_info($data)
    {
        $this->db->insert('tbl_shop',$data);
    }

    public function select_all_shop($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_shop LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function deactive_shop_by_id($shop_id)
    {
        $this->db->set('shop_status',0);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop');
    }
    
    public function active_shop_by_id($shop_id)
    {
        $this->db->set('shop_status',1);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop');
    }
    
    public function select_all_edit_shop()
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $query_result=$this->db->get();
        $result=$query_result->result();
        return $result;
    }
    
    public function select_shop_by_id($shop_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('shop_id',$shop_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_shop_info()
    {
        $data=array();
        $data['shop_name'] = $this->input->post('shop_name', true);
        $data['address'] = $this->input->post('address', true);
        $data['mobile_number'] = $this->input->post('mobile_number', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['shop_status'] = $this->input->post('shop_status', true);
        $shop_id=$this->input->post('shop_id',true);
        $this->db->where('shop_id',$shop_id);
        $this->db->update('tbl_shop',$data);
    }
    
    public function delete_shop_by_id($shop_id)
    {
        $this->db->where('shop_id',$shop_id);
        $this->db->delete('tbl_shop');
    }
    
    public function save_payment_info()
    {
        $data=array();
        $data['shop_id'] = $this->input->post('shop_id', true);
        $data['charge_per_month'] = $this->input->post('charge_per_month', true);
        $data['payment_date'] = $this->input->post('payment_date', true);
        $data['paid'] = $this->input->post('paid', true);
        $data['shop_balance'] = $this->input->post('shop_balance', true);
        $data['payment_of_the_month'] = $this->input->post('payment_of_the_month', true);        
        $this->db->insert('tbl_payment',$data);
    }
    
    public function select_all_payment($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_payment AS p, tbl_shop AS s WHERE p.shop_id=s.shop_id LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }

    public function select_payment_by_id($payment_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_payment');
        $this->db->where('payment_id',$payment_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
}