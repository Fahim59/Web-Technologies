<?php  include('../Model/model.php');?>
<?php include "../Controller/HeaderL.php"; ?>
<?php  include('../Model/Sidebar.php');?>
<!-- <?php include('../controller/BorrowBookController.php');?> -->

<!DOCTYPE html>
<html>
  <head>
    <title>Show Borrow  Book List</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
  </head>
  <body>
    <br />
    <div class="container">
      <h3 align="center">Borrow Book History</h3>
      <br />
      <div class="card">
        <!--<div class="card-header">Dynamic Data</div>-->
        <div class="card-body">
          <div class="form-group">
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search Book Name" />
          </div>
          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
  $(document).ready(function(){





    load_data(1);

    // $('.active_btn').prop("disabled",true);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"../Model/fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });

  });
</script>