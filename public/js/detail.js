(function(){
    "Use strit";

     document.addEventListener('DOMContentLoaded', function(){

        const btnClose=document.querySelector('.close-prod');
        const table_items=document.querySelector('.table-items tbody');
        const btn_new_prod=document.querySelector('#newProduct');
        const checkProd=document.querySelectorAll('.check-prod');
        const modalProd=document.querySelector('.modal-products');
        
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
                let row=check.parentElement.parentElement.childNodes;
                let priceModal= parseFloat(row[10].innerHTML);
                let count=parseFloat(check.parentElement.nextSibling.nextSibling.firstChild.value);
                if (isNaN(count)) {
                    count=1;
                }
                if (count>row[6].innerHTML) {
                    alert('La cantidad seleccionada no está disponible');
                    check.checked=false;
                }
                else{
                    let total=parseFloat(count*priceModal);
                    let fila=document.createElement('tr');
                    fila.innerHTML=
                    ` 
                        <td class='txt-count'>`+count+`</td>
                        <td class='txt-id'>`+row[4].innerHTML+`</td>
                        <td class='txt-stock'>`+row[6].innerHTML+`</td>
                        <td class='txt-name'>`+row[8].innerHTML+`</td>
                        <td class='txt-price text-right'>`+priceModal.toFixed(2)+`</td>
                        <td class='txt-total text-right'>`+total.toFixed(2)+`</td>
                    `;
                    
                    table_items.appendChild(fila); 
                    modalProd.classList.remove('showProducts');
                    modalProd.classList.add('hideProducts');
                    check.checked=false;
                    

                    /* Events for row */
                    var subtotal_invoice=document.querySelector('.subtotal-invoice');
                    var total_invoice=document.querySelector('.total-invoice');
                    var totalSuma=0;
                    var sumatoriaTotal=document.querySelectorAll('.txt-total');
                    sumatoriaTotal.forEach(suma => {
                        let valor=parseFloat(suma.innerHTML);
                        totalSuma+=valor;
                    })
                    subtotal_invoice.innerHTML=totalSuma.toFixed(2);
                    total_invoice.innerHTML=totalSuma.toFixed(2);
                }
            });
        });    


        /* Buscar producto */
       /*  const buscador=document.querySelector('#txt-namProd');
        buscador.addEventListener('keyup', searchProduct);


        function searchProduct(e){
            e.preventDefault();
        }
 */

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
    btnSend.on('click',(e)=>{

        e.preventDefault();
        var client=$('.dataNit').val().trim();
        var totalPay=parseFloat($('.total-invoice').html());
        
        if (!client ||parseFloat(totalPay)<0 || isNaN(parseFloat(totalPay))) {
            console.log('no has pulsado');
            
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
           console.log(data);


           $.ajax({
            type:'POST',
            url:baseUrl()+"save-invoice",
            data:{ datos:data},
            dataType: 'json',
            success:function(json){
                
                
            }
        })
           
            
        }
        
       /*  if (!client || parseFloat(totalPay)<0 || isNaN(parseFloat(totalPay))) {
            console.log('no has pulsado');
            
        }
        else{
            var counts=new Array();
            var codes=new Array();
            var names=new Array();
            var prices=new Array();

            var table=document.querySelectorAll('.item-data tr');
            for(let i = 0; i < table.length; i++)
            {
                var rows=table[i].getElementsByTagName('td');        
                let count=rows[0].innerHTML;
                let code=rows[1].innerHTML;
                let name=rows[3].innerHTML;
                let price=rows[4].innerHTML;
                counts.push(count);
                codes.push(code);
                names.push(name);
                prices.push(price);
            }
            
            var data=new Object();
            data.counts=counts;
            data.codes=codes;
            data.names=names;
            data.prices=prices;
            data.client=client;
            data.total=totalPay;

            var datos=new FormData();
            datos.append('datos',data);

            const xhr=new XMLHttpRequest();
            xhr.open('POST','/datos',true)
            xhr.onload=function(){
                if (this.status===200){
                    console.log('Hola');
                    
                }
            }
            
            xhr.send(datos);
        }
        */


        
        
        
        
        
        
        
    })

});