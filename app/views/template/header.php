<?php

$path = BASE_URL . "/public/assets/dummy-user.png";
$type = pathinfo($path, PATHINFO_EXTENSION);
$image = file_get_contents($path);
if (!empty($data["db"]["user"]["avatar"])) {
    $image = $data["db"]["user"]["avatar"];
}

$base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);
if (!isset($_SESSION["query"])) {
    $_SESSION["query"] = "";
}
?>

<header class="bg-main w-full z-50 h-fit sticky-top font-main">
    <div class="flex items-center gap-10 container py-4 justify-center">
        <div>
            <a href="<?= BASE_URL ?>/home">
                <img src="<?= BASE_URL ?>/public/assets/logo-white.png" class="w-32">
            </a>
        </div>
        <div class="flex-grow my-2">
            <form class="w-full rounded-full flex items-center bg-white" method="GET" action="<?= BASE_URL ?>/home/search/">
                <input type="text" name="q" id="q" placeholder="Mau cari apa hari ini?" class="py-2 px-4 rounded-l-full flex-grow placeholder:font-main focus:border-green-500" value="<?= $_SESSION["query"] ?>">
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-2 mr-4 text-slate-600">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="flex items-center gap-4">
            <a href="<?= BASE_URL ?>/profile">
                <img src="<?= $base64; ?>" alt="img-profile" class="rounded-full w-9 h-9 object-cover object-center bg-white">
            </a>
            <div class="relative">
                <a href="<?= BASE_URL ?>/cart/">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </a>
                <?php if (!empty($data["db"]["user"]["id_cart"])) {
                    $visible = "visible";
                } else {
                    $visible = "invisible";
                } ?>
                <div id="cart-notif" class="w-2 h-2 rounded-full bg-red-500 absolute <?= $visible ?> top-1 right-0"></div>
            </div>
        </div>
    </div>
</header>