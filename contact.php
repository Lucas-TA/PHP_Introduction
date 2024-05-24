<?php 
	//initialize
		$name = $email = $subject = $message = '';
		$errors = ''; //$errors is separeted to reinforce that it is doing a different job
	//Process Submitted form
	if (array_key_exists("send", $_POST)) {
		//Read Data
			$name = trim($_POST["name"]);
			$email = trim($_POST["email"]);
			$subject = trim($_POST["subject"]);
			$message = trim($_POST["message"]);

		//Check Data
			$errors = array();

			if (!$name) $errors[] = 'Missing Name';
				elseif (preg_match('/\r|\n/', $name)) 
				$errors[] = 'Invalid name';

			if (!$email) $errors[] = 'Missing Email Address';
				elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
				$errors[] = 'Invalid Email Address';

			if (!$subject) $errors[] = 'Missing Subject';
				elseif (preg_match('/\r|\n/', $subject)) 
				$errors[] = 'Invalid subject';

			if (!$message) $errors[] = 'Missing Message';

	if (!$errors) { //If no errors, Send Email

	}
	else { //Else, Report Errors
		$errors = sprintf('<p class="errors">%s</p>',
					implode('<br>', $errors));
	}

		

	};
?>
<?php
	//	Page Title and Heading
		$pagetitle = 'Contact';
		$pageheading = 'Contact Us';

	require_once 'includes/head.inc.php';
?>
<body>
<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'includes/nav.inc.php'; ?>
	<main>
		<article id="contact">
<!-- if not sent: -->
			<form id="contact-form" method="get" action="/resources/testform.css" novalidate>
				<?= $errors ?>
				<p><label for="name">Name:</label>
					<input name="name" id="name" type="text" value="<?= $name ?>">
				</p>
				<p><label for="email">Email:</label>
					<input name="email" id="email" type="text" value="<?= $email ?>">
				</p>
				<p><label for="subject">Subject:</label>
					<input name="subject" id="subject" type="text" value="<?= $subject ?>">
				</p>
				<p><label for="message">Message:</label>
					<textarea name="message" id="message"><?= $message ?></textarea>
				<p><button type="submit" name="send">Send Message</button></p>
			</form>
<!-- else:
			<p>Thank you for your message.</p>
			<p>Now, <a href="/">go away …</a>.</p>
endif -->
		</article>
<?php require_once 'includes/aside.inc.php'; ?>

	</main>
<?php require_once 'includes/footer.inc.php'; ?>
</body>
</html>
