<div class="flex justify-between">
    <h1 class="p-4 text-2xl font-semibold">Alamat Pengiriman</h1>
    <a href="<?= BASE_URL ?>/profile/add_address" class="px-8 py-3 bg-main hover:bg-green-600 rounded-sm text-white flex items-center justify-center gap-2 h-fit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="text-sm">
            Tambahkan Alamat
        </span>
    </a>
</div>
<div class="flex flex-col items-start w-full mb-8 gap-4 p-4">
    <?php if (isset($data["db"]["address"]) && count($data["db"]["address"]) > 0) : ?>
        <?php foreach ($data["db"]["address"] as $address) : ?>
            <div class="flex-1 grid grid-flow-col border border-slate-700 rounded-md py-2 px-4 w-full gap-4">
                <div class="m-auto">
                    <h2 class="text-lg font-medium"><?= $address["remarks"] ?></h2>
                    <p class="text-sm text-slate-700"><?= $address["detail"] . ", DUSUN " . $address["dusun"] . ", DESA " . $address["desa"] . ", KECAMATAN " . $address["kecamatan"] . ", " . $address["kabupaten"] . ", PROVINSI " . $address["provinsi"] ?></p>
                </div>
                <a href="<?= BASE_URL ?>/profile/delete_address/<?= $address["id_address"] ?>" class="m-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </a>
                <input type="radio" name="selected_addrs" id="selected_addrs" class="m-auto w-5 h-5" <?= $address["selected"] == $address["id_address"] ? "checked" : "" ?> data-target="<?= BASE_URL . "/profile/change_address/" . $address["id_address"] ?>" />
            </div>
        <?php endforeach ?>
    <?php else : ?>
        <h2 class=" text-slate-600 text-center w-full">Tidak Ada Alamat</br>Tambahkan Alamat Untuk Melakukan Pembelian</h2>
    <?php endif ?>
    <?php if (isset($_SESSION["message"])) : ?>
        <script>
            window.addEventListener("load", e => {
                modal("<?= $_SESSION["message"] ?>");
            })
        </script>
    <?php unset($_SESSION["message"]);
    endif ?>
</div>