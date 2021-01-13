<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersTable extends Model
{
    use HasFactory;
    protected $table = 'usersTable';
    public $timestamps = false;

    public function getData(string $userId)
    {
        $data = DB::table($this->table)->where('name', $userId)->get();
        return $data;
    }

    public function duplicateCheck(string $userId)
    {
        $duplicateCount = DB::table($this->table)->where('name', $userId)->count();
        return $duplicateCount;
    }
}
