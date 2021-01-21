<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use App\Models\taskTable;
use Illuminate\Support\Facades\Hash;

class Task extends Controller
{
    //タスクの登録
    public function registrationTask(Request $request)
    {
        try {
            $taskname = $request->taskname;
            $taskTable = new taskTable();
            $duplicateCount = $taskTable->duplicateCheck($taskname);
            if($duplicateCount > 0) {
                return 'duplicate';
            }
            $taskTable->taskname = $taskname;
            $taskTable->userid = $request->userId;
            $taskTable->kosu = $request->kosu;
            $taskTable->jitsukosu = $request->kosu;
            $taskTable->startdate = $request->startdate;
            $taskTable->enddate = $request->enddate;
            $taskTable->state = $request->state;
            $taskTable->save();
            $getData = $taskTable->getData($request->userId);
            return  $getData;
        } catch(\Exception $e) {
            return $e;
        }
    }

    //タスクの取得
    public function getTask(Request $request)
    {
        try {
            $userId = $request->userId;
            $taskTable = new taskTable();
            $getData = $taskTable->getData($userId);
            if($getData->isEmpty()) {
                return 0;
            }
            return json_encode($getData);
        } catch(\Exception $e) {
            return $e;
        }
    }

    //タスク重複チェック
    public function duplicateCheck(Request $request)
    {
        try {
            $taskname = $request->taskname;
            $taskTable = new taskTable();
            $duplicateCount = $taskTable->duplicateCheck($taskname);
            if($duplicateCount > 0) {
                return 'duplicate';
            } else {
                return 'noDuplicate';
            }
        } catch(\Exception $e) {
            return $e;
        }
    }

    //タスク更新
    public function updateTask(Request $request)
    {
        try {
            $tasks = $request;
            $taskTable = new taskTable();
            foreach($tasks as $key => $task) {
                return $request;
                $taskTable->updateData($tasks[$key]);
            }
            return 'update';
        } catch(\Exception $e) {
            return $e;
        }
    }
}
