<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Dosya Yolu</title>
 
        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

        {{HTML::style('packages/barryvdh/laravel-elfinder/css/elfinder.min.css')}}
        {{HTML::style('packages/barryvdh/laravel-elfinder/css/theme.css')}}
        {{HTML::script('packages/barryvdh/laravel-elfinder/js/elfinder.min.js')}}
        {{HTML::script('packages/barryvdh/laravel-elfinder/js/i18n/elfinder.tr.js')}}
        {{HTML::script('admin/jquery.popupWindow.js')}}
 
        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            $().ready(function() {
                var elf = $('#elfinder').elfinder({
                    url : '{{URL::to('admin/elfinder/connector')}}',  // connector URL (REQUIRED)
                    lang:"tr",
                    commands :['en', 'reload', 'home', 'up', 'back', 'forward', 'getfile', 'quicklook',
                            'download', 'rm', 'duplicate', 'rename', 'mkdir', 'upload', 'copy',
                    'cut', 'paste', 'edit', 'extract', 'archive', 'search', 'info', 'view', 'help'
                    ],
                    getFileCallback : function(file) {
                       // file.orgPath=file.path;
                       //file.path=file.path.replace(/\\/gi,"/");
                        file.path="uploads/"+file.url.replace(file.baseUrl,"");
                        file.path=decodeURIComponent(file.path);
                        window.opener.processFile(file);
                        window.close();
                    },
                    resizable: false
                }).elfinder('instance');
            });
        </script>
    </head>
    <body>
 
        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>
 
    </body>
</html>