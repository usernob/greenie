<?php

$path = BASE_URL . "/assets/user.png";
$type = pathinfo($path, PATHINFO_EXTENSION);
$image = file_get_contents($path);
if (isset($data["db"]["user"]["avatar"])) {
    if (!empty($data["db"]["user"]["avatar"])) {
        $image = $data["db"]["user"]["avatar"];
    }
}
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);
?>

<header class="bg-main w-full z-50 h-fit sticky-top">
    <div class="flex items-center gap-10 container py-4 justify-center">
        <div>
            <a href="#">NAMA BRAND</a>
        </div>
        <div class="flex-grow my-2">
            <div class="w-full rounded-md flex items-center bg-white">
                <input type="text" name="search" id="search" placeholder="Mau cari apa hari ini?" class="py-2 px-4 rounded-md flex-grow placeholder:font-main focus:border-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-2 mr-4 text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
            </div>
        </div>
        <div>
            <a href="./profile.php">
                <img src="<?php echo $base64; ?>" alt="img-profile" class="rounded-full w-9 h-9 object-cover object-center">
            </a>
        </div>
    </div>
</header>