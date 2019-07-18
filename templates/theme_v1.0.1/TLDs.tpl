
<div class="features">


<div class="decrription-area col-xs-12 no_padding text-center" >
<h3> Top Level Domain  </h3> 

</div>

</div>
<div class="seprator text-center col-xs-12 no_padding"><img src="{$WEB_ROOT}/templates/{$template}/assets/images/decorted-image.png"  class="img-responsive"></div>

 <div class="tab-content tabs_decrption  col-xs-12 no_padding tld_table">
 <div id="home" class="tab-pane fade in active">
 
 
 
 

 
  <table class="table">
    <thead>
      <tr>
        <th>ExtensionName</th>
        <th>domainregister</th>
        <th>domaintransfer</th>
         <th>domainrenew</th>
         <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
    {foreach from=$Rows key=k item=v}
     <tr>
  <td> <span class="bold_font black_text">{$k}</span> </td>
  <td class="green_text bold_font"> $  <span class="bold_font black_text">{$v['domainregister']} </span></td>
  <td class="green_text bold_font"> $  <span class="bold_font black_text">{$v['domaintransfer']}</span></td>
  <td class="green_text bold_font"> $  <span class="bold_font black_text">{$v['domainrenew']} </span></td> 
  <td>  <a href="cart.php"><div class="panel_button"> <button type="button" class="btn btn-default">ORDER NOW</button>  </div></td></tr></a>
  {/foreach}
    </tbody>
  </table>
  
  </div>
  </div>
  <!--container--> 
</div>
