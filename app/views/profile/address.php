<div class="flex justify-between">
    <h1 class="p-4 text-2xl font-semibold">Alamat Pengiriman</h1>
    <a href="<? BASE_URL ?>/profile/add_address" class="px-8 py-4 bg-main hover:bg-green-600 rounded-sm text-white flex items-center justify-center gap-2 h-fit">
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
            <div class="flex-1 flex justify-between items-center border border-slate-700 rounded-md py-2 px-4 w-full">
                <div>
                    <a href="" class="text-lg font-medium"><?= $address["remarks"] ?></a>
                    <p><?= $address["detail"] ?></p>
                </div>
                <input type="radio" name="selected_addrs" id="selected_addrs" class="w-5 h-5" <?= $address["selected"] == $address["id_address"] ? "checked" : "" ?> data-id_address="<?= $address["id_address"] ?>" />
            </div>
        <?php endforeach ?>
    <?php else : ?>
        <h2 class=" text-slate-600 text-center w-full">Tidak Ada Alamat</br>Tambahkan Alamat Untuk Melakukan Pembelian</h2>
    <?php endif ?>
</div>