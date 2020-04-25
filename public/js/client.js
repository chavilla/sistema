var $=jQuery.noConflict();
$(document).ready(function(){
    
    var frm=$('#frmClient');

    function baseUrl() {
        var pathArray=location.href.split('/');
        var protocol=pathArray[0];
        var host=pathArray[2];
        var url=protocol + '//' + host + '/';
        return url;
    }

    function clean() {
        $('#name').val('');
        $('#phone').val('');
        $('#email').val('');
        $('#nit').val('');
    }

    function showMessage(msg){
        $('#divmsg').empty();
        $('#divmsg').append("<p>"+msg+"</p>");
        $('#divmsg').show(2000);
        $('#divmsg').hide();

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
        var nameInput=$('#name').val().trim();
        var phoneInput=$('#phone').val().trim();
        var emailInput=$('#email').val().trim();
        var nitInput=$('#nit').val().trim();

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
        var validateNit=onlyNumbers(nitInput);
        /* Validate email */
        function onlyEmail(input){
            var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
            return regex.test(input); 
        }
        var validateEmail=onlyEmail(emailInput);

        
        
        if (validateName && validatePhone && validateEmail && validateNit){
            $.ajax({
                type:'POST',
                url:baseUrl()+"create-client",
                data:{ name:nameInput,phone:phoneInput,email:emailInput,nit:nitInput},
                success:function(data){
                    showMessage(data.message);
                    clean();
                    $('.modal-backdrop').removeClass('show');
                    
                    /* var tbody=$('tbody');
                    var row="<tr>"+
                        '<td>'+'<input type="radio" class="check">'+'</td>'+
                        '<td>'+data.nit+'</td>'+
                        '<td>'+data.name+'</td>'+
                        '<td>'+data.phone+'</td>'+
                        '</tr>';

                        tbody.append(row); */
                        window.location=baseUrl()+'create-invoice';
                    
                }
            })
        }

        else{
            showError('Algunos de los datos son incorrectos');
           clean();
        }
    });

    /* Modal to show clients */
    $('#inputClient').on('click',function(){
        $('#modal').removeClass('hideClients'); 
        $('#modal').addClass('showClients');
        $('.close').on('click',function(){
            $('#modal').removeClass('showClients'); 
            $('#modal').addClass('hideClients');
        })
    })

    var check=$('.check');
    check.on('click',function(){
        var row=$(this).parent().parent().find('td');        
        var name=$('.dataName'),
            phone=$('.dataPhone'),
            nit=$('.dataNit');
            name.val(row[2].textContent);
            nit.val(row[1].textContent);
            phone.val(row[3].textContent);
            $(this).prop('checked',false);
            $('#modal').removeClass('showClients'); 
            $('#modal').addClass('hideClients');
    })
    

})