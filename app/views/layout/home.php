<!DOCTYPE html>
<html lang="en">

<?php require_once "../app/views/template/head.php"; ?>

<body>

    <?php
    require_once "../app/views/template/home_header.php";
    require_once "../app/views/home/" . $route . ".php";
    ?>

    <script src="./src/js/main.js"></script>
</body>

</html>