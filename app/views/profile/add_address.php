<h1 class="p-4 text-2xl font-semibold">Tambahkan Alamat</h1>
<form class="p-4 flex flex-col gap-4" method="POST" action="<?= BASE_URL ?>/profile/add_address_handler">
    <div class="flex flex-col w-full items-start gap-2">
        <label class="text-right my-auto font-medium">Remarks</label>
        <input id="remarks" name="remarks" placeholder="Masukkan nama alamat" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" required>
    </div>
    <div class="flex flex-col w-full items-start gap-2">
        <label class="text-right my-auto font-medium">Kode POS</label>
        <input id="kode_pos" name="kode_pos" placeholder="Masukkan kode pos" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" required>
    </div>
    <div class="flex flex-col w-full items-start gap-2">
        <label class="text-right my-auto font-medium">Alamat</label>
        <div class="w-full grid auto-cols-max grid-cols-2 gap-4">
            <div>
                <label class="text-sm">Provinsi</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="provinsi" id="provinsi" required></select>
            </div>
            <div>
                <label class="text-sm">Kabupaten/Kota</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="kabupaten" id="kabupaten" disabled="disabled" required></select>
            </div>
            <div>
                <label class="text-sm">Kecamatan</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="kecamatan" id="kecamatan" disabled="disabled" required></select>
            </div>
            <div>
                <label class="text-sm">Desa/Kelurahan</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="desa" id="desa" disabled="disabled" required></select>
            </div>
            <div>
                <label class="text-sm">Dusun</label>
                <input id="dusun" name="dusun" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" required>
            </div>
            <div class="flex w-full gap-4">
                <div>
                    <label class="text-sm">RT</label>
                    <input id="rt" name="rt" pattern="[0-9]*" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" required>
                </div>
                <div>
                    <label class="text-sm">RW</label>
                    <input id="rw" name="rw" pattern="[0-9]*" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" required>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-full items-start">
        <label class="text-right my-auto font-medium">Detail Alamat</label>
        <p class="text-sm text-slate-700 mb-2">seperti: nama jalan, no rumah, no gang, atau penanda lainnya</p>
        <input id="detail" name="detail" placeholder="Masukkan Detail" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text" required>
    </div>
    <div>
        <input class="bg-main py-2 px-8 rounded-md col-start-4 text-white hover:bg-green-600" type="submit" value="submit" />
    </div>
</form>