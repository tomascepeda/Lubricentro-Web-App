{literal}

<section id="lista-comentarios-vue">

    <div class="comments-container">
        <h1>Comentarios 
            <button class="btn btn-primary" id="btn-reload"><img v-if="!loading" id="reload" src="../assets/images/reload.png"/>
            <span v-if="loading" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span v-if="loading" class="sr-only">Loading...</span>
        </button></h1>
        <p v-if="comentarios == null">Este producto no cuenta con comentarios.</p>
        <ul v-if="comentarios != null" id="comments-list" class="comments-list">

            <li v-for="comentario in comentarios">
                <div class="comment-main-level">
                    
                    <!-- Avatar -->
                    <div class="comment-avatar shadow-lg"><img
                            src="../assets/images/user.png" alt="user.png"></div>
                    
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box shadow-lg">
                        <div class="comment-head">
                            <p id="comentario-id" class="oculto">{{comentario.id_comentario}}</p>
                            <h6 v-if="comentario.admin == 1" class="comment-name by-author">{{comentario.nombre}}</h6>
                            <h6 v-else class="comment-name">{{comentario.nombre}}</h6>
                            <span>{{comentario.fecha}}</span>
                            <button v-if="admin == true" type="button" class="btn btn-danger borrar-c" v-on:click="removeComentario(comentario.id_comentario)">Borrar</button>
                            <i class="fa fa-reply"></i>
                            <i class="fa fa-heart"></i>
                        </div>
                        <div class="comment-content">
                            {{comentario.texto}}
                        </div>
                    </div>
                </div>
            </li>
            
        </ul>
    </div>

</section>

{/literal}
