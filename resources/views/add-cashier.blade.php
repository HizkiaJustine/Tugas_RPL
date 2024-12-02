<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Add -->
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form action="{{ route('cashier.store') }}" method="POST">
                @csrf
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                Cashier Information
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Kasir
                        </label>
                        <input type="text" id="kasirID" name="KasirID" aria-label="disabled input" class="border-0 px-3 py-3 placeholder-black-700 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none cursor-not-allowed focus:ring w-full ease-linear transition-all duration-150" placeholder="Otomatis terisi" readonly>
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Nama
                        </label>
                        <input type="text" id="namaKasir" name="NamaKasir" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Jane Doe">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Nomor HP
                        </label>
                        <input type="text" id="nomorHP" name="NomorHP" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Contoh : +6288122334456">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Alamat
                        </label>
                        <input type="text" id="alamat" name="AlamatKasir" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Contoh : Jalan XXX Kota XXX">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="gender">
                                Jenis Kelamin
                            </label>
                            <select id="gender" name="JenisKelamin" class="border-0 px-3 py-3 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div> 
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Akun
                        </label>
                        <input type="text" id="AccountID" name="AccountID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Contoh : AC1">
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="flex justify-end mt-4" style="margin-right: 15px;">
                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        Submit
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-layout-admin>