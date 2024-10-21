{if {$logueado} == true} 
    {include 'headerAdmin.tpl'}
{else}
    {include 'header.tpl'}
{/if}




<div class="container mt-5 ">
    <div class="row">
        <div class="col-3 d-flex flex-column align-items-center">
            <h4 class="text-center">{$auto->nombre_marca}</h4>
            <img src="{$auto->img_marca}" class="img-thumbnail">
            </br>
            <a href="autosPorMarca/{$auto->id_marca}" class="btn btn-dark">ver mas autos</a>
        </div>
        <div class="col-9 d-flex flex-column align-items-center">
            <h1>{$auto->nombre_auto}</h1>
            <p class="w-50" id="descripcionAuto">{$auto->descripcion}</p>
            <p id="parrafoPrecio">Precio: {$auto->precio}</p>
        </div>
    </div>
   
</div>

{include 'footer.tpl'}