<main class="my-2">
    <div class="container">
        <?php $formater = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY) ?>
        <?php if (!isset($_POST)) {
            return header("location:" . BASE_URL . "/cart");
        } ?>
        <form action="<?= BASE_URL ?>/order" method="post" class="flex flex-col gap-2">
            <div class="p-4 bg-slate-100 shadow-md rounded-md min-h-[70vh] flex flex-col gap-8">
                <div>
                    <h1 class="text-lg font-medium text-slate-900">Validasi Pesanan</h1>
                    <?php $i = 0; ?>
                    <?php foreach ($data["db"]["cart"] as $cart) : ?>
                        <div class="flex justify-between p-2 px-4 <?= ($i % 2 != 0) ? "bg-slate-600 text-slate-100" : "text-slate-600" ?>">
                            <?php $jumlah = $_POST["jumlah-" . $i]; ?>
                            <p><?= $cart["nama_barang"]; ?> <span>x<?= $jumlah ?></span></p>
                            <p><?= $formater->formatCurrency($cart["harga_barang"] * $jumlah, "IDR") ?></p>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </div>
                <div>
                    <h1 class="text-lg font-medium text-slate-900">Alamat</h1>
                    <p class="text-slate-400 text-sm">untuk memilih alamat lain, silahkan pergi ke halaman profile > alamat</p>
                </div>
            </div>
        </form>
    </div>
</main>