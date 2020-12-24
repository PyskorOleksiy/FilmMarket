<?php 
session_start();?>
<div class="container-main">
	<div class="purchase">
	<h1 class="head2">Список фільмів доступних для покупки</h1>
	<?php
	$mysqli = new mysqli ("localhost","root", "", "project1");
    if ($mysqli->connect_errno != 0) {
        die($mysqli->connect_error);
    }
    if (isset($_POST['login']) and isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $query1 = $mysqli->query("SELECT * FROM users WHERE login='$login'");
        $user = $query1->fetch_assoc();
        if(password_verify($password, $user['password'])) {
            setcookie('auth', $user['login'], time() + 3600 * 24 * 365);
            $_SESSION['login'] = $user['login'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['budget'] = $user['budget'];
            $_SESSION['auth'] = $user; ?>
            Вітаємо, <?php /*echo $_SESSION['login'];*/ echo $_SESSION['admin']; ?>! Ви успішно авторизувались на нашому сайті!<br>
            Можете перейти <a href="project1_index.php?action=main">на головну</a> сторінку. 
            <p></p>
            <?php }
            else {
                echo "Error!";
            } 
    } ?>
    <form action="" method="POST">
    	<label for="budget">В гаманці:
    		<input type="text" name ="budget" placeholder = <?php echo $_SESSION['budget']?> disabled> грн.<br> 
    	</label>
	</form>	
	<p></p>
	Хочете придбати фільм? Натисніть на кнопку КУПИТИ під вибраним фільмом.
    
    <?php 
    $budget = $_SESSION['budget']; 
    $s = $_SESSION['id'];
    $admin = $_SESSION['admin']; ?>
    <div class="container-film-buy">
    <?php
    echo'<div class="film-title">'."Назва фільму".'</div>';
    echo'<div class="film-description-title">'."Опис фільму".'</div>';
    echo'<div class="film-cost">'."Ціна".'</div>'; ?>
    <hr color="#808080">
    <?php echo "<br />";	
    $query3 = $mysqli->query("SELECT * FROM `films` WHERE film_id = '1'");
    $user2 = $query3->fetch_assoc();
    $_SESSION['film_id'] = $user2['film_id'];
    $_SESSION['film_title'] = $user2['film_title'];
    $_SESSION['film_description'] = $user2['film_description'];
    $_SESSION['film_cost'] = $user2['film_cost'];
    $_SESSION['film_mark'] = $user2['film_mark'];
    $_SESSION['mark_count'] = $user2['mark_count'];
    $film_id1 = $_SESSION['film_id'];
    $film_title1 = $_SESSION['film_title'];
    $film_description1 = $_SESSION['film_description'];
    $film_cost1 = $_SESSION['film_cost'];
    $submit1 = $_POST['submit1'];
    ?>
	<?php 
	echo'<div class="film-title">'.$film_title1.'</div>';
	echo'<div class="film-description">'.$film_description1.'</div>';
	echo'<div class="film-cost">'.$film_cost1.'</div>';
	echo "<br />";
	?>
	<form action="" method="POST">
		<lable>
			<input class="button" type="submit" name="submit1" value="Купити">
        </lable>
    </form>
	<hr color="#808080">
	<?php echo "<br />";
	echo "<br />";  
    ?>

    <?php
    $query3 = $mysqli->query("SELECT * FROM `films` WHERE film_id = '2'");
    $user2 = $query3->fetch_assoc();
    $_SESSION['film_id'] = $user2['film_id'];
    $_SESSION['film_title'] = $user2['film_title'];
    $_SESSION['film_description'] = $user2['film_description'];
    $_SESSION['film_cost'] = $user2['film_cost'];
    $film_id2 = $_SESSION['film_id'];
    $film_title2 = $_SESSION['film_title'];
    $film_description2 = $_SESSION['film_description'];
    $film_cost2 = $_SESSION['film_cost'];
    $submit2 = $_POST['submit2'];
	?>
	<?php 
	echo'<div class="film-title">'.$film_title2.'</div>';
	echo'<div class="film-description">'.$film_description2.'</div>';
	echo'<div class="film-cost">'.$film_cost2.'</div>';
	echo "<br />";
	?>
	<form action="" method="POST">
        <lable>
            <input class="button" type="submit" name="submit2" value="Купити">
        </lable> 
    </form>
    <hr color="#808080">
	<?php echo "<br />";
	echo "<br />";  
    ?>

    <?php
    $query3 = $mysqli->query("SELECT * FROM `films` WHERE film_id = '3'");
    $user2 = $query3->fetch_assoc();
    $_SESSION['film_id'] = $user2['film_id'];
    $_SESSION['film_title'] = $user2['film_title'];
    $_SESSION['film_description'] = $user2['film_description'];
    $_SESSION['film_cost'] = $user2['film_cost'];
    $film_id3 = $_SESSION['film_id'];
    $film_title3 = $_SESSION['film_title'];
    $film_description3 = $_SESSION['film_description'];
    $film_cost3 = $_SESSION['film_cost'];
    $submit3 = $_POST['submit3'];
	?>
	<?php 
	echo'<div class="film-title">'.$film_title3.'</div>';
	echo'<div class="film-description">'.$film_description3.'</div>';
	echo'<div class="film-cost">'.$film_cost3.'</div>';
	echo "<br />";
	?>
	<form action="" method="POST">
        <lable>
            <input class="button" type="submit" name="submit3" value="Купити">
        </lable> 
    </form>
    <hr color="#808080">
	<?php echo "<br />";
	echo "<br />";  
    ?>

    <?php
    $success = 0;
    if ($budget >= $film_cost1 or $admin == 1) {
        if ($submit1) {
            if ($admin == 1) {
                $film_id = $film_id1;
                $film_title = $film_title1; 
                $film_cost = $film_cost1;
                $success++;
            }
            else {
                $budget -= $film_cost1;
                $_SESSION['budget'] = $budget;
                $film_id = $film_id1;
                $film_title = $film_title1;
                $film_cost = $film_cost1;
                $success++;
            }
        }
        else if ($submit2) {
            if ($admin == 1) {
                $film_id = $film_id2;
                $film_title = $film_title2;
                $film_cost = $film_cost2;
                $success++;
            }
            else if ($admin == 0 and $budget >= $film_cost2) {
                $budget -= $film_cost2;
                $_SESSION['budget'] = $budget;
                $film_id = $film_id2;
                $film_title = $film_title2;
                $film_cost = $film_cost2;
                $success++;
            }
            else {
                echo "У вашому гаманці недостатньо коштів!";
            }
        }
        else if ($submit3) {
            if ($admin == 1) {
                $film_id = $film_id3;
                $film_title = $film_title3;
                $film_cost = $film_cost3;
                $success++;
            }
            else if ($budget >= $film_cost3) {
                $budget -= $film_cost3;
                $_SESSION['budget'] = $budget;
                $film_id = $film_id3;
                $film_title = $film_title3;
                $film_cost = $film_cost3;
                $success++;       
            }
            else {
                echo "У вашому гаманці недостатньо коштів!";
            }
        }    	
        if($success == 1) { ?>
            <script type="text/javascript">
                setTimeout(function(){window.location.href="project1_index.php?action=film_purchase_successful";  }, 1000);
            </script>
            <?php 
            $mysqli = new mysqli ("localhost","root", "", "project1");
            if ($mysqli->connect_errno != 0) {
                die($mysqli->connect_error);
            }
            $mysqli->query("SET NAMES 'utf8'");
            $mysqli->query("INSERT INTO `purchases` (`user_id`, `film_id`, `purchase_price`) VALUES ('$s', ' $film_id', '$film_cost')");
            $mysqli->query("UPDATE `users` SET `budget` = '$budget' WHERE `id` = $s");
            $mysqli->query("INSERT INTO `film_titles1` (`user_id`, `film_title`) VALUES ('$s', '$film_title')");
            $mysqli->close();
        }
    }
    else {
        echo "У вашому гаманці недостатньо коштів!";
    } ?>
    <?php
    echo "<br />";
    echo "<br />";
    echo "<br />";
    echo "<br />"; 
    ?>
    </div>
    </div>
</div>
