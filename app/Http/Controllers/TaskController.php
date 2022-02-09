<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AuthUser;
use App\Task;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Mockery\Exception;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $status_filter = $request->get('status');
        $user_email = $request->getSession()->get('user');
        if ($user_email !== null && Auth::user() !== null) {
            $user_id= Auth::user()->id;
            if ($status_filter !== null) {
                $tasks = DB::table('tasks')
                    ->where('user_id', '=', $user_id)
                    ->where('status', '=', $status_filter)
                    ->orderBy('created_at', 'asc')
                    ->get();
            } else {
                $tasks = DB::table('tasks')
                    ->where('user_id', '=', $user_id)
                    ->orderBy('created_at', 'asc')
                    ->get();
            }

            return view('tasks', ['tasks' => $tasks]);
        } else {
            return view('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if ($request->method() == "GET") {
            return view('createTask');
        }

        $request->validate([
            'name' => 'required|min:3'
        ]);
        try {
            $task['name'] = htmlspecialchars($request->get('name'));
            $task['descriptions'] = htmlspecialchars($request->get('description'));
            $task['status'] = $request->get('task-state');
            $user = DB::table('users')
                ->where('email', '=', $request->getSession()->get('user')) //$request->getSession()->get('user')
                ->get('id');
            $task['user_id'] = $user[0]->id;

            $todo = new Task($task);
            $todo->save();

            return redirect()->route('tasks-list');
        } catch (QueryException $e) {

            return view('error', ['error' => 'Something went wrong. Please try again', 'code' => $e->getCode()]);
        }
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     */
    public function update(Request $request, $id = "")
    {
        if ($request->getMethod() == "GET" && $id !== null) {
            $task = Task::find($id);
            return view('edit', ['task' => $task]);
        }

        try {

            $task = Task::find($request->get('task-id'));
            $task->name = htmlspecialchars($request->get('name'));
            $task->status = $request->get('task-state') == null ? $task->status : $request->get('task-state');
            $task->descriptions = htmlspecialchars($request->get('description'));

            $task->save();

            return redirect()->route('tasks-list');

        } catch (QueryException $e) {

            return view('error', ['error' => 'Something went wrong. Please try again', 'code' => $e->getCode()]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function tasks(Request $request)
    {
        return view('tasks');
    }

    /**
     * @param Request $request
     * @param string $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     */
    public function destroy(Request $request, $id = "")
    {

        if (!$request->getMethod() == "DELETE") {
            return view('error', ['error' => 'Not allowed', 'code' => 500]);
        }

        $task = Task::findOrFail($id);

        $task->delete();
        $request->session()->flash('message', 'Task deleted successfully');

        return redirect()->route('tasks-list');
    }

}
