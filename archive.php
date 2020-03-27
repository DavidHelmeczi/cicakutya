<?php require_once("header.php") ?>
<style>
.Container{
  max-width: 500px;
  margin: auto;
  background-color: rgba(0,0,0,0.5);
  font-size: 20px;
  padding: 265px;
  padding-top: 0px;
  padding-bottom: 40px;
}
.fixed-sidebar-text{
	background-color: rgba(0,0,0,0.5);
}
</style>
<?php 
   $totiactori=array(); ?>
		<ul>
			<?php


foreach ($movies as $movie){
require("archive-movie.php");?>
<div class= "Container">
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
 </div>