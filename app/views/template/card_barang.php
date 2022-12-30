<?php if (count($data["db"]["barang"]) <= 0) : ?>
    <div class="col-span-full">
        <p class="text-xl text-slate-500 text-center">item not found</p>
    </div>
<?php endif ?>

<?php foreach ($data["db"]["barang"] as $barang) : ?>

    <a href="<?= BASE_URL ?>/home/detail/<?= $barang['id_barang'] ?>" class="max-w-md bg-slate-50 shadow-[0_1px_30px_-6px_rgb(0_0_0/0.2),_0_2px_10px_-10px_rgb(0_0_0/0.2)] rounded-md hover:outline hover:outline-2 hover:outline-main">
        <img <?php
                $image = file_get_contents(BASE_URL . "/assets/dummy-image.jpg");
                if (!empty($barang["foto"])) {
                    $image = $barang["foto"];
                }
                $base64 = 'data:image/png;base64,' . base64_encode($image);
                ?> src="<?= $base64 ?>" class="w-full h-52 object-cover object-center bg-slate-300 rounded-t-md">
        <div class="p-2">
            <p class=" font-medium text-lg break-all"><?= $barang["nama_barang"] ?></p>
            <p class=" text-main text-lg"><?php $formater = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY);
                                            echo $formater->formatCurrency($barang["harga_barang"], "IDR") ?></p>
            <h2 class=" text-slate-700 text-sm"><?= $barang["terjual"] ?> Terjual</h2>
        </div>
    </a>

<?php endforeach; ?>