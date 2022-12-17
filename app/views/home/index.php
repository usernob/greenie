<main class="">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide relative w-full max-h-60" data-bs-ride="carousel">
            <div class="carousel-inner relative w-full overflow-hidden">
                <div class="carousel-item active relative float-left w-full max-h-60">
                    <img src="./assets/test.jpg" class="block w-full h-full object-cover object-center" alt="Wild Landscape" />
                </div>
                <div class="carousel-item relative float-left w-full max-h-60">
                    <img src="./assets/test.jpg" class="block w-full h-full object-cover object-center" alt="Camera" />
                </div>
                <div class="carousel-item relative float-left w-full max-h-60">
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
        <div class="overflow-x-auto w-full py-4">
            <div class="flex justify-start items-center gap-4">
                <div class="w-32 flex flex-col items-center">
                    <img src="./assets/test.jpg" alt="" class="h-16 w-16 object-cover object-center rounded-full">
                    <p>Sayur segar</p>
                </div>
            </div>
        </div>
        <div class="gap-8 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            <?php foreach ($data["db"]["barang"] as $barang) : ?>

                <a href="/login" class="max-w-md">
                    <img src="data:image/jpg;base64,<?= base64_encode($barang["foto"]); ?>" alt="" class="w-full h-52 object-cover object-center">
                    <h1><?= $barang["nama_barang"] ?></h1>
                    <p><?php $formater = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY);
                        echo $formater->formatCurrency($barang["harga_barang"], "IDR") ?></p>
                </a>

            <?php endforeach; ?>
        </div>
    </div>
</main>