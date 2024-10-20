{include 'templates/headerAdmin.tpl'}
<div class="container">
    <form action="guardarAuto" method="post">

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
                <label for="tipo">Tipo</label>
                <input type="text" class="form-control" id="tipo" name="tipo">
            </div>
        </div>
        <div class="form-group">
            <label for="modeloAuto">Modelo del Auto</label>
            <textarea class="form-control" id="modeloAuto" rows="3" name="modeloAuto"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Agregar Auto</button>
    </form>
</div>
{include 'templates/footer.tpl'}