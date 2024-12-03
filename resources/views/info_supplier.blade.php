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
        <a href="{{ route('create_supplier') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Supplier
        </a>
    </div>

    <table class="min-w-full divide-y divide-gray-200" id="Table">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">Nomor HP</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($suppliers as $supplier)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['SupplierID'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['NamaSupplier'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $supplier['NomorHP'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('edit_supplier', $supplier->SupplierID) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('delete_supplier', $supplier->SupplierID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus supplier ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-lg font-bold text-red-500">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout-admin>