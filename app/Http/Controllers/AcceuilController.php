<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcceuilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $message = Message::orderBy('created_at','desc')->paginate('5');
        return view('admin/message_index');
    }

    public function acceuil()
    {  
        if(Auth::check())
        {
            $article = Article::orderBy('created_at','desc')->paginate('3');
            return view('dashboard',compact('article'));
        }
        return view('loginform');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);
    
        $user = Auth::user();
        $user->Message::create($validatedData);
    
        return redirect()->back()->with('success', 'Message envoyé avec succès!');
    }

    /**
     * Display the specified resource.

    
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::findOrFail($id);
        $message->delete();
        return redirect()->back()->with('success','message supprimer avec success!');
    }
}
