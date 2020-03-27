<?php require_once("header.php");?>
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
  
}
td a{
    text-decoration: none;
	font-size: 40px;
}
tr{
	font-size: 50px;
}
    
</style><?php
$genres=json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->genres;
$filme = 0;
$genuri = 0;
foreach ($movies as $movie){
    $filme++;}

foreach ($genres as $gen) {
    $genuri++;
}

?> <h1 align="center">Bine ati venit! </h1><h2 align="center"> Vă punem la dispoziție o bază de <?php echo $filme ?> de filme împărțite pe <?php echo $genuri ?> genuri. </h2>
<?php $noi=array();
$vechi=array();
$noi=array();

$tot=array_column($movies, 'title', 'id');
$noi=$vechi=array_column($movies, 'year', 'id');

asort($vechi);
arsort($noi);
$vechi= array_slice($vechi, 0, 10, true);
$noi= array_slice($noi, 0, 10, true);

$keysnoi = array_keys($noi);
$keysvechi = array_keys($vechi);
?>

<table bgcolor="#555" align="center" style="width:max-content">
  <tr>
    <th>Cele mai noi filme</th>
    <th>Cele mai vechi filme</th> 
  </tr>
  <?php for($i=0;$i<10;$i++){ ?>
  <tr>
    <td><a href="single.php?movie_id=<?php echo $keysnoi[$i];?>"><?php echo $tot[$keysnoi[$i]] ;?> </a><?php echo  $noi[$keysnoi[$i]] ; ?></td>
    <td><a href="single.php?movie_id=<?php echo $keysvechi[$i];?>"><?php echo $tot[$keysvechi[$i]] ;?> </a><?php echo  $vechi[$keysvechi[$i]] ; ?></td>
  </tr> <?php  }; ?>
  

<?php require_once("footer.php")?>