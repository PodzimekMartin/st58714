<?php include 'functions.php';
$user_id = $_SESSION['user_id'];


$userData = getUserData($conn, $user_id);

$userName = $userData['name'];
$userLastName = $userData['lastname'];
$userPhone = $userData['phone'];
$userEmail = $userData['email'];
$userLevel = $userData['level'];
$fullName = $userName . ' ' . $userLastName;

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
    <style>
        .row.content {height: 100vh;}
        .user-info {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .user-info h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .user-info p {
            margin: 5px 0;
        }
    </style>
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
                <li><a href="clients.php">Klienti</a></li>
                <li class="active"><a href="profile.php">Profil</a></li>
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
                <li><a href="clients.php">Klienti</a></li>
                <li class="active"><a href="profile.php">Profil</a></li>
            </ul><br>
        </div>
        <br>

        <div class="col-sm-9">
            <div class="well">
                <div class="container">
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                            <div class="mt-3">
                                                <h4><?php echo $fullName; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">ID</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $user_id; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Jméno a příjmení</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $fullName; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $userEmail; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Telefon</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <?php echo $userPhone; ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                Tu zatím nemám v db
                                            </div>
                                        </div>
                                        <hr>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
<?php $conn->close();?>

</html>
