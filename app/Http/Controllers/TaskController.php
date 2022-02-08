<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('login');
//        return view('signup');
//        return view('createTask');
//        return view('tasks');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('login');
    }

    public function login(Request $request)
    {
        $ret = "";
        if ($request->getMethod() == "POST") {
            $email = $request->get('email');
            $password = $request->get('password');


            if (auth()->attempt([
                'email' => $email,
                'password' => $password])) {

                $user = User::find()
                $ret = "/tasks";

            } else {
                $request->session()->flash(
                    'message', 'Invalid credentials'
                );

                $ret = "/login";
            }
        } else {
            $ret = "/login";
        }
        return view($ret);

    }

    public function tasks(Request $request)
    {
        return view('tasks');
    }

    public function signup(Request $request)
    {
        $ret = "/signup";
        if ($request->getMethod() == "POST") {

            $email = htmlspecialchars($request->get('email'));
            $password = htmlspecialchars($request->get('password'));
            $repassword = htmlspecialchars($request->get('re-password'));

            if (strcmp($repassword, $password) !== 0)
            {
                $request->session()->flash(
                    'message', 'Passwords dont match.'
                );
                return $ret;
            }
            $user = new User();
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->name = 'test';
            if ($user->save())
            {
                $request->session()->flash('message-success','Successfully registered. Please login.');
                $ret = '/login';
            }

        } else {
            $ret = "/signup";
        }
        return view($ret);

    }

}
