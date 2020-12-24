<div class="container-main">
	<div class="congratulations">
		<h1 class="head2">Покупка фільму пройшло успішно!</h1>
		<?php $mysqli = new mysqli ("localhost","root", "", "project1");
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
                $_SESSION['id'] = $user['id'];
                $_SESSION['budget'] = $user['budget'];
                $_SESSION['auth'] = $user;
            }
            else {
                echo "Error!";
            } 
        } 
        $s = $_SESSION['id'];
        $submit_title = $_POST['submit_title'];

        $result_set = $mysqli->query("SELECT * FROM `film_titles1` WHERE user_id = '$s'");
        while (($row = $result_set->fetch_assoc()) != false) { ?>
        	<h3>Ваша покупка: <?php echo $row['film_title']; ?></h3>
        <?php } ?>
        <h3>Дякуємо за покупку фільму на нашому сайті! Приємного перегляду!</h3>
        <form action="" method="POST">
	        <label for="budget">В гаманці:
	            <input type="text" name ="budget" placeholder = <?php echo $_SESSION['budget']?> disabled> грн.<br> 
	        </label>
	    </form>	
        <form action="" method="POST">
        	<lable>
	            <input class="button" type="submit" name="submit_title" value="На головну">
            </lable> 
        </form>
        <?php
        if ($submit_title) { ?>
        	<script type="text/javascript">
                setTimeout(function(){window.location.href="project1_index.php?action=main";  }, 1000);
                </script>
                <?php 
                $mysqli = new mysqli ("localhost","root", "", "project1");
                if ($mysqli->connect_errno != 0) {
                    die($mysqli->connect_error);
                }
                $mysqli->query("SET NAMES 'utf8'");
                $mysqli->query("DELETE FROM `film_titles1` WHERE user_id = '$s'");
        }
        ?> 
	</div>
<div>