<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mailSent extends Model
{
    use HasFactory;

    protected $table = 'mail_sent';

    protected $fillable = [
        'user_id',
        'post_id',
      ];

}
