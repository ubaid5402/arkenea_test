<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct(){
	parent::__construct();
		$this->load->model('employee_model');
	}
	
	public function index()
	{
		$data['get_employee'] = $this->employee_model->get_employee();
		$this->load->view('employee_list_view',$data);
	}

	public function add(){
		if($this->input->post()){

		$this->form_validation->set_rules('name','Name','trim|required');
	    $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_employee.emp_email]');
	    $this->form_validation->set_rules('phone','Phone','trim|required|numeric');
	    $this->form_validation->set_rules('dob','Date of Birth','trim|required');
	    $this->form_validation->set_rules('address','Address','trim|required');
	    if (empty($_FILES['image']['name']))
		{
		    $this->form_validation->set_rules('image', 'Profile Image', 'required');
		}

	    if($this->form_validation->run() == false)
	    {
	        $this->load->view('employee_add_view');
	    }else{


	    $fconfig['upload_path'] = './uploads/image/';
        $fconfig['allowed_types'] = 'gif|jpg|png';
        $fconfig['max_size'] = '*';
        $fconfig['overwrite'] = FALSE;

        $this->load->library('upload', $fconfig); //Load the upload CI library
        $this->load->initialize($fconfig);

        if (!$this->upload->do_upload('image')) {
            $error = array('file_error' => $this->upload->display_errors());
            $this->load->view('employee_add_view' ,$error);
        } else {
            $file_info = $this->upload->data();
            $file_name = $file_info['file_name'];

            $add = array(
            	'emp_name' =>$this->input->post('name'),
            	'emp_email' =>$this->input->post('email'),
            	'emp_phone' =>$this->input->post('phone'),
            	'emp_dob' => date('Y-m-d',strtotime($this->input->post('dob'))),
            	'emp_address' =>$this->input->post('address'),
            	'emp_image' =>$file_name
            );

            $this->db->insert('tbl_employee',$add);

            redirect(base_url('employee'));
        }

	    }
		}else{


		$this->load->view('employee_add_view');

		}
	}

	public function edit($emp_id){
		if($this->input->post()){

		$this->form_validation->set_rules('name','Name','trim|required');
	    $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_employee.emp_email]');
	    $this->form_validation->set_rules('phone','Phone','trim|required|numeric');
	    $this->form_validation->set_rules('dob','Date of Birth','trim|required');
	    $this->form_validation->set_rules('address','Address','trim|required');

	    if($this->form_validation->run() == false)
	    {
	        $data['emp_by_id'] = $this->employee_model->get_employee_id($emp_id);
			$this->load->view('employee_edit_view',$data);
	    }else{

	    if(!empty($_FILES['image']['name'])){	
	    $fconfig['upload_path'] = './uploads/image/';
        $fconfig['allowed_types'] = 'gif|jpg|png';
        $fconfig['max_size'] = '*';
        $fconfig['overwrite'] = FALSE;

        $this->load->library('upload', $fconfig); //Load the upload CI library
        $this->load->initialize($fconfig);

        if (!$this->upload->do_upload('image')) {
            $data = array('file_error' => $this->upload->display_errors());
            $data['emp_by_id'] = $this->employee_model->get_employee_id($emp_id);
			$this->load->view('employee_edit_view',$data);
        } 
            $file_info = $this->upload->data();
            $file_name = $file_info['file_name'];
        }else{
        	$file_name = $this->input->post('old_image');
        }

            $update = array(
            	'emp_name' =>$this->input->post('name'),
            	'emp_email' =>$this->input->post('email'),
            	'emp_phone' =>$this->input->post('phone'),
            	'emp_dob' => date('Y-m-d',strtotime($this->input->post('dob'))),
            	'emp_address' =>$this->input->post('address'),
            	'emp_image' =>$file_name
            );

            $this->db->where('emp_id',$emp_id);
            $this->db->update('tbl_employee',$update);

            redirect(base_url('employee'));

	    }
		}else{

		$data['emp_by_id'] = $this->employee_model->get_employee_id($emp_id);

		$data['emp_by_id']->emp_dob = date('d-m-Y',strtotime($data['emp_by_id']->emp_dob));
		$this->load->view('employee_edit_view',$data);

		}
	}

	public function delete($emp_id){
		$this->db->where('emp_id',$emp_id);
		$this->db->delete('tbl_employee');

		redirect(base_url('employee'));
	}
}
