<?php

class Files {

	public $total_size = 0;
	public $total_files = 0;
	public $last_upload = "1920-01-01";
	public $file_name = " ";
	public $file_size = " ";
	public $upload_time = " ";
	public $encoded_file_name = " ";
	public $crypt;

	function __construct() {
		//getting total file size
		$sql = "SELECT sum(file_size) AS total FROM files";
		$this->total_size = $this->convertBytes(DB::query($sql)[0]->total);
		//getting file count
		$sql = "SELECT MAX(id) AS total FROM files";
		$this->total_files = DB::query($sql)[0]->total;
		//getting last upload time
		$sql = "SELECT upload_time FROM files ORDER BY upload_time DESC LIMIT 1";
		$this->last_upload = DB::query($sql)[0]->upload_time;

	} 

	private function convertBytes($bytes) {

        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
	}

	public function uploadFile($file) {


		if (!$file['error']) {

			$this->file_name = $file['name'];
			$this->file_size = $this->convertBytes($file['size']);


			$file_name = explode(".", $file['name']);

			if($file_name[1] == "exe") {

				$this->error = "This file extension (.exe) is not allowed.";

			}  elseif ($file['size'] > MAX_FILE_SIZE) {

				$this->error = "This file is too large. (> ".$this->convertBytes(MAX_FILE_SIZE).")";

			} else {

				$encoded_file_name = md5($file_name[0]);
				$target_file = "files/" . $encoded_file_name . "." . end($file_name);

				move_uploaded_file($file["tmp_name"], $target_file);

				$this->crypt = md5($file_name[0] . rand(1, 100000));

				$query = "INSERT into files 
				(original_file_name, encoded_file_name, file_size, crypt) 
				VALUES ('" . $file["name"] ."' ,'" . $encoded_file_name . "." . $file_name[1] . "','" . $file["size"] . "', '". $this->crypt . "')";

				DB::store($query);
			}
		} else {
			$this->error = "There was an error!";
		}

	}

	public function downloadFile($crypt) {



		$result = DB::query("SELECT * FROM files WHERE crypt = '$crypt'");

		if(!sizeof($result)) {
		$this->file_name = $result[0]->original_file_name;
		$this->file_size = $result[0]->file_size;
		$this->upload_time = $result[0]->upload_time;
		$this->encoded_file_name = $result[0]->encoded_file_name;
		} else {
			$this->error = "File does not exist";
		}


	}

 }