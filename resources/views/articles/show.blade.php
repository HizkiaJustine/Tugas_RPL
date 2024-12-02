<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Details</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>Article Details</x-header>

    @if (session('error'))
        <div style="background-color: rgb(247, 162, 162); color: rgb(163, 10, 10); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div style="background-color: rgb(162, 247, 195); color: rgb(10, 106, 16); margin-top: 20px; height: 40px; display: flex; align-items: center; justify-content: center; text-align: left; padding: 0 10px;">
            {{ session('success') }}
        </div>
    @endif

    <section id="article-details" class="article-details-section">
        <div class="container">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 1.5rem;">{{ $article->title }}</h5>
                    <p class="card-text">{{ $article->content }}</p>
                    <p class="card-text"><small class="text-muted">Published on: {{ $article->publishDate }}</small></p>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>