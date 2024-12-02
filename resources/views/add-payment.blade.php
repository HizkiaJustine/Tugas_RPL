<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>

    @if (session('error'))
        <div style="background-color: rgb(247, 162, 162); color: rgb(163, 10, 10); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="background-color: rgb(162, 247, 195); color: rgb(10, 106, 16); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('success') }}
        </div>
    @endif 

    <!-- Add -->
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form action="{{ route('payment.store') }}" method="POST">
                @csrf
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                Payment Information
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Pembayaran
                        </label>
                        <input type="text" id="pembayaranID" name="PembayaranID" aria-label="disabled input" class="border-0 px-3 py-3 placeholder-black-700 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none cursor-not-allowed focus:ring w-full ease-linear transition-all duration-150" placeholder="Otomatis terisi" disabled>
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Tanggal
                        </label>
                        <input type="text" id="tanggalPembayaran" name="TanggalPembayaran" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="YYYY-MM-DD" onfocus="(this.type='date')">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            Jumlah
                        </label>
                        <input type="number" id="jumlah" name="JumlahPembayaran" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Contoh : 125000">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="metode">
                                Metode
                            </label>
                            <select id="metode" name="MetodePembayaran" class="border-0 px-3 py-3  placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                <option value="" disabled selected>Pilih Metode Pembayaran</option>
                                <option value="QRIS">QRIS</option>
                                <option value="Cash">Tunai</option>
                                <option value="Credit">Kredit</option>
                                <option value="Debit card">Kartu Debit</option>
                            </select>
                        </div>
                    </div> 
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Layanan
                        </label>
                        <input type="text" id="layananID" name="LayananID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Contoh : L1">
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="grid-password">
                            ID Pasien
                        </label>
                        <input type="text" id="pasienID" name="PasienID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Contoh : P1">
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