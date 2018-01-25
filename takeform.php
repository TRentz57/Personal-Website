
<html>
<head>
<title>Thanks For Contacting Me</title>
</head>
<body>
<?php

 $recipient = 'popmythumbyoutube@yahoo.com';
 $email = $_POST['email'];
 $realName = $_POST['realname'];
 $subject = $_POST['subject'];
 $body = $_POST['body'];
 # error messages in a array
 $messages = array();
# Allow only real email addresses
if (!preg_match("/^[\w\+\-.~]+\@[\-\w\.\!]+$/", $email)) {
$messages[] = "That is not a valid email address.";
}
# Allow only real names
if (!preg_match("/^[\w\ \+\-\'\"]+$/", $realName)) {
$messages[] = "The real name field must contain only " .
"alphabetical characters, numbers, spaces, and " .
"reasonable punctuation. We apologize for any inconvenience.";
}
# NO HACKERS ALLOWED
$subject = preg_replace('/\s+/', ' ', $subject);
# Check that subject isnt blank
if (preg_match('/^\s*$/', $subject)) {
$messages[] = "Please specify a subject for your message.";
}

$body = $_POST['body'];
# Make sure the message has a body
if (preg_match('/^\s*$/', $body)) {
$messages[] = "Your message was blank. Did you mean to say " .
"something?";
}
 if (count($messages)) {
   # If there are any problems tell the user
   # don't send the message yet
   foreach ($messages as $message) {
     echo("<p>$message</p>\n");
   }
   echo("<p>Click the back button and correct the problems. " .
     "Then click Send Your Message again.</p>");
 } else {
   # Send the email
mail($recipient,
     $subject,
     $body,
     "From: $realName <$email>\r\n" .
     "Reply-To: $realName <$email>\r\n");
   echo("<p>Your message has been sent. Thank you!</p>\n");
 }
?>
</body>
</html>
