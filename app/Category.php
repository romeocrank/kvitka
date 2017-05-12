<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\TranslatableModelTrait;

class Category extends Model {

    use TranslatableModelTrait;

	protected $table = 'categories';

    protected $fillable = ['title','description'];
    public $appends = ['title_translated', 'description_translated'];
    
    public function albums() {
        return $this->belongsToMany('App\Album', 'album_category');
    }

    public function setAlbumsAttribute($albums) {

	    $this->albums()->detach();

	    if ( ! $albums) return;
	    if ( ! $this->exists) $this->save();

	    $this->albums()->attach($albums);
	}
}