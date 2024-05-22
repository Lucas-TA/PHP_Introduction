<?php require_once 'includes/aside.code.php'; ?>
<?php
	//	Page Title and Heading
		$pagetitle = 'About';
		$pageheading = 'About this Site';

	require_once 'includes/head.inc.php';
?>
<body>
<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/nav.inc.php'; ?>
	<main>
		<article id="about">
			<p>This site is the sample site for the book <strong>Introduction to PHP</strong>:</p>
				<a target="blank" href="https://link.springer.com/book/10.1007/979-8-8688-0177-8">
					<img src="https://media.springernature.com/full/springer-static/cover-hires/book/979-8-8688-0177-8?as=webp" width="50%">
				</a>.</p>
			<p>You can download the <a href="/sample.zip">Sample Files</a> to work through the book samples.</p>
			<p>Images were gathered from Wikipedia, and are distributed
				under a license which permits this sort of thing.</p>
		</article>
		<?php require_once 'includes/aside.inc.php'; ?>
	</main>
<?php require_once 'includes/footer.inc.php'; ?>
</body>
</html>
