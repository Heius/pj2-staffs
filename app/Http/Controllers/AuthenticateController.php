<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthenticateController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        try {
            $staff = Staff::where('sEmail', $email)->where('sPassword', $password)
                ->firstOrFail();
            if ($staff->sPer == 2) {
                return Redirect::route('login')->with('error', [
                    "message" => 'Your account has been locked please contact system administrator',
                    "email" => $email,
                ]);
            } else {
                $request->session()->put('sId', $staff->sId);
                $request->session()->put('sName', $staff->sName);
                $request->session()->put('Permission', $staff->sPer);
                return Redirect::route('welcome');
            }
        } catch (Exception $e) {
            return Redirect::route('login')->with('error', [
                "message" => 'Wrong Email or Password',
                "email" => $email,
            ]);
        }
        return $request;
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::route('login');
    }
}
