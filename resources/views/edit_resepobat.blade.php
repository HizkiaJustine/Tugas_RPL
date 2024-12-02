<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('update_resepobat', $resepObat->ResepObatID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Edit Resep Obat</h6>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="Tanggal">Tanggal</label>
                            <input type="date" name="Tanggal" id="Tanggal" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $resepObat->Tanggal }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="DokterID">ID Dokter</label>
                            <input type="text" name="DokterID" id="DokterID" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $resepObat->DokterID }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="PasienID">ID Pasien</label>
                            <input type="text" name="PasienID" id="PasienID" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $resepObat->PasienID }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="ListObat">List Obat</label>
                            <input type="text" name="ListObat" id="ListObat" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $resepObat->ListObat }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="InstruksiPenggunaanObat">Instruksi Penggunaan Obat</label>
                            <textarea name="InstruksiPenggunaanObat" id="InstruksiPenggunaanObat" rows="3" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>{{ $resepObat->InstruksiPenggunaanObat }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end" style="margin-right: 55px; margin-bottom: 20px">
                        <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>