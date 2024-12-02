<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="flex justify-end mb-4">
        <a href="{{ route('create_account') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Tambah Akun
        </a>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Account ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($accounts as $account)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $account['AccountID'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $account['email'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $account['Role'] }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('edit_account', $account->AccountID) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('delete_account', $account->AccountID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-lg font-bold text-red-500">Belum ada data akun</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout-admin>