<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    protected $table = "test_user";
    protected $primaryKey = 'u_id';
    // protected $fillable = ['*']白名单
    protected $guarded = [];//黑名单
    public $timestamps = true;//如果你不想让 Eloquent 自动管理这两个列， 请将模型中的 $timestamps 属性设置为 false
}
