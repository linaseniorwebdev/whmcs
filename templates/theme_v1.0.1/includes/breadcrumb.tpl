

<div class ="container">
  <div class ="row">
    <div class ="baner_below_icons col-xs-12 no_padding">
      <ul>
      {foreach $breadcrumb as $item}       
        <li{if $item@last} class="blue_text"{/if}>{if !$item@last}<a href="{$item.link}">{/if}{if $item.label=='Portal Home'}<i class="fa fa-home" aria-hidden="true"></i> HOME{else}{$item.label}{/if}{if !$item@last}</a>{/if} </li>{if !$item@last} <li> /</li>{/if}        
  {/foreach}
      </ul>
    </div>
  </div>
</div>
