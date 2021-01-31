<?php 

    define('PATH_BASE', dirname(dirname(__FILE__)));
    require(PATH_BASE . "/config/dbconfig.php");

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
							<button class="return" onclick="goBack()"><i class="fa fa-arrow-circle-o-left"></i> Terug</button>

							<h2>Album</h2>
							<p>Publish hier foto's voor in het album. De onderstaande afbeeldingen kunnen worden gewijzigd, en eventuel ook worden verwijderend.</p>

							<a href="album_add.php"><button>Voeg een foto toe.<i class="fa fa-plus-square-o"></i></button></a>
                            
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
                            
                            <?php foreach($album->readImages() as $row) { ?>
								<div class="item">	
									<h4><?php echo limit_text($row["title"], 15); ?></h4>
								    <span>
								    	<h6><?php echo $row["date"]; ?></h6>
								    	<h6><?php echo $row["author"]; ?></h6>
                                        <?php echo $row["img_url"]; ?>
								    </span>
									<span>
										<a href="album_edit.php?id=<?php echo $row["album_id"]; ?>"><button>Bewerk <i class="fa fa-pencil-square-o"></i></button></a>
										<a href="album_delete.php?id=<?php echo $row["album_id"]; ?>"><button>Verwijder <i class="fa fa-trash"></i></button></a>
									</span>
								</div>
							<?php } ?>
                            
						</div>
					</div>
				</div>
			</div>
		<?php require(PATH_BASE . "/includes/footer.php"); ?>