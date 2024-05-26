<?php include 'addclient.php';
include_once 'functions.php';

$birthdayClients = findBirthdays($conn);
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <style>.row.content {height: 100vh;}</style>
</head>
</head>

<body>

<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ST58714.cz by Martin Zima</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="dashboard.php">Nástěnka</a></li>
                <li><a href="calc.php">Kalkulačky</a></li>
                <li class="active"><a href="clients.php">Klienti</a></li>
                <li><a href="profile.php">Profil</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav hidden-xs">
            <div class="logo">
                <img src="images/logo2.png" alt="Logo">
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="dashboard.php">Nástěnka</a></li>
                <li><a href="calc.php">Kalkulačky</a></li>
                <li class="active"><a href="clients.php">Klienti</a></li>
                <li><a href="profile.php">Profil</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <h1>Seznam vašich klientů</h1>
                <table id="example" class="display" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Jméno</th>
                        <th>Příjmení</th>
                        <th>Email</th>
                        <th>Telefon</th>
                        <th>Datum narození</th>
                        <th>Adresa</th>
                        <th>Akce</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    session_start();

                    $user_id = $_SESSION['user_id'];

                    $clientsData = getClientsData($conn, $user_id);

                    foreach ($clientsData as $client) {
                        echo "<tr>";
                        echo "<td>" . $client['id'] . "</td>";
                        echo "<td>" . $client['name'] . "</td>";
                        echo "<td>" . $client['lastname'] . "</td>";
                        echo "<td>" . $client['email'] . "</td>";
                        echo "<td>" . $client['phone'] . "</td>";
                        echo "<td>" . $client['birthdate'] . "</td>";
                        echo "<td>" . $client['street'] . " " . $client['housenumber'] . ", " . $client['city'] . ", " . $client['postalcode'] . "</td>";
                        echo "<td>
                            <a href='editclient.php?id=" . $client['id'] . "' class='btn btn-warning'>Upravit</a>
                            <a href='deleteclient.php?id=" . $client['id'] . "' class='btn btn-danger' onclick='return confirm(\"Opravdu chcete tento záznam smazat?\")'>Smazat</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
            <div class="well">
                <div class="container">
                <h2>Přidat nového klienta</h2>
                <form action="addclient.php" method="post" accept-charset="UTF-8">
                    <label for="name">Jméno:</label><br>
                    <input type="text" id="name" name="name" required><br>
                    <label for="lastname">Příjmení:</label><br>
                    <input type="text" id="lastname" name="lastname" required><br>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br>
                    <label for="phone">Telefon:</label><br>
                    <input type="tel" id="phone" name="phone" required><br>
                    <label for="birthdate">Datum narození:</label><br>
                    <input type="date" id="birthdate" name="birthdate" required><br>
                    <label for="street">Ulice:</label><br>
                    <input type="text" id="street" name="street" required><br>
                    <label for="housenumber">Číslo popisné:</label><br>
                    <input type="text" id="housenumber" name="housenumber" required><br>
                    <label for="city">Město:</label><br>
                    <input type="text" id="city" name="city" required><br>
                    <label for="postalcode">PSČ:</label><br>
                    <input type="text" id="postalcode" name="postalcode" required><br><br>
                    <input type="submit" value="Přidat klienta">
                </form>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        new DataTable('#example').destroy();
        $('#example').DataTable({
            "language": {
                "sEmptyTable":     "Žádné dostupné údaje v tabulce",
                "sInfo":           "Zobrazuji záznamy _START_ až _END_ z celkového počtu _TOTAL_",
                "sInfoEmpty":      "Zobrazuji 0 až 0 z 0 záznamů",
                "sInfoFiltered":   "(filtrováno z celkového počtu _MAX_ záznamů)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "Zobrazit _MENU_ záznamů",
                "sLoadingRecords": "Načítám...",
                "sProcessing":     "Provádím...",
                "sSearch":         "Hledat:",
                "sZeroRecords":    "Žádné záznamy nebyly nalezeny",
                "oPaginate": {
                    "sFirst":    "První",
                    "sLast":     "Poslední",
                    "sNext":     "Další",
                    "sPrevious": "Předchozí"
                },
                "oAria": {
                    "sSortAscending":  ": aktivujte pro řazení sloupce vzestupně",
                    "sSortDescending": ": aktivujte pro řazení sloupce sestupně"
                },
                "buttons": {
                    "copy": "Kopírovat",
                    "colvis": "Viditelnost sloupců",
                    "print": "Tisk",
                    "copyTitle": "Kopírovat do schránky",
                    "copySuccess": {
                        "1": "Jeden řádek byl zkopírován do schránky",
                        "_": "%d řádků bylo zkopírováno do schránky"
                    }
                }
            }
        });


        $(document).on('click', '.delete-btn', function() {
            var id = $(this).data('id');
            if(confirm('Opravdu chcete tento záznam smazat?')) {
                window.location.href = 'deleteclient.php?id=' + id;
            }
        });


        $(document).on('click', '.edit-btn', function(e) {
            e.preventDefault();
            var id = $(this).attr('href').split('=')[1];
            window.location.href = 'editclient.php?id=' + id; 
        });
    });
</script>




</body>


</html>
