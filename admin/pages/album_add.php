<?php 
define('PATH_BASE', dirname(dirname(__FILE__)));
require(PATH_BASE . "/config/dbconfig.php");

if(isset($_POST["addImage"]))
{
 	$title = $_POST["title"];
 	$content = $_POST["content"];
 	$date = $_POST["date"];
 	$author = $_POST["author"];
 	$team_id = $_POST["team_id"];
 	$file_data = $_FILES["file_data"];

 	if(!$album->addImage($title, $content, $date, $author, $team_id)) {

 		$success = "Succesfully created new image.";

 	} else {
 		$failed = "Failed to create new image";
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

							<form method="post" enctype="multipart/form-data">
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



								<input type="hidden" name="addImage" value=""/>
								<label>Afbeelding titel</label>
								<input type="text" placeholder="Afbeelding titel" name="title"/>
								<label>Afbeelding omschrijving</label>
								<textarea placeholder="Afbeelding bericht" name="content"></textarea>
								<label>Afbeelding datum</label>
								<input type="date" placeholder="0000-00-00" name="date"/>
								<label>Afbeelding auteur</label>
								<input type="text" placeholder="Afbeelding auteur" name="author"/>
								<label>Team</label>
								<select name="team_id">
									<option value="0">Kies een team</option>
									<option value="1">Team 1</option>
									<option value="2">Team 2</option>
									<option value="3">Team 3</option>
									<option value="4">Team 4</option>
								</select>
								<label>Afbeelding</label>
								<input type="file" name="file_data"/>
								<button class="addImage">Add Image <i class="fa fa-plus-square-o"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		<?php require(PATH_BASE . "/includes/footer.php"); ?>