<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Edit -->
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form action="{{ route('update_pasien', $pasien->PasienID) }}" method="POST">
                @csrf
                @method('PUT')
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                Edit Data Pasien {{ $pasien->PasienID }}
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="NamaPasien">
                            Nama Pasien
                        </label>
                        <input type="text" id="NamaPasien" name="NamaPasien" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->NamaPasien }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="UmurPasien">
                            Umur Pasien
                        </label>
                        <input type="number" id="UmurPasien" name="UmurPasien" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->UmurPasien }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="AlamatPasien">
                            Alamat Pasien
                        </label>
                        <input type="text" id="AlamatPasien" name="AlamatPasien" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->AlamatPasien }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="BeratBadanPasien">
                            Berat Badan Pasien
                        </label>
                        <input type="number" id="BeratBadanPasien" name="BeratBadanPasien" step="0.01" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->BeratBadanPasien }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="TinggiBadanPasien">
                            Tinggi Badan Pasien
                        </label>
                        <input type="number" id="TinggiBadanPasien" name="TinggiBadanPasien" step="0.01" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->TinggiBadanPasien }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="JenisKelamin">
                            Jenis Kelamin
                        </label>
                        <input type="text" id="JenisKelamin" name="JenisKelamin" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->JenisKelamin }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="NomorHP">
                            Nomor HP
                        </label>
                        <input type="text" id="NomorHP" name="NomorHP" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->NomorHP }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="AccountID">
                            Account ID (Opsional)
                        </label>
                        <input type="text" id="AccountID" name="AccountID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $pasien->AccountID }}">
                        </div>
                    </div>
                </div>
                <div class="flex justify-end" style="margin-right: 55px; margin-bottom: 20px">
                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        Update
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

</x-layout-admin>