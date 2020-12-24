<div class="container-main">
    <div class="autorization-form">
        <h1 class="head2">Вхід на сайт</h1>
        <?php
        session_start();
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
                Вітаємо, <?php echo $_SESSION['login']; ?>! Ви успішно авторизувались на нашому сайті!<br>
                Можете перейти <a href="project1_index.php?action=main">на головну</a> сторінку. 
                <p></p>
            <?php }
            else {
                echo "Error!";
            } 
        }
        $mysqli->close(); 
        ?>


<form action="" method="POST">
	<label for="login">Логін:
	<input type="text" name ="login" placeholder ="Введіть логін" required><br>
	</label>
	<p></p>
	<label for="password">Пароль:
	<input type="password" name ="password" placeholder="*******" required><br>
	</label>
	<p></p>
	<lable>
	<input class="button" type="submit" name="submit" value="Увійти">
    </lable>
</form>	
</div>
</div>