<?php

namespace App\Http\Controllers\Admin\Auth;
namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function getRegistration()
    {
        return view('admin.auth.register');
    }

    public function getForgetPassword()
    {
        return view('admin.auth.forget_password');
    }


    public function getDashboard()
    {
        return view('admin.auth.dashboard');
    }


    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => ['required','string',
             Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised()]
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->guard('admin')->attempt($credentials)) {
            // $user = auth()->guard('admin')->user();
            // if($user->is_admin == 1){
            return redirect()->intended('dashboard')
                        ->with('success','You are Logged in sucessfully.');
        }
        else{

        return redirect("adminLogin")->with('error','Whoops! invalid email and password.');
        }
    }



    public function adminLogout(Request $request)
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout sucessfully');
        return redirect(route('adminLogin'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function postRegistration(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [

            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['bail', 'lowercase', 'required', 'string', 'email:rfc,filter,dns', 'unique:admins'],
            'password' => [
                'required',
                'string',
                Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(),
                'confirmed'
            ],
        ]);

        // Check if validation fails
        if ($validator->stopOnFirstFailure()->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Create the admin user
         $admin= Admin::create([
            'email' => strtolower($request->input('email')), // Ensure the email is lowercase
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'password' => Hash::make($request->input('password')), // Hash the password
        ]);

            if($validator->validated()){
                return redirect()->route('adminLogin')->with('success', 'Admin account created successfully.');
            }else{
        // If login fails
        return back()->with('error', 'Failed to create account.');
            }
    }

}
