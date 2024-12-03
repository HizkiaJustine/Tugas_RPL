<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Layanan; // Modify this line
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $articles = $query->get();
        return view('articles.index', compact('articles'));
    }

    public function adminIndex(Request $request)
    {
        $query = Article::query();

        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%');
        }

        $articles = $query->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $layanans = Layanan::with('doctors')->get(); // Modify this line
        return view('admin.articles.create', compact('layanans')); // Modify this line
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publishDate' => 'required|date',
            'dokterID' => 'required|exists:dokter,DokterID', // Modify this line
        ]);

        $newArticleId = Str::uuid();

        Article::create([
            'articleId' => $newArticleId,
            'dokterID' => (string) $request->input('dokterID'), // Modify this line
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'publishDate' => $request->input('publishDate'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'publishDate' => 'required|date',
            'updated_at' => now(),
        ]);

        $article = Article::findOrFail($id);
        $article->update($request->all());

        return redirect()->route('admin.articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Article deleted successfully.');
    }
}