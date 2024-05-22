<!-- begin head.inc.php -->
<?php 
	date_default_timezone_set('America/Sao_Paulo');
	$date = date('l, jS F Y g:i a');
	$timezone = date_default_timezone_get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="/favicon.png">

	<link rel="stylesheet" type="text/css" href="/styles/fonts.css">
	<link rel="stylesheet" type="text/css" href="/styles/styles.css">
	<link rel="stylesheet" type="text/css" href="/styles/lightbox.css">

	<script type="text/javascript" src="/scripts/lightbox.js" crossorigin="anonymous"></script>
	<script type="text/javascript" src="/scripts/script.js" crossorigin="anonymous" defer></script>
	<title>Australia Down Under<!-- page title --></title>
</head>
<!-- end head.inc.php -->
<body>
<!-- begin header.inc.php -->
	<header>
		<div id="banner"><span>Australia</span><span>Down Under</span></div>
		<h1>Australia Down Under</h1>
	</header>
<!-- end header.inc.php -->
<!-- begin nav.inc.php -->
	<nav>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About Oz</a></li>
			<li><a href="contact.php">Contact Us</a></li>
			<li><a href="bloglist.php">Oz Blog</a></li>
			<li><a href="gallery.php">Animals</a></li>
			<li><a href="admin.php">Administration</a></li>
		</ul>
	</nav>
<!-- end nav.inc.php -->
	<main>
		<article id="index">
			<p>G’day Mate. Or, as they say in English, Hello.</p>
			<p>Welcome to everything you need to know about Australia. Well, not necessarily everything, unless you don’t actually need to know very much at all, in which case this might be more than enough.</p>
			<p>Australia is a land of hope, which means that it is full of people hoping things will get better. Those who know better are called no hopers.</p>
			<p>Australia was discovered in 1776, which surprised a lot of indigenous people who thought it looked familiar.</p>
			<p>Actually it was discovered before that, but somehow forgotten by everybody who must have been terribly preoccupied.</p>
			<p>In fact it was discovered even before that but it was a long time ago so it no longer matters.</p>
		</article>
<!-- begin aside.inc.php -->
		<aside id="photo">
			[image]
			<h2>[title]</h2>
			<div>
				[description]
			</div>
		</aside>
<!-- end aside.inc.php -->
	</main>
<!-- begin footer.inc.php -->
		<footer>
			Copyright © Down Under <br><?= "$date($timezone)" ?>
		</footer>
<!-- end footer.inc.php -->
</body>
</html>
