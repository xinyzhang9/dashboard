<?php  
/**
* 
*/
class User extends CI_Model
{
	public function get_all_user(){
		return $this->db->query("SELECT * FROM users ORDER BY created_at ASC")->result_array();
	}

	public function add_user($user){
		$query = "INSERT INTO users (first_name,last_name,email,password,created_at,updated_at) VALUES(?,?,?,?,NOW(),NOW())";
		$values = array($user['first_name'],$user['last_name'],$user['email'],$user['password']);
		return $this->db->query($query,$values);
	}

	public function remove_user($id){
		$query = "DELETE FROM users where id = $id";
		return $this->db->query($query);
	}

	public function get_user_by_id($id){
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    }

    public function get_user_by_email($email){
    	return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }

    public function update_user_level(){
    	$first_user = $this->db->query
    				("SELECT * FROM users 
    				ORDER BY created_at ASC 
    				limit 1")->row_array();

    	$query1 = "UPDATE users
    				SET user_level = ?
    				WHERE id = ?";
    	$values1 = array(9,$first_user['id']); //admin
    	$query2 = "UPDATE users
    				SET user_level = ?
    				WHERE id != ?";
    	$values2 = array(0,$first_user['id']); //normal
    	return($this->db->query($query1,$values1) 
    		&& $this->db->query($query2,$values2));

    }

    public function update_user_info($user){
    	$query = "UPDATE users 
    			SET email = ?, first_name = ?, last_name = ?, updated_at = NOW()
    			where id = ?";
    	$values = array($user['email'],$user['first_name'],$user['last_name'],$user['id']);
    	return $this->db->query($query,$values);
    }

    public function update_user_password($user){
    	$query = "UPDATE users 
    			SET password = ?, updated_at = NOW()
    			where id = ?";
    	$values = array(md5($user['password']),$user['id']);
    	return $this->db->query($query,$values);
    }

    public function update_user_description($user){
    	$query = "UPDATE users 
    			SET description = ?, updated_at = NOW()
    			where id = ?";
    	$values = array($user['description'],$user['id']);
    	return $this->db->query($query,$values);
    }

}
?>