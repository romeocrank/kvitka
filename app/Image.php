<?php

namespace App;

use App\Helpers\TranslatableModelTrait;
use Illuminate\Database\Eloquent\Model;

class Image extends Model {

//    use TranslatableModelTrait;

	protected $table = 'images';
	
   	protected $fillable = [
	   	'original_file_name',
	   	'file_name',
	   	'type',
	   	'path',
	   	'category_id',
	   	'album_id'
   	];
//    public $appends = ['title_translated', 'description_translated'];

   	public function album() 
   	{
        
        return $this->belongsTo('App\Album');
    
    }

    public function getUrlPathAttribute($value)
    {
    	
    	return asset($this->path);
    
    }

    public function getFullPathAttribute($value)
    {
    	
    	return public_path().$this->path;

    }	

    public function setSizes()
    {
    	
    	if(file_exists($this->fullPath)) 
    	{  
    		
    		list($width, $height) = getimagesize($this->fullPath);
    		$this->width = $width;
    		$this->height = $height;
        
        } 
    	
    	return $this;

    }
}