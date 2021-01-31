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
						<div class="col-xs-12">
							<h3>Welkom, Rosana.</h3>
							<p>Het is vandaag <?php echo date('d, D M Y'); ?>.</p>
						</div>
					</div>
				</section>
			</div>
		<?php require(PATH_BASE . "/includes/footer.php"); ?>