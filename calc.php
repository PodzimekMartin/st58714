<?php include 'functions.php';
$birthdayClients = findBirthdays($conn);
?>
<?php

$user_id = $_SESSION['user_id'];

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
                <li><a href="dashboard.php">Nástěnka</a></li>
                <li class="active"><a href="calc.php">Kalkulačky</a></li>
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
                <li><a href="dashboard.php">Nástěnka</a></li>
                <li class="active"><a href="calc.php">Kalkulačky</a></li>
                <li><a href="clients.php">Klienti</a></li>
                <li><a href="profile.php">Profil</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">

            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="well">

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">

                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="well">

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
                        <p>Text</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="well">
                        <p>Text</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>


</html>

