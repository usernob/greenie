<main class="my-2">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide relative w-full max-h-80" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden">
                <div class="carousel-item active relative float-left w-full max-h-80">
                    <img src="./assets/test.jpg" class="block w-full h-full object-cover object-center" alt="Wild Landscape" />
                </div>
                <div class="carousel-item relative float-left w-full max-h-80">
                    <img src="./assets/test.jpg" class="block w-full h-full object-cover object-center" alt="Camera" />
                </div>
                <div class="carousel-item relative float-left w-full max-h-80">
                    <img src="./assets/test.jpg" class="block w-full h-full object-cover object-center" alt="Exotic Fruits" />
                </div>
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
        <div class="my-2 p-4 rounded-md bg-slate-100 shadow-lg">
            <div class="overflow-x-auto w-full py-8">
                <div class="flex justify-start items-center gap-4">
                    <div class="w-32 flex flex-col items-center">
                        <img src="./assets/test.jpg" alt="" class="h-16 w-16 object-cover object-center rounded-full">
                        <p>Sayur segar</p>
                    </div>
                </div>
            </div>
            <div class="gap-8 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 auto-cols-max auto-rows-max">

                <?php if (count($data["db"]["barang"]) <= 0) : ?>
                    <div class="col-span-full">
                        <p class=" text-xl text-slate-500 text-center">item not found</p>
                    </div>
                <?php endif ?>

                <?php foreach ($data["db"]["barang"] as $barang) : ?>

                    <a href="<?= BASE_URL ?>/home/detail/<?= $barang['id_barang'] ?>" class="max-w-md bg-slate-50 shadow-lg rounded-md hover:outline hover:outline-2 hover:outline-main">
                        <img <?php
                                $image = file_get_contents(BASE_URL . "/assets/dummy-image.jpg");
                                if (!empty($barang["foto"])) {
                                    $image = $barang["foto"];
                                }
                                $base64 = 'data:image/png;base64,' . base64_encode($image);
                                ?> src="<?= $base64 ?>" class="w-full h-52 object-cover object-center bg-slate-300 rounded-t-md">
                        <div class="p-2">
                            <p class=" font-medium text-xl break-all"><?= $barang["nama_barang"] ?></p>
                            <p class=" text-main text-lg"><?php $formater = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY);
                                                            echo $formater->formatCurrency($barang["harga_barang"], "IDR") ?></p>
                            <h2 class=" text-slate-700"><?= $barang["terjual"] ?> Terjual</h2>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>
            <div class="h-96"></div>
        </div>
    </div>
</main>