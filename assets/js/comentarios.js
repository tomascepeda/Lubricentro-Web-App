document.addEventListener("DOMContentLoaded", () => {

    const ID = document.querySelector("#id").innerText.substring(4, 11);

    let app = new Vue({
        el: "#lista-comentarios-vue",
        data: {
            empty: false,
            loading: false,
            comentarios: []
        }
    });

    function getComentarios() {
        app.loading = true;
        fetch("http://localhost/web2/lubricentro/api/comentarios/" + ID)
            .then(response => response.json())
            .then(comentarios => {
                app.comentarios = comentarios; // similar a $this->smarty->assign
                app.loading = false;
                console.log(comentarios);
            })
            .catch(error => {
                console.log(error);
                app.loading = false;
                app.empty = true;
            });
    }

    getComentarios();
    document.querySelector("#btn-reload").addEventListener("click", getComentarios);

});
