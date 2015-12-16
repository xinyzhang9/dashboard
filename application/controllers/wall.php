<?php  
/**
* 
*/
class Wall extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('User');
		$this->load->model('Message');

		$this->output->enable_profiler();
	}

	public function index(){
		$this->load->view('index');
	}

	//$id is owner_id
	public function show_profile($id){
		$owner = $this->User->get_user_by_id($id);
		$messages = $this->Message->get_message($id);
		$comments = array();
		foreach ($messages as $message) {
			$tmp = $this->Message->get_comment($message['id']);
			if(!empty($tmp))
			$comments[] = $tmp;
		}
		
		$data = array('owner' => $owner,
						'messages' => $messages,
						'comments' => $comments);
		$this->load->view('show',$data);
	}

	public function add_message($owner_id,$poster_id){
		$message = array('owner_id'=>$owner_id,
			'poster_id'=> $poster_id,
			'message' => $this->input->post('message'));
		$this->Message->add_message($message);
		$this->show_profile($owner_id);
	}

	public function add_comment($poster_id,$message_id){
		$comment = array('comment'=>$this->input->post('comment'),
			'user_id'=> $poster_id,
			'message_id' => $message_id);
		$this->Message->add_comment($comment);
		//retrieve messages to find owner_id
		$message = $this->Message->get_message_by_message_id($message_id);
		$this->show_profile($message['owner_id']);
	}
	


	

}
?>