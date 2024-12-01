<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>

    <div class="flex justify-end mb-4">
        <a href="{{ route('create_pasien') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Pasien
        </a>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Umur</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Berat Badan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tinggi Badan</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Lahir</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Kelamin</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor HP</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($pasien as $pasien)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['PasienID'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['NamaPasien'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['UmurPasien'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['AlamatPasien'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['BeratBadanPasien'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['TinggiBadanPasien'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['TanggalLahirPasien'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['JenisKelamin'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $pasien['NomorHP'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('edit_pasien', $pasien->PasienID) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('delete_pasien', $pasien->PasienID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="px-6 py-4 whitespace-nowrap text-center text-lg font-bold text-red-500">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout-admin>