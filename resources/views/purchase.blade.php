<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- <div class="container">
        <div class="filter-bar">
            <input type="text" placeholder="Search by product, supplier, or ID...">
            <select>
              <option>Category</option>
              <option>Medical Supplies</option>
              <option>Pharmaceuticals</option>
            </select>
            <select>
              <option>Status</option>
              <option>Pending</option>
              <option>Delivered</option>
              <option>Cancelled</option>
            </select>
            <button>Filter</button>
        </div>
    </div> --}}
    <!-- Stats Cards -->
    <div class="stats">
        <div class="stat-card">
            <h2>{{ number_format($totalPurchases, 2) }}</h2>
            <p>Total Pembelian</p>
        </div>
        <div class="stat-card">
            <h2>{{ number_format($countPurchases, 0, '.', ',') }}</h2>
            <p>Pembelian Terjadi</p>
        </div>
        <div class="stat-card">
            <h2>{{ date_format($latestDate, 'Y-m-d') }}</h2>
            <p>Tanggal Pembelian Terakhir</p>
        </div>
    </div>
    <!-- Add New Purchase Button -->
    <a href="{{ route('purchase.create') }}"><button class="add-btn">Tambah Data Pembelian</button></a>
    <!-- Purchase Table -->
    <table>
        <thead>
            <tr>
                <th>ID Pembelian</th>
                <th>Tanggal</th>
                <th>ID Supplier</th>
                <th>ID Obat</th>
                <th>Kuantitas</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr>
                <td>{{ $record['PembelianID'] }}</td>
                <td>{{ $record['TanggalPembelian'] }}</td>
                <td>{{ $record['SupplierID'] }}</td>
                <td>{{ $record['ObatID'] }}</td>
                <td>{{ $record['Kuantitas'] }}</td>
                <td>{{ $record['Harga'] }}</td>
                <td class="action-buttons">
                <a href="{{ route('purchase.edit', $record['PembelianID']) }}"><button class="edit-btn">Edit</button></a>
                <a href="{{ route('purchase.destroy', $record['PembelianID']) }}" onclick="return confirm('Are you sure you want to delete this purchase?');">
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