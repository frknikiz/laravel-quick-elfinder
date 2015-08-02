{{HTML::script('packages/frknikiz/laravel-quick-elfinder/admin/jquery.popupWindow.js')}}
<script type="text/javascript">
    var basilan=null;
    $(document).ready(function ()
    {
        var find=$('.find');

        find.click(function(){basilan=$(this)});
        find.popupWindow({
            windowURL: '{{URL::to('admin/elfinder/elfinder')}}',
            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1
        });

        $('.remove').click(function(){
            $(this).parents('div').find('input[type="text"]').val('');
        });
    });
    function processFile(file)
    {
        basilan.parents('div').find('input[type="text"]').val(file.path);
        console.log(file);
    }
</script>
