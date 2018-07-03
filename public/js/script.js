//Sweetalert Delte Category
$(".delCategory").click(function(){
    var id = $(this).attr('rel');
    var deleteFunction = $(this).attr('rel1');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonClass: "btn-danger",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        swal("Deleted!", "Your imaginary file has been deleted.", "success");
        window.location.href="/admin/"+deleteFunction+"/"+id;
      } else {
        swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
    });
  });
//Sweetalert Delete Product
 $(".delProduct").click(function(){
  var id = $(this).attr('rel');
  var deleteFunction = $(this).attr('rel1');
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plx!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm) {
    if (isConfirm) {
      swal("Deleted!", "Your imaginary file has been deleted.", "success");
      window.location.href="/admin/"+deleteFunction+"/"+id;
    } else {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
  });
});
//Sweetalert Delete Product Attribute
$(".delAttribute").click(function(){
  var id = $(this).attr('rel');
  var deleteFunction = $(this).attr('rel1');
  swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plx!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm) {
    if (isConfirm) {
      swal("Deleted!", "Your imaginary file has been deleted.", "success");
      window.location.href="/admin/"+deleteFunction+"/"+id;
    } else {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
  });
});
//Check Password using Ajax
 $(document).ready(function(){
     $("#current_pwd").keyup(function(){
      var current_pwd = $("#current_pwd").val();
      $.ajax({
       type:'get',
       url:'/admin/check-pwd',
       data:{current_pwd:current_pwd},
       success:function(resp){
                 //alert(resp);
                 if(resp=='false'){
                  $("#pwdChk").html("<font color='red'>Current Password is incorrect !</font>")
                }else{
                  $("#pwdChk").html("<font color='green'>Current Password is correct !</font>")
                }
              },error:function(){
                alert("Error");
              }
            });
    });
   });
// add remove field using jquery
 $(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-left: 180px;margin-top:3px;"><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px; margin-right:3px;" /><input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px;margin-right:3px;" /><input type="text" name="price[]" id="price" placeholder="Price" style="width: 120px;margin-right:3px;" /><input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px;margin-right:3px;" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
   