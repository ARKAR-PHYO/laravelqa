<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    protected $fillabl = ['title', 'body'];
    public function user() {
        return $this->belingsTo(Users::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);  // str::slug() မှာကြည်ရမယ်
    }
}
