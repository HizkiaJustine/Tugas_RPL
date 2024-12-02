<x-layout-admin>
    <x-slot:title>Tambah Pemasok</x-slot:title>
    <x-slot:name>Pemasok Baru</x-slot:name>

    <h1>Tambah Pemasok</h1>
    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        <label for="NamaSupplier">Nama Pemasok:</label>
        <input type="text" id="NamaSupplier" name="NamaSupplier" required>
        <br>
        <label for="NomorHP">Nomor HP:</label>
        <input type="text" id="NomorHP" name="NomorHP" required>
        <br>
        <button type="submit">Tambah Pemasok</button>
    </form>
</x-layout-admin>
