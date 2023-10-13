
$(function(){   
    var maxGroup = 100;
    
    //melakukan proses multiple input interior
    $(".addMoreItem").click(function(){
        if($('body').find('.fieldGroupItem').length < maxGroup){
            var fieldHTML = '<div class="fieldGroupItem mb-2">'+$(".fieldGroupItemCopy").html()+'</div>';
            $('body').find('#addItem').append(fieldHTML);
        }else{
            alert('Pemesanan Maksimal '+maxGroup+' item!');
        }
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroupItem").remove();
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