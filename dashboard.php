<?php include 'functions.php';
$birthdayClients = findBirthdays($conn);
?>
<?php
// Získání ID přihlášeného uživatele z $_SESSION
$user_id = $_SESSION['user_id'];
// Zavolání funkce pro spočítání klientů
$client_count = countClients($conn, $user_id);
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


    <style>.row.content {height: 100vh;}</style>
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
                <li class="active"><a href="dashboard.php">Nástěnka</a></li>
                <li><a href="calc.php">Kalkulačky</a></li>
                <li><a href="clients.php">Klienti</a></li>
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
                <li class="active"><a href="dashboard.php">Nástěnka</a></li>
                <li><a href="calc.php">Kalkulačky</a></li>
                <li><a href="clients.php">Klienti</a></li>
                <li><a href="profile.php">Profil</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <h4>Vítejte</h4>
                <p>Textík</p>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="well">
                        <h4>Narozeniny klientů</h4>
                        <?php
                        $count = count($birthdayClients);
                        echo "<p>Dnes je " . date('j. n. Y') . "</p>";
                        if ($count > 0) {
                            echo "<p><b>Jejich jména jsou:</b><br> ";
                            echo implode("<br> ", $birthdayClients);
                            echo "</p>";
                        } else {
                            echo "<p>Nikdo z klientů dnes nemá narozeniny.</p>";
                        }
                        ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">
                        <h4>Celý zdrojový kod ke stažení</h4>
                        <a href="st58714.zip" download>
                            <img src="images/ikona.png" alt="Stáhnout ZIP" width="20" height="20">
                            Stažení ZIP
                        </a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">
                        <h4>Celkový počet vašich klientů</h4>
                        <p>Počet klientů: <?php echo $client_count; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                        <p>Text</p>
                        <p>Text</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                        <p>Text</p>
                        <p>Text</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                        <p>Text</p>
                        <p>Text</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="well">
                        <h4>Toto je váš pracovní kalendář</h4><br>
                        <a href="https://calendar.google.com/calendar/ical/f5c97473d333bd1d493c7240f70093bdff6e0df3dc37d433828b3d6c1602e3ee%40group.calendar.google.com/public/basic.ics" download>
                            <img src="images/calendar.png" alt="Stáhnout kalendář" width="20" height="20">
                            Stáhnout kalendář
                        </a><br>
                        <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&ctz=Europe%2FPrague&bgcolor=%23ffffff&showCalendars=0&showTitle=0&src=ZjVjOTc0NzNkMzMzYmQxZDQ5M2M3MjQwZjcwMDkzYmRmZjZlMGRmM2RjMzdkNDMzODI4YjNkNmMxNjAyZTNlZUBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%233F51B5" style="border-width:0" width="400" height="300" frameborder="0" scrolling="no"></iframe>                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>
</div>
</body>


</html>
