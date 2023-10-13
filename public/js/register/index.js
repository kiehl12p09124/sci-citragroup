$(function(){

    // $('#icon'),on('click', function(){
    //     $('#icon').attr('class') = "fas fa-lock-open";
    //     // $('input [name=password] type') = "fas fa-lock-open";

    // });

   $('#icon').on('click', function(){
      var passInput=$("#passInput");
      if(passInput.attr('type')==='password')
        {
          passInput.attr('type','text');
          $('#icon').attr('class', 'fas fa-eye');
    }else{
            passInput.attr('type','password');
            $('#icon').attr('class', 'fas fa-eye-slash');
      }
  })    

   $('#icon').on('hover', function(){
      var passInput=$("#passInput");
      if(passInput.attr('type')==='password')
        {
          $('#icon').attr('class', 'fas fa-eye');
    }else{
            $('#icon').attr('class', 'fas fa-eye-slash');
      }
  })    





});