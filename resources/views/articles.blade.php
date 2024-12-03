<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v={{ time() }}">
    <!-- Flickity CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body>
    <x-navbar></x-navbar>

    <x-header>Articles</x-header>

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

    <section id="articles" class="articles-section">
        <div class="container">
            <div class="row">
                @foreach($articles as $article)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Article ID: {{ $article->articleId }}</h5>
                                <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                                <p class="card-text"><small class="text-muted">Published on: {{ $article->publishDate }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-footer></x-footer>

    <script src="js/script.js"></script>
</body>
</html>