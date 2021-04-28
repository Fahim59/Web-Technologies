var editData = function(id){
   $('#table-container').load('update-form.php')
    $.ajax({    
        type: "GET",
        url: "update-data.php", 
        data:{editId:id},            
        dataType: "html",                  
        success: function(data){   
          var userData=JSON.parse(data);  
          $("input[name='uid']").val(userData.uid);               
          $("input[name='name']").val(userData.name);
          $("input[name='fname']").val(userData.fname);
          $("input[name='mname']").val(userData.mname);
          $("input[name='dob']").val(userData.dob);
          $("input[name='gender']").val(userData.gender);
          $("input[name='class']").val(userData.class);
          $("input[name='address']").val(userData.address);
          $("input[name='email']").val(userData.email);
          $("input[name='picture']").val(userData.picture);
           
        }
    });
};
$(document).on('submit','#updateForm',function(e){
        e.preventDefault();
         var uid= $("input[name='uid']").val();               
         var name= $("input[name='name']").val();
         var fname= $("input[name='fname']").val();
         var mname= $("input[name='mname']").val();
         var dob= $("input[name='dob']").val();
         var gender= $("input[name='gender']").val();
         var class= $("input[name='class']").val();
         var address= $("input[name='address']").val();
         var email= $("input[name='email']").val();
         var picture= $("input[name='picture']").val();
        $.ajax({
        method:"POST",
        url: "update-data.php",
        data:{
          updateId:uid,
          name:name,
          fname:fname,
          mname:mname,
          dob:dob,
          gender:gender,
          class :class,
          address:address,
          email:email,
          picture:picture
        },
        success: function(data){
        $('#table-container').load('show-data.php');
        $('#msg').html(data);
   
    }});
});
 