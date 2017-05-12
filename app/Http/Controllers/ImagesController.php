<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Album;
use App\Image;
use File;
use Response;


class ImagesController extends Controller {
  

    public function create($id) {
        $album = Album::find($id);
        $title = $album->title;
        $images=Image::where('album_id',$id)->get();
        return view('admin_dropzone_images' , ['title'=>$title, 'images'=>$images, 'album_id' => $id ]);
    }


    public function store(Request $request) {

        $input = $request->all();
        $album_id = $input['album_id'];
        $album = Album::find($album_id);
        $cover = $album->cover;

        if($request->hasFile('image')) 
        {

            $root = public_path()."/images/photos/";  // это корневая папка для загрузки картинок
            // if(!file_exists($root.$date)) {  // если папка с датой не существует, то создаем ее
            //     mkdir($root.$date);
            // }
 
            $original_file_name=$request->file('image')->getClientOriginalName(); //Получение имени файла на клиентской системе (до загрузки)
            $extension = $request->file('image')->getClientOriginalExtension(); //Получение расширения загруженного файла
            $file_name = md5(microtime() . rand(0, 9999)). '.' . $extension; //генерируем имя
            $request->file('image')->move($root.$album_id, $file_name);  //перемещаем файл в папку с оригинальным именем
            $image_path = "/images/photos/".$album_id."/".$file_name; //путь
            
            $image = Image::create([

                'original_file_name' => $original_file_name,
                'file_name'=> $file_name,
                'path' => $image_path,
                'album_id' => $album_id,

            ]);

            $image->setSizes();
            $image->save();
             
        }
        
        $image['cover'] = $cover;

        $image['type'] = Image::find($image['id'])->album()->pluck('type');;
        return response()->json($image);
    }

    public function edit(Request $request) {

        $input = $request->all();

        if (array_key_exists('user_edit', $input)) {

            $image = Image::find($input['id']);
            $image->confirmed = $input['confirmed'];
            $image->description = $input['description'];
            $image->save();
            $responce = ['id'=>$input['id'],'confirmed'=>$input['confirmed'],'description'=>$input['description']];
            return response()->json($image);
            // return response()->json($responce);
        }
        if (array_key_exists('admin_edit', $input)) {
//            dd('admin-edit');
            $image = Image::find($input['id']);
            $image->description = $input['description'];
            $image->save();
            $responce  = ['id'=>$input['id'],'description'=>$input['description']];
            return response()->json($responce);
        }

        // if ( array_key_exists('confirmed', $input)  ) {
        //     $image->confirmed = $input['confirmed'];
        //     $responce = ['id'=>$input['id'],'confirmed'=>$input['confirmed']];
        // }
        // else {
        //     $responce = $input['id'];  
        // }

        // if ( array_key_exists('description', $input)  ) {
        //     $image->description = $input['description'];
        // }

        // $image->save();
        
    }

    public function destroy(Request $request) {

        $input = $request->all();

        if ( array_key_exists('id', $input)  ) {
            Album::where('cover', $input['id'])->update(['cover' => 0]);
            $original_file_name=$input['file_name'];
            $file_path=Image::where('original_file_name',  $original_file_name)->pluck('path');
            Image::where('original_file_name',  $original_file_name )->delete();
            File::delete($file_path);
            $responce = [ 'id'=>$input['id'] ]; 
        }
        return Response::json($responce);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function index() 
    {
        //
    }
}