
{if {$logueado} == true} 
    {include 'headerAdmin.tpl'}
{else}
    {include 'header.tpl'}
{/if}
    
<br>
<div>
   <h2 class="title"><center>Marcas Disponibles<center></h2>
</div>

<div class="container mt-5">
    <div class="marcas">
        {if {$logueado} == true}
        <div class="mb-3">
            <a class="btn btn-dark" href="agregarMarca"><b>Agregar Marca</b></a>
        </div>
        {/if}
        {foreach $listaMarcas item= marcas}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {strtoupper($marcas->nombre_marca)} </h5>
                    <a href="autosPorMarca/{$marcas->id_marca}" class="btn btn-dark"><b>Ver Autos</b></a>  
                
                    {if {$logueado} == true}
                        <a class="btn btn-dark" href="editarMarca/{$marcas->id_marca}"><b>Modificar</b></a>
                        <a class="btn btn-dark" href="eliminarMarca/{$marcas->id_marca}"><b>Eliminar</b></a>
                    {/if}
                </div>
                
            </div>
        {/foreach}
    </div>
</div>
 
{include 'footer.tpl'}