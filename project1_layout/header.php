<div class="container1">
	<?php	
	if ($_SESSION['auth'] == true) { ?>
    <h1 class="head1">FilmMarket.com</h1>
	<div class="container-inner">
	<a class="golovna" href="project1_index.php?action=main" target="">Головна</a>
    </div>
    <div class="container-inner">
	<a class="other" href="project1_index.php?action=about" target="">Про нас</a>
    </div>
    <div class="container-inner">
	<a class="other" href="project1_index.php?action=news" target="">Новини</a>
    </div>
    <div class="container-inner">
	<a class="other" href="project1_index.php?action=films_buy" target="">Фільми</a>
    </div>
    <div class="container-inner">
	<a class="other" href="project1_index.php?action=budget" target="">Гаманець</a>
    </div>
    <a class="enter" href="project1_index.php?action=logout" target="">Вихід</a>
    <?php }
else { ?>
	<h1 class="head1">FilmMarket.com</h1>
	<div class="container-inner">
	<a class="golovna" href="project1_index.php?action=main" target="">Головна</a>
    </div>
    <div class="container-inner">
	<a class="other" href="project1_index.php?action=about" target="">Про нас</a>
    </div>
    <div class="container-inner">
	<a class="other" href="project1_index.php?action=news" target="">Новини</a>
    </div>
    <div class="container-inner">
	<a class="other" href="project1_index.php?action=films" target="">Фільми</a>
    </div>
    <a class="enter" href="project1_index.php?action=login" target="">Вхід</a>
    <a class="autorization" href="project1_index.php?action=registration" target="">Реєстрація</a>
	<?php } ?>
</div>