<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Add -->
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('store_resepobat') }}" method="POST">
                    @csrf
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Tambah Resep Obat
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="Tanggal">
                                    Tanggal
                                </label>
                                <input type="date" id="Tanggal" name="Tanggal" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="NamaDokter">
                                    Nama Dokter
                                </label>
                                <input type="text" id="NamaDokter" name="NamaDokter" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Nama Dokter" required>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="NamaPasien">
                                    Nama Pasien
                                </label>
                                <input type="text" id="NamaPasien" name="NamaPasien" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Nama Pasien" required>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="ListObat">
                                    List Obat
                                </label>
                                <input type="text" id="ListObat" name="ListObat" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="List Obat" required>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="InstruksiPenggunaanObat">
                                    Instruksi Penggunaan Obat
                                </label>
                                <textarea id="InstruksiPenggunaanObat" name="InstruksiPenggunaanObat" rows="3" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Instruksi Penggunaan Obat" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end" style="margin-right: 55px; margin-bottom: 20px">
                        <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>