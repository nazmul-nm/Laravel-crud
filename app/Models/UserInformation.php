<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    use HasFactory;
    protected $table = 'user_informations';
    // protected $primaryKey = 'id';
    
    // UserInformation model belongs to User
    public function user(){
        return $this->belongsTo(Users::class);
    }
}
