<?php

namespace App\Http\Controllers\Admin\Auth;
namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
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


            $admin = auth()->guard('admin')->user();

             // Capitalize the first letter of firstname and lastname
        $firstname = ucfirst(strtolower($admin->firstname));
        $lastname = ucfirst(strtolower($admin->lastname));

        // Store the capitalized names in the session
        session([
            'firstname' => $firstname,
            'lastname' => $lastname,
        ]);

            return redirect()->intended('/admin/dashboard')
                        ->with('success','You are Logged in sucessfully.');
        }
        else{

        return redirect("/admin/login")->with('error','Whoops! invalid email and password.');
        }
    }


    public function postRegistration(Request $request): RedirectResponse
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [

            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['bail', 'lowercase', 'required', 'string', 'email:rfc,filter,dns','unique:admins'],
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
          Admin::create([
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




    public function adminLogout()
    {
        auth()->guard('admin')->logout();
        return Redirect::to('/admin/login')->with('success', 'You are logout sucessfully');
    }
    /**
     * Show the form for creating a new resource.
     *
     */


}
