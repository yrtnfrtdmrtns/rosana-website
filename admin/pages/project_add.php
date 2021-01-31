<?php 
define('PATH_BASE', dirname(dirname(__FILE__)));
require(PATH_BASE . "/config/dbconfig.php");

if(isset($_POST["addProject"]))
{
 	$title = $_POST["title"];
 	$content = $_POST["content"];
 	$date = $_POST["date"];
 	$author = $_POST["author"];
 	$file_data = $_FILES["file_data"];

 	if(!$project->addProject($title, $content, $date, $author)) {

 		$success = "Project added succesful.";

 	} else {
 		$failed = "Project added failed.";
 	}

 	//check if a file has been uploaded & try to upload the file if so
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
			<form method="post" enctype="multipart/form-data">
				<?php
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

				<input type="hidden" name="addProject" value=""/>
				<label>Project titel</label>
				<input type="text" placeholder="project titel" name="title"/>
				<label>Project bericht</label>
				<textarea placeholder="Project bericht" name="content"></textarea>
				<label>Project datum</label>
				<input type="date" placeholder="0000-00-00" name="date"/>
				<label>Project auteur</label>
				<input type="text" placeholder="Project auteur" name="author"/>
				<label>Image</label>
				<input type="file" name="file_data"/>
				<button class="addProject">Add Project <i class="fa fa-plus-square-o"></i></button>
			</form>
		</div>
	</section>
</div>
<?php require(PATH_BASE . "/includes/footer.php"); ?>