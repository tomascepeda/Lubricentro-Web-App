document.addEventListener("DOMContentLoaded", () => {

    const ID = document.querySelector("#id").innerText.substring(4, 11);
    const userId = document.querySelector("#usuario-id").innerText;

    function getBaseUrl() {
        let base_url = "" + window.location.origin + "/";
        const path_collection = window.location.pathname.split("/");
        let i = 1;
        while (path_collection[i] != "showmore") {
            base_url += path_collection[i] + "/";
            i++;
        }
        return base_url;
    }

    const url = getBaseUrl() + "api/comentarios/";

    let app = new Vue({
        el: "#lista-comentarios-vue",
        data: {
            admin: false,
            loading: false,
            comentarios: []
        },
        methods: {
            removeComentario(id) {
                fetch(url + id, {
                    method: 'DELETE',
                })
                    .then(res => res.text())
                    .then(res => {
                        getComentarios();
                        console.log(res)
                    });
            }
        }
    });

    function getComentarios() {
        app.loading = true;
        fetch(url + ID)
            .then(response => response.json())
            .then(comentarios => {
                if (comentarios == "") {
                    app.comentarios = null;
                } else {
                    comentarios.forEach(i => {
                        i.fecha = Math.round((new Date().getTime() - new Date(i.fecha).getTime()) / 1000);
                        let minutos = Math.floor(i.fecha / 60);
                        let horas = Math.floor(minutos / 60);
                        let dias = Math.floor(horas / 24);
                        let meses = Math.floor(dias / 31);
                        let anios = Math.floor(meses / 12);
                        if (i.fecha == 1 || i.fecha == 0) {
                            i.fecha = "Hace un segundo";
                        }
                        else if (minutos < 1) {
                            i.fecha = "Hace " + i.fecha + " segundos";
                        }
                        else if (minutos == 1) {
                            i.fecha = "Hace un minuto";
                        }
                        else if (minutos > 1 && minutos < 60) {
                            i.fecha = "Hace " + minutos + " minutos";
                        }
                        else if (horas == 1) {
                            i.fecha = "Hace una hora";
                        }
                        else if (horas > 1 && horas < 24) {
                            i.fecha = "Hace " + horas + " horas";
                        }
                        else if (dias == 1) {
                            i.fecha = "Hace un dia";
                        }
                        else if (dias > 1 && dias < 31) {
                            i.fecha = "Hace " + dias + " dias";
                        } else if (meses == 1) {
                            i.fecha = "Hace un mes";
                        }
                        else if (meses > 1 && meses < 12) {
                            i.fecha = "Hace " + meses + " meses";
                        }
                        else if (anios == 1) {
                            i.fecha = "Hace un año";
                        }
                        else if (anios > 1) {
                            i.fecha = "Hace " + anios + " años";
                        }
                    });
                    app.comentarios = comentarios;
                }
                app.loading = false;
                getPromedio(comentarios);
            })
            .catch(error => {
                console.log(error);
                app.loading = false;
            });
    }

    function addComentario(e) {
        e.preventDefault();
        if (document.querySelector("textarea").value != "") {
            if (userId != "null") { //es una string se llama null solo por comodidad
                let data = {
                    "producto_id": ID,
                    "usuario_id": userId,
                    "texto": document.querySelector("textarea").value,
                    "puntaje": document.querySelector("input:checked").value
                };

                fetch(url, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                })
                    .then(r => getComentarios())
                    .catch(error => console.log("error"));
            }
        }
        //reseteo el form     
        document.querySelector("textarea").value = "";
    }

    function checkIsAdmin() {
        if (document.querySelector("#usuario-admin").innerText == 1)
            app.admin = true;
    }

    function getPromedio(collection) {
        let promedio = 0;
        let suma = 0;
        let cant = 0;
        collection.forEach(i => {
            suma += parseInt(i.puntaje, 10);
            cant++;
        });
        promedio = suma / cant;
        document.querySelector("#promedio").innerHTML = "<span class='bolder'>Calificacion general: </span>" + Math.round(promedio);
    }

    getComentarios();
    checkIsAdmin();
    document.querySelector("#btn-reload").addEventListener("click", getComentarios);
    try {
        document.querySelector("#publicar").addEventListener("click", addComentario);
    } catch {/*el usuario no tiene permiso para publicar comentarios*/ }

});
