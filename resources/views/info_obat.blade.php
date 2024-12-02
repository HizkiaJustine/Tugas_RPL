<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="flex justify-end mb-4">
        <a href="{{ route('create_obat') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Obat
        </a>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kadaluarsa</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($obat as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->ObatID }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->NamaObat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->TipeObat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->TanggalKadaluarsa }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->JumlahObat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->HargaObat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('edit_obat', $item->ObatID) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('delete_obat', $item->ObatID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus obat ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="px-6 py-4 whitespace-nowrap text-center text-lg font-bold text-red-500">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout-admin>