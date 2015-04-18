(function($){
  $(function(){
    $('.button-collapse').sideNav();
    });
  })
(jQuery); 

$(document).ready(function(){
      $('.slider').slider();
});

$(document).ready(function(){
    $('.materialboxed').materialbox();
});

$('.datepicker').pickadate({
  selectMonths: true,
  selectYears: 15
});

(function(){
    $("#bSummit").click(function() {
        var nombre = $("#first_name").val();
            phone = $("#phone").val();
            email = $("#email").val();
            validacion_email = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            checkin = $("#checkin").val();
            checkout = $("#checkout").val();
            people = $("#people option:selected").text();

      if (nombre == "") {
            $("#first_name").focus();
            Materialize.toast('Ingrese un nombre.', 8000)
            return false;
        }else if(email == "" || !validacion_email.test(email)){
            $("#email").focus();
            Materialize.toast('Ingrese un email valido.', 8000)
            return false;
        }else if(phone == ""){
            $("#phone").focus();
            Materialize.toast('Ingrese un numero de telefono.', 8000)
            return false;
        }else if(checkin == ""){
            $("#checkin").focus();
            Materialize.toast('Ingrese una fecha de llegada.', 8000)
            return false;
        }else if(checkout == ""){
            $("#checkout").focus();
            Materialize.toast('Ingrese una fecha de salida.', 8000)
            return false;
        }else{
            $("#loading").show();
            var datos = 'first_name='+ nombre + '&email=' + email + '&phone=' + phone + '&checkin=' + checkin + '&checkout=' + checkout + '&people=' + people;
            $.ajax({
                type: "POST",
                url: "SReserva.php",
                data: datos,
                success: function() {
                    // $('.ajaxgif').hide();
                    Materialize.toast('Su solicitud se ha enviada.', 8000)
                    $("#loading").hide();
                },
                error: function() {
                    // $('.ajaxgif').hide();
                    Materialize.toast('Ocurrio un problema al enviar la solicitud.', 8000)
                    $("#loading").hide();
                }
            });
            return false;
        }
    });

    $("#bSummitContact").click(function() {
        var nombre2 = $("#first_name").val();
            subject2 = $("#subject").val();
            email2 = $("#email").val();
            validacion_email2 = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            message2 = $("#message").val();

      if (nombre2 == "") {
            $("#first_name").focus();
            Materialize.toast('Ingrese un nombre.', 8000)
            return false;
        }else if(email2 == "" || !validacion_email2.test(email2)){
            $("#email").focus();
            Materialize.toast('Ingrese un email valido.', 8000)
            return false;
        }else if(message2 == ""){
            $("#message").focus();
            Materialize.toast('Ingrese un asunto.', 8000)
            return false;
        }else if(subject2 == ""){
            $("#subject").focus();
            Materialize.toast('Ingrese un mensaje.', 8000)
            return false;
        }else{
            $("#loading").show();
            var datos2 = 'first_name='+ nombre2 + '&email=' + email2 + '&subject=' + subject2 + '&message=' + message2;
            $.ajax({
                type: "POST",
                url: "sContact.php",
                data: datos2,
                success: function() {
                    // $('.ajaxgif').hide();
                    Materialize.toast('Su mensaje se ha enviado.', 8000)
                    $("#loading").hide();
                },
                error: function() {
                    // $('.ajaxgif').hide();
                    Materialize.toast('Ocurrio un problema al enviar el mensaje.', 8000)
                    $("#loading").hide();
                }
            });
            return false;
        }
    });
})();