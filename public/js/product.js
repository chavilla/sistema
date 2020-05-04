(function(){
    "Use strict";
    document.addEventListener('DOMContentLoaded', function(){

        const searching=document.querySelector('#search'); 
        searching.addEventListener('input',searchProducts);

        function searchProducts(e){
            const expresion=new RegExp(e.target.value,"i");
            const registros=document.querySelectorAll('tbody tr');
            registros.forEach(registro=>{
                registro.style.display='none';
                if(registro.childNodes[2].textContent.replace(/\s/g, " ").search(expresion) !=-1){
                    registro.style.display='table-row';               
                }
            });
       }
    })

})();