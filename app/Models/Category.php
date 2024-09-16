<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;// اللي بنورث منه كل المودلات  model  هنا بنستدعي الكلاس  

class Category extends Model 
{
    use HasFactory; // Laravel هي أداة بتسهل إنشاء بيانات وهمية
    protected $guarded =[] ;// fillable [] الجزء هذا بيقول اني كل الاعمده في جدول الفئه مسموح التعديل عليها لو كنا عاوزين نمنع هذا علينا كتابه الاعمده بين القوسين
    public function create_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo //هذه الداله بتعرفك من الاخر "مين" اللي عمل إدخال أو إضافة للفئة في قاعدة البيانات.
    {
        return $this->belongsTo(User::class ,'create_user_id');
    }
    public function update_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class ,'update_user_id');
    }
}
