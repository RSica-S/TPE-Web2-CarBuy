{include 'templates/headerAdmin.tpl'}
<div class="container">
    <form action="guardarEditAuto" method="post">
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
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo" value={$auto->tipo}>
            </div>
        </div>
        <div class="form-group">
            <label for="modeloAuto">Modelo del Auto</label>
            <textarea class="form-control" id="modeloAuto" rows="3" name="modeloAuto">{$auto->modelo}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Editar Auto</button>
    </form>
</div>
{include 'templates/footer.tpl'}