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
        if ($request->userId) {
            $name = $request->userId;
            $password = $request->input('password');
            $userstable = new usersTable();
            // $userstable->name = $name;
            // $userstable->password = Hash::make($password);
            // $userstable->save();
            try {
                $getData = $userstable->getData($name);
                $getName = $getData[0]->name;
                $userInfo = array(
                    'name' => $getName
                    //'password' => $password
                );
                // return view('home', $userInfo);
                return $userInfo;
            } catch(\Exception $e) {
                return $e;
            }
        } else {
            return view('error', []);
        }
    }
}
