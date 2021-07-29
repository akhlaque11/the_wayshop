<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }
    public function index(){
        
        $data['categories'] = $this->Home_model->get_all_categories();
        $data['products'] = $this->Home_model->get_all_product();
        $data['feature_products'] = $this->Home_model->get_all_featured_product();
        // echo  '<pre>';
        // var_dump($data);
        // $data['all_new_products']      = $this->Home_model->get_all_new_product();
        $this->load->view('pages/header');
        $this->load->view('pages/home', $data);
        $this->load->view('pages/footer');
    }
    // register new user
    public function registerUser(){
        $this->load->view('pages/header');
        $this->load->view('pages/register');
        $this->load->view('pages/footer');
    }
// login user
public function loginUser(){
    $this->load->view('pages/header');
    $this->load->view('pages/login');
    $this->load->view('pages/footer');
}
// save users through register page
public function saveUser(){
    $data = array();
    $data['customer_name']     = $this->input->post('customer_name');
    $data['customer_email']    = $this->input->post('customer_email');
    $data['customer_pasword'] = md5($this->input->post('customer_password'));
    $data['customer_address']  = $this->input->post('customer_address');
    $data['customer_city']     = $this->input->post('customer_city');
    $data['customer_country']  = $this->input->post('customer_country');
    $data['customer_phone']    = $this->input->post('customer_phone');
    $data['customer_zipcode']  = $this->input->post('customer_zipcode');

    $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
    $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[customer.customer_email]');
    $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');
    $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
    $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required');
    $this->form_validation->set_rules('customer_country', 'Customer Country', 'trim|required');
    $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');
    $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required');

    if ($this->form_validation->run() == true) {
        $result = $this->Home_model->save_customer_info($data);

        if ($result) {
            $this->session->set_userdata('customer_id', $result);
            $this->session->set_flashdata('message', 'Your registeration is done successfully please login');
            redirect('home/loginUser');
            ?>
<script>
alert('Your account is registerd successfully');
</script>
<?php
        } else {
            $this->session->set_flashdata('message', 'Registeration failed');
            redirect('home/registerUser');
        }
    } else {
        $this->session->set_flashdata('message', validation_errors());
        redirect('home/registerUser');
    }
}

