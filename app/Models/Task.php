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
    *  friend_id: int,
    *  title: string,
    *  description: string,
    *  point: int,
    *  deadline: date,
    *  status: string,
    *  sale: bool,
    *  created_at: date,
    *  updated_at: date,
    *  }
    */

    protected $fillable = [
        'friend_id',
        'title',
        'description',
        'point',
        'status',
        'sale'
    ];

    public static function SetTask($request)
    {
        $task = new Task();
        $task->friend_id = $request->friendId;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->point = $request->point;
        $task->deadline = $request->deadline;
        $task->status = "suggest";
        $task->sale = $request->sale;
        $task->save();
    }

    public static function GetTasks($request)
    {
        $tasks = Task::where('friend_id', $request->friendId)->get();
        return $tasks;
    }

    public static function FindByFriendId($friend_id)
    {
        $tasks = Task::where('friend_id', $friend_id)->get();
        return $tasks;
    }

    public static function UpdateTask($request)
    {
        $task = Task::where('id', $request->taskId)->first();
        if ($request->status == "suggest") {
            // if($task->sale == true) {
            //     $task->sale = false;
            //     $friend_id = $task->friend_id;
            //     $temp = Friend::where('id', $friend_id)->first();
            //     $friend = Friend::where('user_id', $temp->friend_id)->where('friend_id', $temp->user_id)->first();
            //     $friend->point -= $task->point;
            //     $friend->save();
            // };
            $task->status = "progress";
            $task->save();
        } else if ($request->status == "progress") {
            $task->status = "done";
            $task->save();
            $friend_id = $task->friend_id;
            if ($task->sale == true) {
                $temp = Friend::where('id', $friend_id)->first();
                $friend = Friend::where('user_id', $temp->friend_id)->where('friend_id', $temp->user_id)->first();
                $friend->point -= $task->point;
                $friend->save();
            } else {
                $friend = Friend::where('id', $friend_id)->first();
                $friend->point += $task->point;
                $friend->save();
            }
        } else if ($request->status == "reject") {
            $task->delete();
        }
    }

    public function friend()
    {
        return $this->belongsTo(Friend::class);
    }
}
