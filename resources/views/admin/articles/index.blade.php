<x-layout-admin>
    <x-slot:title>Articles</x-slot:title>
    <x-slot:name>Articles Management</x-slot:name>

    <div class="flex justify-end mb-4">
        <a href="{{ route('admin.articles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Article
        </a>
    </div>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Publish Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($articles as $article)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $article->articleId }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $article->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $article->content }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $article->publishDate }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="{{ route('admin.articles.edit', $article->articleId) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article->articleId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 ml-4" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-lg font-bold text-red-500">No articles found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</x-layout-admin>