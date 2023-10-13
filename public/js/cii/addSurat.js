function nomorPemisah(x) {
return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
}


$(function(){   
    var maxGroup = 100;
    
    //melakukan proses multiple input interior
    $(".addMoreInterior").click(function(){
        if($('body').find('.fieldGroupInterior').length < maxGroup){
            var fieldHTML = '<li class="list-group-item fieldGroupInterior"><div class="form-row">'+$(".fieldGroupInteriorCopy").html()+'</div></li>';
            $('body').find('#addInterior').append(fieldHTML);
        }else{
            alert('Pemesanan Maksimal '+maxGroup+' item!');
        }
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroupInterior").remove();
    });

    $("select[name=sepakat_pembayaran]").on('change', function(){
        if ($("select[name=sepakat_pembayaran] option:selected").val() == "Tempo") 
        {
            $('#tempo').attr("type",'text');
        }
        else{
            $('#tempo').attr('type',"hidden");
        }
    });
});