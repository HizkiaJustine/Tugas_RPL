<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container">
        <div class="filter-bar">
            <input id="searchInput" type="text" placeholder="Search by ID Kasir, Nama, Jenis Kelamin ...">
            <button id="filterButton">Filter</button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats">
        <div class="stat-card">
            <h2>{{ number_format($countCashiers, 0, '.', ',') }}</h2>
            <p>Total Kasir</p>
        </div>
        <div class="stat-card">
            <h2>{{ number_format($totalFemaleCashiers, 0, ',', '.') }}</h2>
            <p>Total Kasir Perempuan</p>
        </div>
        <div class="stat-card">
            <h2>{{ number_format($totalMaleCashiers, 0, ',', '.') }}</h2>
            <p>Total Kasir Laki-laki</p>
        </div>
    </div>

    <!-- Add New Purchase Button -->
    <a href="{{ route('cashier.create') }}"><button class="add-btn">Tambah Data Kasir</button></a>
    <!-- Purchase Table -->
    <table id="Table">
        <thead>
            <tr>
                <th>ID Kasir</th>
                <th>Nama</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>ID Akun</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr>
                <td>{{ $record['KasirID'] }}</td>
                <td>{{ $record['NamaKasir'] }}</td>
                <td>{{ $record['NomorHP'] }}</td>
                <td>{{ $record['AlamatKasir'] }}</td>
                <td>{{ $record['JenisKelamin'] }}</td>
                <td>{{ $record['AccountID'] }}</td>
                <td class="action-buttons">
                <a href="{{ route('cashier.edit', $record['KasirID']) }}"><button class="edit-btn">Edit</button></a>
                <a href="{{ route('cashier.destroy', $record['KasirID']) }}" onclick="return confirm('Are you sure you want to delete this cashier?');">
                    <button class="delete-btn bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded">
                        Delete
                    </button>
                </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout-admin>