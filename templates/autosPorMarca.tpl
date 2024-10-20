{if {$logueado} == true} 
    {include 'headerAdmin.tpl'}
{else}
    {include 'header.tpl'}
{/if}

<div>
   <h4 class="blockquote">Autos</h4>
</div>
    <div class="container mt-5">
        <div class="marcas">
            {foreach $autosPorMarca item= autos}
                <div class="card">
                    <div class="card-body">
                        <p class="card-title"> {strtoupper($autos->nombre_auto)} </p>
                    </div>
                </div>
            {/foreach}
        </div>
        <a class="btn btn-dark" href="listaMarcas">volver</a>
    </div>

{include 'footer.tpl'}