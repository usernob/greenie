<main class="my-2">
    <div class="container">
        <div class="my-2 p-4 rounded-md bg-slate-100 shadow-lg">
            <div class="mb-8">
                <h2 class="text-lg font-medium">Result For "<?= $_SESSION["query"] ?>"</h2>
            </div>
            <div class="gap-8 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 auto-cols-max auto-rows-max" id="barang-viewport" data-target="<?= BASE_URL ?>/home/search_barang">

            </div>
            <div class="h-96"></div>
        </div>
    </div>
</main>