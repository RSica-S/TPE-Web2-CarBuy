{include 'templates/headerAdmin.tpl'}
<div class="container">
    </br>
    <form action="guardarEditAuto" method="post">
        <h4>Modifique los datos del auto</h4>
        <input class="d-none" name="id_auto" value={$auto->id_auto}>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombreAuto">Nombre del Auto</label>
                <input type="text" class="form-control" id="nombreAuto" name="nombreAuto" value={$auto->nombre_auto}>
            </div>
            <div class="form-group col-md-4">
                <label for="nombreMarca">Marca</label>
                <select id="nombreMarca" class="form-control" name="idMarca">
                {foreach $marcas item= marca}
                    {if $auto->id_marca_fk == $marca->id_marca}
                        
                        <option selected value={$marca->id_marca}>{$marca->nombre_marca}</option>
                    {else}
                        <option value={$marca->id_marca}>{$marca->nombre_marca}</option>
                    {/if}
                {/foreach}
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" name="precio" value={$auto->precio}>
            </div>
        </div>
        <div class="form-group">
            <label for="descripcionAuto">Descripcion del Auto</label>
            <textarea class="form-control" id="descripcionAuto" rows="3" name="descripcionAuto">{$auto->descripcion}</textarea>
        </div>

        
        <button type="submit" class="btn btn-dark">Guardar</button>
        <a class="btn btn-dark" href="listaAutos"><b>Volver</b></a>
    </form>
</div>
{include 'templates/footer.tpl'}