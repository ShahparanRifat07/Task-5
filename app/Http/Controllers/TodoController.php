<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index(Request $request){
        if (auth()->check()){
            $todos = Todo::where('user_id',auth()->user()->id)->orderBy('created_at', 'desc')->get();
            return view('home',['todos'=>$todos]);
        }else{
            return view('auth.login');
        }
    }


    public function create(Request $request){
        if($request->isMethod('post')){
            $incomming_fields = $request->validate([
                'title' => 'required',
            ]);
    
            $todo = new Todo();
            $todo->title = strip_tags($incomming_fields['title']);
            $todo->user_id = auth()->user()->id;
            $todo->save();

            return redirect(route('home'));
        }  
    }


    public function edit(Request $request,Todo $todo){
        if($request->isMethod('patch')){
            if(auth()->user()->id === $todo->user->id){
                
                $todo->title = strip_tags($request->input('title'));
                if ($request->input('completed') == 1) {
                    $todo->completed = true;
                }else{
                    $todo->completed = false;
                }
                $todo->update();

                return redirect(route('home'));  
            }else{
                return redirect(route('home'));
            }
            
        }
        if($request->isMethod('get')){
            if(auth()->user()->id === $todo->user->id){
                return view('todo.edit_todo',['todo'=>$todo]);
            }else{
                return redirect(route('home'));
            }
            
        }    
    }

    public function delete(Request $request, Todo $todo){
        if($request->isMethod('delete')){
            if(auth()->user()->id === $todo->user->id){
                $todo->delete(); 
                return redirect(route('home'));
            }else{
                return redirect(route('home'));
            }
        }
    }
}
