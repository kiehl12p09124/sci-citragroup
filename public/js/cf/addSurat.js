
$(function(){   
    var maxGroup = 100;
    
    //melakukan proses multiple input interior
    $(".addMoreBarang").click(function(){
        if($('body').find('.fieldGroupBarang').length < maxGroup){
            var fieldHTML = '<li class="list-group-item fieldGroupBarang"><div class="form-row">'+$(".fieldGroupBarangCopy").html()+'</div></li>';
            $('body').find('#addBarang').append(fieldHTML);
        }else{
            alert('Pemesanan Maksimal '+maxGroup+' item!');
        }
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroupBarang").remove();
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