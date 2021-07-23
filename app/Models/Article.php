<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{


    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'text',
        'category_id',
        'source_id',
        'view', 
        'img',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    
    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d.m.Y');
    }
}
