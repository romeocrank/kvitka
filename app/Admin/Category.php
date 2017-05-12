<?php

Admin::model('App\Category')->title('Категории')->display(function () {

	$display = AdminDisplay::table();
	$display->columns([
		Column::string('title')->label('Название'),
		Column::string('description')->label('Описание'),
		Column::lists('albums.title')->label('Альбомы в категории'),
		Column::datetime('created_at')->label('Создана')->format('d.m.Y H:i:s')

	]);
	return $display;

})->createAndEdit(function () {
	$form = AdminForm::form();
		$form->items([
			FormItem::text('title', 'Название')->required(),
			FormItem::text('title_ru', 'Название_ru')->required(),
			FormItem::text('title_ua', 'Название_ua')->required(),
			FormItem::multiselect('albums', 'Альбомы')->model('App\Album')->display('title'),
			FormItem::textarea('description', 'Описание'),
			FormItem::textarea('description_ru', 'Описание ru'),
			FormItem::textarea('description_ua', 'Описание ua')
		]);
		return $form;
	});