<!DOCTYPE html>
<html>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
        <!-- jQuery 2.2.3 -->
        <script src="jquery-2.2.3.min.js"></script>
        <script>
            $(function () {
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
    </body>
</html>