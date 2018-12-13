<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	


	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Model');
	}

	public function profile()
	{
		if(empty($this->session->userdata('fname')))
		{
			redirect('User/login');

		}
		echo $this->session->userdata('fname');
	}

	public function logout()
	{
		session_destroy();
		redirect('User/login');
	}

	public function auth()
	{
		$data['fname'] = $this->input->post('fname');
		$data['password']  = md5($this->input->post('pwd'));

	 $login  = 	$this->Model->select_where('reg',$data);
	 // echo "<pre>";
	 // print_r($login);
	 if(count($login) == 1)
	 {
	 	//echo "oke";
	 	$sess_array = array();//data member
	 	foreach ($login as $res) {
	 		
	 		$sess_array = array(
	 			"id" => $res->id,
	 			"fname" => $res->fname,
	 		"lname" => $res->lname

	 			);

	 		$this->session->set_userdata($sess_array);

	 		 $this->session->userdata('fname');

	 		 redirect('User/profile');
	 		}
	      }

	 else
	 	{
	 		echo "not corrent";
	 	}


	}

	public function login()
	{
		$this->load->view('User/login');
	}
	
	public function index()
	{
		$this->load->view('User/login');
	}

	public function registration()
	{
		$this->load->view('User/registration');
	}

	public function showproduct()
	{
		$data['product'] =  $this->Model->select_all('product');
		//print_r($data['product']);
		$this->load->view('User/showproduct',$data);
	}

	public function add_to_cart()
	{
		$this->load->library('cart');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$qty = $this->input->post('qty');
		$image = $this->input->post('image');

		$data = array(
        'id'      => $id,
        'qty'     => $qty,
        'price'   => $price,
        'name'    => $name,
        'image'   => $image
        );


      //  print_r($data);
         $cart =  $this->cart->insert($data);

         if($cart)
         {
         	redirect('User/display_cart');
         }

          // foreach ($this->cart->contents() as $items)
          // {
          // 			echo $items['image'];
          // }
	}
	public function display_cart()
	{

		$this->load->view('User/cart');
	}

	public function destroy_cart()
	{
		$this->cart->destroy();
	}

	public function save_order()
	{
		$user_fk = $this->session->userdata('id');
		$name = $this->input->post('name');
		$mobile = $this->input->post('mobile');
		$address = $this->input->post('address');
		  date_default_timezone_set('Asia/Kolkata');
  	            $date = date('Y-F-d H:i:s');
  	          $order_code = "ORD".rand();



		foreach ($this->cart->contents() as $item) {


			$data = array(

	   "product_fk" => $item['id'],
				
       'qty'     => $item['qty'],
      
       'name'    => $name,
       'mobile' => $mobile,
       'address' => $address,
       'status' => '0',
       'user_fk' => $user_fk,
       "sub_total" => $item['subtotal'],
       'timedate' => $date,
       "order_code" => $order_code
        );
			/*echo "<pre>";
			print_r($data);*/

				$order=  $this->Model->insertdata("cart",$data);

				if($order)
				{
						$this->cart->destroy();
						redirect('User/showproduct');
						
				}
				else
				{
					echo "oke";

				}



				
			
		}


	}



	
}
