document.addEventListener("DOMContentLoaded", () => {

    const ID = document.querySelector("#id").innerText.substring(4, 11);

    //document.querySelector("#publicar").addEventListener("click", addComentario);
    
    
    let app = new Vue({
        el: "#lista-comentarios-vue",
        data: {
            empty: false,
            loading: false,
            comentarios: []
        }
    });
    
    let formulario = new Vue({
        el: ".form-comentario",
        data: {
            loading: false
        }
    });
    
    /*
    function addComentario() {
        formulario.loading = true;
        
        console.log(data);
    }
    */
   
   
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
    
    /*
    function getComentariosPorProducto(){
        app.loading = true;
        fetch()
    }
    */
   
   getComentarios();
   document.querySelector("#reload").addEventListener("click", getComentarios());
   
});

