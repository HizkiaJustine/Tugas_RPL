<x-layout-admin>
    <x-slot:title>{{ $title }}</x-slot:title>
    <x-slot:name>{{ $name }}</x-slot:name>
    {{-- <div class="container">
        <div class="filter-bar">
            <input type="text" placeholder="Search by product, supplier, or ID...">
            <select>
              <option>Category</option>
              <option>Medicine</option>
              <option>Appointment</option>
            </select>
            <button>Filter</button>
        </div>
    </div> --}}

    <!-- Stats Cards -->
    <div class="stats">
        <div class="stat-card">
            <h2>{{ number_format($totalPayments, 2) }}</h2>
            <p>Total Pembayaran</p>
        </div>
        <div class="stat-card">
            <h2>{{ number_format($countPayments, 0, '.', ',') }}</h2>
            <p>Pembayaran Terjadi</p>
        </div>
        <div class="stat-card">
            <h2>{{ date_format($latestDate, 'Y-m-d') }}</h2>
            <p>Tanggal Pembelian Terakhir</p>
        </div>
    </div>

    <!-- Add New Purchase Button -->
    <a href="{{ route('payment.create') }}"><button class="add-btn">Tambah Data Pembayaran</button></a>
    <!-- Purchase Table -->
    <table>
        <thead>
            <tr>
                <th>ID Pembayaran</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>ID Layanan</th>
                <th>ID Pasien</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <tr>
                <td>{{ $record['PembayaranID'] }}</td>
                <td>{{ $record['TanggalPembayaran'] }}</td>
                <td>{{ $record['JumlahPembayaran'] }}</td>
                <td>{{ $record['MetodePembayaran'] }}</td>
                <td>{{ $record['LayananID'] }}</td>
                <td>{{ $record['PasienID'] }}</td>
                <td class="action-buttons">
                <a href="{{ route('payment.edit', $record['PembayaranID']) }}"><button class="edit-btn">Edit</button></a>
                <a href="{{ route('payment.destroy', $record['PembayaranID']) }}" onclick="return confirm('Are you sure you want to delete this payment?');">
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