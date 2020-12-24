<?php 
session_start();
?>
<div class="container-main">
	<div class="payment">
		<h1 class="head2">Ваш бюджет на акаунті</h1>
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
	    Для поповнення рахунку заповніть форму і натисніть на кнопку ПОПОВНИТИ.

    <?php  
    $s = $_SESSION['id'];
    $r = $_SESSION['budget'];

    $submit1 = $_POST['submit1'];
    $payment_method = $_POST['payment_method'];
    $card_number = $_POST['card_number'];
    $code = $_POST['code'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone_number = $_POST['phone_number'];
    $budget = $_POST['budget'];
    $payment_sum = $_POST['payment_sum'];
    $success = 0;   
    ?>
    <h1 class="head2">Ваші платіжні дані</h1>
        <?php
        if(!empty($_POST)) {
        	$query2 = $mysqli->query("SELECT * FROM card_monies WHERE card_number='$card_number'");
            $user1 = $query2->fetch_assoc();
            if($payment_method == $user1['payment_method'] and password_verify($code, $user1['card_code'])) {
            	$success++;
            	$_SESSION['user_monies'] = $user1['user_monies'];
            }
            else {
            	echo "Ви ввели неправильний код банківської карти або неправильний номер карти!";
        	    
            }
            if ($budget <= $_SESSION['user_monies']) {
            	$success++;
            }
            else {
            	echo "У вас недостатньо коштів на рахунку!";
            } 
        	$payment_sum = $budget;
        	$success++;
        	$user_monies = $_SESSION['user_monies'];
        	$user_monies -= $payment_sum;
            $success++;
        	$budget += $r;
        	$_SESSION['budget'] = $budget;
        	$success++;
            if (preg_match('/^[0-9]{13,19}$/', $card_number)) {
                $success++; 
                //1234567891234567-User1 123
                //1234567891234568-User2 234
                //1234567891234569-User3 345
                //1234567891234561-User4 456
                //1234567891234562-User5 567
                //1234567891234563-User6 678
            }
            else if (!preg_match('/^[0-9]{13,19}$/', $card_number)) {
                ?> <p></p>
                <?php echo "Номер банківської карти має містити 13-19 цифр!";
            }
        	if (preg_match('/^[0-9]{3}$/', $code)) {
                $success++; 
            }
            else if (!preg_match('/^[0-9]{3}$/', $code)) {
                ?> <p></p>
                <?php echo "Код банківської карти має містити 3 цифри!";
            }
            if(preg_match('/^\+380[0-9]{9}$/', $phone_number))  {
                $success++;
            }
            else if(!preg_match('/^\+380[0-9]{9}$/', $phone_number)) {
                ?> <p></p>
                <?php echo "Номер телефону має бути коректним номером мобільного телефону, наприклад містити на початку символ +!";
            }
            if($success == 8) { 
            ?>
                <script type="text/javascript">
                setTimeout(function(){window.location.href="project1_index.php?action=payment_successful";  }, 1000);
                </script>
                <?php 
                $mysqli = new mysqli ("localhost","root", "", "project1");
                if ($mysqli->connect_errno != 0) {
                    die($mysqli->connect_error);
                }
                $mysqli->query("SET NAMES 'utf8'");
                $mysqli->query("INSERT INTO `card_datas` (`user_id`, `payment_method`, `card_number`, `code`, `name`, `surname`, `phone_number`, `payment_sum`) VALUES ('$s', '$payment_method', '$card_number', '".password_hash("$code", CRYPT_BLOWFISH)."', '$name', '$surname', '$phone_number', '$payment_sum')");
                $mysqli->query("UPDATE `card_monies` SET `user_monies` = '$user_monies' WHERE `card_number` = $card_number");
                $mysqli->query("UPDATE `users` SET `budget` = '$budget' WHERE `id` = $s");
                /*$mysqli->query("UPDATE `card_monies` SET `user_monies` = '2' WHERE `card_code` = ".password_hash("123", CRYPT_BLOWFISH)."");*/
                /*$mysqli->query("INSERT INTO `card_monies` (`payment_method`, `card_number`, `card_code`, `user_monies`) VALUES ('Приват Банк', '1234567891234567', '".password_hash("456", CRYPT_BLOWFISH)."', '50')");
                $mysqli->query("INSERT INTO `card_monies` (`payment_method`, `card_number`, `card_code`, `user_monies`) VALUES ('Visa', '1234567891234568', '".password_hash("567", CRYPT_BLOWFISH)."', '60')");
                $mysqli->query("INSERT INTO `card_monies` (`payment_method`, `card_number`, `card_code`, `user_monies`) VALUES ('MasterCard', '1234567891234569', '".password_hash("678", CRYPT_BLOWFISH)."', '70')");*/
                $mysqli->close();
            }
        }  
?>

<form action="" method="POST">
	<label for="budget">Сума платежу:
	<input type="number" name ="budget" placeholder ="Введіть суму платежу" required><br>
	</label>
	<lable for="payment_method">Метод оплати:
    <select method="POST" name="payment_method" size="3" required>
    <option disabled>Оберіть метод оплати</option>
    <?php require_once("payment_method.php"); 
    for ($i = 0; $i < 4; $i++) { ?>
    <option><?php echo $payment_method[$i]; } ?></option>
    </select>
    </lable>
    <p></p>
    <label for="card_number">Номер карти:
	<input type="text" name ="card_number" placeholder ="Введіть номер карти" required><br>
	</label>
    <label for="code">Код карти:
    <input type="password" name ="code" placeholder="***" required><br>
    </label>         
	<label for="name">Ім'я:
	<input type="text" name ="name" placeholder ="Введіть ім'я" required><br>
	</label>
	<label for="surname">Прізвище:
	<input type="text" name ="surname" placeholder="Введіть прізвище" required><br>
	</label>
	<label for="phone_number">Номер телефону:
	<input type="text" name="phone_number" placeholder="Введіть номер телефону" required><br>
	</label>
    <p></p>
    <lable>
	<input class="button" type="submit" name="submit1" value="Поповнити">
    </lable> 
</form>
</div>
</div>

