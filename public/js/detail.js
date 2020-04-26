(function(){
    "Use strit";

     document.addEventListener('DOMContentLoaded', function(){

        const btnClose=document.querySelector('.close-prod');
        const table_items=document.querySelector('.table-items thead tr').childNodes;
        const btn_new_prod=document.querySelector('#newProduct');

        btn_new_prod.addEventListener('click',(e)=>{
            e.preventDefault();
            let modalProd=document.querySelector('.modal-products');
            modalProd.classList.remove('hideProducts');
            modalProd.classList.add('showProducts');
        })
        
        btnClose.addEventListener('click',(e)=>{
            e.preventDefault();
            let modalProd=document.querySelector('.modal-products');
            modalProd.classList.remove('showProducts');
            modalProd.classList.add('hideProducts');
        })
    })
})();

