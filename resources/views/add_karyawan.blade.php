<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('store_karyawan') }}" method="POST">
                    @csrf
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Informasi Karyawan</h6>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="namaKaryawan">Nama Karyawan</label>
                            <input type="text" name="NamaKaryawan" id="namaKaryawan" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="jabatan">Jabatan</label>
                            <input type="text" name="Jabatan" id="jabatan" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Contoh: Manager, Staff, Admin" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="nomorHP">Nomor HP</label>
                            <input type="tel" name="NomorHP" id="nomorHP" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="alamatKaryawan">Alamat Karyawan</label>
                            <input type="text" name="AlamatKaryawan" id="alamatKaryawan" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="Alamat Lengkap" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="jenisKelamin">Jenis Kelamin</label>
                            <select name="JenisKelamin" id="jenisKelamin" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="accountID">Account ID</label>
                            <input type="text" name="AccountID" id="accountID" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" placeholder="ID Akun (opsional)">
                        </div>
                        <div class="w-full px-4 mt-4">
                            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Simpan Karyawan</button>
                            <a href="{{ route('index_karyawan') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
