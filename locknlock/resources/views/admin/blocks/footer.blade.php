<script src="public/admin/vendors/jquery/dist/jquery.min.js"></script>
    <script src="public/admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="public/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="public/admin/assets/js/main.js"></script>


    <script src="public/admin/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="public/admin/assets/js/dashboard.js"></script>
    <script src="public/admin/assets/js/widgets.js"></script>
    <script src="public/admin/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="public/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="public/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        CKEDITOR.replace('ckeditor2');
    </script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>