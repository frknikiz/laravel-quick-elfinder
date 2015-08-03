<?php
    function permalink($string)
    {
        $find    = array('Ç', 'Þ', 'Ð', 'Ü', 'Ý', 'Ö', 'ç', 'þ', 'ð', 'ü', 'ö', 'ý', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string  = strtolower(str_replace($find, $replace, $string));
        $string  = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string  = trim(preg_replace('/\s+/', ' ', $string));
        $string  = str_replace(' ', '-', $string);
        return $string;
    }

    return array(

        /*
        |--------------------------------------------------------------------------
        | Upload dir
        |--------------------------------------------------------------------------
        |
        | The dir where to store the images (relative from public)
        |
        */

        'dir'     => "uploads",

        /*
        |--------------------------------------------------------------------------
        | Access filter
        |--------------------------------------------------------------------------
        |
        | Filter callback to check the files
        |
        */

        'access'  => 'Barryvdh\Elfinder\Elfinder::checkAccess',

        /*
        |--------------------------------------------------------------------------
        | Roots
        |--------------------------------------------------------------------------
        |
        | By default, the roots file is LocalFileSystem, with the above public dir.
        | If you want custom options, you can set your own roots below.
        |
        */

        'roots'   => array(array('driver'      => 'LocalFileSystem',
                                 'path' => public_path("uploads"),
                                 'URL'         => url("uploads"),
                                 'dotFiles' => false,
                                 'uploadOrder' => array('allow'),
                                 'uploadAllow' => array('image'),
                                 'uploadMaxSize' => "1M"),
                                 "encoding" => "UTF-8",
                                 "locale"        => "tr_TR.UTF-8",),

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
            'bind' => array('mkdir mkfile duplicate upload paste' =>
            function ($cmd, $result, $args, $elfinder)
            {
                $files = $result['added'];
                foreach($files as $file)
                {
                    $filename = permalink($file["name"]); // just for test
                    $arg      = array('target' => $file['hash'], 'name' => $filename);
                    $elfinder->exec('rename', $arg);
                }
                return true;
            },
            "rename.pre" => function ($cmd, &$result, $args)
                            {
                                $new_name       = permalink($result["name"]);
                                $result["name"] = $new_name;
                            }),),

        /*
        |--------------------------------------------------------------------------
        | CSRF
        |--------------------------------------------------------------------------
        |
        | CSRF in a state by default false.
        | If you want to use CSRF it can be replaced with true (boolean).
        |
        */

        'csrf'    => null,

    );
