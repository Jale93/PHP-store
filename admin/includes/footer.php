
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
               
               <!-- WYSIWYG -->
               
               <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>

        <script src="js/dropzone.js"></script>
               
               <script src="js/scripts.js"></script>
        <script src="js/plugins/datatable/jquery.dataTables.min.js"></script> 

               <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',    <?php echo $session->count; ?>],
          ['Comment',   <?php echo Comment::count_all(); ?>],
          ['Users',    <?php echo User::count_all(); ?>],
          ['Photos', <?php echo Photo::count_all(); ?>],
          ['Orders', <?php echo Order::count_all(); ?>],
          ['Messages', <?php echo ContactMessage::count_all(); ?>],
          ['Site Parameters', <?php echo Siteparameter::count_all(); ?>],
          ['Directory', <?php echo Directors::count_all(); ?>]
    
        ]);

        var options = {
          legend:'none',
          pieSliceText: 'label',
          title: 'My Daily Activities',
          backgrounColor: 'transparent'

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script>
   $(document).ready(function(){
        $('#tbl_main thead tr:eq(1) th').each( function () {
            var title = $('#tbl_main thead tr:eq(1) th').eq( $(this).index() ).text();
            if(title != '')
            $(this).html( '<input type="text" placeholder="'+title+'" />' );
        });
        var table = $('#tbl_main').DataTable({
            orderCellsTop: true,
            order: [],
//            columnDefs: [{ orderable: false, targets: [6,7]}],

        });

        $('#tbl_main').show();
        // Apply the search
        table.columns().every(function (index) {
            $('#tbl_main thead tr:eq(1) th:eq(' + index + ') input').on('keyup change', function () {
                table.column($(this).parent().index() + ':visible')
                    .search(this.value)
                    .draw();
            });
        });
        $("[name=tbl_main_length]").append('<option value="500">500</option>').append('<option value="1000">1000</option>');
   });
     
</script>
  <script>
        function test(lang){
            document.cookie = "site_lang_adm="+lang;
//            alert(lang);
//            $.cookie("site_lang_adm", lang);
            
        }
  </script>
<style>
  
    #checkall{
        margin-left:-8px;
    }   
    .dataTables_length{
        margin: 10px;
    }
    table.dataTable thead:first-child th {
        position: relative;
        background-image: none !important;
        background-color: #45b5f6 !important;
    }

    table.dataTable thead th.sorting:after,
    table.dataTable thead th.sorting_asc:after,
    table.dataTable thead th.sorting_desc:after {
        position: absolute;
        top: 12px;
        right: 8px;
        display: block;
        font-family: FontAwesome;
    }
    table.dataTable thead th.sorting:after {
        content: "\f0dc";
        color: #ddd;
        font-size: 0.8em;
        padding-top: 0.12em;
    }
    table.dataTable thead th.sorting_asc:after {
        content: "\f0de";
    }
    table.dataTable thead th.sorting_desc:after {
        content: "\f0dd";
    }
    #tbl_main_length label{
        font-size:18px;
    }
    #tbl_main_length select{
     width: 150px;
     margin: 10px;
     padding: 5px 11px;
    }
</style>


</body>

</html>
