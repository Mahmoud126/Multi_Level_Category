<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Category');
		$this->load->helper('url');
	}
	public function index()
	{
		$data['cat'] = $this->Category->get_categories();
		$this->load->view('getAll', $data);
//		print_r($data);
//		echo "<ul>";
//		$this->fetch_menu($data);
//		echo "</ul>";
	}
	public function get_sub($cat_id)
	{
		$result = $this->Category->sub_categories($cat_id);
		$outout = '<option value="">Select Sub</option>';
		foreach ($result as $re) {
			$outout .= '<option value="' . $re['id'] . '">' . $re['cat_name'] . '</option>';
			echo $outout;
		}
	}
	public function get_sub_sub($sub_cat)
	{
			$data = $this->Category->sub_categories($sub_cat);
			foreach ($data as $re) {
				echo '<option value="' . $re['id'] . '">' . $re['cat_name'] . '</option>';

			}
	}
//	public function fetch_menu($data){
//
//		foreach($data as $menu){
//
//			echo "<li>".$menu->cat_name."</li>";
//
//			if(!empty($menu->sub)){
//
//				echo "<ul>";
//
//				$this->fetch_sub_menu($menu->sub);
//
//				echo "</ul>";
//			}
//
//		}
//
//	}
//
//	function fetch_sub_menu($sub_menu){
//
//		foreach($sub_menu as $menu){
//
//			echo "<li>".$menu->cat_name."</li>";
//
//			if(!empty($menu->sub)){
//
//				echo "<ul>";
//
//				$this->fetch_sub_menu($menu->sub);
//
//				echo "</ul>";
//			}
//
//		}
//
//	}

}
?>
  
