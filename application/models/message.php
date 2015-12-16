<?php  
/**
* 
*/
class Message extends CI_Model
{
	public function get_message($owner_id){
        $query = "SELECT messages.id as id, users.id as owner_id, users.first_name as owner_first_name,
                    users.last_name as owner_last_name, users2.id as poster_id,
                    users2.first_name as poster_first_name, users2.last_name as poster_last_name,
                    messages.message as message, messages.created_at as created_at 
                    FROM users
                    LEFT JOIN messages on messages.owner_id = users.id
                    LEFT JOIN users as users2 on messages.poster_id = users2.id
                    WHERE users.id = ?
                    ORDER BY messages.created_at DESC
                    ";
        $values = array($owner_id);
		return $this->db->query($query,$values)->result_array();
	}

	public function add_message($message){
		$query = "INSERT INTO messages (owner_id,poster_id,message,created_at) 
                    VALUES(?,?,?,NOW())";
		$values = array($message['owner_id'],$message['poster_id'],$message['message']);
		return $this->db->query($query,$values);
	}

    public function get_comment($message_id){
        $query = "SELECT comments.id as id, comments.comment as comment, messages.id as message_id, comments.created_at as created_at, users.first_name as poster_first_name, users.last_name as poster_last_name
                FROM comments
                LEFT JOIN messages on comments.message_id = messages.id
                LEFT JOIN users on comments.user_id = users.id
                WHERE messages.id = ?
                ORDER BY messages.created_at DESC
                ";
        $values = array($message_id);
        return $this->db->query($query,$values)->result_array();
    }

    public function add_comment($comment){
        $query = "INSERT INTO comments (comment,created_at,user_id,message_id) 
                    VALUES(?,NOW(),?,?)";
        $values = array($comment['comment'],$comment['user_id'],$comment['message_id']);
        return $this->db->query($query,$values);
    }

    public function get_message_by_message_id($message_id){
        $query = "SELECT messages.id as id, users.id as owner_id, users.first_name as owner_first_name,
                    users.last_name as owner_last_name, users2.id as poster_id,
                    users2.first_name as poster_first_name, users2.last_name as poster_last_name,
                    messages.message as message, messages.created_at as created_at 
                    FROM users
                    LEFT JOIN messages on messages.owner_id = users.id
                    LEFT JOIN users as users2 on messages.poster_id = users2.id
                    WHERE messages.id = ?
                    ORDER BY messages.created_at DESC
                    ";
        $values = array($message_id);
        return $this->db->query($query,$values)->row_array();
    }

	



}
?>