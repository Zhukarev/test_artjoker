jQuery( document ).ready(function($) {
    
    $( ".chosen-select" ).change(function() {
        $('#inputDistrict').hide();
        $("#inputCity").show();

        var regionId = $( ".chosen-select" ).select().val().slice(0,2);

        $.ajax({
            method: "POST",
            data: { regionId: regionId }
        })
        .done(function( msg ) {

            $('#inputCity').html(msg);

        });

    });

});
$(document).on("change", ".chosen-select-city", function(e) {
     $("#inputDistrict").show();
    var cityPid = $( ".chosen-select-city" ).select().val();
    $.ajax({
        method: "POST",
        data: { cityPid: cityPid }
        })
        .done(function( msg ) {

            $('#inputDistrictInput').val(msg);
        });
});

$(document).on("click", "#inputButton", function(e) {
    e.preventDefault();
    if ( !validateForm() ) { // если есть ошибки возвращает true
     
  
     $("#inputChek").show();
    var fio=$('#authorInput').val();
    var email=$('#emailInput').val();
    var idRegion = $( ".chosen-select" ).select().val();
    var idDistrict = $( ".chosen-select-city" ).select().val();
    var idCity = $( "#inputCity > div > a > span" ).text();
        $.ajax({
        method: "POST",
        data: { fio: fio,
                email: email,
                idRegion: idRegion,
                idDistrict: idDistrict,
                idCity: idCity
         }
        })
        .done(function( msg ) {

            $('#inputChek').html(msg);
        });

    }


function validateForm() {
    $(".text-error").remove();
    
    // Проверка логина    
    var el_l    = $('#authorInput');
    if ( el_l.val().length < 4 ) {
      var v_fio = true;
      el_l.after('<span class="text-error for-fio">ФИО должено быть больше 3 символов</span>');
      $(".for-fio").css({top: el_l.position().top + el_l.outerHeight() + 2});
    } 
    $("#authorInput").toggleClass('error', v_fio );
    
    // Проверка e-mail
    
    var reg     = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
    var el_e    = $('#emailInput');
    var v_email = el_e.val()?false:true;
  
    if ( v_email ) {
      el_e.after('<span class="text-error for-email">Поле e-mail обязательно к заполнению</span>');
      $(".for-email").css({top: el_e.position().top + el_e.outerHeight() + 2});
    } else if ( !reg.test( el_e.val() ) ) {
      v_email = true;
      el_e.after('<span class="text-error for-email">Вы указали недопустимый e-mail</span>');
      $(".for-email").css({top: el_e.position().top + el_e.outerHeight() + 2});
    }
    $("#emailInput").toggleClass('error', v_email );
    

    return ( v_fio || v_email );
  }

});
