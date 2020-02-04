<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//attachments
//$mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
//$mail-> addAttachment('/tmp/image.jpg','new.jpg'); //Optional name

$first = $_POST['first'];
$mail_van = $_POST['email'];
$last = $_POST['last'];
$bericht = $_POST['bericht'];
$mymail = 'delanophp@gmail.com';


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = gethostbyname('smtp.gmail.com');    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                     // Enable SMTP authentication
    $mail->Username = 'delanophp@gmail.com';                    // SMTP username
    $mail->Password = 'Banaan123';                              // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->SMTPAuth = true;
    $mail->Port = 587;                                          // TCP port to connect to
    $mail->SMTPOptions = array(
        'ssl'=>array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //Recipients
    $mail->setFrom('delanophp@gmail.com', 'Delano Bottelier');
    $mail->addAddress($mail_van , $first, $last);
    $mail->addAddress($mymail);                                 // Add a recipient



    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Bericht via contactpagina";
    $mail->Body    = $bericht;
    $mail->AltBody = 'alt body for non HTML users';

    if ($mail->send()){
        ?>
        <!DOCTYPE html>

        <html lang="nl">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="refresh" content="0;URL=index.php">
            <link rel="stylesheet" href="CSS/form.css">
        </head>
        <body>
        <h1> U word nu terug geleid naar de Homepage</h1>
        </body>
        </html>
        <?php
    }
//    echo 'Message has been sent';

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}