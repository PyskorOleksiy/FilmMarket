<?php
//setcookie('auth', $user['login'], time()-3600);

if ($_SESSION['auth'] == true) {
	session_destroy();
	?>
	<script type="text/javascript">
	setTimeout(function(){window.location.href="project1_index.php?action=main";  }, 1000);
    </script>
<?php }
else { ?>
	<h1 class="head2">Error!</h1>
<?php } ?>