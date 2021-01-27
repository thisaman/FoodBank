 <?php

    // Get the form fields, removes html tags and whitespace.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);
    $address = strip_tags(trim($_POST["address"]));
    $pincode = strip_tags(trim($_POST["pincode"]));
$contactno = strip_tags(trim($_POST["contactno"]));
    // Check the data.
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: http://joyofgiving1.co/requestforfood.php?success=-1");
        exit;
    }

    // Set the recipient email address. Update this to YOUR desired email address.
    $recipient = "givejoy01@gmail.com";

    // Set the email subject.
    $subject = "New Food Request from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";
    $email_content =  "Address: $address\n";
    $email_content = "Pincode: $pincode\n";
    $email_content = "Name: $contactno\n";

    // Build the email headers.
    $email_headers = "From: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_headers);
    
    // Redirect to the index.html page with success code
    header("Location: http://joyofgiving1.co/requestforfood.php?success=1");

?>
