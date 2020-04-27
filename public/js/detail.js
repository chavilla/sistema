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
                        <td class='txt-price'>`+priceModal.toFixed(2)+`</td>
                        <td class='txt-total'>`+total.toFixed(2)+`</td>
                    `;
                    
                    table_items.appendChild(fila); 
                    modalProd.classList.remove('showProducts');
                    modalProd.classList.add('hideProducts');
                    check.checked=false;
                }
            });
        });    

        var btnSend=document.querySelector('#btn-send');
        btnSend.addEventListener('click',(e)=>{
            e.preventDefault();
            var counts=new Array();
            var codes=new Array();
            var names=new Array();
            var prices=new Array();
            var table=document.querySelectorAll('.item-data tr');
            console.log(table);
            
            
            for (let i = 0; i < table.length; i++) {

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

            console.log(data);
            
            
            
            
            
        })
        
           


        /* Buscar producto */
       /*  const buscador=document.querySelector('#txt-namProd');
        buscador.addEventListener('keyup', searchProduct);


        function searchProduct(e){
            e.preventDefault();
        }
 */

    })
})();

/* var $=jQuery.noConflict();
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

    $('#txt-namProd').on('input', function(e){
        e.preventDefault();
        var name=$(this).val();
            $.ajax({
                type:'POST',
                url:baseUrl()+"get-product",
                data:{ name:name},
                success:function(data){
                   
                }
            })
    });

}); */