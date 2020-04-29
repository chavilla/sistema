var $=jQuery.noConflict();
$(document).ready(function(){

    var tbody=$('tbody')
    var row=$('tbody .fila');
    var page=$('.page');

    $('#search').on('keyup',function(e){
        e.preventDefault();
        var input=$(this).val().trim();
        if (input==='') {
            tbody.html(row);
            row.show();
            page.show();
        }
        else{
            row.hide();
            page.hide();
            
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            
            $.ajax({
                type:'POST',
                url:baseUrl()+"get-product",
                data:{ name:input},
                dataType: 'json',
                success:function(data){
    
                    if (data.message==='Si') {
                        
                        var fila='<tr>'+
                        '<td>'+data.id+'</td>'+
                        '<td class="text-left">'+data.name+'</td>'+
                        '<td class="text-left">'+data.category+'</td>'+
                        '<td class="text-right">'+data.stock+'</td>'+
                        '<td class="text-right">$ '+data.price+'</td>'+
                        '<td class="text-right">'+data.tax+'%</td>'+
                        '<td class="text-right">$ '+data.total+'</td>'+
                        '</tr>'
                        ;
                        /* '<td>'+data.name+'</td>'+
                        '<td>'+data.category+'</td>'+
                        '<td>'+data.stock+'</td>'+
                        '<td>'+data.price+'</td>'+
                        '<td>'+data.tax+'</td>'+
                        '<td>'+data.category+'</td>'+
                        '<td>'+data.total+'</td>'; */

                        tbody.html(fila);
                        
                        
                       /*  var agrega=$('<td></td>').html(data.id);
                        console.log(agrega.text());
                        row.find('td').appendTo(agrega);
                        var id=data.id,
                            name=data.name,
                            category=data.category,
                            stock=data.stock */
    
                    }
                    else{
                       console.log('Nada');
                       
                    }
                }
            })
        }
        
       
       
       

    })
    function baseUrl() {
        var pathArray=location.href.split('/');
        var protocol=pathArray[0];
        var host=pathArray[2];
        var url=protocol + '//' + host + '/';
        return url;
    }

})