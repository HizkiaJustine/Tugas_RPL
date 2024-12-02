<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('update_layanan', $layanan['LayananID']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Informasi Layanan</h6>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="namaLayanan">Nama Layanan</label>
                            <input type="text" name="NamaLayanan" id="namaLayanan" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $layanan['NamaLayanan'] }}" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="hargaLayanan">Harga Layanan</label>
                            <input type="number" step="0.01" name="HargaLayanan" id="hargaLayanan" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" value="{{ $layanan['HargaLayanan'] }}" required>
                        </div>
                        <div class="w-full px-4 mt-4">
                            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Simpan Perubahan</button>
                            <a href="{{ route('info_layanan') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>