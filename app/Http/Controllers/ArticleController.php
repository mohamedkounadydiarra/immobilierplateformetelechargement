<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::orderBy('created_at','desc')->paginate('5');
        return view('admin.index',compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $article = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'status' => 'required',
            'video' => 'required|file|mimes:mp4,mov,avi|max:500000',
            'image' => 'required|file|mimes:jpg,jpeg,png|max:10000'
        ]);

        if ($request->hasFile('video')) {
           $video = $request->file('video');
           $videoPath = $video->store('videos', 'public');
        }

         if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imagePath = $image->store('images', 'public');
        }

        $article = new Article();
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->status = $request->input('status');
        $article->video = $videoPath;
        $article->image = $imagePath;
        $article->save();
        return redirect()->back()->with('success','article ajouter avec success!');
       
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('admin.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $article = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'status' => 'required',
            'video' => 'required|file|mimes:mp4,mov,avi|max:500000',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:10000'
        ]);

        if ($request->hasFile('video')) {
           $video = $request->file('video');
           $videoPath = $video->store('videos', 'public');
        }

         if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imagePath = $image->store('images', 'public');
        }
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->description = $request->input('description');
        $article->status = $request->input('status');
        $article->video = $videoPath;
        $article->image = $imagePath;
        $article->update();
        
        return redirect()->back()->with('success','article mise à jour avec success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->back()->with('success','Article supprimer avec success!');
    }
}
