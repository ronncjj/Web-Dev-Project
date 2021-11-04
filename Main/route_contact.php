<?php
$servername = "localhost";
$username = "f32ee";
$password = "f32ee";
$dbname = "f32ee";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php
$custName = $_POST['name'];
$custEmail = $_POST['email'];
$custMessage = $_POST['message'];


$to      = "f32ee@localhost";
$subject = 'Contact form ' . $custEmail;
$message = 'Message from:'
    . "\n"
    . "\n"
    . 'Name :' . $custName
    . "\n"
    . 'Email :' . $custEmail
    . "\n"
    . 'Message :' . $custMessage;

$headers = 'From: f32ee@localhost' . "\r\n" .
    'Reply-To: f32ee@localhost' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers, '-ff32ee@localhost');
echo ("mail sent to : " . $to);


if (isset($_POST['fromIndex'])) {
    header("Location: index.php#contact");
} elseif (isset($_POST['fromTrack'])) {
    header("Location: order_track.php");
}
?>