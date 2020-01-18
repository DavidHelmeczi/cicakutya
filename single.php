<?php require_once("header.php")?>
<?php  




	$movieId=$_GET['movie_id'];
    if(isset($movieId) && $movieId && $movieId != ""){
        function get_movie($value){
            global $movieId;
            if($movieId == $value->id){
                return true;
            }
            else {return false;
        }}
    }
	
$moviesFiltered = array_filter($movies, "get_movie");
if(count($moviesFiltered) > 0){
    $movies = $moviesFiltered;
    foreach ($movies as $movie){$director=$movie->director;
		$actori=explode(", ", $movie->actors);
    require("archive-movie.php");
    $i=0;

    if(!isset($ratings["$movie->title"])){ 
      $average_rating = "Fii primul care acordă o notă acestui film";
      $ratings["$movie->title"][0]=" ";
    }  
    else{
$average_rating = substr(array_sum($ratings["$movie->title"])/(count($ratings["$movie->title"])-1),0,4);
}

 ?>



    <form action="<?php echo $currentUrl?>" method="post">
    <p>Rate:<?php echo " $average_rating" ?> </p>
      <input type="radio" name="rating" value="1"> 1
      <input type="radio" name="rating" value="2"> 2
      <input type="radio" name="rating" value="3"> 3
      <input type="radio" name="rating" value="4"> 4
      <input type="radio" name="rating" value="5"> 5
    <br>
      <input type="submit" value="Trimite" >
      
    </form><?php
    array_push($ratings["$movie->title"], $_POST["rating"]);
    $json_data = json_encode($ratings);
file_put_contents('movies_rating.json', $json_data);
     



       
					 if($director != "N/A"){?>
						<div class='director'><?php echo "<br> Director: $director" ?></div><?php } ?>
                        <div class='genuri'><?php echo "<br> Genuri: "; foreach($genre as $gen){$i++;if($i==sizeof($genre)){echo "$gen" ;} else echo "$gen, ";}?> </div>
                        <div class= 'actori'>
						<?php 
						echo "<br> Actori: ";
						foreach($actori as $actor){
							print nl2br("$actor \n");} ?>
                        </div> <?php echo "<br> $plot";
						}?>
</div></div><?php
} else { ?>
<h2>Nu exista filmul selectat. <a href="archive.php">Inapoi</a> la archiva</h2> <?php }
?>
<?php require_once("footer.php")?>