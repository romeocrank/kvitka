<?php


Admin::model('App\Album')->title('Альбомы')->display(function () {

	$display = AdminDisplay::datatables();

	// $display->order([ [0, 'desc'] ]);

	$display->filters([
        Filter::field('type')->title(function ($value) {
        	if ($value==1) {
				return 'общие альбомы'; 
    		} elseif  ($value == 2) {
    			return 'главные альбомы'; 
    		} else {
    			return 'скрытые альбомы'; 
    		}
		})
    ]);

	$display->columns([

		Column::custom()->label('Обложка')->callback(function ($instance) {
			$id = $instance->id;
		    if ($instance->cover > 0) {
		    	$image = App\Album::find($id)->images()->find($instance->cover);
		    } else {
		    	$image = App\Album::find($id)->images()->first();
		    }

			if ($image) {
				$path = $image->path;
				return '<a href="'.asset($path).'" data-toggle="lightbox">
						<img class="thumbnail" src="'.asset($path).'" width="80px"></a>';
			} else {
				 return '<a href="'.asset('/images/no-photo.gif').'" data-toggle="lightbox">
						<img class="thumbnail" src="'.asset('/images/no-photo.gif').'" width="80px"></a>';
			}
		}), 
		    
		Column::string('title')->label('Название'),

		Column::lists('categories.title')->label('Категория'),

		Column::custom()->label('Тип')->callback(function ($instance) {
			if ($instance->type == 1) {
				return '<i class="fa fa-eye"></i> &nbsp;'; 
			} elseif ($instance->type == 2) {
				return '<i class="fa fa-exclamation"></i> &nbsp; &nbsp;';
			} else {
				return '<i class="fa fa-lock"></i> &nbsp; &nbsp;'; 
			}
		})->append(Column::filter('type')),

		Column::custom()->label('Фотографии')->callback(function ($instance) {
			$sum = count(App\Album::find($instance->id)->images()->get());

			if ($instance->type) {

				return '<div>
					<a class="btn btn-default btn-sm btnAction" href="/admin/album/edit_fotos/'.$instance->id.'" data-href="/admin/album/edit_fotos/'.$instance->id.'" data-toggle="tooltip"  data-original-title="Edit photos"><i class="fa fa-pencil"></i></a>&nbsp;

					<span>'.$sum.' фото </span>
				</div>';
	
			} else {
				return '<div>
					<a class="btn btn-default btn-sm btnAction" href="/admin/album/edit_fotos/'.$instance->id.'" data-href="/admin/album/edit_fotos/'.$instance->id.'" data-toggle="tooltip"  data-original-title="Edit photos"><i class="fa fa-pencil"></i></a>&nbsp;
					<a class="btn btn-default btn-sm btnAction" href="/admin/album/get_privat_album_url/'.$instance->id.'" data-href="/admin/album/get_privat_album_url/'.$instance->id.'" data-toggle="tooltip"  data-original-title="Get privat url"><i class="fa fa-link"></i></a>
					<span>'.$sum.' фото </span>
				</div>';
			}
		
	
		}),

		Column::datetime('created_at')->label('Создан')->format('d.m.Y H:i:s')
	]);
	return $display;


 })->create(function () {

    	$form = AdminForm::form();
		$form->items([
			FormItem::text('title', 'Название en')->required(),
			FormItem::text('title_ru', 'Название ru')->required(),
			FormItem::text('title_ua', 'Название ua')->required(),

			FormItem::radio('type', 'настройки приватности')->options([
				0 => ' Скрытый (доступ только по ссылке)', 
				1 => ' Общий (Доступен на сайте)', 
				2 => ' Главный (Отображается на стартовой странице)'])->required(),
			FormItem::multiselect('categories', 'Категория')->model('App\Category')->display('title'),
			
			FormItem::textarea('description', 'Описание en'),
			FormItem::textarea('description_ru', 'Описание ru'),
			FormItem::textarea('description_ua', 'Описание ua'),
			FormItem::custom()->display(function ($instance) {})->callback(function ($instance) {
    				$instance->url = Crypt::encrypt($instance->id);
			})
		]);
		return $form;



})->edit(function () {

   		$form = AdminForm::form();
		$form->items([
			FormItem::text('title', 'Название en')->required(),
			FormItem::text('title_ru', 'Название ru')->required(),
			FormItem::text('title_ua', 'Название ua')->required(),

			FormItem::radio('type', 'настройки приватности')->options([
				0 => ' Скрытый (доступ только по ссылке)', 
				1 => ' Общий (Доступен на сайте)', 
				2 => ' Главный (Отображается на стартовой странице)'])->required(),
			FormItem::multiselect('categories', 'Категория')->model('App\Category')->display('title'),
			
			FormItem::textarea('description', 'Описание en'),
			FormItem::textarea('description_ru', 'Описание ru'),
			FormItem::textarea('description_ua', 'Описание ua')
			
		]);
		return $form;
});