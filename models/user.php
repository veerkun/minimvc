<?php 

class UserModel extends Model{

	public function register(){
		//Sanitize POST
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		$password = md5($post['password']);
		if($post['submit']){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMessage('Please fill in All Fields','error');
				return;
			}
			// Insert into MySql
			$this->query('INSERT INTO users (name, email, password) VALUES (:name,:email,:password)');
			$this->bind(':name',$post['name']);
			$this->bind(':email',$post['email']);
			$this->bind(':password',$password);
			$this->execute(); 
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'users/login');
			}
		}
		return;
	}

	public function login(){
		//Sanitize POST
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		$password = md5($post['password']);

		if($post['submit']){
			// Compare Login // SELECT // SESSIONS
			$this->query('SELECT * FROM USERS WHERE email = :email AND password = :password');
			$this->bind(':email',$post['email']);
			$this->bind(':password',$password);
			$row = $this->single();

			if($row){
				$_SESSION['is_logged_in'] = true;
				$_SESSION['user_data'] = array(
					"id"	=> $row['id'],
					"name"	=> $row['name'],
					"email"	=> $row['email']
				);
				header('Location: '.ROOT_URL.'shares');
			} else {
				Messages::setMessage('Incorrect Login','error');
			}
		}
		return;

	}


}
