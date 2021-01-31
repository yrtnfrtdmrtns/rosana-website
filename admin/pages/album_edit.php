<?php 
define('PATH_BASE', dirname(dirname(__FILE__)));
require(PATH_BASE . "/config/dbconfig.php");

if(isset($_POST["updateAlbum"]))
{
 	$album_id = $_POST["article_id"];
 	$title = $_POST["title"];
 	$content = $_POST["content"];
 	$date = $_POST["date"];
 	$author = $_POST["author"];
 	$team_id = $_POST["team_id"];
 	$file_data = $_FILES["file_data"];

 	if(!$album->editImage($album_id, $title, $content, $date, $author, $team_id)) {
		$success = "Update succesful.";
	} else {
		$failed = "Update failed.";
	}

	//check if a file has been uploaded & try to upload the file if so
 	if($file_data['name'] !== "" && $file_data['tmp_name'] !== ""){
 		$imageHandler = $image->uploadImage($file_data);
 		if($imageHandler === true){
 			$image->setAlbumImgUrl($file_data, $title, $content, $author);
 		}
 	}
}

?>

<!DOCTYPE html>
	<html>
		<?php require(PATH_BASE . "/includes/head.php"); ?>

		<body>
			<div class="container-fluid">
				<div class="row">
					<?php require(PATH_BASE . "/includes/header.php"); ?>
				</div>
			
				<div class="row">

					<div id="main-panel">
						<div class="container-fluid main-panel-inner">
							<button class="return" onclick="goBack()"><i class="fa fa-arrow-circle-o-left"></i> Annuleer</button>

							<?php
							//check if a file has been uploaded in the form, and display it's error/success message.
						 	if($file_data['name'] !== "" && $file_data['tmp_name'] !== ""){
						 		if(isset($imageHandler) && $imageHandler !== true){
						 			echo '
						 				<div class="alert alert-danger">
			                                <p>'.$imageHandler.'</p>
			                            </div>
						 			';
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

									foreach($album->readSingleImage($_GET['id']) as $row) {
								?>
									<input type="hidden" name="album_id" value="<?php echo $row['album_id']; ?>">
									<input type="hidden" name="team_id" value="<?php echo $row['team_id']; ?>">
									<label>Afbeelding titel</label>
									<input type="text" name="title" value="<?php echo $row['title']; ?>">
									<label>Afbeelding omschrijving</label>
									<textarea name="content"><?php echo $row["content"]; ?></textarea>
									<label>Afbeelding datum</label>
									<input type="date" name="date" value="<?php echo $row['date']; ?>">
									<label>Afbeelding auteur</label>
									<input type="text" name="author" value="<?php echo $row['author']; ?>">
									<label>Image <?php echo $row["img_url"]; ?></label>
									<input type="file" name="file_data"/>
									<button name="updateAlbum">Update <i class="fa fa-pencil-square-o"></i></button>
								<?php
									}
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php require(PATH_BASE . "/includes/footer.php"); ?>

