<div>
    <h1 class="p-4 text-2xl font-semibold">Ganti Password</h1>
</div>
<form class="flex items-center w-full mb-8 gap-4" method="POST" action="<?= BASE_URL . "/profile/update_password" ?>">
    <div class="flex flex-col items-start gap-4 flex-1 p-4">
        <div class="flex flex-col w-full items-start gap-2">
            <label class="text-right my-auto font-medium">Password lama</label>
            <div class="relative w-full">
                <div class="absolute right-2 top-[50%] translate-y-[-50%]" id="eye">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </div>
                <input class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" id="password" name="old_pw" type="password">
            </div>
        </div>
        <div class="flex flex-col w-full items-start gap-2">
            <label class="text-right my-auto font-medium">Password Baru</label>
            <input class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" id="new_pw" name="new_pw" type="text">
        </div>
        <div class="flex flex-col w-full items-start gap-2">
            <label class="text-right my-auto font-medium">Konfirmasi Password</label>
            <input class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" id="confirm_pw" name="confirm_pw" type="text">
            <span class="hidden text-red-500 text-sm" id="error_message"></span>
        </div>
        <input class="bg-main py-2 px-8 rounded-md col-start-4 text-white hover:bg-green-600" type="submit" value="submit" />
    </div>
    <?php if (isset($_SESSION["message"])) : ?>
        <script>
            window.addEventListener("load", e => {
                modal("<?= $_SESSION["message"] ?>");
            })
        </script>
    <?php unset($_SESSION["message"]);
    endif ?>
</form>