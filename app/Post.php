<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Country
 * @package App
 * @mixin Builder
 */
class Post extends Model
{
    // protected $table = 'posts';
    // protected $primaryKey = 'post_id';
    // public $incrementing = true;
    // protected $keyType = 'string';
    // public $timestamps = false;
  /*  protected $attributes = [
        'content' => 'Lorem ipsum 2'
    ];*/

  protected $fillable = ['title', 'content', 'rubric_id'];

  public function rubric()
  {
      return $this->belongsTo(Rubric::class);
  }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getPostDate()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function setTitleAttribute($value)
    {
        // mutate titles in uppercase
       $this->attributes['title'] = Str::title($value);
    }

    public function getTitleAttribute($value)
    {
        // mutate titles in uppercase
        return Str::upper($value);
    }
}
