<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="container">
        <div class="filter-bar">
            <input id="searchInput" type="text" placeholder="Search by ID...">
            <button id="filterButton">Filter</button>
        </div>
    </div>

    <div class="flex justify-end mb-4">
        <a href="{{ route('create_resepobat') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Resep Obat
        </a>
    </div>

    <table class="min-w-full divide-y divide-gray-200" id="Table">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Dokter ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pasien ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">List Obat</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Instruksi Penggunaan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($resepObat as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->ResepObatID }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->Tanggal }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->DokterID }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->PasienID }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->ListObat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->InstruksiPenggunaanObat }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('edit_resepobat', $item->ResepObatID) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('delete_resepobat', $item->ResepObatID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus resep obat ini?')">Delete</button>
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