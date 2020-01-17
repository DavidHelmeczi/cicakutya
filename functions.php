<?php $movies = json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->movies;
	
function durata($runtime){
                            $ore=0; $minute=$runtime;
                            while($minute>=60){
                                $ore++;
                                $minute-=60;}
                                echo "$ore ore $minute minute";
                        }
        
                        function is_image($url){
                            $headers=get_headers($url);
                            return stripos($headers[0],"200 OK")?true:false;
                         }
        
                         if(isset($_COOKIE["longest-movie-length"]) and $_COOKIE['longest-movie-length'] and $_COOKIE['longest-movie-length'] != " "){
                            $lungu = $_COOKIE["longest-movie-length"];} 
                            else {
                                $lungu=0;
                               foreach ($movies as $movie){
                                   $runtime=$movie->runtime;
                                   if($runtime>$lungu){
                                       $lungu=$runtime;
                                   }}
                            setcookie("longest-movie-length", $lungu);}
        
  
    if(isset($_GET['genre']) and $_GET['genre'] and $_GET['genre'] != " "){
    $genreGet = $_GET['genre'];
    function get_movie_genre($value){
    if(in_array($_GET['genre'], $value->genres)){
        return True;
    }
    
    else{return False;}}?>
    <?php
    $movies=array_filter($movies, "get_movie_genre");
    if(count($movies) > 0){?> 
    <h1>Filme din genul: <?php echo $_GET['genre'];?> </h1> 
    <?php }
    else { ?><h2>Nu exista genul selectat. <a href="archive.php">Inapoi</a> la archiva</h2>  <?php  }
    }

    if(isset($_GET['s']) and $_GET['s'] and $_GET['s'] != " "){

        function cautare($movie, $decautat){
            $titlu=$movie->title;
            if(stripos($titlu, $decautat) !== false){return true;}}}

 $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
=== FALSE ? 'http' : 'https';
$host     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$params   = $_SERVER['QUERY_STRING'];
$currentUrl = $protocol . '://' . $host . $script . '?' . $params;