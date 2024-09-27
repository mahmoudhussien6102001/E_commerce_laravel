<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded =[] ;// fillable [] الجزء هذا بيقول اني كل الاعمده في جدول الفئه مسموح التعديل عليها لو كنا عاوزين نمنع هذا علينا كتابه الاعمده بين القوسين
    public function create_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo //هذه الداله بتعرفك من الاخر "مين" اللي عمل إدخال أو إضافة للفئة في قاعدة البيانات.
    {
        return $this->belongsTo(User::class ,'create_user_id');
    }
    public function update_user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class ,'update_user_id');
    }
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
    return $this->belongsTo(Category::class);
}


}
