<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublicInformation extends Model
{
    protected $table = 'public_informations';
    protected $fillable = ['title', 'type', 'description', 'file_path', 'order', 'is_active'];
}
