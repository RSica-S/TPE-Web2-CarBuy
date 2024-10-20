{include 'templates/headerAdmin.tpl'}
    <div class="container mt-5">
    <div class="marcas"> 
        <form action="guardarEditMarca" method="POST" class="my-4">
            <h4>Modifique los datos de la marca</h4>
            <div class="form-group">
                <label>Nombre de la marca</label>
                <input name="nombre" type="text" value={$marca->nombre_marca} class="form-control">
                <input name="id" type="text" value={$marca->id_marca} class="form-control" hidden>
            </div>
            <button type="submit" class="btn btn-dark">Guardar</button>
            <a class="btn btn-dark" href="listaMarcas"><b>Volver</b></a>
        </form>
    </div>
    </div>

{include 'templates/footer.tpl'}