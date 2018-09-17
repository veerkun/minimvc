<?php 

class ShareModel extends Model{

	public function index(){

	$this->query('SELECT * FROM shares ORDER BY create_date DESC');
	$row = $this->resultSet();
	return $row;
	}	
	
	public function add(){
		//Sanitize POST
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		if($post['submit']){
			if($post['title'] == '' || $post['body'] == '' || $post['link'] == '' || $post['file'] == ''){
				Messages::setMessage('Please fill in All Fields','error');
				return;
			}	

			// Insert into MySql
			$this->query('INSERT INTO shares (title,body,link,user_id) VALUES (:title,:body,:link,:user_id)');
			$this->bind(':title',$post['title']);
			$this->bind(':body',$post['body']);
			$this->bind(':link',$post['link']);
			$this->bind(':user_id',1);	
			$this->execute(); 
			// Verify
			if($this->lastInsertId()){
				// Redirect
				header('Location: '.ROOT_URL.'shares');
			}
		}
		return;
	}
}
