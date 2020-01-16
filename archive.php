<?php require_once("header.php") ?>
<?php 
   $totiactori=array(); ?>
		<ul>
			<?php


foreach ($movies as $movie){
require("archive-movie.php");?>
<div class="plot"><?php
if(strlen($plot) > 100){ echo $plotscurt;} else { echo $plot;}?></div><?php
						 foreach($actori as $actor){
							 array_push($totiactori, $actor);
							}?>
						<div class='buton'>
						<a href="single.php?movie_id=<?php echo $movieId;?>">Mai multe detalii</a></div>
			
						</div>
						

						
</div>
				</li>

<?php } 
			
			$totiactori=array_unique($totiactori);
			sort($totiactori);?>
		</ul>
		<?php if(count($totiactori)>0){ ?>
		<div class='fixed-sidebar-text'>
	<?php foreach($totiactori as $actor)
	print nl2br("$actor \n");}?>
</div>
		

<?php require_once("footer.php") ?>
 