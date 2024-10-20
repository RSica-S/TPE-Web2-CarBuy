{include 'templates/headerAdmin.tpl'}
    <div class="container mt-5">
        <div class="marcas"> 
            <form action="guardarMarca" method="post" class="my-4">
                <h4>Agregue una marca nueva</h4>
                <div class="form-group">
                    <label>Ingrese el nombre</label>
                    <input name="nombre" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-dark">Agregar</button>
                <a class="btn btn-dark" href="listaMarcas">volver</a>
            </form>
        </div>
    </div>
    
{include 'templates/footer.tpl'}