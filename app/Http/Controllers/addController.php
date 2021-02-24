<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use App\Models\usersTable;
use Illuminate\Support\Facades\Hash;

class addController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getIndex()
    {
        return view('top');
    }

    public function postIndex(Request $request)
    {
        $userInput = $request->toArray();
        $userId = $userInput['userId'];
        $password = $userInput['userPassword'];
        $userstable = new usersTable();
        try {
            $getData = $userstable->getData($userId);
            if($getData->isEmpty()) {
                return 0;
            }

            $getUserId = $getData[0]->name;
            $userInfo = array(
                'userId' => $getUserId
            );
            return $userInfo;

            //ハッシュ問題一旦コメント
            // $getPass = $getData[0]->password;
            // if(Hash::check($password, $getPass)) {
            //     $getUserId = $getData[0]->name;
            //     $userInfo = array(
            //         'userId' => $getUserId
            //     );
            //     return $userInfo;
            // } else {
            //     return 0;
            // }
        } catch(\Exception $e) {
            return $e;
        }
    }
}
