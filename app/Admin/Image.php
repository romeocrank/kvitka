<?php

Admin::model('App\Image')->title('Фотки')->display(function () {

	$display = AdminDisplay::table();
	$display->columns([
		Column::string('oroginal_file_name')->label('Имя файла'),
		Column::string('description')->label('Описание'),
		Column::image('path')
	]);
	return $display;

})->createAndEdit(function () {
	$form = AdminForm::form();
		$form->items([
			FormItem::text('title', 'Название')->required()->unique(),
			FormItem::checkbox('type', 'Скрытый'),
			FormItem::multiselect('categories', 'Категория')->model('App\Category')->display('title'),
			FormItem::ckeditor('description', 'Описание')
		]);
		return $form;
	});