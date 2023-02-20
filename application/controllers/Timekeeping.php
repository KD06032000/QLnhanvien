<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timekeeping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Timekeeping_model','timekeeping');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->view('timekeeping_view');
	}

    public function ajax_list()
	{
		$list = $this->timekeeping->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $timekeeping) {
			$no++;
			$row = array();
			$row[] = $timekeeping->manv;
			$row[] = $timekeeping->dob;
			$row[] = $timekeeping->trangthai;
			

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$timekeeping->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$timekeeping->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->timekeeping->count_all(),
						"recordsFiltered" => $this->timekeeping->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$data = array(
				'manv' => $this->input->post('manv'),
				'dob' => $this->input->post('dob'),
				'trangthai' => $this->input->post('trangthai'),
				
			);
		$insert = $this->timekeeping->save($data);
		echo json_encode(array("status" => TRUE));
		
	}
	public function ajax_update()
	{
		$data = array(
			'manv' => $this->input->post('manv'),
			'dob' => $this->input->post('dob'),
			'trangthai' => $this->input->post('trangthai'),
			
		);
		$this->timekeeping->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_delete($id)
	{
		$this->timekeeping->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
		var_dump(array());
	}
}