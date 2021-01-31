<?php 
define('PATH_BASE', dirname(dirname(__FILE__)));
require(PATH_BASE . "/config/dbconfig.php");

if(isset($_POST["updateProject"]))
{
 	$project_id = $_POST["project_id"];
 	$title = $_POST["title"];
 	$content = $_POST["content"];
 	$date = $_POST["date"];
 	$author = $_POST["author"];
 	$team_id = $_POST["team_id"];
 	$file_data = $_FILES["file_data"];

 	if(!$project->editProject($project_id, $title, $content, $date, $author, $team_id)) {
		$success = "Update succesful.";
	} else {
		$failed = "Update failed.";
	}

 	if($file_data['name'] !== "" && $file_data['tmp_name'] !== ""){
 		$imageHandler = $image->uploadImage($file_data);
 		if($imageHandler === true){
 			$image->setProjectImgUrl($file_data, $title, $content, $author);
 		}
 	}
}

?>

<!DOCTYPE html>
	<html>
		<?php require(PATH_BASE . "/includes/head.php"); ?>

		<body id="body-index">
			<div class="container-fluid">
				<?php require(PATH_BASE . "/includes/header.php"); ?>

				<section class="row" id="main-panel">
					<div class="container">
						<?php
							if($file_data['name'] !== "" && $file_data['tmp_name'] !== ""){
								if(isset($imageHandler) && $imageHandler !== true){
									echo '<div class="alert alert-danger"><p>'.$imageHandler.'</p></div>';
								}
							}

							if(isset($failed))
							{
								?>
								<div class="alert alert-danger">
									<p><?php echo $failed; ?></p>
								</div>
								<?php
							}
							?>

							<?php
							if(isset($success))
							{
								?>
								<div class="alert alert-success">
									<p><?php echo $success; ?></p>
								</div>
								<?php
							}
						?>

						<form method="post" enctype="multipart/form-data">
							<?php

							foreach($project->readSingleProject($_GET['id']) as $row) {
								?>
								<input type="hidden" name="project_id" value="<?php echo $row['project_id']; ?>">
								<label>Project titel</label>
								<input type="text" name="title" value="<?php echo $row['title']; ?>">
								<label>Project bericht</label>
								<textarea name="content"><?php echo $row["content"]; ?></textarea>
								<label>Project datum</label>
								<input type="date" name="date" value="<?php echo $row['date']; ?>">
								<label>Project auteur</label>
								<input type="text" name="author" value="<?php echo $row['author']; ?>">
								<label>Image <?php echo $row["img_url"]; ?></label>
								<input type="file" name="file_data"/>
								<button name="updateProject">Update <i class="fa fa-pencil-square-o"></i></button>
								<?php
							}
							?>
						</form>
					</div>
				</section>
			</div>
		<?php require(PATH_BASE . "/includes/footer.php"); ?>

