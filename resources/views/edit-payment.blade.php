<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (@session('error'))
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <!-- Edit -->
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form action="{{ route('payment.update', $record['PembayaranID']) }}" method="POST">
                @csrf
                @method('POST')
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                Payment Information {{ $record['PembayaranID'] }}
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Pembayaran
                        </label>
                        <input type="text" id="pembayaranID" name="PembayaranID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $record['PembayaranID'] }}" readonly>
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Tanggal
                        </label>
                        <input type="text" id="tanggalPembayaran" name="TanggalPembayaran" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $record['TanggalPembayaran'] }}" onfocus="(this.type='date')">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Jumlah
                        </label>
                        <input type="number" id="jumlahPembayaran" name="JumlahPembayaran" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $record['JumlahPembayaran'] }}"  step="any">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Metode
                        </label>
                        <input type="text" id="metodePembayaran" name="MetodePembayaran" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $record['MetodePembayaran'] }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Layanan
                        </label>
                        <input type="text" id="layananID" name="LayananID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $record['LayananID'] }}">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Pasien
                        </label>
                        <input type="text" id="pasienID" name="PasienID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $record['PasienID'] }}">
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="flex justify-end mt-4" style="margin-right: 15px;">
                    <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        Update
                    </button>
                </div>
            </form>
            </div>         
        </div>
    </div>

</x-layout-admin>