    <script src="<?=base_url()?>assets/student/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?=base_url()?>assets/student/bootstrap/js/popper.min.js"></script>
    <script src="<?=base_url()?>assets/student/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?=base_url()?>assets/student/assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<link href="<?=base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> <link href="<?=base_url()?>assets/css/plugins.css" rel="stylesheet" type="text/css" /> <link rel="stylesheet" type="text/css" href="<?=base_url()?>plugins/table/datatable/datatables.css"> <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/ecommerce/order.css">');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
    <script src="<?=base_url()?>assets/student/assets/js/custom.js"></script>
<<<<<<< HEAD
=======
    <script src="<?=base_url()?>assets/student/plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/sweetalerts/sweetalert2.min.js"></script>
>>>>>>> c8701c2 (fresh)
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="<?=base_url()?>plugins/table/datatable/datatables.js"></script>
    <script src="<?=base_url()?>plugins/progressbar/progressbar.min.js"></script>
    <script src="<?=base_url()?>assets/js/ecommerce/order.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/charts/chartist/chartist.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/maps/vector/jvector/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/maps/vector/jvector/worldmap_script/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/calendar/pignose/moment.latest.min.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/calendar/pignose/pignose.calendar.js"></script>
    <script src="<?=base_url()?>assets/student/plugins/progressbar/progressbar.min.js"></script>
    <script src="<?=base_url()?>assets/student/assets/js/default-dashboard/default-custom.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>