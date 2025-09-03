<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route("Login.index");
        }

        $student = Auth::user();

        return view("website.View", compact("student"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {

        User::create($request->toArray());
        return to_route("Login.index");
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
        $student = Auth::user();
        return view("website.Update", compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, string $id)
    {
        /** @var \App\Models\User $student */



        $student = Auth::user();
        $data = $request->except("_token", "_method");
        if (empty($data['password'])) {
            unset($data['password']);
        }
        $student->update($data);
        return to_route("Home.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
