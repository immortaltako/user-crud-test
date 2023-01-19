<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;
use Illuminate\Support\Facades\DB; // using this for query builder

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::paginate(5);
        return view('index',compact('users'));
        /*
        return view('index', [
            'users' => DB::table('users')->paginate(5)
        ]);*/
        

        // $users = DB::table('users')->simplePaginate(15);

        /* Alternative style
        $users = DB::table('users')
        ->get();
        return view('index', ['users' => $users]);
        */

        /*
        // Model version:
        $users = users::all();
        return view('index', compact('users')); // index.blade.php


        // Query builder version:
        $users = DB::table('users')->get(); 
        return view('index', ['users' => $users]);
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')
        ->select('*')
        ->where('id', $id)
        ->first();

        return response()->json($user, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function jsonapi()
    {
        
        $user = DB::table('users')
        ->select('*')
        ->get();
        // return view('index', ['users' => $users]);
        return response()->json($user, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        //dd($request->all());

        $validated = $request->validate([
            'name' => 'required|max:255',
            'gender' => 'required|max:1',
            'password' => 'required|max:255',
            'email' => 'email:rfc,dns|required|unique:users|max:255',
        ]);
        /*
        # To add manual validation we can use a number of filters similar to the following:

        if( (($request->get('name') == null) || ($request->get('email') == null)) && ($request->get('password') == null)) {
            return redirect()->back()->with('msgpassed', "Compulsory data missing!");
        }
        */


        $current_datentime = date('Y-m-d H:i:s'); // I decided to skip Carbon\Carbon::now() and use PHP

        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->password = $request->password;
        $user->email_verified_at = $user->created_at = $user->updated_at = $current_datentime;
        $user->save();

       /* Alternative method
        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => $request->password,
            'email_verified_at' => $current_datentime,
            'created_at' => $current_datentime,
            'updated_at' => $current_datentime,
        ]);
        */

        return redirect()->back()->with('msgpassed', 'New user profile created.');

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit ($users) //(Users $id)
    {
        //$users = Users::where('id', $id)->first();
        
        $users = DB::table('users')
        ->where('users.id', $users)
        ->first();
        // ->get();

        
        return view('editprofile', compact('users')); // editprofile.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, User $users)
    {



        $current_datentime = date('Y-m-d H:i:s'); // I decided to skip Carbon\Carbon::now() and use PHP

        $updateTable = User::find($request->id);
        // $updateTable->id = auth()->id(); authentication
        $updateTable->name = $request->name;
        $updateTable->email = $request->email;
        $updateTable->updated_at = $current_datentime;
        $updateTable->save();

        /* DB::table('users')
        ->where('id', $request->id)
        ->update([
            //'id' => id, updating this field is not allowed as it is used both for db and for reference
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => $current_datentime,
        ]);
        */


        return redirect()->back()->with('msgpassed', "User profile updated.");
        /*
        # Alternative method using factory
        use Illuminate\Support\Facades\DB;
 
        $affected = DB::update(
            'update with SQL query statement',
            ['data']
        );
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateUsersRequest $request, User $users)
    {
        
        $toDestroy = User::find($request->id);
        $toDestroy->delete();

        /*
        DB::table('users')
        ->where('id', $request->id)
        ->delete();
        */
        

        return redirect()->back()->with('msgpassed', "User profile $request->id deleted.");

    }
}
