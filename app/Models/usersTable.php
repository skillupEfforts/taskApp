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

    public function getData(string $userId, string $password)
    {
        $data = DB::table($this->table)->where('name', $userId)->where('password', $password)->get();
        return $data;
    }

    public function duplicateCheck(string $userId)
    {
        $duplicateCount = DB::table($this->table)->where('name', $userId)->count();
        return $duplicateCount;
    }
}
