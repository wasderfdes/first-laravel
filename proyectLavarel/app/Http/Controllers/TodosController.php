<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    
    //Save data
    public function store(Request $request) {
        
        // valided info
        $request->validate([
            'title'=>'required|min:3'
        ]);

        // create object model
        $todo = new Todo();
        $todo -> title = $request -> title;
        $todo->category_id = $request->category_id;
        $todo -> save();

        // return
        return redirect()->route('todos')->with('success','Tarea creada correctamente');

    }


    // index data
    public function index(){

        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos'=>$todos, 'categories' => $categories]);

    }


    // show data
    public function show($id){

        $todo = Todo::find($id);

        return view('todos.show', ['todo'=>$todo]);
    
    }
    

    // update data
    public function update(Request $request, $id){

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();

        return redirect()->route('todos')->with('sucess','¡Tarea actualizada!');

    }


    // destroy data
    public function destroy($id){

        $todo = Todo::find($id);
        $todo->delete();

        return redirect()->route('todos')->with('sucess','¡Tarea eliminada!');

    }


}
