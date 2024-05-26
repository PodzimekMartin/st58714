<?php
function addClient($name, $lastname, $email, $phone, $street, $city, $housenumber, $birthdate, $postalcode) {
    $servername = "mariadb105.r3.websupport.cz";
    $username = "tj5jzx46";
    $password = "Rebelista36569";
    $dbname = "tj5jzx46";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Připojení k databázi selhalo: " . $conn->connect_error);
    }
    $conn->set_charset("utf8");
    $conn->query("SET NAMES utf8");
    session_start();
    $broker_id = $_SESSION['user_id'];


    $sql = "INSERT INTO clients (name, lastname, email, phone, street, city, housenumber, postalcode,birthdate, broker) VALUES (?, ?, ?, ?, ?, ?, ?, ?,?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Chyba při přípravě dotazu: " . $conn->error);
    }

    $stmt->bind_param("sssssssssi", $name, $lastname, $email, $phone, $street, $city, $housenumber, $birthdate, $postalcode, $broker_id);
    if ($stmt->execute() === false) {
        die("Chyba při vložení dat do databáze: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();


    header("Location: clients.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $housenumber = $_POST['housenumber'];
    $postalcode = $_POST['postalcode'];
    $birthdate = $_POST['birthdate'];

    addClient($name, $lastname, $email, $phone, $street, $city, $housenumber, $postalcode, $birthdate);
}