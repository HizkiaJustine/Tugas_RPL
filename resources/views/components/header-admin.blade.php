<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8" style="color:#003366">
        <h1 class="text-3xl font-bold tracking-tight">{{ $slot }}</h1>
        <p class="breadcrumb">
            {{ $breadcrumb ?? '' }} <!-- Display content from the "breadcrumb" slot -->
        </p>
    </div>
</header>