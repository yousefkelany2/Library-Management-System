<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("website.login");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            return redirect()->route("Home.index") ;
          }
          elseif(Auth::check()){
           Auth::logout();
             return redirect()->route("Home.index") ;
          }
          else{
            return redirect()->route("Login.index") ;
          }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->route("admin.index");
        }
        else{
             if(Auth::attempt($credentials)){
            return redirect()->route("Home.index");
             }
        }
        return redirect()->route("Register.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
