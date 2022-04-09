</div>
    <!-- /.content -->
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
 
  <footer class="main-footer">

    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022 <a href="https://github.com/ouldevloper">Abdellah Oulahyane</a>.</strong> All rights reserved.
  </footer>
</div>
<script src="app/views/plugins/jquery/jquery.min.js"></script>
<script src="app/views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="app/views/dist/js/adminlte.min.js"></script>
<script src="app/views/dist/js/demo.js"></script>
<script src="app/views/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#noteform').submit(function(e) {
        var date = $("input:text[name=date]").val();
        var titl = $("input:text[name=title]").val();
        var desc = $("input:text[name=description]").val();
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '/?p=home&path=note',
            data: $(this).serialize(),
            error:function(error){
              alert("error "+ error);
            },
            success: function(response)
            {
              $("#notes").prepend(" <li><div class='rotate-2 lazur-bg'><small>"+date+"</small> <h5><center>"+titl+"</center></h5><p>"+desc+"</p><a href='' class='text-danger pull-right' style='position : absolute;bottom   : 0'><i class='fa fa-trash-o '></i></a></div></li>");
              $("input:text[name=date]").val("");
              $("input:text[name=title]").val("");
              $("input:text[name=description]").val("");
              $('#newnote').modal('hide'); 
           }
       });
     });

     //$('#editprofile').submit(function(e) {
     //   e.preventDefault();
     //   alert($(this).serialize());
     //   $.ajax({
     //       type: "POST",
     //       url: "/?p=home&path=profile",
     //       data: $(this).serialize(),
     //       error:function(error){
     //         alert("error ");
     //       },
     //       success: function(response)
     //       {
     //         $('#profile').modal('hide'); 
     //       }
     //   });
     //});
});

</script>
</body>
</html>