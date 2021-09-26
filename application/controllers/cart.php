<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Cart extends CI_Controller {
    
    private $error;
    function __construct() {
        parent::__construct();   
        //MY_Output class's nocache() method
        $this->output->nocache();
    }
    
    public function add_to_cart($product_id)
    {
        $product_info = $this->evis_inventory_model->select_inventory_by_id($product_id);
        $data = array(
            'id' => $product_info->inventory_id,
            'name' => $product_info->product_name,
            'qty' => 1,
            'price' => $product_info->selling_price,
        );
        $this->cart->insert($data);
        $this->load->view('cart');
    }

    public function show_cart()
    {
        $data = array();
        $data['title'] = 'Shoping Cart';
        $data['last_id'] = $this->shop_model->select_sale_last_id();;
        $data['dashboard'] = $this->load->view('cart_view', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function update_cart()
    {
        $qty = $this->input->post('product_quantity', true);
        $rowid = $this->input->post('rowid', true);
        $data = array(
            'rowid' => $rowid,
            'qty' => $qty
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }
    
    public function remove($rowid)
    {
        $data = array(
            'rowid' => $rowid,
            'qty' => '0'
        );
        $this->cart->update($data);
        redirect('cart/show_cart');
    }

    public function select_customer_due($id) 
    {
        $data = array();
        $data['customer_info'] = $this->shop_model->select_customer_by_input_id($id);
        echo $this->load->view('customerDue', $data, true);
    }
    
    public function save_sale()
    {        
        $this->shop_model->save_sale_info();
        $sdata = array();
        $sdata['save_sale'] = 'Success!';
        $this->session->set_userdata($sdata);
        $this->cart->destroy();
        redirect('cart/show_cart');
    }
}