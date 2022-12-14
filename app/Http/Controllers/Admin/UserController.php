<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //login page
    public function login(){
        return view('admin.auth.login');
    }
    //authenticate
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        // dd(Auth::attempt($credentials));
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    //logout
    public function logout(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('users.login');
    }
    //reset page
    public function reset(){
        return view('admin.auth.reset-password');
    }
    //update password
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        if(Hash::check($request->current_password,auth()->user()->password)){
            $hashedPassword = Hash::make($request->password);
            auth()->user()->update([
                'password' => $hashedPassword
            ]);
            return redirect()->route('dashboard');
        }
        
        return back();
    }

//******************************************************************************/
    public function index(){
        if(!auth()->user()->can('users-access')){
            abort(403);
        }
        $users = User::paginate(10);
        return view('admin.users.index',compact('users'));
    }

    public function create(){
        return view('admin.users.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|array',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = Hash::make($request->password);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword
        ]);
        $user->assignRole([$request->roles]);
        return redirect()->route('users.index')->with('message','User Added Successfully');

    }

    public function edit(User $user){
        $selectedRoles = $user->roles()->pluck('id')->toArray();
        return view('admin.users.edit',[
            'user' => $user,
            'selectedRoles' => $selectedRoles
        ]);
    }

    public function update(Request $request, User $user){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'roles' => 'required|array',
            'password' => 'required|confirmed'
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $user->syncRoles([$request->roles]);
        return redirect()->route('users.index')->with('message','User Updated Successfully');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('users.index')->with('message','User Deleted Successfully');
    }

    public function activate(Request $request, User $user){
        //dd($request->is_active);
        $user->update([
            'is_active' => $request->is_active
        ]);
        return redirect()->route('users.index')->with('message','Success');
    }
}
