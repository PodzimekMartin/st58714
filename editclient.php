<?php

include_once 'functions.php';

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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $birthdate = $_POST['birthdate'];
    $street = $_POST['street'];
    $housenumber = $_POST['housenumber'];
    $city = $_POST['city'];
    $postalcode = $_POST['postalcode'];


    if (updateClient($conn, $id, $name, $lastname, $email, $phone, $birthdate, $street, $housenumber, $city, $postalcode)) {

        header("Location: clients.php");
        exit();
    } else {

        echo "Chyba při aktualizaci klienta.";
    }
} else {

    $client_id = $_GET['id'];


    $clientData = getClientById($conn, $client_id);


    if (empty($clientData)) {
        echo "Klient s ID $client_id nebyl nalezen.";
    } else {

        ?>
        <!DOCTYPE html>
        <html lang="cs">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Upravit klienta</title>
            <link rel="stylesheet" href="dashboard.css">
        </head>
        <body>
        <div class="container">
        <h1>Upravit klienta</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" accept-charset="UTF-8">
            <input type="hidden" name="id" value="<?php echo $clientData['id']; ?>">
            <label for="name">Jméno:</label><br>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($clientData['name'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="lastname">Příjmení:</label><br>
            <input type="text" id="lastname" name="lastname" value="<?php echo htmlspecialchars($clientData['lastname'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($clientData['email'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="phone">Telefon:</label><br>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($clientData['phone'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="birthdate">Datum narození:</label><br>
            <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($clientData['birthdate'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="street">Ulice:</label><br>
            <input type="text" id="street" name="street" value="<?php echo htmlspecialchars($clientData['street'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="housenumber">Číslo popisné:</label><br>
            <input type="text" id="housenumber" name="housenumber" value="<?php echo htmlspecialchars($clientData['housenumber'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="city">Město:</label><br>
            <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($clientData['city'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <label for="postalcode">PSČ:</label><br>
            <input type="text" id="postalcode" name="postalcode" value="<?php echo htmlspecialchars($clientData['postalcode'], ENT_QUOTES, 'UTF-8'); ?>" required><br>
            <input type="submit" value="Uložit změny">
        </form>
        </div>
        </body>
        </html>
        <?php
    }
}


$conn->close();
?>
