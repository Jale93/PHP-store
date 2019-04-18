<?php 



class Directors extends Db_object {

	protected static $db_table = "directories";
	protected static $db_table_fields = array('full_name', 'position', 'section','phone_number','user_image');
	public $id;
	public $full_name;
	public $position;
	public $section;
	public $phone_number;
	public $i_add_datetime;
	public $user_image;
	public $upload_directory = "images";
	public $image_placeholder = "http://placehold.it/400x400&text=image";



	public function upload_photo() {

	

			if(!empty($this->errors)) {

				return false;

			}

			if(empty($this->user_image) || empty($this->tmp_path)){
				$this->errors[] = "the file was not available";
				return false;
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;


			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->user_image} already exists";
				return false;



			}

			if(move_uploaded_file($this->tmp_path, $target_path)) {

				

					unset($this->tmp_path);
					return true;

		



			} else {

				$this->errors[] = "the file directory probably does not have permission";
				return false;

			}

 


	}











	public function image_path_and_placeholder() {

		return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;

	}

	public function ajax_save_user_image($user_image, $user_id) {


		global $database;

		$user_image = $database->escape_string($user_image);
		$user_id = $database->escape_string($user_id);

		$this->user_image = $user_image;
		$this->id         = $user_id;

		$sql  = "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}' ";
		$sql .= " WHERE id = {$this->id} ";
		$update_image = $database->query($sql);

		
		echo $this->image_path_and_placeholder();



	


	}


		public function delete_photo() {


		if($this->delete()) {

			$target_path = SITE_ROOT.DS. 'admin' . DS . $this->upload_directory . DS . $this->user_image;

			return unlink($target_path) ? true : false;


		} else {

			return false;


		}




	}







} // End of Class User














 ?>


















