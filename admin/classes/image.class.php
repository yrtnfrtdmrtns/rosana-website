<?php
	class Image {

		private $db;
		private $image_directory = "../../album/";

		function __construct($DB_con)
		{
			$this->db = $DB_con;
		}

		//function to upload an image
		//returns true is image upload succeeded, returns an error message if not.
		public function uploadImage($file_data){

			//check if wer'e uploading an image, and not some random other file
			$uploadOk = $this->uploadOk($file_data);

			if($uploadOk === true){
				//upload the image to the server
				move_uploaded_file($file_data["tmp_name"], $this->image_directory . $file_data["name"]);
				$succes = true;

				return $succes;

			} else {

				return $uploadOk;
			}
		}

		//function to check if a file is an image
		private function uploadOk($file_data){

			//clear the cache (file_exists caches it's result.)
			clearstatcache();

			//check if the file is an image
			$check = getimagesize($file_data["tmp_name"]);
			if($check !== false){

				//check if the image already exists
				if(!file_exists($this->image_directory . $file_data["name"])){
					$uploadOk = true;
				} else {
					$uploadOk = "file name is already in use, image has not been uploaded.";
				}
			} else {
				$uploadOk = "file is not an image, and has not been uploaded.";
			}
			return $uploadOk;
		}

		//function to set the image url for the article table
		public function setProjectImgUrl($file_data, $title, $content, $author){
			$stmt = $this->db->prepare("UPDATE projects SET img_url = :img_url WHERE title = :title AND content = :content AND author = :author");
			$stmt->bindparam(":img_url", $file_data["name"]);
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":content", $content);
			$stmt->bindparam(":author", $author);
			$stmt->execute();
		}
	}
?>
