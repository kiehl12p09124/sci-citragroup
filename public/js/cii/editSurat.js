$(function(){  

    $("select[name=sepakat_pembayaran]").on('change', function(){
        if ($("select[name=sepakat_pembayaran] option:selected").val() == "Tempo") 
        {
            $('#tempo').attr("type",'text');
        }
        else{
            $('#tempo').attr('type',"hidden");
        }
    });


    console.log(rekening);

});