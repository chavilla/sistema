

if (window.location.href.indexOf("list")>-1) {
    if (document.getElementById('notificacion')) {
        const notificacion=document.querySelector('#notificacion');

            setTimeout(() => {
                 notificacion.classList.remove('notify');
            }, 2000);     
   }   
}



