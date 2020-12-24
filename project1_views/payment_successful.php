<div class="container-main">
	<div class="congratulations">
		<h1 class="head2">Поповнення пройшло успішно!</h1>
		<h3>Авторизуйтесь заново, щоб мати можливість купляти фільми!</h3>
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
                $_SESSION['budget'] = $user['budget'];
                $_SESSION['auth'] = $user;
            }
            else {
                echo "Error!";
            } 
        } ?>
        <form action="" method="POST">
	        <label for="budget">В гаманці:
	            <input type="text" name ="budget" placeholder = <?php echo $_SESSION['budget']?> disabled> грн.<br> 
	        </label>
	    </form>	 
		<a href="project1_index.php?action=main"><h2>На головну</h2></a>
	</div>
<div>