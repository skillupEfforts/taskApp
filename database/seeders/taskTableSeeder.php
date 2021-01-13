<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class taskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //タスクダミーデータ
        $dummyData = [
            [
                'userid' => 'test3',
                'taskname' => 'task1',
                'kosu' => 10,
                'jitsukosu' => 2,
                'startdate' => '2020/1/1',
                'enddate' => '2020/12/31',
                'state' => 'aaa'
            ],
            [
                'userid' => 'test',
                'taskname' => 'task2',
                'kosu' => 10,
                'jitsukosu' => 2,
                'startdate' => '2020/1/15',
                'enddate' => '2020/2/3',
                'state' => 'aaa'
            ],
            [
                'userid' => 'test2',
                'taskname' => 'task3',
                'kosu' => 10,
                'jitsukosu' => 2,
                'startdate' => '2020/3/21',
                'enddate' => '2020/7/1',
                'state' => 'aaa'
            ],
            [
                'userid' => 'test',
                'taskname' => 'testtask1',
                'kosu' => 10,
                'jitsukosu' => 2,
                'startdate' => '2020/8/21',
                'enddate' => '2020/10/31',
                'state' => 'aaa'
            ],
            [
                'userid' => 'test2',
                'taskname' => 'task3task',
                'kosu' => 10,
                'jitsukosu' => 2,
                'startdate' => '2020/10/1',
                'enddate' => '2020/12/1',
                'state' => 'aaa'
            ],
            [
                'userid' => 'test3',
                'taskname' => 'tasktask',
                'kosu' => 10,
                'jitsukosu' => 2,
                'startdate' => '2020/11/12',
                'enddate' => '2020/12/31',
                'state' => 'aaa'
            ]
        ];
        //タスクダミーデータ登録
        foreach($dummyData as $num) {
            DB::table('taskTable')->insert([$num]);
        }
    }
}
