<main class="my-2">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide relative w-full max-h-80" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden">
                <div class="carousel-item active relative float-left w-full max-h-80">
                    <img src="<?= BASE_URL ?>/public/assets/dummy-image.jpg" class="block w-full h-80 object-cover object-center" alt="Wild Landscape" />
                </div>
                <div class="carousel-item relative float-left w-full max-h-80">
                    <img src="<?= BASE_URL ?>/public/assets/dummy-image.jpg" class="block w-full h-80 object-cover object-center" alt="Camera" />
                </div>
                <div class="carousel-item relative float-left w-full max-h-80">
                    <img src="<?= BASE_URL ?>/public/assets/dummy-image.jpg" class="block w-full h-80 object-cover object-center" alt="Exotic Fruits" />
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
            <div class="overflow-x-auto w-full mb-8">
                <h2 class="font-medium my-4 text-lg">Kategori</h2>
                <div class="flex justify-start items-center gap-4">
                    <?php if (isset($data["db"]["category"])) :
                        foreach ($data["db"]["category"] as $kategori) : ?>
                            <div class="w-32 flex flex-col items-center">
                                <img <?php
                                        $image = file_get_contents(BASE_URL . "/public/assets/dummy-image.jpg");
                                        if (!empty($kategori["foto"])) {
                                            $image = $kategori["foto"];
                                        }
                                        $base64 = 'data:image/png;base64,' . base64_encode($image);
                                        ?> src="<?= $base64 ?>" class="h-16 w-16 object-cover object-center rounded-full border border-slate-800">
                                <p class="text-center text-sm"><?= $kategori["nama_kategori"] ?></p>
                            </div>
                    <?php endforeach;
                    endif ?>
                </div>
            </div>
            <div class="gap-8 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 auto-cols-max auto-rows-max" id="barang-viewport" data-target="<?= BASE_URL ?>/home/get_barang">

            </div>
            <div class="h-96"></div>
        </div>
    </div>
</main>