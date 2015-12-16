<?php  
/**
* 
*/
class Main extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('User');

		$this->output->enable_profiler();
	}

	public function index(){
		$this->load->view('index');
	}

	public function show_signin(){
		$this->load->view('signin');
	}

	public function show_register(){
		$this->load->view('register');
	}

	public function remove($id){
		$this->User->remove_user($id);
		redirect('/login/profile');
	}

	public function add_new(){
		$this->load->view('new');
	}

	public function edit($id){
		$user = $this->User->get_user_by_id($id);
		$this->load->view('edit',array('user'=>$user));
	}

	public function edit_info($id){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name","First name","trim|required");
		$this->form_validation->set_rules("last_name","Last name","trim|required");
		$this->form_validation->set_rules("email","email","required|valid_email");
		if($this->form_validation->run() === false){
			$this->view_data["errors"] = validation_errors();
			$this->load->view('index',$this->view_data);
		}else{
			$user = array('id' => $id,
						'email'=>$this->input->post('email'),
						'first_name'=>$this->input->post('first_name'),
						'last_name'=>$this->input->post('last_name'));
			$this->User->update_user_info($user);
			redirect('/login/profile');
		}
		
	}

	public function edit_password($id){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("password","Password","required|min_length[6]");
		$this->form_validation->set_rules("confirm_password","Confirm Password","required|matches[password]");
		if($this->form_validation->run() === false){
			$this->view_data["errors"] = validation_errors();
			$this->load->view('index',$this->view_data);
		}else{
			$user = array('id' => $id,
						'password'=>$this->input->post('password')
						);
			$this->User->update_user_password($user);
			redirect('/login/profile');
		}
		
	}

	public function edit_description($id){
		$user = array('id' => $id,
						'description'=>$this->input->post('description')
						);
		$this->User->update_user_description($user);
		redirect('/login/profile');
	}



}
?>