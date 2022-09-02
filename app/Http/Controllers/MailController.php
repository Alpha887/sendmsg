<?php

namespace App\Http\Controllers;

use App\Mail\StudentMail;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class MailController extends Controller
{

    /*public function sendmail(Request $request)
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
      return redirect()->route('accueil')->with('status','Mise à jour des notes réussi !');
    }*/

    public function sendmail($id)
    {
        /*ini_set('SMTP','smtp.gmail.com');
        ini_set("smtp_port","465");
        $student = Student::find($id);
        $name= $student->name;
        $email= $student->email;
        $firstname= $student->firstname;
        $notes= $student->notes;
        $dest = $email;
        $sujet = "Email de test";
        $corp = " Bonjour Mr/Mme ".$name.". Votre Enfant ".$name." ".$firstname." à ".$notes." en mathématique. Merci de nos faire confiance";
        $headers = "From: dimitridaignon@gmail.com";
            if (mail($dest, $sujet, $corp, $headers)) {
            echo "Email envoyé avec succès à $dest ...";
        } else {
            echo "Échec de l'envoi de l'email...";
        }*/

       
     /*   $students = Student::all();
        foreach ($students as $student) 
        {
            $email= $student->email;
            $email= Str::slug($email);
            Mail::to($email)->send(new StudentMail($student))
                  ->queue(new StudentMail($students));
            
        }*/
       

            Mail::to('aignondimitri@gmail.com')->send(new StudentMail($student))
                  ->queue(new StudentMail($students));

       
        return redirect()->back()->with('status','Envoie des mails réussi !');
       
    }
}
