<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('store_dokter') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Tambah Data Dokter</h6>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="NamaDokter">Nama Dokter</label>
                            <input type="text" name="NamaDokter" id="NamaDokter" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="Departemen">Departemen</label>
                            <input type="text" name="Departemen" id="Departemen" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="AlamatDokter">Alamat Dokter</label>
                            <input type="text" name="AlamatDokter" id="AlamatDokter" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="NomorHP">Nomor HP</label>
                            <input type="text" name="NomorHP" id="NomorHP" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="LayananID">Layanan ID</label>
                            <input type="text" name="LayananID" id="LayananID" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="FotoDokter">Foto Dokter</label>
                            <input type="file" name="FotoDokter" id="FotoDokter" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full">
                        </div>
                        <div class="w-full px-4 mt-4">
                            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Tambah</button>
                            <a href="{{ route('info_dokter') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
