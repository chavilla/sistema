var $=jQuery.noConflict();
$(document).ready(function(){
    
    var frm=$('#frmClient');

    function clean() {
        $('#name').val('');
        $('#phone').val('');
        $('#email').val('');
    }

    function showMessage(msg){
        $('#divmsg').empty();
        $('#divmsg').append("<p>"+msg+"</p>");
        $('#divmsg').show(2000);
        $('#divmsg').hide(5000);

    }
    function showError(msg){
        $('#diverror').empty();
        $('#diverror').append("<p>"+msg+"</p>");
        $('#diverror').show(1000);
        $('#diverror').hide(2000);

    }

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    frm.on('submit', function(e){
        e.preventDefault();
        var nameInput=$('#name').val();
        var phoneInput=$('#phone').val();
        var emailInput=$('#email').val();

        /* Validate name */
        function onlyLetters(Input) {
            var regex = /^[a-zA-ZÁÉÍÓÚáéíóú]+$/;
            return regex.test(nameInput);
        }
        var validateName=onlyLetters(nameInput);     
        
        /* Vlidate phone */
        function onlyNumbers(input) {
            var regex = /^[0-9]+$/;
            return regex.test(input);
        }
        var validatePhone=onlyNumbers(phoneInput);
        
        /* Validate email */
        function onlyEmail(input){
            var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
            return regex.test(input); 
        }
        var validateEmail=onlyEmail(emailInput);
        
        if (validateName && validatePhone && validateEmail){
            $.ajax({
                type:'POST',
                url:"http://localhost/create-client",
                data:{ name:nameInput,phone:phoneInput,email:emailInput },
                success:function(data){
                    showMessage(data.message);
                    clean();
                    $('.modal-backdrop').removeClass('show');
                }
            })
        }

        else{
            showError('Algunos de los datos son incorrectos');
            $('.modal-backdrop').removeClass('show');
        }
        
       

    });

    /* Modal to show clients */

})