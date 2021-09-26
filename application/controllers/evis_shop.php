<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Evis_shop extends CI_Controller {

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

    public function index()
    {
        $data = array();
        $data['title'] = 'Evis App Dashboard';
        $data['customer_due'] = $this->shop_model->total_customer_due();
        $data['total_sales'] = $this->shop_model->total_sales();
        $data['total_repair'] = $this->shop_model->total_repair();
        $data['total_inventory'] = $this->shop_model->total_inventory();
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['dashboard'] = $this->load->view('shop_dashboard', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function logout() 
    {
        $this->session->unset_userdata('shop_id');
        $this->session->unset_userdata('shop_name');
        $sdata['exception'] = 'You are successfully Logout ';
        $this->session->set_userdata($sdata);
        redirect('shop_login');
    }
    
    public function add_customer() 
    {
        $data = array();
        $data['title'] = 'Add Customer';
        $data['dashboard'] = $this->load->view('add_customer', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function save_customer() 
    {
        $this->shop_model->save_customer_info();
        $sdata = array();
        $sdata['save_customer'] = 'Save Customer Successfully';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_customer');
    }
    
    public function customer_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Customer Search';
        $data['search_customer'] = $this->shop_model->search_customer($text);
        $data['dashboard'] = $this->load->view('customer_search', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function manage_customer()
    {
        $data = array();
        $data['title'] = 'Manage Customer';
        $config['base_url'] = base_url() . 'evis_shop/manage_customer/';
        $config['total_rows'] = $this->db->count_all('tbl_customer');
        $config['per_page'] = '8';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
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
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_customer'] = $this->shop_model->select_all_customer($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_customer', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function edit_customer($customer_id)
    {
        $data = array();
        $data['title'] = 'Edit Customer';
        $data['customer_info'] = $this->shop_model->select_customer_by_id($customer_id);
        $data['dashboard'] = $this->load->view('edit_customer', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function update_customer()
    {
        $sdata = array();
        $sdata['update_customer'] = 'Update customer information successfully';
        $this->session->set_userdata($sdata);
        $this->shop_model->update_customer_info();
        redirect('evis_shop/manage_customer');
    }

    public function delete_customer($customer_id) 
    {
        $this->shop_model->delete_customer_by_id($customer_id);
        redirect('evis_shop/manage_customer');
    }

    public function add_repair() 
    {
        $data = array();
        $data['title'] = 'Add Repair';
        $data['last_id'] = $this->shop_model->select_repair_last_id();
        $data['dashboard'] = $this->load->view('add_repair', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function select_customer($id) 
    {
        $data = array();
        $data['customer_info'] = $this->shop_model->select_customer_by_input_id($id);
        echo $this->load->view('customerInfo', $data, true);
    }
    
    public function save_repair() 
    {
        $this->shop_model->save_repair_info();
        $sdata = array();
        $sdata['save_repair'] = 'Save Repair Successfully';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_repair');
    }
    
    public function repair_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Repair Search';
        $data['search_repair'] = $this->shop_model->search_repair($text);
        $data['dashboard'] = $this->load->view('repair_search', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function manage_repair()
    {
        $data = array();
        $data['title'] = 'Manage Repair';
        $config['base_url'] = base_url() . 'evis_shop/manage_repair/';
        $config['total_rows'] = $this->db->count_all('tbl_repair');
        $config['per_page'] = '8';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
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
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_repair'] = $this->shop_model->select_all_repair($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_repair', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function edit_repair($repair_id)
    {
        $data = array();
        $data['title'] = 'Edit Repair';
        $data['repair_info'] = $this->shop_model->select_repair_by_id($repair_id);
        $data['dashboard'] = $this->load->view('edit_repair', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function update_repair()
    {
        $sdata = array();
        $sdata['update_repair'] = 'Update repair information successfully';
        $this->session->set_userdata($sdata);
        $this->shop_model->update_repair_info();
        redirect('evis_shop/manage_repair');
    }

    public function delete_repair($repair_id) 
    {
        $this->shop_model->delete_repair_by_id($repair_id);
        redirect('evis_shop/manage_repair');
    }
        
    public function select_repair($id) 
    {
        $data = array();
        $data['repair_info'] = $this->shop_model->select_repair_by_id($id);
        echo $this->load->view('repairInfo', $data, true);
    }
        
    public function print_repair($repair_id)
    {
        $data = array();
        $data['title'] = 'Print Repair';
        $data['print_info'] = $this->shop_model->select_repair_by_id($repair_id);
        $data['dashboard'] = $this->load->view('print_repair', $data, true);
        $this->load->view('print_repair', $data);
    }
 
    public function repair_report()
    {
        $data = array();
        $data['title'] = 'Repair Report';
        $data['dashboard'] = $this->load->view('repair_report', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function search_repair_report()
    {
        $data = array();
        $data['title'] = 'Repair Report';
        $from = $this->input->post('from', true);
        $to = $this->input->post('to', true);
        $sdata = array();
        $sdata['from'] = $from;
        $sdata['to'] = $to;
        $this->session->set_userdata($sdata);
        $data['repair_report_info'] = $this->shop_model->select_repair_report_info($from,$to);        
        $data['total_report'] = $this->shop_model->select_total_repair_report($from,$to);
        $data['dashboard'] = $this->load->view('view_repair_report', $data, true);
        $this->load->view('shop', $data);
    }
      
    public function add_sales() 
    {
        $data = array();
        $data['title'] = 'Add Sales';
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['dashboard'] = $this->load->view('add_sales', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function sale_inventory() 
    {
        $data = array();
        $data['title'] = 'Sale Inventory';
        $data['all_brand'] = $this->evis_inventory_model->all_brand();
        $data['search_inventory_list'] = $this->shop_model->search_inventory_list();
        $data['dashboard'] = $this->load->view('sale_inventory', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function sale_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Sale Search';
        $data['search_sale'] = $this->shop_model->search_sale($text);
        $data['dashboard'] = $this->load->view('sale_search', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function manage_sales()
    {
        $data = array();
        $data['title'] = 'Manage Sales';
        $config['base_url'] = base_url() . 'evis_shop/manage_sales/';
        $config['total_rows'] = $this->db->count_all('tbl_sale');
        $config['per_page'] = '5';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
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
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_sales'] = $this->shop_model->select_all_sales($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_sales', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function delete_sale($sale_id) 
    {
        $this->shop_model->delete_sale_by_id($sale_id);
        redirect('evis_shop/manage_sales');
    }
    
    public function add_sale_transaction() 
    {
        $data = array();
        $data['title'] = 'Add Sale Transaction';
        $data['dashboard'] = $this->load->view('add_sale_transaction', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function select_sale($id) 
    {
        $data = array();
        $data['sale_info'] = $this->shop_model->select_sale_by_id($id);
        echo $this->load->view('saleInfo', $data, true);
    }
    
    public function save_sale_transaction() 
    {
        $this->shop_model->save_sale_transaction_info();
        $sdata = array();
        $sdata['save_sale_transaction'] = 'Save Sale Transaction Successfully';
        $this->session->set_userdata($sdata);
        redirect('evis_shop/add_sale_transaction');
    }
    
    public function all_sale_transaction($sale_id)
    {
        $data = array();
        $data['title'] = 'Sale Transaction';
        $data['all_sale_transaction'] = $this->shop_model->sale_transaction_by_id($sale_id);
        $data['dashboard'] = $this->load->view('all_sale_transaction', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function print_sale_transaction($sale_transaction_id)
    {
        $data = array();
        $data['title'] = 'Print Sales';
        $sale = $this->shop_model->select_sale_id($sale_transaction_id);
        $data['print_info'] = $this->shop_model->select_sale_by_id($sale->sale_id);
        $data['print_info'] = $this->shop_model->select_sale_by_id($sale->sale_id);
        $data['all_sale_items'] = $this->shop_model->select_all_sale_items($sale->sale_id);
        $data['sale_transaction'] = $this->shop_model->select_sale_transaction($sale->sale_id);
        $data['dashboard'] = $this->load->view('print_sales', $data, true);
        $this->load->view('print_sales', $data);
    }
    
    public function sale_transaction_search()
    {
        $text = $this->input->post('text', true);
        $data = array();
        $data['title'] = 'Sale Transaction Search';
        $data['search_sale_transaction'] = $this->shop_model->search_sale_transaction($text);
        $data['dashboard'] = $this->load->view('sale_transaction_search', $data, true);
        $this->load->view('shop', $data); 
    }
    
    public function manage_sale_transaction()
    {
        $data = array();
        $data['title'] = 'Manage Sale Transaction';
        $config['base_url'] = base_url() . 'evis_shop/manage_sale_transaction/';
        $config['total_rows'] = $this->db->count_all('tbl_sale_transaction');
        $config['per_page'] = '8';
        /**STYLE PAGINATION**/
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
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
        /**END STYLE PAGINATION**/
        $this->pagination->initialize($config);
        $data['all_sale_transaction'] = $this->shop_model->select_all_sale_transaction($config['per_page'], $this->uri->segment(3));
        $data['dashboard'] = $this->load->view('manage_sale_transaction', $data, true);
        $this->load->view('shop', $data);
    }
     
    public function delete_sale_transaction($sale_transaction_id) 
    {
        $this->shop_model->delete_sale_transaction_by_id($sale_transaction_id);
        redirect('evis_shop/manage_sale_transaction');
    }
    
    public function sale_report()
    {
        $data = array();
        $data['title'] = 'Sale Report';
        $data['dashboard'] = $this->load->view('sale_report', $data, true);
        $this->load->view('shop', $data);
    }
    
    public function search_sale_report()
    {
        $data = array();
        $data['title'] = 'Sale Report';
        $from = $this->input->post('from', true);
        $to = $this->input->post('to', true);
        $sdata = array();
        $sdata['from'] = $from;
        $sdata['to'] = $to;
        $this->session->set_userdata($sdata);
        $data['sale_report_info'] = $this->shop_model->select_sale_report_info($from,$to);
        $data['total_report'] = $this->shop_model->select_total_sale_report($from,$to);
        $data['dashboard'] = $this->load->view('view_sale_report', $data, true);
        $this->load->view('shop', $data);
    }
}