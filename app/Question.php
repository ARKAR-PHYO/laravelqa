<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Question extends Model
{
    protected $fillabl = ['title', 'body'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);  // str::slug() မှာကြည်ရမယ်
    }

    public function getUrlAttribute()
    {
        return route("questions.show", $this->id);
    }

    public function setCreatedDateAttribute()
    {
        return $this->created_at->format('d/m/Y');
    }

    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if ($this->best_answer_id) {
                return "answer-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
}
