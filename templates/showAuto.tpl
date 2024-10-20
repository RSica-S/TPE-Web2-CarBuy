{if {$logueado} == true} 
    {include 'headerAdmin.tpl'}
{else}
    {include 'header.tpl'}
{/if}


<div>
    <h4 class="blockquote">Auto</h4>
</div>

<div class="container mt-5 ">
    <div class="row">
        <div class="col-9 d-flex flex-column align-items-center">
            <h1>{$auto->nombre_auto} - {$auto->nombre_marca}</h1>
            <p class="w-50" id="modeloAuto">{$auto->modelo}</p>
            <p id="parrafoTipo">Tipo: {$auto->tipo}</p>
        </div>
        <div class="col-3 d-flex flex-column align-items-center">
            <h4 class="text-center">{$auto->nombre_marca}</h4>
            <img src="{$auto->img_marca}" class="img-thumbnail">
            <a href="autosPorMarca/{$auto->id_marca}" class="btn btn-dark">ver autos</a>
        </div>
    </div>
   
</div>

{include 'footer.tpl'}