<main class="my-2">
    <div class="container">
        <?php $formater = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY) ?>
        <?php if (!isset($_POST)) {
            return header("location:" . BASE_URL . "/cart");
        } ?>
        <form action="<?= BASE_URL ?>/cart/order" method="post" class="flex flex-col gap-2">
            <div class="p-4 bg-slate-100 shadow-md rounded-md min-h-[70vh] flex flex-col gap-8">
                <div>
                    <h1 class="text-lg font-medium text-slate-900">Validasi Pesanan</h1>
                    <?php $i = 0; ?>
                    <?php foreach ($data["db"]["cart"] as $cart) : ?>
                        <div class="flex justify-between p-2 px-4 <?= ($i % 2 != 0) ? "bg-slate-600 text-slate-100" : "text-slate-600" ?>">
                            <?php $jumlah = $_POST["jumlah-" . $i]; ?>
                            <p><?= $cart["nama_barang"]; ?> <span>x<?= $jumlah ?></span></p>
                            <input type="hidden" name=<?= "checkbox" . $i ?> value="<?= $_POST["checkbox-" . $i] ?>">
                            <input type="hidden" name=<?= "jumlah" . $i ?> value="<?= $jumlah ?>">
                            <p><?= $formater->formatCurrency($cart["harga_barang"] * $jumlah, "IDR") ?></p>
                        </div>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </div>
                <div>
                    <h1 class="text-lg font-medium text-slate-900">Alamat</h1>
                    <p class="text-slate-400 text-sm">untuk memilih alamat lain, silahkan pergi ke halaman profile > alamat</p>
                    <div class="rounded-md border-2 border-slate-900 w-full my-2 p-2">
                        <?php $address = $data["db"]["address"] ?>
                        <h2 class="text-lg font-medium"><?= $address["remarks"] ?></h2>
                        <p><?= "RT " . $address["rt"] . " RW " . $address["rw"] . ", " . join(", ", [$address["dusun"], $address["desa"], $address["kecamatan"], $address["kabupaten"], $address["provinsi"]]) ?></p>
                    </div>
                </div>
                <div>
                    <h1 class="text-lg font-medium text-slate-900">Pilih Metode Pembayaran</h1>
                    <div class="flex flex-col gap-2 justify-center items-start">
                        <?php foreach ($data["db"]["pembayaran"] as $metode_p) : ?>
                            <div class="flex justify-between w-full h-20 items-center border border-slate-600 rounded-md p-2" id="div-metode">
                                <?php $image = (isset($metode_p["thumbnail"])) ? $metode_p["thumbnail"] : file_get_contents(BASE_URL . "/public/assets/dummy-user.png") ?>
                                <img src=<?= 'data:image/png;base64,' . base64_encode($image); ?> class="w-20 h-fit">
                                <input class="w-5 h-5" type="radio" name="metode-pembayaran" value="<?= $metode_p["id_metode"] ?>" id="metode-pembayaran">
                            </div>
                        <?php endforeach ?>
                        <script>
                            let list_radio = document.querySelectorAll("#metode-pembayaran");
                            let list_parrent_radio = document.querySelectorAll("#div-metode");
                            let current = 0;
                            for (let i = 0; i < list_radio.length; i++) {
                                const element = list_radio[i];
                                element.addEventListener("change", function() {
                                    list_parrent_radio[current].classList.remove("border-2");
                                    current = i;
                                    if (this.checked) {
                                        element.parentElement.classList.add("border-2");
                                    }
                                })
                            }
                        </script>
                    </div>
                </div>
                <div class="flex items-center justify-end gap-4">
                    <p class="text-2xl text-main font-medium">Total : <?= $formater->formatCurrency($_POST["total"], "IDR") ?></p>
                    <button type="submit" class="bg-main py-2 px-8 hover:bg-green-600 rounded-md text-slate-50">Order</button>
                </div>
            </div>
        </form>
    </div>
</main>