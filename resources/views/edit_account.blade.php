<x-layout-admin>
    <x-slot:name>{{ $name }}</x-slot:name>
    <x-slot:title>{{ $title }}</x-slot:title>
    
    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                <form action="{{ route('update_account', $account->AccountID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Edit Akun {{ $account->AccountID }}
                    </h6>
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="AccountID">
                                    Account ID
                                </label>
                                <input type="text" id="AccountID" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $account->AccountID }}" readonly>
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="email">
                                    Email
                                </label>
                                <input type="email" name="email" id="email" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" value="{{ $account->email }}">
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="password">
                                    Password Baru
                                </label>
                                <input type="password" name="password" id="password" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                            </div>
                        </div>
                        <div class="w-full lg:w-12/12 px-4">
                            <div class="relative w-full mb-3">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="Role">
                                    Role
                                </label>
                                <select name="Role" id="Role" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                    <option value="administrator" {{ $account->Role == 'administrator' ? 'selected' : '' }}>Administrator</option>
                                    <option value="dokter" {{ $account->Role == 'dokter' ? 'selected' : '' }}>Dokter</option>
                                    <option value="pasien" {{ $account->Role == 'pasien' ? 'selected' : '' }}>Pasien</option>
                                    <option value="kasir" {{ $account->Role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-end" style="margin-right: 55px; margin-bottom: 20px">
                            <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout-admin>
