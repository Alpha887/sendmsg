<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow; 
use Maatwebsite\Excel\Concerns\WithValidation; 


class StudentsImport implements ToCollection, WithHeadingRow,WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row)
        {
            $data=[
                'name'=>$row['nom'],
                'firstname'=>$row['prenoms'],
                'matricule'=>$row['matricule'],
                'notes'=>$row['notes'],
                'mobile'=>$row['contact'],
                'email'=>$row['email'],

            ];
            Student::create($data);
        }
    }

    public function rules(): array
    {
        return[
            'nom'=>"required",
            'prenoms'=>"required",
            'matricule'=>"required|unique:students,matricule",
            'contact'=>"required",
            'notes'=>"required",
            'email'=>"required|unique:students,email",

        ];
    }
}
