<?php 
	// Configuration
		$CONFIG['contact']['to'] = 'Lucas <dev.ascencao@gmail.com>';
	//initialize
		$name = $email = $subject = $message = '';
		$errors = ''; //$errors is separated to reinforce that it is doing a different job
		$sent = false;
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
		$to = $CONFIG['contact']['to'];
		//$subject already set
		$message = wordwrap($message, 70, "\r\n");
		// Format headers as a string
        $headers = "Date: " . date('r') . "\r\n";
        $headers .= "From: $email\r\n";
        $headers .= "Cc: $email\r\n";

		mail($to, $subject, $message, $headers);
		$sent = true;
	}
	else { //Else, Report Errors
		$errors = sprintf('<p class="errors">%s</p>',
				implode('<br>', $errors));
	}	
	};