<div>
    <h1 class="p-4 text-2xl font-semibold">Informasi Akun</h1>
</div>
<form class="flex items-center w-full mb-8 gap-4" method="POST" action="<?= BASE_URL . "/profile/update" ?>" enctype="multipart/form-data">
    <div class="flex flex-col items-start gap-4 flex-1 p-4">
        <?php $user = $data["db"]["user"]; ?>
        <div class="flex flex-col w-full items-start gap-2">
            <label class="text-right my-auto font-medium">Username</label>
            <input class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" name="username" id="username" value="<?= $user["username"] ?>">
        </div>
        <div class="flex flex-col w-full items-start gap-2">
            <label class="text-right my-auto font-medium">Email</label>
            <input class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" name="email" id="email" value="<?= $user["email"] ?>">
        </div>
        <div class="flex flex-col w-full items-start gap-2">
            <label class="text-right my-auto font-medium">No Telepon</label>
            <input class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" name="no_hp" id="no_hp" value="<?= $user["no_hp"] ?>">
        </div>
        <input class="bg-main py-2 px-8 rounded-md col-start-4 text-white hover:bg-green-600" type="submit" value="submit" />
    </div>
    <div class="flex flex-col items-center gap-4">
        <img src="<?= $base64 ?>" class="rounded-full object-cover object-center w-52 h-52" id="profile-picture">
        <label class="bg-slate-100 rounded-sm px-4 py-2 border border-slate-500 cursor-pointer hover:bg-slate-200">
            <input type="file" name="foto" id="foto" class="hidden">
            <div class="flex gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                </svg>
                <p>Upload Foto</p>
            </div>
        </label>
        <p class="text-center text-xs text-slate-700">Max file 2 MB </br> File yang diizinkan: </br> .png, .jpg, .jpeg</p>
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