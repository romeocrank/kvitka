<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use App\Image;
use App\Category;

class CategoriesController extends Controller {
   

    public function create()
    {
        //
    }

    public function contacts() {
        $categories = Category::all();
        return view('contacts',[
            'categories'=>$categories,
            'thiscategory' => NULL,
            'other'=>false,
            'isAlbum'=>false,
            'isIndex'=>false,
            'isContacts'=>true
            ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id) {

        if ($id=='other') {

            $categories = Category::all();
            $albums =Album::where('type', '>', 0)->whereHas('categories', function($q){}, '=', 0)->get();

            foreach ($albums as $album) {

                $album->getCover();
            }

            return view('other',[
                'title' => 'other', 
                'categories'=>$categories, 
                'albums'=>$albums,
                'thiscategory' => NULL,
                'other'=>true,
                'isAlbum'=>false,
                'isIndex'=>false,
                'isContacts'=>false
            ]);

        } else {
            $category = Category::find($id);
            if ($category) {
                $categories = Category::all();
                $albums = $category->albums()->where('type', '>', 0)->get();

                foreach ($albums as $album) {

                    $album->getCover();
                }

                return view('category',[
                    'title' => $category->title,
                    'categories'=>$categories, 
                    'albums'=>$albums,
                    'thiscategory' => $category,
                    'other'=>false,
                    'isAlbum'=>false,
                    'isIndex'=>false,
                    'isContacts'=>false
                ]);

            } else {

                return view('404');
            }
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
