<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Add -->
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('store_rekammedis') }}" method="POST">
                    @csrf
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Tambah Data Rekam Medis
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
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="NamaPasien">
                                    Nama Pasien
                                </label>
                                <input type="text" id="NamaPasien" name="NamaPasien" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Nama Pasien" required>
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
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="HasilDiagnosa">
                                    Hasil Diagnosa
                                </label>
                                <textarea id="HasilDiagnosa" name="HasilDiagnosa" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Hasil Diagnosa" required></textarea>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="Perawatan">
                                    Perawatan
                                </label>
                                <textarea id="Perawatan" name="Perawatan" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Perawatan" required></textarea>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="ResepObat">
                                    Resep Obat
                                </label>
                                <textarea id="ResepObat" name="ResepObat" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Resep Obat" required></textarea>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="HasilLab">
                                    Hasil Lab
                                </label>
                                <textarea id="HasilLab" name="HasilLab" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Hasil Lab" required></textarea>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="HasilKonsultasi">
                                    Hasil Konsultasi
                                </label>
                                <select id="HasilKonsultasi" name="HasilKonsultasi" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Rawat Inap">Rawat Inap</option>
                                    <option value="Rujukan">Rujukan</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4" id="RumahSakitRujukanContainer" style="display: none;">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="RumahSakitRujukan">
                                    Rumah Sakit Rujukan
                                </label>
                                <select id="RumahSakitRujukan" name="RumahSakitRujukan" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    <option value="Rumah Sakit Hermina">Rumah Sakit Hermina</option>
                                    <option value="Rumah Sakit Mitra Keluarga">Rumah Sakit Mitra Keluarga</option>
                                    <option value="Rumah Sakit Cipto Mangunkusumo">Rumah Sakit Cipto Mangunkusumo</option>
                                    <option value="Rumah Sakit Siloam">Rumah Sakit Siloam</option>
                                    <option value="Rumah Sakit Harapan Kita">Rumah Sakit Harapan Kita</option>
                                </select>
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

<script>
    document.getElementById('HasilKonsultasi').addEventListener('change', function () {
        var rumahSakitRujukanContainer = document.getElementById('RumahSakitRujukanContainer');
        if (this.value === 'Rujukan') {
            rumahSakitRujukanContainer.style.display = 'block';
        } else {
            rumahSakitRujukanContainer.style.display = 'none';
        }
    });
</script>