<?php

	class Project
	{
		private $db;

		function __construct($DB_con)
		{
			$this->db = $DB_con;
		}

		public function readProjects()
		{
			try
			{
				$stmt = $this->db->prepare("SELECT * FROM projects ORDER BY date DESC");
				$stmt->execute();

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function readSingleProject($project_id)
		{
			try
			{
				$stmt = $this->db->prepare("SELECT * FROM projects WHERE project_id = :project_id");
				$stmt->execute(array(":project_id" => $project_id));

				return $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function addProject($title, $content, $date, $author)
		{
			try
			{
				$stmt = $this->db->prepare("INSERT INTO `projects` (`title`, `content`, `date`, `author`) VALUES (:title, :content, :date, :author)");
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

		public function editProject($project_id, $title, $content, $date, $author)
		{
			try
			{
				$stmt = $this->db->prepare("UPDATE `projects` SET `project_id` = :project_id, `title` = :title, `content` = :content, `date` = :date, `author` = :author WHERE `project_id` = :project_id");
				$stmt->bindparam(":project_id", $project_id);
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

		public function deleteProject($project_id)
		{
			$stmt = $this->db->prepare("DELETE FROM projects WHERE project_id = :project_id");
			$stmt->bindparam(":project_id", $project_id);
			$stmt->execute();
		}
	}

?>