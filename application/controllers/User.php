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



	
}
