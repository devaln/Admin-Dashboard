<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    public $timestamps = true;
    protected $fillable = [
        'site_name',
        'favicon',
        'logo',
        'type',
        'footer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function setting()
    {
        return $setting = Setting::find(1);
    }
}
