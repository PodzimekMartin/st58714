<?php
session_start();
$servername = "mariadb105.r3.websupport.cz";
$username = "tj5jzx46";
$password = "Rebelista36569";
$dbname = "tj5jzx46";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);


    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {

        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['id'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Neplatné přihlašovací údaje.";
    }
}

$conn->close();
?>
