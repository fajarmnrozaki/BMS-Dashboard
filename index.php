<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="./assets/navbar.css">
    <link rel="stylesheet" href="./assets/style.css">

    <!-- IMPORT SCRIPT SECTION -->
    <script src="https://kit.fontawesome.com/1eef294ba4.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/js/js.js"></script>
    <script src="http://code.jquery.com/jquery-3.6.1.js"></script>
    <link href="./dist/pagination/pagination.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="assets/pagination/css/paginate.css">
    <link rel="stylesheet" href="assets/pagination/css/ligne.css">
    <script src="assets/pagination/js/paginate.js"></script>

    <title>Energy Management System</title>
</head>

<body>
    <?php
    include('./components/navbar.php');
    ?>
    <script src="http://code.jquery.com/jquery-3.6.1.js"></script>
    <!-- <script src="./assets/pagination/pagination.js"></script> -->
    <section class="home-section">
        <?php
        include('./pages/energy-status.php');
        include('./pages/daily-report.php');
        // include('./pages/events.php');
        // include('./pages/monthly-report.php');
        // include('./pages/yearly-report.php');
        ?>
    </section>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="./assets/pagination/pagination.js"></script> -->
</body>

</html>