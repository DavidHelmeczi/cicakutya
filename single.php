<?php $movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies; ?>
<style>
.content {
  max-width: 500px;
  margin: auto;
  background-image: linear-gradient(to bottom, rgba(255,255,255,0), rgba(0,0,0,1));
  font-size: 20px;
  padding: 300px;
  padding-top: 0px;
  padding-bottom: 40px;
}
</style>

<?php require_once("header.php")?>

<div class="content">

<?php 
 
error_reporting(0);
session_start();

$dbServername = "127.0.0.1";
$dbUsername = "root";
$dbPasswd = "";
$dbName = "ratingsystem";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPasswd, $dbName);

if(!$conn){
    echo "<p>Couldn't connect to Database!</p>";
}	
if ( ! empty( $_POST ) ) {
    $_SESSION["POST"] = $_POST;
      if ( ! headers_sent() ) {
        header( "location: " . $currentUrl, true, 303 );
        die();
    }
}


if ( isset( $_SESSION["POST"] ) ) {
    $_POST = $_SESSION["POST"];
     $_SERVER['REQUEST_METHOD'] = 'POST';
}


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



 ?>

    <form action="<?php echo $currentUrl?>" method="post">
    <p>Rate : </p>
      <input type="radio" name="rate" value="1"> 1
      <input type="radio" name="rate" value="2"> 2
      <input type="radio" name="rate" value="3"> 3
      <input type="radio" name="rate" value="4"> 4
      <input type="radio" name="rate" value="5"> 5
    <br>
      <input type="submit" name="submit" value="Trimite" >
    </form>
	<?php
			$titlu = $movie->title;
			$RateGiven = null;
			
				if(isset($_POST['submit'])){
					
				$RateGiven = $_POST['rate'];
				}
			
			if($RateGiven!=null){
				$sql = "INSERT INTO stars (ID, movieName, rateGiven) VALUES ('$movieId', '$titlu', '$RateGiven');";
			}
			
      $result = mysqli_query($conn, $sql);	
      $averageRatingQuery = "SELECT ID, ROUND(AVG(rateGiven),2) FROM `stars` WHERE ID=$movieId GROUP BY ID";
      $averageRating = mysqli_query($conn, $averageRatingQuery);
      $row = mysqli_fetch_assoc($averageRating);
     if($row["ROUND(AVG(rateGiven),2)"]!=NULL){
        echo 'Punctajul medie este ', $row["ROUND(AVG(rateGiven),2)"], "<br>";} elseif($conn) echo "Fii primul care acorda punctaj! <br>";
        if(!$conn){
          echo "<p>Conexiunea la baza de date n-a putut fi realizata</p>";
      }	
			
	  ?>
    
<br><div class="plot"><?php
echo $plot;?></div><?php
					 if($director != "N/A"){?>
						<div class='director'><?php echo "<br> Director: $director" ?></div><?php } ?>
                        <div class='genuri'><?php echo "<br> Genuri: "; foreach($genre as $gen){$i++;if($i==sizeof($genre)){echo "$gen" ;} else echo "$gen, ";}?> </div>
                        <div class= 'actori'>
						<?php 
						echo "<br> Actori: ";
						foreach($actori as $actor){
							print nl2br("$actor \n");} ?>
                        </div> <?php 
						}?>
</div></div><?php
} else { ?>
<h2>Nu exista filmul selectat. <a href="archive.php">Inapoi</a> la archiva</h2> <?php }

unset( $_SESSION["POST"] );
?>
<?php require_once("footer.php")?>
</div>
