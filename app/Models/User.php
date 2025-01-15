<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    const CUSTOMER_ROLE_ID  = 1;
    const HOTEL_ROLE_ID   = 2;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'username',
        'email',
        'phone_number',
        'password_hash',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password_hash' => 'hashed',
        ];
    }

    public function Category()
    {
        return $this->hasMany(UserCategory::class);
    }

    // reservation と reservationsどちらも使用中のため消さないで下さい
    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'user_id');
    }
       // 予約とのリレーション sをつけないとCancel時にUpdate失敗したため追加
       public function reservations()
       {
           return $this->hasMany(Reservation::class, 'user_id');
       }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function getAuthPassword()
    {
        return $this->password_hash;
    }
    
    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'user_category', 'user_id', 'category_id');
    }



}
