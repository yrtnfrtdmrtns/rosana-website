<?php

	class Album{
        
		private $db;

		function __construct($DB_con)
		{
			$this->db = $DB_con;
		}

		public function readImages()
		{
			try
			{
				$stmt = $this->db->prepare("SELECT * FROM album ORDER BY date DESC");
				$stmt->execute();

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function readSingleImage($album_id)
		{
			try
			{
				$stmt = $this->db->prepare("SELECT * FROM album WHERE album_id = :album_id");
				$stmt->execute(array(":album_id" => $album_id));

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function addImage($title, $content, $date, $author)
		{
			try
			{
				$stmt = $this->db->prepare("INSERT INTO `album` (`title`, `content`, `date`, `author`) VALUES (:title, :content, :date, :author)");
				$stmt->bindparam(":title", $title);
				$stmt->bindparam(":content", $content);
				$stmt->bindparam(":date", $date);
				$stmt->bindparam(":author", $author);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}				
		}

		public function editImage($album_id, $title, $content, $date, $author)
		{
			try
			{
				$stmt = $this->db->prepare("UPDATE `album` SET `album_id` = :album_id, `title` = :title, `content` = :content, `date` = :date, `author` = :author WHERE `album_id` = :album_id");
				$stmt->bindparam(":album_id", $album_id);
				$stmt->bindparam(":title", $title);
				$stmt->bindparam(":content", $content);
				$stmt->bindparam(":date", $date);
				$stmt->bindparam(":author", $author);
				$stmt->execute();
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}				
		}

		public function deleteImage($album_id)
		{
			$stmt = $this->db->prepare("DELETE FROM album WHERE album_id = :album_id");
			$stmt->bindparam(":album_id", $album_id);
			$stmt->execute();
		}
	}

?>