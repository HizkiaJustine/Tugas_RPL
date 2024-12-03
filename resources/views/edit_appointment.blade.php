<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('update_appointment', $appointment['AppointmentID']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Informasi Janji Temu</h6>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="tanggalJanjiTemu">Tanggal Janji Temu</label>
                            <input type="date" name="TanggalJanjiTemu" id="tanggalJanjiTemu" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $appointment['TanggalJanjiTemu'] }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="jamJanjiTemu">Jam Janji Temu</label>
                            <input type="time" name="JamJanjiTemu" id="jamJanjiTemu" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $appointment['JamJanjiTemu'] }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="dokterID">Dokter ID</label>
                            <input type="text" name="DokterID" id="dokterID" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $appointment['DokterID'] }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="pasienID">Pasien ID</label>
                            <input type="text" name="PasienID" id="pasienID" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $appointment['PasienID'] }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="tujuan">Tujuan</label>
                            <input type="text" name="Tujuan" id="tujuan" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $appointment['Tujuan'] }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="status">Status</label>
                            <select name="Status" id="status" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                                <option value="Selesai" {{ $appointment['Status'] == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="Batal" {{ $appointment['Status'] == 'Batal' ? 'selected' : '' }}>Batal</option>
                                <option value="Ongoing" {{ $appointment['Status'] == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                            </select>
                        </div>
                        <div class="w-full px-4 mt-4">
                            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Simpan Perubahan</button>
                            <a href="{{ route('info_appointment') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>