<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    public function SubCategories ()
    {
        return $this->HasMany(SubCategory::class);
    }
    public function Categories ()
    {
        return $this->HasMany(Category::class);
    }
    public function Products (){
        return $this->HasMany(Product::class);
    }
    public function users(){
        return $this->HasMany(User::class);
    }
    public function create_user()
    {
        return $this->belongsTo(User::class ,'create_user_id','id');
    }
    public function update_user()
    {
        return $this->belongsTo(User::class ,'update_user_id','id');
    }
    public function profile(){
        
        return $this->HasOne(Profile::class);
    }
    public function profileUser(){
        
        return $this->HasOne(UserProfile::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
