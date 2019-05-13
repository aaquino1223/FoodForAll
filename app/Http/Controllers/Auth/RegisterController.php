<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm(Request $request)
    {
        $type = $request->query('type' );
        if ($type == 'self') {
            $IsOrganization = false;
            return view('auth.register', compact('IsOrganization'));
        }
        else if ($type == 'business' || $type == 'nonprofit' ) {
            $IsOrganization = true;
            return view('auth.register', compact('IsOrganization'));
        }
        else {
            return view('isOrg');
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $dateofbirthRules = [];

        if (!$data['IsOrganization']) {
            $dateofbirthRules = ['required', 'date'];
        }

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dateofbirth' => $dateofbirthRules
        ];

        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'UserName' => $data['name'],
            'Email' => $data['email'],
            'Password' => Hash::make($data['password']),
            'InsertedDate' => date('Y-m-d H:i:s'),
            'LastUpdatedDate' => date('Y-m-d H:i:s'),
            'IsOrganization' => $data['IsOrganization'],
            'DateOfBirth' => array_key_exists('dateofbirth', $data) ? $data['dateofbirth'] : NULL
        ]);
    }
}
