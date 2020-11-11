document.addEventListener("DOMContentLoaded", () => {

    const ID = document.querySelector("#id").innerText.substring(4, 11);
    const userId = document.querySelector("#usuario-id").innerText;
    try {
        if (document.querySelector("#usuario-admin").innerText == 1) {
            let div_boton = document.querySelector("#borrar-c");
            let boton = document.createElement("button");
            boton.classList.add("btn");
            boton.classList.add("btn-danger");
            boton.classList.add("borrar-c");
            boton.innerText = "Borrar";
            //boton.addEventListener("click", removeComentario());
            div_boton.appendChild(boton);
        }
    } catch (error) {/* usuario publico */ }

    const url = "http://localhost/web2/lubricentro/api/comentarios/";

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
        fetch(url + ID)
            .then(response => response.json())
            .then(comentarios => {
                app.comentarios = comentarios; // similar a $this->smarty->assign
                app.loading = false;
            })
            .catch(error => {
                console.log(error);
                app.loading = false;
                app.empty = true;
            });
    }

    function addComentario(e) {
        e.preventDefault();

        console.log(userId);
        let data = {
            "producto_id": ID,
            "usuario_id": userId,
            "texto": document.querySelector("textarea").value,
            "puntaje": document.querySelector("input:checked").value
        };

        fetch(url, {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(res => res.json())
            .catch(error => console.log(error))
            .then(response => {
                console.log('Success:', response);
                getComentarios();
            });
        getComentarios();
    }

    function removeComentario() {

        let id = document.querySelector("#comentario-id").innerText;
        console.log(id);

        fetch(url + id, {
            method: 'DELETE',
        })
            .then(res => res.text())
            .then(res => console.log(res));
        getComentarios();
    }

    getComentarios();
    document.querySelector("#btn-reload").addEventListener("click", getComentarios);
    document.querySelector("#publicar").addEventListener("click", addComentario);

});
