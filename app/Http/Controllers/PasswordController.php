<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Password;
use App\Models\Projects;

use DB;

class PasswordController extends Controller
{
    public function index(Request $request)
    {

        $items =  Projects::all(['id','project_title']);
        
        $getData = DB::table('projects')
    ->select(DB::raw('passwords.title, passwords.password, projects.project_title'))
    ->join('passwords', function ($join) {
        $join->on('passwords.project_id', '=', 'projects.id');
    })
    ->where('projects.project_title', 'like', '%'. $request->search . '%')
    ->get();

    $getData->each(function($item, $key) {
        // echo $item->title . '<br>';
        // echo $item->project_title . '<br>';
        // echo $item->password . '<br>';
    
    });


        // $query = Projects::select(
        //     "projects.project_title",
        //     "passwords.title",
        //     "passwords.password"
        // )->join('passwords', function ($join) {
        //     $join->on('projects.project_title','like',DB::raw(" Concat('%', 'j' ,'%') "));
        // })
        // ->where('passwords.project_id', '=','projects.id')
        // ->get();


        $result = Projects::where('id', $request->search)
    ->orWhere('project_title', 'like', '%' . $request->search . '%')->get();
        
        $getPasswords = Password::select(
            "passwords.password", 
            "projects.project_title",
        )
        ->leftJoin("projects", "passwords.project_id", "=", "projects.id")
        ->get();
       
       $getPasswords =  $getPasswords->each(function($item, $key) {
        });

        return view('add-password',compact('items','result','getPasswords','getData'));

    }
    public function store(Request $request)
    {
        $password = new Password;
        $password->project_id = $request->projects;
        $password->title = $request->title;
        $password->password = $request->password;
        $password->save();
        return redirect('add-password')->with('status',' Password has been submitted for ' . $password->title);
    }

    public function search(Request $request){

        $name = 'asdfasd';

        // $name = $request->input('search');
        // var_dump($name);
       
        return view('add-password')->with('name' ,$name);
       
    //     $works = $request->search;
    //    echo $works;
        // $search = $request->search;
        // if($request->filled('search')){
        //     $users = Projects::search($request->search)->get();
        // }else{
        //     $users = Projects::get()->take('2');
        // }
        // $posts = Projects::query()
        //             ->where('project_title', 'LIKE', "%{$search}%")
        //             ->orWhere('project_title', 'LIKE', "%{$search}%")
        //             ->get();

        //             dd($posts);
        
        // return view('add-password', compact('works'));
    }
    
}
