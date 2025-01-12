<?php
namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    //Index
    public function index(){  
        $getNote =Note::all();
       return view('index',['note'=>$getNote]);
    }
    ////Save the Note
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
    /////////Edite Note
     public function edit($id){
         $EditNote =Note::find($id);
         $getNote =Note::all();
         return view('index',['note'=>$getNote,'EditNote'=>$EditNote,'id'=>$id ]);
}
    /////////For Update
    public function update(Request $request,$id){
        $notes =Note::findOrFail($id);
        $notes ->note = $request->note;
       if( $notes->update()){
      
        return redirect()->back()->with("success","Update Successfully");
       }
        else{
          
            return redirect()->back()->with("error","Faild to Update!!");
        
        }
    }
    //// delete the Note
    public function delete($id) {
        $delete = Note::findOrFail($id);
        if( $delete->delete()){
          
            return redirect()->back()->with("success","Delete Successfully");
           }
            else{
              
                return redirect()->back()->with("error","Faild to delete!!");
            
            }
    }
}