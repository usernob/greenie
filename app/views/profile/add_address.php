<h1 class="p-4 text-2xl font-semibold">Tambahkan Alamat</h1>
<form class="p-4 flex flex-col gap-4" method="POST" action="<?= BASE_URL ?>/profile/add_address_handler">
    <div class="flex flex-col w-full items-start gap-2">
        <label class="text-right my-auto font-medium">Remarks</label>
        <input id="remarks" name="remarks" placeholder="Masukkan nama alamat" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text">
    </div>
    <div class="flex flex-col w-full items-start gap-2">
        <label class="text-right my-auto font-medium">Kode POS</label>
        <input id="poscode" name="poscode" placeholder="Masukkan kode pos" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" type="text">
    </div>
    <div class="flex flex-col w-full items-start gap-2">
        <label class="text-right my-auto font-medium">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="w-full col-span-3 py-2 px-4 rounded-md outline outline-1 outline-slate-700 bg-slate-100 focus:outline-2" readonly />
        <div class="w-full grid auto-cols-max grid-cols-2 gap-4">
            <div>
                <label class="text-sm">Provinsi</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="provinsi" id="provinsi">
                    <option value></option>
                </select>
            </div>
            <div>
                <label class="text-sm">Kabupaten/Kota</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="kabupaten" id="kabupaten" disabled="disabled">
                    <option value></option>
                </select>
            </div>
            <div>
                <label class="text-sm">Kecamatan</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="kecamatan" id="kecamatan" disabled="disabled">
                    <option value></option>
                </select>
            </div>
            <div>
                <label class="text-sm">Desa/Kelurahan</label>
                <select class="outline outline-slate-700 rounded-md bg-slate-100 focus:outline-2 w-full py-2 px-4" name="desa" id="desa" disabled="disabled">
                    <option value></option>
                </select>
            </div>
        </div>
    </div>
</form>