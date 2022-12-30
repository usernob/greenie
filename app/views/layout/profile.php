<!DOCTYPE html>
<html lang="en">

<?php require_once "../app/views/template/head.php"; ?>

<body class="bg-slate-300 font-main text-slate-900">

    <?php require_once "../app/views/template/header.php"; ?>

    <main class="my-2 min-h-[80vh]">
        <div class="container flex gap-4 justify-center">
            <div class="my-2 flex flex-col items-start h-fit">
                <?php
                $lists = [
                    [
                        "icon" => '<path strokeLinecap="round" strokeLinejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />',
                        "link" => BASE_URL . "/profile",
                        "text" => 'Akun'
                    ],
                    [
                        "icon" => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />',
                        "link" => BASE_URL . "/profile/address",
                        "text" => 'Alamat'
                    ],
                    [
                        "icon" => '<path strokeLinecap="round" strokeLinejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />',
                        "link" => BASE_URL . "/profile/order",
                        "text" => 'Pesanan'
                    ],
                    [
                        "icon" => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />',
                        "link" => BASE_URL . "/profile/password",
                        "text" => "Ubah Password"
                    ],
                    [
                        "icon" => '<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />',
                        "link" => BASE_URL . "/market",
                        "text" => 'Toko'
                    ],
                    [
                        "icon" => '<path strokeLinecap="round" strokeLinejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />',
                        "link" => BASE_URL . "/login",
                        "text" => 'Logout'
                    ]
                ];
                if (isset($_SESSION["level"]) && $_SESSION["level"] == "admin") {
                    array_splice($lists, -1, 0, [[
                        "icon" => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />',
                        "link" => BASE_URL . '/admin',
                        "text" => 'Dashboard Admin'
                    ]]);
                }
                ?>
                <?php foreach ($lists as $list) :
                    $selectted = $list["link"] == BASE_URL . str_replace(ROOT_URL, "", $_SERVER["REQUEST_URI"]) ?>

                    <a href="<?= $list["link"] ?>" class="flex items-center group hover:bg-main w-full flex-1 px-4 py-2 rounded-sm gap-2 <?= $selectted ? "bg-main" : "" ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1" stroke="currentColor" class="w-6 h-6 group-hover:text-white <?= $selectted ? "text-white" : "" ?>">
                            <?= $list["icon"] ?>
                        </svg>
                        <p class="group-hover:text-white <?= $selectted ? "text-white" : "" ?>"><?= $list["text"] ?></p>
                    </a>

                <?php endforeach ?>
            </div>
            <?php require_once "../app/views/template/modal.php"; ?>
            <div class="my-2 p-4 rounded-md bg-slate-100 shadow-lg flex-1">
                <?php require_once "../app/views/profile/" . $route . ".php"; ?>
            </div>
        </div>
    </main>

    <?php require_once "../app/views/template/footer.php"; ?>
</body>

</html>