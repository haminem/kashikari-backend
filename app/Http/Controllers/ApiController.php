<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\Friend;

class ApiController extends Controller
{
    //user registration
    public function register_user(Request $request)
    {
        $user_id = User::CreateUser($request);

        return response()->json([
            'message' => 'User created successfully',
            'user_id' => $user_id,
        ], 200);
    }

    public function login(Request $request)
    {
        $user_id = User::GetUserId($request);

        return response()->json([
            'message' => 'User logged in successfully',
            'user_id' => $user_id,
        ], 200);
    }

    //friend registration
    public function register_friend(Request $request)
    {   
        Friend::CreateFriend($request);

        return response()->json([
            'message' => 'Friend created successfully',
        ], 200);
    }

    public function get_friends(Request $request)
    {
        $friends = Friend::GetFriend($request);

        return response()->json([
            'message' => 'Friends retrieved successfully',
            'friends' => $friends,
        ], 200);
    }
    
    //task registration
    public function register_task(Request $request)
    {   
        Task::CreateTask($request);

        return response()->json([
            'message' => 'Task created successfully',
        ], 200);
    }

    //get tasks
    public function get_tasks(Request $request)
    {
        $tasks = Task::GetTask($request);

        return response()->json([
            'message' => 'Tasks retrieved successfully',
            'tasks' => $tasks,
        ], 200);
    }

    public function get_tasks_by_friend(Request $request)
    {
        $tasks = Task::GetTasksByFriend($request);

        return response()->json([
            'message' => 'TasksByFriend retrieved successfully',
            'tasks' => $tasks,
        ], 200);
    }

    public function get_tasks_by_me(Request $request)
    {
        $tasks = Task::GetTasksByMe($request);

        return response()->json([
            'message' => 'TasksByMe retrieved successfully',
            'tasks' => $tasks,
        ], 200);
    }

    public function get_point(Request $request)
    {
        $point = Friend::GetPoint($request);

        return response()->json([
            'message' => 'Point retrieved successfully',
            'point' => $point,
        ], 200);
    }

    public function update_task_status(Request $request)
    {
        Task::UpdateTaskStatus($request);

        return response()->json([
            'message' => 'Task status updated successfully',
        ], 200);
    }
}
