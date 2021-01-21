<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class taskTable extends Model
{
    use HasFactory;
    protected $table = 'taskTable';
    public $timestamps = false;

    public function getData(string $userId)
    {
        $data = DB::table($this->table)->where('userid', $userId)->get();
        return $data;
    }

    public function duplicateCheck(string $taskname)
    {
        $duplicateCount = DB::table($this->table)->where('taskname', $taskname)->count();
        return $duplicateCount;
    }

    public function updateData(object $task)
    {
        if(count($task) > 2) {
            DB::table($this->table)->where('taskname',
            $task->taskname)->update([
                'jitsukosu' => $task->jitsukosu,
                'state' => $task->state
            ]);
        } else {
            DB::table($this->table)->where('taskname',
            $task->taskname)->update([
                'jitsukosu' => $task->jitsukosu
            ]);
        }
    }
}
