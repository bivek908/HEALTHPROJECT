<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_user';

    protected $table = 'professionals';

    protected $guarded = ['id_user'];
}
