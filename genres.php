<?php require_once("header.php")?>
<?php $genres=json_decode(file_get_contents('https://raw.githubusercontent.com/yegor-sytnyk/movies-list/master/db.json'))->genres;?>
<style>
    .genre {
    width: 33%;
    height: 25vh;
    display: inline-block;
    color: #37c383;
    text-align: center;
    vertical-align: center;
    line-height: 25vh;
    text-decoration:none;
} </style>
<div class="row">
<?php foreach($genres as $genre){ ?>
 <a href="archive.php?genre=<?php echo $genre; ?>"class="genre" style="background-color:#<?php echo rand(10,99)?>0444">
 <?php echo $genre; ?></a>
<?php } ?>
</div>

<?php require_once("footer.php")?>