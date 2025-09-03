<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $Student =User::with('borrowedBooks')->get();

        return view("dashbord.student.view",compact("Student"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view("dashbord.student.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        User::create($request->toArray());
        return to_route("student.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = User::with('borrowedBooks.book')->findOrFail($id);
        return view("dashbord.student.show",compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student=User::findOrfail($id);
        return view("dashbord.student.update",compact("student"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=$request->except("_token","_method");
        User::where("id",$id)->update($data);
        return to_route("student.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where("id",$id)->delete();
        return to_route("student.index");
    }
    public function search(Request $request)
    {

        $request->validate([
            'student_id' => 'required|integer',
        ]);
       /*  $student = User::find($request->student_id); */

        $Student = User::where('id', $request->student_id)
               ->with('borrowedBooks')
               ->get();

        $Student = User::where('id', $request->student_id)
           ->with('borrowedBooks')
           ->get();

        if ($Student->isEmpty()) {
            return redirect()->back()->with('error', 'Student not found!');
        }



        // ممكن تعرضه في نفس view students أو في صفحة خاصة
        return view('dashbord.Student.view', compact('Student'));
    }

}
