<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCategory extends Model
{
    use HasFactory;
    protected $table= 'user_category';

    public $timestamps= false;

    protected $fillable= ['user_id', 'category_id'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
