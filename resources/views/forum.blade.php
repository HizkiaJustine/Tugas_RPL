<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <title>Forum</title>
</head>
<body class="bg-blueGray-100">
    <x-navbar></x-navbar>

    <div class="w-full lg:w-8/12 px-4 mx-auto mt-6">
        <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0">
            <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                @auth
                    @if(Auth::user()->Role == 'pasien')
                        <form action="{{ route('forum.storeQuestion') }}" method="POST">
                            @csrf
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Ajukan Pertanyaan
                            </h6>
                            <div class="flex flex-wrap">
                                <div class="w-full lg:w-12/12 px-4">
                                    <div class="relative w-full mb-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="question">
                                            Pertanyaan
                                        </label>
                                        <textarea id="question" name="question" rows="3" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Tulis pertanyaan Anda" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end" style="margin-right: 55px; margin-bottom: 20px">
                                <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    @endif
                @endauth

                <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                    Daftar Pertanyaan
                </h6>
                @foreach($questions as $question)
                    <div class="relative w-full mb-3">
                        <div class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                            {{ $question->account->email }} bertanya:
                        </div>
                        <div class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow w-full ease-linear transition-all duration-150">
                            {{ $question->question }}
                        </div>
                        @auth
                            @if(Auth::user()->Role == 'dokter')
                                <form action="{{ route('forum.storeAnswer', $question->QuestionID) }}" method="POST">
                                    @csrf
                                    <div class="relative w-full mb-3 mt-3">
                                        <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2" for="answer">
                                            Jawaban
                                        </label>
                                        <textarea id="answer" name="answer" rows="3" class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" placeholder="Tulis jawaban Anda" required></textarea>
                                    </div>
                                    <div class="flex justify-end" style="margin-right: 55px; margin-bottom: 20px">
                                        <button type="submit" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                                            Kirim
                                        </button>
                                    </div>
                                </form>
                            @endif
                        @endauth
                        @foreach($question->answers as $answer)
                            <div class="relative w-full mb-3 mt-3">
                                <div class="block uppercase text-blueGray-600 text-xs font-bold mb-2">
                                    {{ $answer->account->email }} menjawab:
                                </div>
                                <div class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow w-full ease-linear transition-all duration-150">
                                    {{ $answer->answer }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>