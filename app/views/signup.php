<!DOCTYPE html>
<html lang="en">

<?php require_once "template/head.php" ?>

<body class="bg-main">
    <div class="container">
        <form action="<?= BASE_URL ?>/signup/validate" method="post" class="sm:mx-20 md:mx-32 lg:mx-40 xl:mx-72 my-10 rounded-md shadow-2xl bg-white">
            <div class="flex justify-center items-center flex-col gap-4 p-6">
                <div class="logo">Signup To Greenie</div>

                <?php if (isset($_SESSION["username_exist"])) : ?>

                    <div class="bg-red-500 w-full p-2 rounded-md">
                        <p class="text-white font-main text-center">username already exist</p>
                    </div>

                <?php unset($_SESSION["username_exist"]);
                endif ?>

                <label class="w-full">
                    <span class="font-main block mb-1">Email</span>
                    <input type="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" placeholder="Masukkan Alamat Email" name="email" id="email" class="w-full form-input rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 placeholder:font-main" required>
                </label>
                <label class="w-full">
                    <span fo class="font-main block mb-1">Username</span>
                    <input type="text" placeholder="Masukkan Username" name="username" id="username" class="w-full form-input rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 placeholder:font-main" required>
                </label>
                <label class="w-full">
                    <span fo class="font-main block mb-1">Password</span>
                    <div class="relative">
                        <div class="absolute right-2 top-[50%] translate-y-[-50%]" id="eye">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>
                        <input type="password" value="<?= isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>" placeholder="Masukkan Password" name="password" id="password" class="w-full form-input rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 placeholder:font-main" required>
                    </div>
                </label>
                <label class="w-full">
                    <spa class="font-main block mb-1">No Telepon</spa>
                    <input type="tel" value="<?= isset($_SESSION['no_hp']) ? $_SESSION['no_hp'] : '' ?>" placeholder="Masukkan No Telepon" name="no_hp" id="no_hp" class="w-full form-input rounded-md border-gray-300 shadow-sm focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50 placeholder:font-main" required>
                </label>
                <a href="<?= BASE_URL ?>/login" class="font-main lg:text-md text-slate-500 hover:text-main">Sudah punya akun? login sekarang</a>
                <input type="submit" class="px-10 py-2 bg-main hover:bg-green-600 rounded-md text-slate-100 font-main" value="Signup">
            </div>
            <?php
            unset($_SESSION["email"]);
            unset($_SESSION["password"]);
            unset($_SESSION["no_hp"]);
            ?>
        </form>
    </div>
</body>

</html>