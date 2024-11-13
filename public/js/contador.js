var base = location.protocol + '//' + location.host;
(() => {

    /*
    Script que cuenta la visita y la envía al servidor con PHP
    Solo tienes que incluir este script o código en todas las páginas en donde quieras registrar las visitas
    y los visitantes
    */
    document.addEventListener("DOMContentLoaded", async() => {
        try {
            // Preferiblemente debería ser la URL absoluta
            // Ejemplo: http://localhost/contador_visitas_php_avanzado/contador/registrar_visita.php
            const url = 'http://127.0.0.1:8000/php/registar_visita.php';
            const payload = {
                pagina: document.title,
                url: window.location.href,
            };
            const respuestaRaw = await fetch(url, {
                method: "POST",
                body: JSON.stringify(payload),
            });
            const respuesta = await respuestaRaw.json();
            if (!respuesta) {
                console.log("Error registrando visita");
            }
        } catch (e) {
            console.log("Error registrando visita: " + e);
        }
    });
})();