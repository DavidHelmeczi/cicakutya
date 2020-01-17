
<?php
	
	$movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies;

	
	
	?>

<html lang="ro">
	<head>
	<?php if(!(isset($placeholder))){
		$placeholder=" ";} ?> 
	
	<style>

input[type="text"] {
  font-size: 17px;

}


::placeholder {
  color: red;
  opacity: 1;
  font-size: 12px;

}

:-ms-input-placeholder { 
 color: red;
 font-size: 12px;

}

::-ms-input-placeholder { 
 color: red;
 font-size: 12px;

}
</style>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title> Archiva filme </title>
		<meta charset="utf-8">
		<title>Tema 5</title>
		<div class="navbar">
		<img src="images/logo.png" style="width:48px;height:48px;">
		<a href="index.php">Home</a>
		<a href="archive.php">Archiva</a>
		<a href="genres.php">Categorii</a>
		<a href="contact.php">Contact</a>
		<div class="searchbar_container">
			<form action="search_results.php" method="get">
			<input type="text" placeholder="<?php echo $placeholder ?>" name="s">
			<button type="submit">Cautare</button>
			</form>
		</div>
		</div> 
	

		<?php require("functions.php"); ?>
	</head>

	<body>
	
