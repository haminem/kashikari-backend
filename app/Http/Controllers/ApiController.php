<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Friend;

class ApiController extends Controller
{
    //sign_in
    public function sign_in(Request $request)
    {
        $result = User::signIn($request);

        return response()->json([
            'message' => 'Login successfully',
            'error' => $result['error'],
            'userId' => $result['user_id']
        ], 200);
    }

    //sign_up
    public function sign_up(Request $request)
    {
        $result = User::signUp($request);

        return response()->json([
            'message' => 'Signup successfully',
            'error' => $result['error'],
            'userId' => $result['user_id']
        ], 200);
    }

    //get user
    public function get_user(Request $request)
    {
        $user = User::GetUser($request);

        return response()->json([
            'message' => 'Get user successfully',
            'user' => $user,
        ], 200);
    }

    //get friends
    public function get_friends(Request $request)
    {
        $friends = Friend::GetFriends($request);

        return response()->json([
            'message' => 'Get friends successfully',
            'friends' => $friends,
        ], 200);
    }

    //get tasks
    public function get_tasks(Request $request)
    {
        $tasks = Task::GetTasks($request);

        return response()->json([
            'message' => 'Get tasks successfully',
            'tasks' => $tasks,
        ], 200);
    }

    //set task
    public function set_task(Request $request)
    {
        $task = Task::SetTask($request);

        return response()->json([
            'message' => 'Set task successfully',
            'task' => $task,
        ], 200);
    }

    //update task
    public function update_task(Request $request)
    {
        $task = Task::UpdateTask($request);

        return response()->json([
            'message' => 'Update task successfully',
            'task' => $task,
        ], 200);
    }

    //get point
    public function get_point(Request $request)
    {
        $point = Friend::GetPoint($request);

        return response()->json([
            'message' => 'Get point successfully',
            'point' => $point,
        ], 200);
    }

    //follow
    public function follow(Request $request)
    {
        $result = Friend::Follow($request);

        return response()->json([
            'message' => 'Follow successfully',
        ], 200);
    }
}
