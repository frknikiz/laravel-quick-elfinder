<?php

  Route::group(array('before' => 'isAdminLogin',"prefix"=>"admin"), function()
  {
    Route::get('elfinder', 'Barryvdh\Elfinder\ElfinderController@showIndex');
    Route::any('elfinder/connector', 'Barryvdh\Elfinder\ElfinderController@showConnector');
    Route::get('elfinder/elfinder', function ()
    {
      return View::make('CustomElfinder::elfinder');
    });
  });
