<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Index
    public function index(){
       return view('index');
    }
    public function saveNote(Request $request){
        $note = new Note();
        $request->validate([
            'note' => 'required|string|max:255', // قوانین اعتبارسنجی
        ]);
           $note->note=$request->note;
           if($note->save()){
            return redirect()->back()->with("success","Save Successfully");
           }
           else{
           return redirect()->back()->with("error","Feild to Save!!");
           }
    }
}
