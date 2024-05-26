<?php
session_start();


$servername = "mariadb105.r3.websupport.cz";
$username = "tj5jzx46";
$password = "Rebelista36569";
$dbname = "tj5jzx46";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function getClientsData($conn, $user_id) {
    // Připravíme dotaz pro načtení dat klientů přihlášeného uživatele
    $sql = "SELECT * FROM clients WHERE broker = $user_id";

    // Provedeme dotaz na databázi
    $result = $conn->query($sql);

    // Inicializujeme pole pro ukládání dat klientů
    $clientsData = array();

    // Zkontrolujeme, zda byly získány data
    if ($result && $result->num_rows > 0) {
        // Projdeme všechny řádky výsledku dotazu
        while ($row = $result->fetch_assoc()) {
            // Přidáme data klienta do pole
            $clientsData[] = $row;
        }

        // Uzavřeme výsledek dotazu
        $result->close();
    }

    // Vrátíme pole s daty klientů
    return $clientsData;
}

function countClients($conn, $user_id) {
    // Připravíme dotaz pro spočítání počtu klientů
    $sql = "SELECT COUNT(*) AS client_count FROM clients WHERE broker = $user_id";

    // Provedeme dotaz na databázi
    $result = $conn->query($sql);

    // Zkontrolujeme, zda byly získány data
    if ($result && $result->num_rows > 0) {
        // Načteme výsledek dotazu do asociativního pole
        $row = $result->fetch_assoc();

        // Uzavřeme výsledek dotazu
        $result->close();

        // Vrátíme počet klientů
        return $row['client_count'];
    } else {
        // Pokud nedošlo k získání dat, vrátíme 0
        return 0;
    }
}
function findBirthdays($conn) {
    // Získání dnešního data
    $today = date('Y-m-d');

    // Příprava dotazu pro nalezení klientů, kteří mají dnes narozeniny
    $sql = "SELECT name, lastname FROM clients WHERE DATE_FORMAT(birthdate, '%m-%d') = DATE_FORMAT('$today', '%m-%d')";

    // Provedení dotazu na databázi
    $result = $conn->query($sql);

    // Inicializace pole pro ukládání jmen a příjmení klientů s dnešními narozeninami
    $birthdayClients = array();

    // Zpracování výsledků dotazu
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Přidání jména a příjmení klienta do pole
            $birthdayClients[] = $row['name'] . ' ' . $row['lastname'];
        }
        // Uzavření výsledku dotazu
        $result->close();
    }

    // Vrácení pole klientů s dnešními narozeninami
    return $birthdayClients;
}

function getUserData($conn, $user_id) {
    // Připravíme dotaz
    $sql = "SELECT * FROM users WHERE id = $user_id";

    // Provedeme dotaz na databázi
    $result = $conn->query($sql);

    // Zkontrolujeme, zda byly získány data
    if ($result && $result->num_rows > 0) {
        // Načteme data do asociativního pole
        $userData = $result->fetch_assoc();

        // Uzavřeme výsledek dotazu
        $result->close();

        // Vrátíme asociativní pole s daty uživatele
        return $userData;
    } else {
        // Pokud uživatel není nalezen, vrátíme prázdné pole
        return array();
    }
}

function deleteClient($conn, $client_id) {
    $sql = "DELETE FROM clients WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $client_id);
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    } else {
        return false;
    }
}

function updateClient($conn, $id, $name, $lastname, $email, $phone, $birthdate, $street, $housenumber, $city, $postalcode) {
    // Připravíme SQL dotaz pro aktualizaci dat klienta
    $sql = "UPDATE clients 
            SET name = '$name', lastname = '$lastname', email = '$email', phone = '$phone', birthdate = '$birthdate', 
                street = '$street', housenumber = '$housenumber', city = '$city', postalcode = '$postalcode' 
            WHERE id = $id";

    // Provedeme aktualizaci dat v databázi
    if ($conn->query($sql) === TRUE) {
        // Pokud aktualizace proběhla úspěšně, vrátíme true
        return true;
    } else {
        // Pokud došlo k chybě při aktualizaci, vrátíme false
        return false;
    }
}

function getClientById($conn, $client_id) {
    session_start();
    $user_id = $_SESSION['user_id'];
    // Připravíme dotaz pro načtení dat klienta
    $sql = "SELECT * FROM clients WHERE broker = $user_id AND id = $client_id";

    // Provedeme dotaz na databázi
    $result = $conn->query($sql);

    // Zkontrolujeme, zda byly získány data
    if ($result && $result->num_rows > 0) {
        // Vrátíme data klienta
        return $result->fetch_assoc();
    } else {
        // Pokud klient s daným ID nebyl nalezen, vrátíme prázdné pole
        return array();
    }
}
