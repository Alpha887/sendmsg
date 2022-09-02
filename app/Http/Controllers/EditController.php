<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 
use Maatwebsite\Excel\Concerns\WithValidation; 

class EditController extends Controller implements ToCollection, WithHeadingRow,WithValidation
{
    public function edit()
    {
        $students = Student::orderBy('name')->get();
        return view('edit', compact('students'));
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        dd($rows);
        foreach($rows as $row)
        {
            $student = Student::where('matricule','=',$row['matricule'])->first();
            $data=[
                
                'matricule'=>$row['matricule'],
                'notes'=>$row['notes'],

            ];
            if ($student == null)
            {
                $data=[
                    'name'=>$row['nom'],
                    'firstname'=>$row['prenoms'],
                    'matricule'=>$row['matricule'],
                    'mobile'=>$row['contact'],
                    'notes'=>$row['notes'],
                    'msg'=>$row['message'],
    
                ];
                Student::create($data);
            }
            
            $student = Student::where('matricule','=',$row['matricule']);
            Student::update($data);
        }

    }

    public function rules(): array
    {
        return[
           
            'matricule'=>"required|unique:students,matricule",
            
            'notes'=>"required",

        ];
    }
}
