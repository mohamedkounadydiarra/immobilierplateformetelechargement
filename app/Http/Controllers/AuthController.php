<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at','desc')->paginate('5');
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|min:5',
            'password' => 'required|min:5|regex:/^(?=[A-Za-z])(?=.*\d)/'
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();
        
        return redirect()->back()->with('success','Votre compte à été creer avec success!');
    }
    
    public function loginform()
    {
        return view('loginform');
    }


    public function authentification(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email|min:5',
            'password' => 'required|min:5|regex:/^(?=[A-Za-z])(?=.*\d)/'
        ]);

        $credential = $request->only('email','password');

        if(Auth::attempt($credential))
        {
            return redirect('dashboard/dashboard');
        }
        
        redirect()->back()->with('error','Mot de passe ou identifiant incorrecte!');
    }


    public function logout()
    {
        Auth::logout(); 
        return view('loginform');
    }
    /**
     * Display the specified resource.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        return redirect()->back()->with('success','compte supprimer avec success!');
    }
}
