<?php

class Shop_Model extends CI_Model {

    public function shop_login_check($data)
    {
        $this->db->select('*');
        $this->db->from('tbl_shop');
        $this->db->where('email', $data['email']);
        $this->db->where('password', ($data['password']));
        $this->db->where('shop_status', 1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function check_password($data)
    {
        $sql="select * from tbl_shop where email='$data'";
        $result = $this->db->query($sql)->row();
        return $result;
    }
    
    public function forget_password($data, $templateName)
    {
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'], $data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailScripts/' . $templateName, $data, true);  
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }  
    
    public function total_customer_due()
    {
        $sql = "SELECT SUM(customer_due) AS customer_due FROM tbl_customer ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function total_sales()
    {
        $sql = "SELECT SUM(paid_amount) AS total_sales FROM tbl_sale_transaction ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function total_repair()
    {
        $sql = "SELECT SUM(paid_amount) AS total_repair FROM tbl_repair ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function total_inventory()
    {
        $sql = "SELECT SUM(buying_price) AS total_inventory FROM tbl_inventory ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function save_customer_info()
    {
        $data=array();
        $data['customer_input_id'] = $this->input->post('customer_input_id', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true); 
        $data['customer_registration_date'] = $this->input->post('customer_registration_date', true);   
        $this->db->insert('tbl_customer',$data);
    }
    
    public function search_customer($text)
    {	
        $sql = "SELECT * FROM tbl_customer WHERE customer_name LIKE '%$text%' OR customer_input_id LIKE '%$text%' OR customer_mobile LIKE '%$text%' ";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_all_customer($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_customer LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_customer_by_id($customer_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$customer_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function update_customer_info()
    {
        $data=array();
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_input_id'] = $this->input->post('customer_input_id', true);
        $data['customer_registration_date'] = $this->input->post('customer_registration_date', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true); 
        $customer_id=$this->input->post('customer_id',true);
        $this->db->where('customer_id',$customer_id);
        $this->db->update('tbl_customer',$data);
    }
    
    public function delete_customer_by_id($customer_id)
    {
        $this->db->where('customer_id',$customer_id);
        $this->db->delete('tbl_customer');
    }
    
    public function select_repair_last_id()
    {
        $sql = "SELECT * FROM tbl_repair ORDER BY repair_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_customer_by_input_id($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_input_id',$id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function save_repair_info()
    {
        $data=array();
        $data['net_amount'] = $this->input->post('net_amount', true);
        $data['paid_amount'] = $this->input->post('paid_amount', true);
        $data['repair_due'] = $this->input->post('repair_due', true);
        $data['customer_input_id'] = $this->input->post('customer_input_id', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_address'] = $this->input->post('customer_address', true);
        $data['item_name'] = $this->input->post('item_name', true);
        $data['problem'] = $this->input->post('problem', true);
        $data['imei'] = $this->input->post('imei', true);
        $data['receive_date'] = $this->input->post('receive_date', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);  
        $data['remark'] = $this->input->post('remark', true);   
        $data['model_no'] = $this->input->post('model_no', true);
        $data['extra_problem'] = $this->input->post('extra_problem', true);
        $data['battery_provide'] = $this->input->post('battery_provide', true);         
        $data['delivery_date'] = $this->input->post('delivery_date', true);        
        $this->db->insert('tbl_repair',$data);
        
        $due=array();
        $due['customer_due'] = $this->input->post('due_amount', true);
        $customer_input_id = $this->input->post('customer_input_id', true);
        $this->db->where('customer_input_id',$customer_input_id);
        $this->db->update('tbl_customer',$due);
    }
    
    public function search_repair($text)
    {	
        $sql = "SELECT * FROM tbl_repair WHERE repair_id LIKE '%$text%' OR imei LIKE '%$text%' OR customer_mobile LIKE '%$text%'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_all_repair($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_repair ORDER BY repair_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
        
    public function select_repair_by_id($repair_id)
    {        
        $sql = "SELECT * FROM tbl_customer AS c, tbl_repair AS r WHERE c.customer_input_id=r.customer_input_id AND r.repair_id='$repair_id'";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
    
    public function select_repair_report_info($from,$to)
    {
        $sql = "SELECT * FROM tbl_repair WHERE delivery_date BETWEEN '$from' AND '$to'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_repair_report($from,$to)
    {
        $sql = "SELECT SUM(net_amount) AS net_amount, SUM(paid_amount) AS paid_amount, SUM(repair_due) AS repair_due FROM tbl_repair WHERE delivery_date BETWEEN '$from' AND '$to'";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
    
    public function update_repair_info()
    {
        $data=array();
        $data['net_amount'] = $this->input->post('net_amount', true);
        $data['paid_amount'] = $this->input->post('now_paid_amount', true) + $this->input->post('paid_amount', true);
        $data['repair_due'] = $this->input->post('repair_due', true);
        $data['customer_input_id'] = $this->input->post('customer_input_id', true);
        $data['customer_name'] = $this->input->post('customer_name', true);
        $data['customer_mobile'] = $this->input->post('customer_mobile', true);
        $data['item_name'] = $this->input->post('item_name', true);
        $data['problem'] = $this->input->post('problem', true);
        $data['imei'] = $this->input->post('imei', true);
        $data['receive_date'] = $this->input->post('receive_date', true);
        $data['remark'] = $this->input->post('remark', true);   
        $data['model_no'] = $this->input->post('model_no', true);
        $data['extra_problem'] = $this->input->post('extra_problem', true);
        $data['battery_provide'] = $this->input->post('battery_provide', true);         
        $data['delivery_date'] = $this->input->post('delivery_date', true);      
        $data['delivery_status'] = $this->input->post('delivery_status', true);       
        $data['from_where'] = $this->input->post('from_where', true);       
        $data['how_much'] = $this->input->post('how_much', true);       
        $repair_id=$this->input->post('repair_id',true);
        $this->db->where('repair_id',$repair_id);
        $this->db->update('tbl_repair',$data);
        
        $due=array();
        $due['customer_due'] = $this->input->post('customer_due', true) - $this->input->post('now_paid_amount', true);
        $customer_input_id = $this->input->post('customer_input_id', true);
        $this->db->where('customer_input_id',$customer_input_id);
        $this->db->update('tbl_customer',$due);
    }
    
    public function delete_repair_by_id($repair_id)
    {
        $this->db->where('repair_id',$repair_id);
        $this->db->delete('tbl_repair');
    }
   
    public function search_inventory_list()
    {
        $brand_id = $this->input->post('brand_id', true);
        $model_id = $this->input->post('model_id', true);
        $sql = "SELECT * FROM tbl_inventory AS i, tbl_brand AS b, tbl_model AS m WHERE i.brand_id = '$brand_id' AND i.model_id = '$model_id' AND i.brand_id=b.brand_id AND i.model_id=m.model_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function search_sale($text)
    {	
        $sql = "SELECT * FROM tbl_sale AS s, tbl_sale_transaction AS t, tbl_customer AS c WHERE s.sale_id LIKE '%$text%' AND s.sale_id=t.sale_id AND c.customer_input_id=t.customer_input_id ORDER BY s.sale_id";
        $result = $this->db->query($sql)->result();
        return $result;
    }

    public function select_sale_last_id()
    {
        $sql = "SELECT * FROM tbl_sale ORDER BY sale_id DESC LIMIT 1 ";
        $query_result = $this->db->query($sql);
        $result=$query_result->row();
        return $result;
    }
            
    public function save_sale_info()
    {
        $data = array(); 
        $data['sale_due'] = $this->input->post('net_amount', true) - $this->input->post('sale_discount', true) - $this->input->post('paid_amount', true);
        $data['sale_discount'] = $this->input->post('sale_discount', true);
        $data['grand_total'] = $this->input->post('net_amount', true);
        $this->db->insert('tbl_sale',$data);

        $sale_id=$this->db->insert_id();
        
        $due=array();
        $due['customer_due'] = $this->input->post('due_amount', true);
        $customer_input_id = $this->input->post('customer_input_id', true);
        $this->db->where('customer_input_id',$customer_input_id);
        $this->db->update('tbl_customer',$due);
        
        $sale_transaction = array();
        $sale_transaction['sale_id'] = $sale_id;
        $sale_transaction['customer_input_id'] = $this->input->post('customer_input_id', true);
        $sale_transaction['due_amount'] = $this->input->post('due_amount', true);
        $sale_transaction['net_amount'] = $this->input->post('due_amount', true) + $this->input->post('net_amount', true) - $this->input->post('sale_discount', true);
        $sale_transaction['paid_amount'] = $this->input->post('paid_amount', true);
        $sale_transaction['transaction_date'] = date("d-m-Y");
        $this->db->insert('tbl_sale_transaction',$sale_transaction);
     
        $contents = $this->cart->contents();
        foreach ($contents as $values)
        {
            $sale_details=array();
            $sale_details['sale_id']=$sale_id;
            $sale_details['inventory_id']=$values['id'];
            $sale_details['product_name']=$values['name'];
            $sale_details['unit_price']=$values['price'];
            $sale_details['sale_quantity']=$values['qty'];
            $sale_details['total_price']=$values['price'] * $values['qty'];
            $this->db->insert('tbl_sale_details',$sale_details);
        }
        
        $sql = "update tbl_inventory, tbl_sale_details
            set tbl_inventory.balance_qty = tbl_inventory.balance_qty - tbl_sale_details.sale_quantity 
            where tbl_inventory.inventory_id = tbl_sale_details.inventory_id
            and tbl_sale_details.sale_id = '$sale_id' ";
        $this->db->query($sql);
        
        $sqlr = "update tbl_inventory, tbl_sale_details
            set tbl_inventory.selling_qty = tbl_inventory.selling_qty + tbl_sale_details.sale_quantity 
            where tbl_inventory.inventory_id = tbl_sale_details.inventory_id
            and tbl_sale_details.sale_id = '$sale_id' ";
        $this->db->query($sqlr);
    }
    
    public function select_all_sales($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_sale AS s, tbl_sale_transaction AS t, tbl_customer AS c WHERE s.sale_id=t.sale_id AND c.customer_input_id=t.customer_input_id ORDER BY s.sale_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_sale_by_id($sale_id)
    {
        $sql = "SELECT * FROM tbl_sale AS s, tbl_sale_transaction AS t, tbl_customer AS c WHERE s.sale_id='$sale_id' AND s.sale_id=t.sale_id AND c.customer_input_id=t.customer_input_id ";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function select_all_sale_items($sale_id)
    {
        $sql = "SELECT * FROM tbl_sale_details WHERE sale_id='$sale_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_sale_transaction($sale_id)
    {
        $sql = "SELECT * FROM tbl_sale_transaction WHERE sale_id='$sale_id'";
        $query_result = $this->db->query($sql);
        $result = $query_result->row();
        return $result;
    }
    
    public function delete_sale_by_id($sale_id)
    {
        $this->db->where('sale_id',$sale_id);
        $this->db->delete('tbl_sale');
        $this->db->where('sale_id',$sale_id);
        $this->db->delete('tbl_sale_details');
        $this->db->where('sale_id',$sale_id);
        $this->db->delete('tbl_sale_transaction');
    }
    
    public function save_sale_transaction_info()
    {
        $data=array();
        $data['sale_id'] = $this->input->post('sale_id', true);
        $data['customer_input_id'] = $this->input->post('customer_input_id', true);
        $data['due_amount'] = $this->input->post('due_amount', true);
        $data['net_amount'] = $this->input->post('net_amount', true);
        $data['paid_amount'] = $this->input->post('paid_amount', true);
        $data['transaction_date'] = $this->input->post('transaction_date', true);
        $this->db->insert('tbl_sale_transaction',$data);
        
        $due=array();
        $due['customer_due'] = $this->input->post('due_amount', true);
        $customer_input_id = $this->input->post('customer_input_id', true);
        $this->db->where('customer_input_id',$customer_input_id);
        $this->db->update('tbl_customer',$due);
    }
    
    public function sale_transaction_by_id($sale_id)
    {
        $sql = "SELECT * FROM tbl_sale_transaction WHERE sale_id='$sale_id' ORDER BY sale_transaction_id DESC";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function select_sale_id($sale_transaction_id)
    {
        $this->db->select('*');
        $this->db->from('tbl_sale_transaction');
        $this->db->where('sale_transaction_id',$sale_transaction_id);
        $query_result=$this->db->get();
        $result=$query_result->row();
        return $result;
    }
    
    public function search_sale_transaction($text)
    {	
        $sql = "SELECT * FROM tbl_sale_transaction WHERE sale_transaction_id LIKE '%$text%'";
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
    public function select_all_sale_transaction($per_page, $offset)
    {
        if ($offset == NULL) {
            $offset = 0;
        }
        $sql = "SELECT * FROM tbl_sale_transaction ORDER BY sale_transaction_id DESC LIMIT $offset,$per_page ";
        $query_result = $this->db->query($sql);
        $result = $query_result->result();
        return $result;
    }
    
    public function delete_sale_transaction_by_id($sale_transaction_id)
    {
        $this->db->where('sale_transaction_id',$sale_transaction_id);
        $this->db->delete('tbl_sale_transaction');
    }
    
    public function select_sale_report_info($from,$to)
    {
        $sql = "SELECT * FROM tbl_sale_transaction AS s, tbl_customer AS c WHERE s.customer_input_id=c.customer_input_id AND s.transaction_date BETWEEN '$from' AND '$to'";
        $result = $this->db->query($sql)->result();
        return $result;   
    }
    
    public function select_total_sale_report($from,$to)
    {
        $sql = "SELECT SUM(net_amount) AS net_amount, SUM(paid_amount) AS paid_amount, SUM(due_amount) AS due_amount FROM tbl_sale_transaction WHERE transaction_date BETWEEN '$from' AND '$to'";
        $result = $this->db->query($sql)->row();
        return $result;   
    }
}