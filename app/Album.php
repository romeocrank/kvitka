<?php

namespace App;

use App\Helpers\TranslatableModelTrait;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Admin\Traits\OrderableModel;

class Album extends Model {

    use TranslatableModelTrait;

	protected $table = 'albums';
    protected $fillable = ['title', 'url', 'type', 'path', 'album_id','description'];
    public $appends = ['title_translated', 'description_translated'];

    public function categories() {
        return $this->belongsToMany('App\Category', 'album_category');
    }

    public function cover()
    {
        return $this->hasOne('App\Image', 'id', 'cover');
    }

    public function setCategoriesAttribute($categories) {

	    $this->categories()->detach();

	    if ( ! $categories) return;
	    if ( ! $this->exists) $this->save();

	    $this->categories()->attach($categories);
	}


    public function images() {
        return $this->hasMany('App\Image');
    }

    public function getCover() {

        $this->coverPath = \App\Image::find(1)->path; //взяли дефолтную оболожку

    
        if ($this->cover()->first()) {

            $this->coverPath = $this->cover()->first()->path;
        
        }
        else {

        
            if (($this->images()->count())> 0) {

                $this->coverPath = $this->images()->first()->path;

            }

        }
       
        return $this;
    }


  //   public function scopePrivate($q, $private = true) {

		// return $q->where('type', $private);
  //   }
}