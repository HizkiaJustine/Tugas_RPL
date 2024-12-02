<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <form action="{{ route('store_account') }}" method="POST">
                @csrf
                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                Informasi Akun
                </h6>
                <div class="flex flex-wrap">
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="email">
                            Email
                        </label>
                        <input type="email" name="email" id="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="password">
                            Password
                        </label>
                        <input type="password" name="password" id="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4">
                        <div class="relative w-full mb-3">
                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" htmlfor="Role">
                            Role
                        </label>
                        <select name="Role" id="Role" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                            <option value="">Pilih Role</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Dokter">Dokter</option>
                            <option value="Pasien">Pasien</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                        </div>
                    </div>
                    <div class="w-full lg:w-12/12 px-4 mt-4">
                        <button type="submit" class="bg-blue-500 text-white active:bg-blue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                            Simpan Akun
                        </button>
                        <a href="{{ route('index_account') }}" class="bg-gray-500 text-white active:bg-gray-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150">
                            Kembali
                        </a>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</x-layout-admin>