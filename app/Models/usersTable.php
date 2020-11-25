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

    public function getData(string $name)
    {
        $data = DB::table($this->table)->where('name', $name)->get();
        return $data;
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> c10a66e2da53a4be5dc28b71b1a32167f0c71698
