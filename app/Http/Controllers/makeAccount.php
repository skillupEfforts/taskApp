<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use App\Models\usersTable;
use Illuminate\Support\Facades\Hash;

class makeAccount extends Controller
{
    //ユーザーIDの登録
    public function makeAccount(Request $request)
    {
        try {
            $userId = $request->userId;
            $userstable = new usersTable();
            $duplicateCount = $userstable->duplicateCheck($userId);
            if($duplicateCount > 0) {
                return 'duplicate';
            }
            $password = $request->userPassword;
            $userstable->name = $userId;
            $userstable->password = Hash::make($password);
            $userstable->save();
            $getUserId = $userId;
            $userInfo = array(
                'userId' => $getUserId
            );
            return $userInfo;
        } catch(\Exception $e) {
            return $e;
        }
    }
}
