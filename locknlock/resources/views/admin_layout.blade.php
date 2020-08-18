
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

@include('admin.blocks.head')

<body>

    <!-- Left Panel -->
    @include('admin.blocks.left_panel')

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('admin.blocks.header')
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-12">
                <div class="page-header">
                    <div class="page-title">
                        @yield("content")
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    @include('admin.blocks.footer')

</body>

</html>
