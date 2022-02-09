<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class UserAuthController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        return view('login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     */
    public function login(Request $request)
    {
        $ret = "";


        if ($request->getMethod() == "POST") {
            $email = $request->get('email');
            $password = $request->get('password');

            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            if (auth()->attempt([
                'email' => $email,
                'password' => $password])) {

                $request->session()->put([
                    'user' => $email,
                    'loggedIn' => true,
                ]);

                return redirect()->route('tasks-list');

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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function signup(Request $request)
    {
        $ret = "/signup";
        if ($request->getMethod() == "POST") {

            $email = htmlspecialchars($request->get('email'));
            $password = htmlspecialchars($request->get('password'));

            // check the inputs for validation else return back to signup with errors
            $request->validate([
                'email' => 'required|unique:users',
                'password' => 'required|min:7',
                're-password' => 'required|same:password'
            ]);

            try {
                $user = new User();
                $user->email = $email;
                $user->password = Hash::make($password);
                $user->name = 'test';
                $user->save();

                $request->session()->flash('message-success', 'Successfully registered. Please login.');

                $ret = '/login';
            } catch (Exception $e) {
                $request->session()->flash('message', $e->getMessage());
                $ret = '/signup';


            }

        } else {
            $ret = "/signup";
        }
        return view($ret);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return view('login');
        }
        Session::flush();
        Auth::logout();
        return view('login');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function updatePassword(Request $request)
    {
        if ($request->getMethod() == "GET")
            return view('change-password');

        $request->validate([
            'new-password' => 'required|min:7',
            're-password' => 'required|same:new-password'
        ]);
        try {
            $user = Auth::user()->id;
            var_dump($user);
            $this->user = User::findOrFail($user);
            $this->user->password = Hash::make($request->get('new-password'));

            $this->user->save();
            return redirect('/tasks');

        } catch (QueryException $e) {

            return view('error', ['error' => 'Something went wrong. Please try again', 'code' => $e->getCode()]);
        }


    }
}
