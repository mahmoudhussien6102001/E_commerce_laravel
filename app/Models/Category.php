<?php

namespace App\Models;
use Illuminate\Database\Eloquent\{Factories\HasFactory,SoftDeletes};
use Illuminate\Database\Eloquent\Model;// اللي بنورث منه كل المودلات  model  هنا بنستدعي الكلاس  
Use Illuminate\Database\Eloquent\Relations\HasMany;
Use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Category extends Model 
{
    use HasFactory , SoftDeletes; //    هي أداة بتسهل إنشاء بيانات وهمية:asFactory
    //لتسجيل فيه تريخ المسح  delet_at هذه ميزه بنستخدمها لمسح مواقت مش مسح نهائي بياتم اضافه عامود في قاعده البيانتات اسمه :SoftDeletes
    protected $guarded =[] ;//  Category  لو مش عاوز اعدل علي اي  عمود بحطه بين القوسين وهنا يقصد التعديل في الدوال اللي موجوده في الكنترولر من حيث جدول 
    //fillable [] <-لو عاوز اعدل علي اي عمود يتم وضعه داخل 
    public function create_user()
    {
        return $this->belongsTo(User::class ,'create_user_id');
    }
    public function update_user()
    {
        return $this->belongsTo(User::class ,'update_user_id');
    }
    public function SubCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    
}
