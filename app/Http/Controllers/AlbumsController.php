<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use App\Image;
use App\Category;
use Crypt;
use Response;

class AlbumsController extends Controller {
  
    private $image;

    public function __construct(Image $image, Album $album, Category $category) {
        $this->image = $image;
        $this->album = $album;
        $this->category = $category;
    }

    public function index() {

        $categories = Category::all();
        $albums = $this->album->where('type', 2)->get();

        foreach ($albums as $album) {

            $album->getCover();

        }

        $datasize = getDataSize($albums->count());

        return view('index',[
            'categories'=>$categories, 
            'albums'=>$albums, 
            'datasize'=> $datasize,
            'thiscategory' => NULL,
            'other'=>false,
            'isAlbum'=>false,
            'isIndex'=>true,
            'isContacts'=>false
        ]);
    }

    public function url($id) {
        
        $album = $this->album->where('id', $id)->get()->first();
        if ( $album ) {
            $url =  $album->url;
            $title = $album->title;
            return view ('admin-album-url', ['url' =>  $url, 'title' => $title ]); 
        } else {
            return view('404');
        }     
    }

    public function store(Request $request) {
        
       dd('mi popali v store album');
    }

    public function show_privat($url) {
        $album = Album::where('url', $url)->first();
        if ($album) {
            $album_id = $album->id;
            $title = $album->title;
            $images = $album->images()->get();
            return view('admin-album-view',['images' =>  $images, 'title'=>$title ]);
        } else {
            return view('404');
        }   
    }

    public function edit(Request $request) {
        
        $input = $request->all();
        if (array_key_exists('cover_id', $input)) {
            $album = Album::find( $input['album_id']);
            $album->cover=$input['cover_id'];
            $album->save();
            $responce = [ 'id'=>$input['cover_id'] ];  
        }
        return Response::json($responce);
    }

    public function update(Request $request, $id) {
        //
    }

    public function show($id) { 

        $album = $this->album->find($id);
       
        if ($album) {

            if ( ($album->type)>0   ) {

                $categories = $this->category->all();
                $category = $album->find($id)->categories()->first();
                $album = $this->album->find($id);
                $images = $album->images()->get();
                // $datasize = getDataSize($images->count());

                if ($category) {
                    return  view('album', [
                        'images' => $images, 
                        'album' => $album,  
                        'categories' => $categories,
                        'thiscategory' => $category,
                        'other'=>false,
                        'isAlbum'=>true,
                        'isIndex'=>false,
                        'isContacts'=>false
                    ]);
                    
                } else {
                    return  view('album', [
                        'images' => $images, 
                        'album' => $album,  
                        'categories' => $categories,
                        'thiscategory' => NULL,
                        'other'=>true,
                        'isAlbum'=>true,
                        'isIndex'=>false,
                        'isContacts'=>false
                    ]);
                }
               
            } else {
                return view('404'); 
            }
             
        }
        return view('404'); 
            
    }

   

    public function create($id) {

        $album_id = $id;
        $album = Album::find($id);
        $images = $album->images()->orderBy('id', 'DESC')->get();
        return view('admin-album-edit', ['album_id' => $album_id, 'images' =>  $images, 'album' => $album ]);
    }

}
