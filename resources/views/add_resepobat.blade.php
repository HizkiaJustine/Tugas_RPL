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
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="DokterID">
                                    Dokter
                                </label>
                                <select id="DokterID" name="DokterID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                    @foreach($dokters as $dokter)
                                        <option value="{{ $dokter->DokterID }}">{{ $dokter->NamaDokter }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="PasienID">
                                    Pasien
                                </label>
                                <select id="PasienID" name="PasienID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                    @foreach($pasiens as $pasien)
                                        <option value="{{ $pasien->PasienID }}">{{ $pasien->NamaPasien }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="InstruksiPenggunaanObat">
                                    Instruksi Penggunaan Obat
                                </label>
                                <textarea id="InstruksiPenggunaanObat" name="InstruksiPenggunaanObat" rows="4" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Instruksi Penggunaan Obat" required></textarea>
                            </div>
                        </div>

                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="ObatID">
                                    Obat
                                </label>
                                <select id="ObatID" name="ObatID[]" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" multiple required>
                                    @foreach($obats as $obat)
                                        <option value="{{ $obat->ObatID }}">{{ $obat->NamaObat }} ({{ $obat->TipeObat }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="DosisObat">
                                    Dosis Obat
                                </label>
                                <input type="text" id="DosisObat" name="DosisObat[]" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Dosis Obat" required>
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
