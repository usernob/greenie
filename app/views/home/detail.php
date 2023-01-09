<?php $barang = $data["db"]["barang"]; ?>
<main class="my-2">
    <div class="container flex flex-col gap-2">
        <div class="p-4 bg-slate-100 rounded-md shadow-md flex items-start gap-4">
            <div class="flex flex-col items-center gap-4">
                <div id="carouselExampleControls" class="carousel relative" data-bs-ride="carousel">
                    <div class="carousel-inner relative w-96 h-96 overflow-hidden">

                        <?php if (!empty($barang["assets"])) : ?>
                            <?php foreach ($barang["assets"] as $image) : ?>


                                <div class="carousel-item <?php if ($image["index"] == 1) echo "active"; ?> relative float-left w-96 h-96" id="img-product" data-index="<?= $image["index"] ?>">
                                    <img src="data:image/jpg;base64,<?= base64_encode($image["foto"]); ?>" class="block h-96 object-cover object-center" />
                                </div>

                            <?php endforeach ?>
                        <?php else : ?>

                            <div class="carousel-item active relative float-left w-96 h-96" id="img-product">
                                <img src="data:image/jpg;base64,<?php $image = file_get_contents(BASE_URL . "/public/assets/dummy-image.jpg");
                                                                echo base64_encode($image); ?>" class="block h-96 object-cover object-center" />
                            </div>

                        <?php endif ?>

                    </div>
                    <button class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="w-full flex gap-4 justify-center overflow-x-auto p-4">

                    <?php if (!empty($barang["assets"])) : ?>
                        <?php foreach ($barang["assets"] as $thumbnail) : ?>

                            <div id="img-product-list" data-index="<?= $thumbnail["index"] ?>">
                                <img src="data:image/jpg;base64,<?= base64_encode($thumbnail["foto"]); ?>" class="w-16 h-16 hover:outline hover:outline-2 hover:outline-main rounded-sm object-cover object-center">
                            </div>

                        <?php endforeach ?>
                    <?php else : ?>

                        <div id="img-product-list">
                            <img src="data:image/jpg;base64,<?php $image = file_get_contents(BASE_URL . "/public/assets/dummy-image.jpg");
                                                            echo base64_encode($image); ?>" class="w-16 h-16 hover:outline hover:outline-2 hover:outline-main rounded-sm object-cover object-center">
                        </div>

                    <?php endif ?>


                </div>
            </div>
            <div class="w-full h-96 p-4 flex flex-col items-start justify-between">
                <div>
                    <h1 class=" text-2xl font-semibold break-all"><?= $barang["nama_barang"] ?></h1>
                    <h2 class=" text-3xl text-main font-medium">
                        <?php $formater = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY);
                        echo $formater->formatCurrency($barang["harga_barang"], "IDR") ?>
                    </h2>
                </div>
                <div class="bg-main py-4 px-8 w-fit flex items-center justify-center gap-2 shadow-lg rounded-sm hover:bg-green-600" data-target="<?= BASE_URL . "/cart/add/" . $barang["id_barang"] ?>" id="add-to-cart">
                    <svg xmlns=" http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <p class="cursor-pointer text-white">
                        Tambahkan Ke Keranjang
                    </p>
                </div>
            </div>
        </div>
        <div class="p-8 bg-slate-100 rounded-md shadow-md flex gap-8 items-center">
            <?php
            $avatar = file_get_contents(BASE_URL . "/public/assets/dummy-user.png");
            if (!empty($barang["avatar"])) {
                $avatar = $barang["avatar"];
            }
            ?>
            <img src="data:image/jpg;base64,<?= base64_encode($avatar) ?>" class="w-16 h-16 object-cover object-center rounded-full">
            <p class="text-xl"><?= $barang["username"] ?></p>
        </div>
        <div class="p-8 bg-slate-100 rounded-md shadow-md flex flex-col items-start gap-8">
            <div class="flex flex-col gap-4 w-fit">
                <h1 class="text-slate-900 text-xl font-medium">Detail Produk</h1>
                <div class="grid grid-cols-2 auto-cols-max text-sm gap-x-24 gap-y-3">
                    <p class="text-slate-500">Satuan</p>
                    <p class="text-slate-900"><?= $barang["satuan"] ?></p>
                    <p class="text-slate-500">Stok</p>
                    <p class="text-slate-900"><?= $barang["stok"] ?></p>
                    <p class="text-slate-500">Kategori</p>
                    <p class="text-slate-900"><?= $barang["nama_kategori"] ?></p>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="text-slate-900 text-xl font-medium">Deskripsi Produk</h1>
                <p class="text-slate-900 text-md"><?= $barang["deskripsi_barang"] ?></p>
            </div>
        </div>
    </div>
</main>