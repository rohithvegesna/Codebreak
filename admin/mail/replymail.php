<?php
if($_GET['page'] == 'feedback'){
	$page = 'notifications.php';
}
elseif($_GET['page'] == 'notification'){
	$page = 'feedback.php';
}
$email = urldecode($_GET['email']);
$reply = urldecode($_GET['reply']);
$to = $email;
$subject = "Codebreak";
$message = <<<EOF
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Internal_email-29</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body style="margin:0; padding:0;" bgcolor="#eaeced">
		<h1>$reply</h1>
	</body>
</html>
EOF;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <test@codebreak.in>' . "\r\n";
$headers .= 'Cc: test@codebreak.in' . "\r\n";

mail($to,$subject,$message,$headers);

header('Location: ../'.$page);
?>