<?php 
session_start();?>
<div class="container-main">
	<div class="container-film">
<?php $mysqli = new mysqli ("localhost","root", "", "project1");
if ($mysqli->connect_errno != 0) {
    die($mysqli->connect_error);
}
$mysqli->query("SET NAMES 'utf8'");
$result_set = $mysqli->query("SELECT * FROM `films`");?>
  

<?php
echo'<div class="film-title">'."Назва фільму".'</div>';
echo'<div class="film-description-title">'."Опис фільму".'</div>';
echo'<div class="film-cost">'."Ціна".'</div>'; ?>
<hr color="#808080">
<?php echo "<br />";
while (($row = $result_set->fetch_assoc()) != false) { 
	echo'<div class="film-title">'.$row['film_title'].'</div>';
	echo'<div class="film-description">'.$row['film_description'].'</div>';
	echo'<div class="film-cost">'.$row['film_cost'].'</div>';
	echo "<br />";
	echo "<br />"; ?>
	<hr color="#808080">
	<?php echo "<br />";
	echo "<br />"; 
} ?>

<?php $mysqli->close(); ?>
</div>
</div>



