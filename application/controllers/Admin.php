<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function getsub()
	{
		$cat = $this->input->post('category');

		$where = array('cat_fk'=>$cat);

		$getcat =  $this->Model->select_where('sub_category',$where);

		//print_r($data);
		foreach ($getcat as $key => $value) { 

			echo "<option value='$value->sub_cat_id'> $value->subcat_name </option>";
			
		}

		//echo $cat;
	}

	public function addproduct()
	{
		$data['category'] = $this->Model->select_all('category');
		$data['subcat_name'] = $this->Model->select_all('sub_category');
 		$this->load->view('Admin/addproduct',$data);
	}

	public function addsubcategory()
	{

		$data['category'] = $this->Model->select_all('category');
		$this->load->view('Admin/subcategory',$data);

	}

	public function addsub()
	{
		$data['subcat_name'] = $this->input->post('sub_category');
		$data['cat_fk'] = $this->input->post('cat_fk');

		//print_r($data);

		$ins =  $this->Model->insertdata("sub_category",$data);

		
		 if($ins)
		 {
		 	redirect('Admin/showsubcat');

		 }
		 else
		 {
		 	echo "error";
		 }

	}

	public function showsubcat()
	{
       $data['subcat']	= 	$this->Model->join('sub_category','category','`sub_category`.`cat_fk` = `category`.`cat_id`');

		$this->load->view('Admin/showsubcat',$data);
	}

	public function showcat()
	{
		$data['category'] = $this->Model->select_all('category');
		$this->load->view('Admin/showcategory',$data);
	}

	public function addcategory()
	{
		$this->load->view('Admin/addcategory');
	}
	public function addcat()
	{
		$data['cat_name'] = ucwords($this->input->post('category'));
		 $catins =  $this->Model->insertdata('category',$data);

		 if($catins)
		 {
		 	redirect('Admin/showcat');

		 }
		 else
		 {
		 	echo "error";
		 }



	}

public function login()
{
	$this->load->view('Admin/login');

}


	public function table()
	{
		$this->load->view('Admin/table');
	}
	
	
	public function index()
	{
		$this->load->view('Admin/index');
	}

	public function suketu()
	{
		$data['city'] = $this->Model->select_all("city");
		$this->load->view('Admin/reg',$data);
	}

	public function insert()
	{
		
		$data['fname'] = $this->input->post('fname');
		$data['lname'] = $this->input->post('lname');
		$data['password'] = md5($this->input->post('password'));
		$data['city_fk'] = $this->input->post('city');


		//$ins = $this->db->insert("reg",$data);

		 $ins =  $this->Model->insertdata("reg",$data);

		 if($ins)
		 {
		 	redirect('Admin/suketu');
		 }
		 else
		 {
		 	echo "Error";
		 }

		// $fname = $this->input->post('fname');
		// $lname = $this->input->post('lname');
		// $password = $this->input->post('password');




		// $data = array(

		// 	"fname" => $fname,
		// 	"lname" => $lname,
		// 	"password" => $password,
		// 	);

		//print_r($data);
      }

      public function showdata()
      {
      	// $data['reg_data'] =  $this->Model->select_all("reg");
      $data['reg_data'] =  $this->Model->join("reg","city","`reg`.`city_fk` = `city`.`city_id`");

      //echo  $this->db->last_query();



      	// echo "<pre>";
      	//  print_r($data['reg_data']);
      	$this->load->view('Admin/showdata',$data);
      }

      public function delete($id)
      {
      	 //$id = $this->uri->segment(3);
      	 //
      	 $id =  base64_decode($id); 

      	 $where = ["id" => $id];
      	 $delete =  $this->Model->delete("reg",$where);
      		 if($delete)
		 {
		 	redirect('Admin/showdata');
		 }
		 else
		 {
		 	echo "Error";
		 }




      }

      public function Edit($id)
      {

      	$data['city'] = $this->Model->select_all('city');
      	$id = base64_decode($id);
      	 $where = array("id" => $id);

      	 $data['edit_data'] =  $this->Model->select_where("reg",$where);


      	 $this->load->view('Admin/edit',$data);


      }

      public function update($id)
      {

      	$id = base64_decode($id);
      	$where = array("id" => $id);

      	$data['fname'] = $this->input->post('fname');
		$data['lname'] = $this->input->post('lname');

		 $up = $this->Model->Update("reg",$data,$where);

		  if($up)
		 {
		 	redirect('Admin/showdata');
		 }
		 else
		 {
		 	echo "Error";
		 }



      }

      public function Addpro()
      {
      	        $config['upload_path']          = './product_image/';
                $config['allowed_types']        = 'gif|jpg|png';
                // $config['max_size']             = 100;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
                // 
                $this->load->library('upload', $config);
                $this->upload->do_upload('image');
		        $upoad_data =    $this->upload->data();
		        $data['image'] = $upoad_data['file_name'];
		        $data['category_fk'] = $this->input->post('category_fk');
		        $data['sub_category_fk'] = $this->input->post('sub_category_fk');
		        $data['product_name'] = $this->input->post('product_name');
		        $data['product_price'] = $this->input->post('product_price');
		        $data['product_details'] = $this->input->post('product_details');
		        date_default_timezone_set('Asia/Kolkata');
  	            $date = date('Y-M-D H:i:s');
  	            $data['timedate'] = $date;

		        //print_r($data);
		        $product_insert = $this->Model->insertdata("product",$data);
		          if($product_insert)
		 {
		 	redirect('Admin/showproduct');
		 }
		 else
		 {
		 	echo "Error";
		 }
		}

		public function showproduct()
		{
		$data['product'] =  $this->Model->join_three("product","category","sub_category","`product`.`category_fk` = `category`.`cat_id`","`product`.`sub_category_fk` = `sub_category`.`sub_cat_id`");
		 print_r($data);

		   $this->load->view('Admin/showproduct',$data);
		}


}
