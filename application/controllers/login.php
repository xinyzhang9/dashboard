<?php  
/**
* 
*/
class Login extends CI_Controller
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

	public function register(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("first_name","First name","trim|required");
		$this->form_validation->set_rules("last_name","Last name","trim|required");
		$this->form_validation->set_rules("email","email","required|valid_email");
		$this->form_validation->set_rules("password","Password","required|min_length[6]");
		$this->form_validation->set_rules("confirm_password","Confirm Password","required|matches[password]");

		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confirm_password = $this->input->post('confirm_password');

		if($this->form_validation->run() === false){
			$this->view_data["errors"] = validation_errors();
			$this->load->view('index',$this->view_data);
		}else{
			$user = array('first_name' =>$first_name,
			 				'last_name' =>$last_name,
			 				'email' =>$email,
			 				'password' =>md5($password)
			 				);
			$this->load->model('User');
			$this->User->add_user($user);//register user
			$this->User->update_user_level();//set user_level
			redirect('/login/profile');
		}

	}

	public function log_in(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("login_email","email","required|valid_email");
		$this->form_validation->set_rules("login_password","Password","required");

		if($this->form_validation->run() === false){
			$this->view_data["errors"] = validation_errors();
			$this->load->view('index',$this->view_data);
		}else{
			$email = $this->input->post('login_email');
			$password = $this->input->post('login_password');
			$this->load->model('User');
			$db_user = $this->User->get_user_by_email($email);
			if(md5($password) == $db_user['password']){
				$isLoggedIn = true;
				$user = array('id'=>$db_user['id'],
								'first_name'=>$db_user['first_name'],
								'last_name'=>$db_user['last_name'],
								'email'=>$db_user['email'],
								'user_level' => $db_user['user_level'],
								'isLoggedIn'=>$isLoggedIn);
				//put into session
				$this->session->set_userdata($user);
				redirect("/login/profile");
			}else{
				if (isset($this->view_data["errors"])) {
					$this->view_data["errors"].="<p>email and password don't match.</p>";
				}else{
					$this->view_data = array('errors' => "<p>email and password don't match.</p>");
				}
				$this->load->view('index',$this->view_data);
			}
		}
	}
	public function profile(){
		if($this->session->userdata('isLoggedIn')===true){
			$users = $this->User->get_all_user();
			$data['users'] = $users;
			if ($this->session->userdata('user_level')==9) {
				$this->load->view('admin',$data); //admin page
			}else{
				$this->load->view('dashboard',$data);//normal user page
			}
			
		}else{
			redirect('/');
		}
	}
	public function log_off(){
		$this->session->sess_destroy();
		redirect('/');
	}
}
?>