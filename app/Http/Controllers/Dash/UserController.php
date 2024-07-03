<?php

namespace App\Http\Controllers\Dash;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=Auth::user();
        if($user->hasRole('super_admin')){

            $data=User::whereHasRole(['admin','user'])->paginate();
        }
        else{

            $data = User::whereHasRole(['user'])->paginate();
        }
        return view('dash.users.all' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();
        return view('dash.users.add',compact('roles'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([ 
            'name'=>'required|max:35|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|max:16|min:6',
            'role'=>'required|'.Rule::in(['user','admin','super_admin']),

        ]);
        $newuser=User::create($request->all());
        $newuser->addRole($request->role);
        $newuser->update(['role'=>$request->role]);
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles=Role::all();
        return view('dash.users.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:35|min:3',
            'email' => 'required|email|'. Rule::unique('users')->ignore($user->id),
            'password' => 'required|min:6',
            'role' => 'required|' . Rule::in(['user', 'admin', 'super_admin']),

        ]);
        $requestData=$request->except('password','_token');
        if(!Hash::check($request->password, $user->password)){
            $requestData['password']=Hash::make($request->password);
        }
        $user->update($requestData);
        $rolechoosen=Role::where('name',$request->input('role'))->first();
        $user->syncRoles([$rolechoosen->id]);
        return to_route('dashboard.users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        $user->removeRoles([$user->role]);
        return to_route('dashboard.users.index');
    }
}
