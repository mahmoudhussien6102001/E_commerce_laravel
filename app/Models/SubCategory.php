<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Factories\HasFactory,SoftDeletes};
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\Relations\HasMany;
Use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategory extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded =[] ;// fillable [] الجزء هذا بيقول اني كل الاعمده في جدول الفئه مسموح التعديل عليها لو كنا عاوزين نمنع هذا علينا كتابه الاعمده بين القوسين
    public function create_user()
    {
        return $this->belongsTo(User::class ,'create_user_id','id');
    }
    public function update_user()
    {
        return $this->belongsTo(User::class ,'update_user_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function products() 
    {
        return $this->hasMany(Product::class);
    }


}
