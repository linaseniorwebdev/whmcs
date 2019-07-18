{if $templatefile == 'homepage' || $filename eq 'error'}

{else}

<div class ="dedicated_banner col-xs-12 no_padding reseller_banner"> 
    
    <div class="container">
        <div class="row"> 
<div class ="subbanner col-xs-12 no_padding">
 <div class ="banner_text"> 
            <h1 class="white_text">
         {$title}
            </h1>
            
            <p class="black_text">Web Hosting Made <span class="bold_font"> EASY And AFFORDABLE! </span></p>
            </div>
        </div>
        {if $showbreadcrumb}{include file="$template/includes/breadcrumb.tpl"}{/if}
        
              </div>


    </div>
    
    
    </div>

{/if}