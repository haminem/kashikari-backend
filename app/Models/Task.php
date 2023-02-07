<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * モデルにタイムスタンプを付けるか
     *
     * @var bool
     */
    public $timestamps = false;

    /*
    * Task: {
    *  id: int,
    *  title: string,
    *  description: string,
    *  weight: int,
    *  deadline: date,
    *  status: string,
    *  }
    */

    protected $fillable = [
        'user_id',
        'friend_id',
        'title',
        'description',
        'weight',
        'deadline',
        'status',
    ];

    public static function CreateTask($request)
    {
        $task = new Task();
        $task->user_id = $request->user_id;
        $task->friend_id = User::GetUserIdFromName($request->friend_name);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->weight = $request->weight;
        $task->deadline = $request->deadline;
        $task->status = "依頼中";
        $task->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function GetTask($request)
    {
        $tasks = Task::where('user_id', $request->user_id)->get();
        return $tasks;
    }

    public static function GetTasksByFriend($request)
    {
        $tasks = Task::where('user_id', $request->user_id)->where('friend_id', User::GetUserIdFromName($request->friend_name))->get();
        return $tasks;
    }

    public static function GetTasksByMe($request)
    {
        $tasks = Task::where('user_id', User::GetUserIdFromName($request->friend_name))->where('friend_id', $request->user_id)->get();
        return $tasks;
    }

    public static function UpdateTaskStatus($request)
    {
        if ($request->status == "完了済") {
            $task = Task::where('id', $request->task_id)->first();
            $task->status = $request->status;
            $task->save();
            $friend = Friend::where('user_id', $request->user_id)->where('friend_id', User::GetUserIdFromName($request->friend_name))->first();
            $friend->point += $task->weight;
            $friend->save();
        } else {
            $task = Task::where('id', $request->task_id)->first();
            $task->status = $request->status;
            $task->save();
        }
    }
}
