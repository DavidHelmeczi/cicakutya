<?php 
if (strlen($_GET['s']) < 3){$placeholder = "Folosiți cel puțin 3 caractere în câmpul de căutare";} else {$placeholder = " ";}
require_once "header.php"; ?>

		<ul>
<?php 
$moviesfiltrate=array();

if (strlen($_GET['s']) >= 3){

foreach($movies as $movie){if(cautare($movie, $_GET['s'])){array_push($moviesfiltrate, $movie);}}

if(count($moviesfiltrate)>0){
	?> <h2>Rezultatele cautarii pentru: <?php echo $_GET['s']; ?></h2><?php

foreach ($moviesfiltrate as $movie){
				require("archive-movie.php");?>
				<div class="plot"><?php
				if(strlen($plot) > 100){ echo $plotscurt;} else { echo $plot;}?></div>
                        <div class='buton'>
						<a href="single.php?movie_id=<?php echo $movieId;?>">Mai multe detalii</a></div>
					</div>
</div>
				</li>

<?php } ?>
</ul><?php } else { ?><h2>Nu exista rezultate pentru "<?php echo $_GET['s'] ?>". Va rugam sa schimbati criteria de cautare.</h2><?php }} ?>


<?php require_once "footer.php"; ?>