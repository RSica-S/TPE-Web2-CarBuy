{if {$logueado} == true} 
    {include 'headerAdmin.tpl'}
{else}
    {include 'header.tpl'}
{/if}

</br>
<div>
   <h2 class="title"><center>Autos disponibles de la Marca</center></h2>
</div>
    <div class="container mt-5">
        <div class="marcas">
            {foreach $autosPorMarca item= autos}
                <div class="card">
                    <div class="card-body">
                        <a href="mostrarAuto/{$autos->id_auto}" class="card-title"> {strtoupper($autos->nombre_auto)} </a>
                    </div>
                </div>
            {/foreach}
        </div>
        <a class="btn btn-dark" href="listaMarcas">Volver</a>
    </div>

{include 'footer.tpl'}