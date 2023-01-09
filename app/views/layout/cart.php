<!DOCTYPE html>
<html lang="en">

<?php require_once "app/views/template/head.php"; ?>

<body class="bg-slate-300 font-main text-slate-900">

    <?php
    require_once "app/views/template/header.php";
    require_once "app/views/cart/" . $route . ".php";
    require_once "app/views/template/modal.php";
    require_once "app/views/template/footer.php";
    ?>

</body>

</html>