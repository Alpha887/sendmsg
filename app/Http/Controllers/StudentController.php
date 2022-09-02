<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use App\Imports\StudentsModif;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
       $students = Student::orderBy('name')->get();
       return view('welcome',compact('students'));
    } 

public function editnote($id)
{
    $student = Student::find($id);
    return view('pages.student.editnote', compact('student'));
}

       public function update(Request $request, $id)
       {
        $student = Student::find($id);
        $student->notes = $request->input('notes');
        $student->update();
        return redirect()->back()->with('status','Mise à jour de la note réussie !');
       }
      
       public function modificationnotes(Request $request)
       {
        //dd($request);
        $students= $request->students;
        $notes= $request->notes;
         foreach($notes as $key => $note)
         {
            $studentid=$students[$key];
            $student = Student::find($studentid);
            $student->notes=$note;
            $student->save();
         }
         return redirect()->route('accueil')->with('status','Mise à jour des notes réussie !');
       }
   
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('status','Suppression réussie !');
    }
    

    public function import(Request $req)
    {
      Excel::import(new StudentsImport,$req->file('student_file'));
      return redirect()->back()->with('status','Importation réussie !');
    }

}
