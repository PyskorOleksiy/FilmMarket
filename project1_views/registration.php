<?php
session_start();
$submit = $_POST['submit'];
$login = $_POST['login'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];
$email = $_POST['email'];
$country = $_POST['country'];
$success = 0; 
?>

<div class="container-main">
    <div class="registration">
        <h1 class="head2">Реєстрація</h1>
        <?php  if(!empty($_POST)) {
            if (preg_match('/^[a-zA-Zа-яА-Я0-9\-\_]/', $login)) {
                $success++;
            }
            else if (!preg_match('/^[a-zA-Zа-яА-Я0-9\-\_]{4,}$/', $login)) {
                echo "Логін - не менше 4 літер, може містити лише латинські та кириличні літери (великі та малі), цифри, нижнє підкреслення та дефіс!";
            }
            
            if (preg_match('/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,})$/', $password)) {
                $success++; 
            }
            else if (!preg_match('/^((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{7,})$/', $password)) {
                ?> <p></p>
                <?php echo "Пароль - не менше 7 літер, обов’язково має містити великі та малі літери, а також цифри!";
            }
            
            if ($repeat_password == $password) {
                $success++;
            }
            else if ($repeat_password != $password) {
                ?> <p></p> 
                <?php echo "Повторіть пароль - значення має співпадати з полем Пароль!";
            }
        
            if(preg_match('/^[a-zA-Z0-9\.\-_]{2,}@[a-zA-Z0-9\-_]{2,}\.[a-z]{2,3}$/', $email))  {
                $success++;
            }
            else if(!preg_match('/^[a-zA-Z0-9\.\-_]{2,}@[a-zA-Z0-9\-_]{2,}\.[a-z]{2,3}$/', $email)) {
                ?> <p></p>
                <?php echo "Електронна пошта - має бути коректною Email-адресою, наприклад, містити символ @!";
            }
            
            if($success == 4) { 
            ?>
                <script type="text/javascript">
                setTimeout(function(){window.location.href="project1_index.php?action=successful";  }, 1000);
                </script>
                <?php 
                $mysqli = new mysqli ("localhost","root", "", "project1");
                if ($mysqli->connect_errno != 0) {
                    die($mysqli->connect_error);
                }
                $mysqli->query("SET NAMES 'utf8'");
            $mysqli->query("INSERT INTO `users` (`login`, `password`, `email`, `country`) VALUES ('$login', '".password_hash("$password", CRYPT_BLOWFISH)."', '$email', '$country')");
                $mysqli->query("UPDATE `users` SET `admin` = '1' WHERE `id` = 4");
                $mysqli->close();
            }
        }  
?>
<form action="" method="POST">
	<label for="login">Логін:
	<input type="text" name ="login" placeholder ="Введіть логін" required><br>
	</label>
	<label for="password">Пароль:
	<input type="password" name ="password" placeholder="*******" required><br>
	</label>
    <label for="repeat_password">Повторіть пароль:
    <input type="password" name ="repeat_password" placeholder="*******" required><br>
    </label>
	<label for="email">Email:
	<input type="text" name="email" placeholder="Введіть email" required><br>
	</label>
    <p></p>
    <lable for="country">Країна:
    <select method="POST" name="country" size="3" required>
    <option disabled>Оберіть країну</option>
    <?php require_once("country.php"); 
    for ($i = 0; $i < 10; $i++) { ?>
    <option <?php echo $code[$i]; ?>><?php echo $country[$i]; } ?></option>
    </select>
    </lable>
    <p></p>         
    <lable>
	<input class="button" type="submit" name="submit" value="Реєстрація">
    </lable> 
</form>
</div>
</div>