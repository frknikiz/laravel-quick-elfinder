<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Upload dir
    |--------------------------------------------------------------------------
    |
    | The dir where to store the images (relative from public)
    |
    */

    'dir' => "uploads",

    /*
    |--------------------------------------------------------------------------
    | Access filter
    |--------------------------------------------------------------------------
    |
    | Filter callback to check the files
    |
    */

    'access' => 'Barryvdh\Elfinder\Elfinder::checkAccess',

    /*
    |--------------------------------------------------------------------------
    | Roots
    |--------------------------------------------------------------------------
    |
    | By default, the roots file is LocalFileSystem, with the above public dir.
    | If you want custom options, you can set your own roots below.
    |
    */

    'roots'  => array(
                    array(
                        'driver' => 'LocalFileSystem',
                        'path'   => public_path("uploads"),
                        'URL'    => url("uploads"),
                        'dotFiles'   => false,
                        'uploadOrder'=> array( 'allow' ),
                        'uploadAllow'=>array('image'),
                        'uploadMaxSize'=>"1M"
                    ),
                    'plugin' => array(
                        'Sanitizer' => array(
                            'enable' => true,
                            'targets'  => array(' ','\\','/',':','*','?','"','<','>','|','Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü'), // target chars
                            'replace'  =>"-"   // replace to this
                        )
                    ),
                    "encoding"=>"UTF-8",
                    "locale"=>"tr_TR.UTF-8",
                     ),
    
    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | These options are merged, together with 'roots' and passed to the Connector.
    | See https://github.com/Studio-42/elFinder/wiki/Connector-configuration-options-2.1
    |
    */

    'options' => array(
        'plugin' => array(
            'Sanitizer' => array(
                'enable' => true,
                'targets'  => array(' ','\\','/',':','*','?','"','<','>','|','Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü'), // target chars
                'replace'  => "-"  // replace to this  // replace to this
            )
        ),
        'bind' => array(
            'mkdir.pre mkfile.pre rename.pre' => array(
                'Plugin.Sanitizer.cmdPreprocess'
            ),
            'upload.presave' => array(
                'Plugin.Sanitizer.onUpLoadPreSave'
            )
        ),
    ),
    
    /*
    |--------------------------------------------------------------------------
    | CSRF
    |--------------------------------------------------------------------------
    |
    | CSRF in a state by default false.
    | If you want to use CSRF it can be replaced with true (boolean).
    |
    */

    'csrf'=>null,

);
