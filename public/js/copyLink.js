
document.getElementById('copyLinkBtn').addEventListener('click', function() {
    var link = window.location.href;
    navigator.clipboard.writeText(link)
        .then(function() {
            alert("¡Enlace copiado al portapapeles!");
        })
        .catch(function(error) {
            console.error('Error al copiar el enlace: ', error);
        });
});
