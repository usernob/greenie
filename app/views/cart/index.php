<main class="my-2">
    <div class="container">
        <?php $formater = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY); ?>
        <form action="<?= BASE_URL ?>/cart/request" method="post" class="flex flex-col gap-2">
            <div class="p-4 bg-slate-100 shadow-md rounded-md">
                <div class="grid grid-cols-[2.25rem_minmax(500px,_2fr)_1fr_1fr_1fr] gap-y-4">
                    <input type="checkbox" name="" id="select-all" class="h-5 w-5 mr-auto ml-0 my-auto">
                    <p class="text-slate-800 font-medium text-lg">Pilih semua</p>
                    <p class="text-slate-800 font-medium px-10 text-center">harga</p>
                    <p class="text-slate-800 font-medium px-10 text-center">kuantitas</p>
                    <p class="text-slate-800 font-medium px-10 text-center">total harga</p>

                    <?php $i = 0;
                    foreach ($data["db"]["barang"] as $barang) : $i++; ?>
                        <input type="checkbox" class="w-5 h-5 checked:bg-main mr-auto ml-0 my-auto" id="checkbox-produk" value="<?= $barang["id_barang"]; ?>" name="checkbox-<?= $i ?>">
                        <div class="flex items-center gap-8">
                            <?php if (!empty($barang["foto"])) : ?>
                                <img src="data:image/jpg;base64,<?= base64_encode($barang["foto"]); ?>" class="w-32 h-3w-32 bg-slate-300 rounded-md">

                            <?php else : ?>
                                <img src=" data:image/jpg;base64,<?php $image = file_get_contents(BASE_URL . "/assets/dummy-image.jpg");
                                                                    echo base64_encode($image); ?>" class="w-32 h-3w-32 bg-slate-300 rounded-md">
                            <?php endif ?>
                            <h1 class="text-lg break-all flex-1"><?= $barang["nama_barang"] ?></h1>
                        </div>
                        <h2 class="text-lg text-center m-auto" data-price="<?= $barang["harga_barang"] ?>" id="price-before">
                            <?= $formater->formatCurrency($barang["harga_barang"], "IDR") ?>
                        </h2>
                        <div class="flex items-center justify-center h-10 px-3 m-auto" id="qty">
                            <button type="button" value="-" id="qty-min" class="bg-green-300 hover:bg-main px-6 h-full rounded-md">-</button>
                            <input id="qty-val" class="h-full text-center w-10 bg-transparent mx-2" value="1" readonly></input>
                            <button type="button" value="+" id="qty-plus" class="bg-green-300 hover:bg-main px-6 h-full rounded-md">+</button>
                        </div>
                        <h2 class="px-10 text-main text-lg text-center m-auto" id="price-after" data-price="<?= $barang["harga_barang"] ?>">
                            <?= $formater->formatCurrency($barang["harga_barang"], "IDR") ?>
                        </h2>
                        <input type="hidden" value="<?= $barang["harga_barang"] ?>">
                    <?php endforeach ?>

                </div>
            </div>
            <div class="p-4 bg-slate-100 shadow-md rounded-md flex justify-between items-center">
                <h2 class="font-semibold text-3xl">Total</h2>
                <div class="flex gap-4 items-center">
                    <p><span id="count-selected" data-count="0">0</span> item dipilih</p>
                    <p class="text-main text-3xl" id="total-all-selected" name="total"><?= $formater->formatCurrency(0, "IDR"); ?>
                    </p>
                    <input type="hidden" name="total" value="0">
                    <button type="submit" class="bg-main hover:bg-green-600 px-6 py-2 rounded-md text-slate-100">Continue</button>
                </div>
            </div>
        </form>
    </div>
</main>