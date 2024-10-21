{include 'templates/headerAdmin.tpl'}
<div class="container">
    <form action="guardarAuto" method="post">
        </br>
        <h4>Agregue un auto nuevo</h4>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombreAuto">Nombre del auto</label>
                <input type="text" class="form-control" id="nombreAuto" name="nombreAuto">
            </div>
            <div class="form-group col-md-4">
                <label for="nombreMarca">Marca</label>
                <select id="nombreMarca" class="form-control" name="idMarca">
                {foreach $marcas item= marca}
                    <option value={$marca->id_marca}>{$marca->nombre_marca}</option>
                {/foreach}
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio">
            </div>
        </div>
        <div class="form-group">
            <label for="descripcionAuto">Descripcion del Auto</label>
            <textarea class="form-control" id="descripcionAuto" rows="3" name="descripcionAuto"></textarea>
        </div>

        <button type="submit" class="btn btn-dark">Agregar Auto</button>
    </form>
</div>
{include 'templates/footer.tpl'}