public function customer_logincheck()
{
    $data = array();
    $data['customer_email']    = $this->input->post('customer_email');
    $data['customer_pasword'] = md5($this->input->post('customer_pasword'));

    $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('customer_pasword', 'Customer Password', 'trim|required');

    if ($this->form_validation->run() == true) {
        $result = $this->Home_model->get_customer_info($data);
        if ($result) {
            $this->session->set_userdata('customer_id', $result->customer_id);
            $this->session->set_userdata('customer_email', $data['customer_email']);
            redirect('home/checkout');
        } else {
            $this->session->set_flashdata('message', 'Email or password is wrong');
            redirect('home/loginUser');
        }
    } else {
        $this->session->set_flashdata('message', validation_errors());
        redirect('home/loginUser');
    }
}


   // to show products in shop page
   public function shop()
   {
       $this->load->library('pagination');

       $config['base_url'] = base_url('home/shop');
       $config['total_rows'] = $this->db->get('products')->num_rows();
       $config['per_page'] = 4;
       $config['num_links'] = 2;
       $config['full_tag_open'] = '<ul>';
       $config['full_tag_close'] = '</ul>';
       $config['first_link'] = false;
       $config['last_link'] = false;
       $config['prev_link'] = '&lt; Previous';
       $config['prev_tag_open'] = '<li>';
       $config['prev_tag_close'] = '</li>';
       $config['last_link'] = false;
       $config['next_link'] = 'Next &gt;';
       $config['next_tag_open'] = '<li>';
       $config['next_tag_close'] = '</li>';
       $config['num_tag_open'] = '<li>';
       $config['num_tag_close'] = '</li>';
       $config['cur_tag_open'] = '<li class="active"><a>';
       $config['cur_tag_close'] = '</a></li>';

       $this->pagination->initialize($config);

       $data = array();
       $data['get_all_product'] = $this->Home_model->get_all_product_pagi($config['per_page'], $this->uri->segment('3'));
    //    $data['products'] = $this->Home_model->get_all_product();
       $data['get_all_category']   = $this->Home_model->get_all_category();
       $data['get_all_brand']   = $this->Home_model->get_all_brand();
    // echo '<pre>';
    // var_dump($data);
       $this->load->view('pages/header');
       $this->load->view('pages/shop', $data);
       $this->load->view('pages/footer');
   }
      // to show products by category on single page
      public function category_post($id)
      {
         $this->load->library('pagination');
  
          $data = array();
          $data['get_all_product'] = $this->Home_model->get_all_product_by_cat($id);
          $data['get_all_category']   = $this->Home_model->get_all_category();
          $data['get_all_brand']   = $this->Home_model->get_all_brand();
          $this->load->view('pages/header');
          $this->load->view('pages/shop', $data);
          $this->load->view('pages/footer');
      }
      public function brand_post($id)
      {
          $this->load->library('pagination');
          
          $data = array();
          $data['get_all_product'] = $this->Home_model->get_all_product_by_brand($id);
          $data['get_all_brand']   = $this->Home_model->get_all_brand();
          $data['get_all_category']   = $this->Home_model->get_all_category();
          $this->load->view('pages/header');
          $this->load->view('pages/shop', $data);
          $this->load->view('pages/footer');
      }
      // save product in cart page
    public function save_cart($id)
    {

        $product = $this->Home_model->get_product_by_id($id);
     
        $data = array(            
             'id'    => $product['id'],
             'qty'    =>1,
             'price'    =>$product['p_price'],
             'name'    =>$product['p_name'],
             'image' =>$product['p_image']
             
         );
            //  echo "<pre>";
            //  var_dump($data);
             $this->cart->insert($data);
             // Redirect to the cart page
             redirect('cart/');       
    }
       // to show single product detail and categories in sidebar
       public function single($id)
       {
           $data = array();
           $data['get_single_product'] = $this->Home_model->get_single_product($id);
           $data['get_all_category']   = $this->Home_model->get_all_category();
           $this->load->view('pages/header');
           $this->load->view('pages/single', $data);
           $this->load->view('pages/footer');
       }
        // when we checkout it will redirect on form page
    public function checkout()
    {
        if($this->cart->total_items() <= 0){
            redirect('home/');
        }
        $data = array();
        $this->load->view('pages/header');
        $this->load->view('pages/checkout');
        $this->load->view('pages/footer');
    }
    // login customer during checkout
    public function customer_shipping_login()
    {
        $data = array();
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_pasword'] = md5($this->input->post('customer_pasword'));

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_pasword', 'Customer Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->Home_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_email', $result->customer_email);
                redirect('home/checkout');
            } else {
                $this->session->set_flashdata('messagelogin', 'Customer Login Fail');
                redirect('home/user_form1');
            }
        } else {
            $this->session->set_flashdata('messagelogin', validation_errors());
            redirect('home/user_form2');
        }
    }
    // register customer during checkout
    public function customer_shipping_register()
    {
        $data = array();
        $data['customer_name']     = $this->input->post('customer_name');
        $data['customer_email']    = $this->input->post('customer_email');
        $data['customer_pasword'] = md5($this->input->post('customer_password'));
        $data['customer_address']  = $this->input->post('customer_address');
        $data['customer_city']     = $this->input->post('customer_city');
        $data['customer_country']  = $this->input->post('customer_country');
        $data['customer_phone']    = $this->input->post('customer_phone');
        $data['customer_zipcode']  = $this->input->post('customer_zipcode');

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
        $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required');
        $this->form_validation->set_rules('customer_country', 'Customer Country', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');
        $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->Home_model->save_customer_info($data);

            if ($result) {
                $this->session->set_userdata('customer_id', $result);
                redirect('home/checkout');
                ?>
<script>
alert('Your account is registerd successfully');
</script>
<?php
            } else {
                $this->session->set_flashdata('message', 'Customer Shipping Fail');
                redirect('home/user_form');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('home/user_form');
        }
    }
    
    // public function customer_shipping()
    // {
    //     $data = array();
    //     $this->load->view('pages/header');
    //     $this->load->view('pages/customer_shipping');
    //     $this->load->view('pages/footer');
    // }
    // save customer shipping address
    public function save_shipping_address()
    {
        $data = array();
        $data['shipping_first_name']    = $this->input->post('fname');
        $data['shipping_last_name']    = $this->input->post('lname');
        $data['shipping_username']    = $this->input->post('uname');
        $data['shipping_email']   = $this->input->post('email');
        $data['shipping_address'] = $this->input->post('address1');
        $data['shipping_address_2'] = $this->input->post('address2');
        $data['shipping_country'] = $this->input->post('country');
        $data['shipping_city']    = $this->input->post('city');
        $data['shipping_phone']    = $this->input->post('phone');
        $data['shipping_zipcode'] = $this->input->post('zipcode');
        $data['shipping_payment']   = $this->input->post('payment');
        

        $this->form_validation->set_rules('fname', 'Shipping First Name', 'trim|required');
        $this->form_validation->set_rules('lname', 'Shipping Last Name', 'trim|required');
        $this->form_validation->set_rules('uname', 'Shipping User Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Shipping Email', 'trim|required|valid_email|is_unique[shipping.shipping_email]');
        $this->form_validation->set_rules('address1', 'Shipping Address', 'trim|required');
        $this->form_validation->set_rules('address2', 'Shipping Address2', 'trim|required');
        $this->form_validation->set_rules('country', 'Shipping Country', 'trim|required');
        $this->form_validation->set_rules('city', 'Shipping City', 'trim|required');
        $this->form_validation->set_rules('phone', 'Shipping Phone', 'trim|required');
        $this->form_validation->set_rules('zipcode', 'Shipping Zipcode', 'trim|required');
        $this->form_validation->set_rules('payment', 'Shipping Payment', 'trim|required');
        


        if ($this->form_validation->run() == true) {
            
            $result = $this->Home_model->save_shipping_address($data);
                $this->session->set_userdata('shipping_id', $result);
            $odata['customer_id'] = $this->session->userdata('customer_id');
            $odata['shipping_id'] = $this->session->userdata('shipping_id');
            $tax = ($this->cart->total() * 15) / 100;
            $odata['order_total'] = $tax + $this->cart->total();

            $order_id = $this->Home_model->save_order_info($odata);
           
            $oddata = array();
            $myoddata = $this->cart->contents();

            foreach ($myoddata as $oddatas) {

                $oddata['order_id']               = $order_id;
                $oddata['product_id']             = $oddatas['id'];
                $oddata['product_name']           = $oddatas['name'];
                $oddata['product_price']          = $oddatas['price'];
                $oddata['product_sale_quantity'] = $oddatas['qty'];
                $oddata['product_image']          = $oddatas['options']['product_image'];
                $this->Home_model->save_order_details_info($oddata);
            }
            if ($payment_method == 'paypal') {

            }
            if ($payment_method == 'cashon') {

            }

            $this->cart->destroy();

            $customer_id = $this->session->userdata('customer_id');
            if($customer_id){
                if ($result) {
                    redirect('home/order_success');
                } else {
                    $this->session->set_flashdata('message', 'Customer Shipping Fail');
                    redirect('home/checkout');
                }
            }
            else{
                $this->session->set_flashdata('message', 'Please login first');
                redirect('home/checkout');
            }

            
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('home/checkout');
        }
    }

    public function save_order()
    {
        $data['payment_type'] = $this->input->post('payment');

        $this->form_validation->set_rules('payment', 'Payment', 'trim|required');

        if ($this->form_validation->run() == true) {
            $payment_id           = $this->Home_model->save_payment_info($data);
            $odata                = array();
            $odata['customer_id'] = $this->session->userdata('customer_id');
            $odata['shipping_id'] = $this->session->userdata('shipping_id');
            $odata['payment_id']  = $payment_id;
            $tax                  = ($this->cart->total() * 15) / 100;
            $odata['order_total'] = $tax + $this->cart->total();

            $order_id = $this->Home_model->save_order_info($odata);

            $oddata = array();

            $myoddata = $this->cart->contents();

            foreach ($myoddata as $oddatas) {

                $oddata['order_id']               = $order_id;
                $oddata['product_id']             = $oddatas['id'];
                $oddata['product_name']           = $oddatas['name'];
                $oddata['product_price']          = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['product_image']          = $oddatas['options']['product_image'];
                $this->Home_model->save_order_details_info($oddata);
            }

            if ($payment_method == 'paypal') {

            }
            if ($payment_method == 'cashon') {

            }

            $this->cart->destroy();

            redirect('home/payment');
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('home/checkout');
        }
    }

    public function order_success(){
        $this->load->view('pages/header');
        $this->load->view('pages/order_success');
        $this->load->view('pages/footer');
    }

public function contact(){
    $this->load->view('pages/header');
    $this->load->view('pages/contact');
    $this->load->view('pages/footer');
}

    public function logout()
    {
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('customer_email');
        redirect('home');
    }
    

}