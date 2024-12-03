<x-layout-admin>
    <x-slot:title>Create New Article</x-slot:title>
    <x-slot:name>Create Article</x-slot:name>

    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('admin.articles.store') }}" method="POST">
                    @csrf
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">Create New Article</h6>
                    <div class="flex flex-wrap">
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="title">Title</label>
                            <input type="text" name="title" id="title" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="content">Content</label>
                            <textarea name="content" id="content" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required></textarea>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="publishDate">Publish Date</label>
                            <input type="date" name="publishDate" id="publishDate" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="layanan">Topik</label>
                            <select name="layanan" id="layanan" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                                <option value="" disabled selected>Pilih Topik</option> <!-- Placeholder -->
                                @foreach($layanans as $layanan)
                                    <option value="{{ $layanan->LayananID }}">{{ $layanan->NamaLayanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full px-4 mb-3">
                            <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="dokterID">Dokter</label>
                            <select name="dokterID" id="dokterID" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full" required>
                                <option value="" disabled selected>Pilih Dokter</option> <!-- Placeholder -->
                            </select>
                        </div>
                        <div class="w-full px-4 mt-4">
                            <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Create</button>
                            <a href="{{ route('admin.articles.index') }}" class="bg-gray-500 text-white font-bold py-2 px-4 rounded">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('layanan').addEventListener('change', function() {
            var layananID = this.value;
            var dokterSelect = document.getElementById('dokterID');
            dokterSelect.innerHTML = '<option value="" disabled selected>Pilih Dokter</option>'; // Reset dokter options

            @foreach($layanans as $layanan)
                if (layananID == '{{ $layanan->LayananID }}') {
                    @foreach($layanan->doctors as $doctor)
                        var option = document.createElement('option');
                        option.value = '{{ $doctor->DokterID }}';
                        option.text = '{{ $doctor->NamaDokter }}';
                        dokterSelect.appendChild(option);
                    @endforeach
                }
            @endforeach
        });
    </script>
</x-layout-admin>