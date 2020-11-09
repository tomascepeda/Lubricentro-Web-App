{literal}

<form class="form-comentario shadow-lg p-3 mb-5 bg-white rounded">
  <h6>Agregar Comentario</h6>
  <div class="form-group">
    <label class="titulo-form" for="exampleFormControlTextarea1">Opina sobre este producto</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <div class="puntaje">
    <small>Calificacion del producto: </small>
    <fieldset class="rating">
        <input type="radio" id="star5" name="rating" value="5" required/><label class = "full" for="star5" title="Muy Bueno"></label>
        <input type="radio" id="star4" name="rating" value="4" required/><label class = "full" for="star4" title="Bueno"></label>
        <input type="radio" id="star3" name="rating" value="3" required checked/><label class = "full" for="star3" title="Normal"></label>
        <input type="radio" id="star2" name="rating" value="2" required/><label class = "full" for="star2" title="Malo"></label>
        <input type="radio" id="star1" name="rating" value="1" required/><label class = "full" for="star1" title="Muy Malo"></label>
    </fieldset>
  </div>
  <button type="submit" class="btn btn-primary" id="publicar">Publicar</button>
</form>

{/literal}