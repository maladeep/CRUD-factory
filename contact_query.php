<?php
session_start();



require "config.php";
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=Factory", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 



 
if(isset($_POST['send_message'])) {
 
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$code_confirmation = $_POST['code_confirmation'];
 
if(strcmp($_SESSION['code_confirmation'], $_POST['code_confirmation']) != 0) {
	echo "<script>alert('The captcha code does not match!!'); window.location='home.php'</script>";
	echo "<script>javascript:self-history.back() </script>;";
} else {
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$insert_query = "INSERT INTO tbl_contact (full_name, email, message, code_confirmation)
VALUES (?, ?, ?, ?)";
 
$insert = $conn->prepare($insert_query);
$insert->execute(array($full_name, $email, $message, $code_confirmation));
 
echo "<script>alert('Successfully send your message!'); window.location='home.php'</script>";
}
}
?>