<?php
include 'functions.php';
session_start();

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    if (deleteClient($conn, $client_id)) {
        $_SESSION['message'] = "Klient byl úspěšně smazán.";
    } else {
        $_SESSION['message'] = "Chyba při mazání klienta.";
    }
} else {
    $_SESSION['message'] = "Neplatný požadavek.";
}

header("Location: clients.php");
exit();
?>
