<?php

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = '';
		return Admin::view($content, 'victoria kvitka photographer');
	}
]);
