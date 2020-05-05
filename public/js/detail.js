(function(){
    "Use strit";

     document.addEventListener('DOMContentLoaded', function(){

        const btnClose=document.querySelector('.close-prod');
        const table_items=document.querySelector('.table-items tbody');
        const btn_new_prod=document.querySelector('#newProduct');
        const checkProd=document.querySelectorAll('.check-prod');
        const modalProd=document.querySelector('.modal-products');
        const buscador=document.querySelector('#search-prod');
        
        btn_new_prod.addEventListener('click',(e)=>{
            e.preventDefault();
            modalProd.classList.remove('hideProducts');
            modalProd.classList.add('showProducts');
        })
        
        btnClose.addEventListener('click',(e)=>{
            e.preventDefault();
            modalProd.classList.remove('showProducts');
            modalProd.classList.add('hideProducts');
        })
        
        //add value on the table detail
        checkProd.forEach(check=> {       
            check.addEventListener('click',()=>{
                //Obtener los td del tr con clase row
                let row=check.parentElement.parentElement.childNodes;
                let priceModal= parseFloat(row[10].innerHTML);
                let stockModal=row[6].innerHTML;
                let idModal=row[4].innerHTML;
                let nameModal=row[8].innerHTML;
                let count=parseFloat(check.parentElement.nextSibling.nextSibling.firstChild.value);
                
                if (isNaN(count)) {
                    count=1;
                }
                
                if (count>row[6].innerHTML) {
                    alert('La cantidad seleccionada no está disponible');
                    check.checked=false;
                    count='';
                }
                else{
                    let total=parseFloat(count*priceModal);
                    let fila=document.createElement('tr');
                    fila.innerHTML=
                    ` 
                        <td class='txt-count'>`+count+`</td>
                        <td class='txt-id text-center'>`+idModal+`</td>
                        <td class='txt-name text-center'>`+nameModal+`</td>
                        <td class='txt-price text-right'>`+priceModal.toFixed(2)+`</td>
                        <td class='txt-total text-right'>`+total.toFixed(2)+`</td>
                    `;

                    
                    table_items.appendChild(fila); 
                    modalProd.classList.remove('showProducts');
                    modalProd.classList.add('hideProducts');
                    check.checked=false;
                    //Actualizar el stock
                    stockModal=check.parentElement.parentElement.getElementsByTagName('td')[3];
                    let newStock=parseInt(stockModal.innerHTML-count);
                    stockModal.innerHTML=newStock;
                    
                    /* Events for row */
                    var subtotal_invoice=document.querySelector('.subtotal-invoice');
                    var total_invoice=document.querySelector('.total-invoice');
                    var totalSuma=0;
                    var sumatoriaTotal=document.querySelectorAll('.txt-total');
                    sumatoriaTotal.forEach(suma => {
                        let valor=parseFloat(suma.innerHTML);
                        totalSuma+=valor;
                    });
                    subtotal_invoice.innerHTML=totalSuma.toFixed(2);
                    total_invoice.innerHTML=totalSuma.toFixed(2);
                }
            });
        });  

    
        //Buscador
        buscador.addEventListener('input', buscarContactos);
        function buscarContactos(e){
            const expresion=new RegExp(e.target.value,"i");
            const registros=document.querySelectorAll('.tbody-prod tr');
            /* Recorremos registros */
            registros.forEach(registro=>{
                 registro.style.display='none';
                 if(registro.childNodes[8].textContent.replace(/\s/g, " ").search(expresion) !=-1){
                      registro.style.display='table-row';               
                 }
            })
        }
    })
})();

var $=jQuery.noConflict();
$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function baseUrl() {
        var pathArray=location.href.split('/');
        var protocol=pathArray[0];
        var host=pathArray[2];
        var url=protocol + '//' + host + '/';
        return url;
    }

    /* Send to invoice */
    var btnSend=$('#btn-send');
    var btnCancel=$('#btn-cancel');
    btnSend.on('click',(e)=>{
        e.preventDefault();
        var client=$('.dataNit').val().trim();
        var totalPay=parseFloat($('.total-invoice').html());
        if (!client ||parseFloat(totalPay)<=0 || isNaN(parseFloat(totalPay))) {
            alert('Debes rellenar todos los campos');
        }
        else{
            var counts=[];
            var codes=[];
            var names=[];
            var prices=[];

            var table=$('.item-data tr');
            
           table.each(function(index){
                var row=$(this).find('td');
                var count=row[0].textContent;
                var code=row[1].textContent;
                var name=row[3].textContent;
                var price=row[4].textContent;

                counts.push(count);
                codes.push(code);
                names.push(name);
                prices.push(price);   
            })

           var data=new Object();
           data.counts=counts;
           data.codes=codes;
           data.names=names;
           data.prices=prices;
           data.client=client;
           data.total=totalPay;

           $.ajax({
            type:'POST',
            url:baseUrl()+"save-invoice",
            data:{ datos:data},
            dataType: 'json',
            success:function(json){
                if (json.message){
                    window.location=baseUrl()+'list-invoices';
                }            
            }
        })   
        }
    })

    btnCancel.click(()=>{
        var cancel=confirm('¿Desea cancelar la factura?');
        if (cancel){
            window.location=baseUrl()+'list-invoices';
        }
    })

});