{if {$logueado} == true} 
    {include 'headerAdmin.tpl'}
{else}
    {include 'header.tpl'}
{/if}

<div>
   <h4 class="blockquote">Autos</h4>
</div>

<div class="container mt-5">
    {if {$logueado} == true}
        <div class="mb-3">
            <a class="btn btn-dark" href="agregarAuto"><b>Agregar Auto</b></a>
        </div>
    {/if}
    <div class="autos">
        {foreach $listaAutos item= auto}
            <div class="card">
                <div class="card-body">
                    <a href="mostrarAuto/{strtoupper($auto->id_auto)}" class="card-title"> {strtoupper($auto->nombre_auto)}</a>
                    {if {$logueado} == true}
                        <div class="mt-3">
                            <a class="btn btn-dark" href="editarAuto/{$auto->id_auto}"><b>Modificar</b></a>
                            <a class="btn btn-dark" href="eliminarAuto/{$auto->id_auto}"><b>Eliminar</b></a>
                        </div>
                    {/if}
                </div>
            </div>
           
        {/foreach}
    </div>
</div>
 
{include 'footer.tpl'}