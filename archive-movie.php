            <?php
                $movieId = $movie->id;
				$movie_year=$movie->year;
				$genre=$movie->genres;
				$runtime=$movie->runtime;
				$actori=explode(", ", $movie->actors);
			    $plot=$movie->plot;
				
				if(@is_image("$movie->posterUrl")) $movie_image=$movie->posterUrl;
				else $movie_image='http://www.theprintworks.com/wp-content/themes/psBella/assets/img/film-poster-placeholder.png';
?>
				<li>
				<h2> <?php echo $movie->title; ?></h2>
				<img src="<?php echo $movie_image;?>">
<div class='text'>

					
					
					
					<div class='year'>
					<?php if($movie_year >= 2010) { ?>
						<strong>
							<?php echo $movie->year;
							
							 ?>
						</strong>
					<?php }else{
						echo $movie->year;
					} ?></div>
					
					
						<?php
						
						if(strlen($plot) > 100){
							$plotscurt=substr($plot,0,100)."...";
						} 
					
						
						?>
					</div>
					<?php $percentaj = ($runtime*100)/$lungu; echo "<br>" ?>
					<table style="width:200px; border: #777 2px solid;">
 					<tr>
  					<td style="background-color:#f00; height: 10px; width:<?php echo"$percentaj"?>%"></td>
 					 <td style="background-color:#555;"></td>
 					</tr>
					</table>
					
					<div class= 'durata'>
						<?php durata("$runtime")?></div> 


                        