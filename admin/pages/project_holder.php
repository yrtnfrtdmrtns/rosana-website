<?php
	define('PATH_BASE', dirname(dirname(__FILE__)));
	require(PATH_BASE . "/config/dbconfig.php");
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
							function limit_text($text, $limit) {
								if (str_word_count($text, 0) > $limit) {
									$words = str_word_count($text, 2);
									$pos = array_keys($words);
									$text = substr($text, 0, $pos[$limit]) . '...';
								}
								return $text;
							}
						?>

						<div class="col-xs-12">
							<a href="project_add.php" class="btn">Add project <i class="fa fa-plus-square-o"></i></a>
						</div>

						<?php foreach($project->readProjects() as $row) { ?>
							<div class="col-xs-12 col-sm-6">
								<div class="item">
									<a href="project.php?id=<?php echo $row['project_id']; ?>">
										<img src="../../album/<?php echo $row['img_url']; ?>">
										<div class="item-inner">
											<h4><?php echo limit_text($row["title"], 15); ?></h4>
											<a href="project_edit.php?id=<?php echo $row["project_id"]; ?>"><button>Bewerk <i class="fa fa-pencil-square-o"></i></button></a>
											<a href="project_delete.php?id=<?php echo $row["project_id"]; ?>"><button>Verwijder <i class="fa fa-trash"></i></button></a>
										</div>
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</section>
			</div>
	<?php require(PATH_BASE . "/includes/footer.php"); ?>
