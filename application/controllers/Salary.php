<?php       
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Salary_model','salary');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('salary_view');
	}

	public function ajax_list()
	{
		$list = $this->salary->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $salary) {
			$no++;
			$row = array();
			$row[] = $salary->manv;
			$row[] = $salary->songayluong;
			$row[] = $salary->tienluong = (($salary->songayluong) * 300000).'VND';


			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$salary->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$salary->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}
		
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->salary->count_all(),
						"recordsFiltered" => $this->salary->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}