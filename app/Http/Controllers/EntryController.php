<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function create(){
        return view('entries.create');
    }

    public function store(Request $request){
        //validamos los datos
        $validatedData=$request->validate([
            'title'=>'required|min:7|max:255|unique:entries',
            'content'=>'required|min:25|max:3000'
        ]);

        //create entries
        $entry = new Entry();
        $entry->title = $validatedData['title'];
        $entry->content = $validatedData['content'];
        $entry->user_id = auth()->id();
        $entry->save();//INSERT
        $status='tpur entry has been create succesfully';
        return back()->with(compact('status'));
    }

    public function edit(Entry $entry){
        return view('entries.edit',compact('entry'));
    }

    public function update(Request $request,Entry $entry){
        //validamos los datos
        $validatedData=$request->validate([
            'title'=>'required|min:7|max:255|unique:entries,id,'.$entry->id,//verifico que sea unico pero sin contlempar esta entrada
            'content'=>'required|min:25|max:3000'
        ]);

        // verifico que el usuario que edita sea el mismo que el que edita

        $entry->title = $validatedData['title'];
        $entry->content = $validatedData['content'];
        $entry->save();//INSERT
        $status='tour entry has been updated succesfully';
        return back()->with(compact('status'));
    }
}
