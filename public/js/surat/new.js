$(function(){   
    var maxGroup = 100;
    
    //melakukan proses multiple input 
    $(".addMoreBarang").click(function(){
        if($('body').find('.fieldGroupBarang').length < maxGroup){
            var fieldHTML = '<div class="form-row fieldGroupBarang mt-2">'+$(".fieldGroupBarangCopy").html()+'</div>';
            $('body').find('#addBarang').append(fieldHTML);
        }else{
            alert('Pemesanan Maksimal '+maxGroup+' item!');
        }
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroupBarang").remove();
    });

    //melakukan proses multiple input interior
    $(".addMoreInterior").click(function(){
        if($('body').find('.fieldGroupInterior').length < maxGroup){
            var fieldHTML = '<div class="form-row fieldGroupInterior mt-2">'+$(".fieldGroupInteriorCopy").html()+'</div>';
            $('body').find('#addInterior').append(fieldHTML);
        }else{
            alert('Pemesanan Maksimal '+maxGroup+' item!');
        }
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroupInterior").remove();
    });

});