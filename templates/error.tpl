{if {$logueado} == true} 
    {include 'headerAdmin.tpl'}
{else}
    {include 'header.tpl'}
{/if}

<br>
<div class='text-center'>
    <h2>Error</h2>
    <h5>{$mensaje}</h5>
</div>

{include 'footer.tpl'}