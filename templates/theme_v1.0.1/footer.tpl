
                </div><!-- /.main-content -->
                {if !$inShoppingCart && $secondarySidebar->hasChildren()}
                    <div class="col-md-3 pull-md-left sidebar">
                        {include file="$template/includes/sidebar.tpl" sidebar=$secondarySidebar}
                    </div>
                {/if}
            </div>
                            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</section>
{if $templatefile == 'error'}
{else}
<footer class="footercon col-xs-12 no_padding " >
  <div class="footerbox col-xs-12  white_text no_padding">
    <section class="container">
      <div class="row">
        <div class="col-xs-12 no_padding footer_port no_padding">
          <div class="col-xs-3 no_padding-left logo_feature">
            <div class="sitemap col-xs-12 no_padding">
              <div class="footer_logo"> <img src="{$WEB_ROOT}/templates/{$template}/assets/images/footer-logo.png"> </div>
              <p> Copyright © 2010-2017</p>
             
              
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-2">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="regular_font white_text">Our Services</h5>
              <ul>
                <li><a href="{$WEB_ROOT}/shared-hosting.php">Web Hosting</a></li>
                <li><a href="{$WEB_ROOT}/reseller-hosting.php">Reseller Hosting</a></li>
                <li><a href="{$WEB_ROOT}/vps-hosting.php">VPS Hosting</a></li>
                <li><a href="{$WEB_ROOT}/dedicated-hosting.php">Dedicated Server</a></li>
              </ul>
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-2">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="regular_font white_text">Support Resources</h5>
              <ul>
                <li><a href="{$WEB_ROOT}/knowledgebase.php">Knowledgebase</a></li>
                <li><a href="{$WEB_ROOT}/supporttickets.php">Support Tickets</a></li>
                <li><a href="{$WEB_ROOT}/submitticket.php">Submit Ticket</a></li>
                <li><a href="{$WEB_ROOT}/serverstatus.php">Server Status</a></li>
                <li><a href="{$WEB_ROOT}/announcements.php">Announcementst</a></li>

                <li><a href="{$WEB_ROOT}/contact.php">Contact Us</a></li>
              </ul>
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-2">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="regular_font white_text">Legal</h5>
              <ul>
                <li><a href="{$WEB_ROOT}/tos.php">Terms of Service</a></li>
                <li><a href="{$WEB_ROOT}/privacy-policy.php">Privacy Policy</a></li>
                </ul>
              <!--sitemap--> 
            </div>
          </div>
          <div class="col-xs-3 no_padding-right">
            <div class="sitemap col-xs-12 no_padding">
              <h5 class="white_text">Tweets </h5>
              <h6> Designingmedia.com
                @designinmedia</h6>
              <p>It's August 31st and we would like to wish everyone a very Happy Independence Day! </p>
              <span class="yellow_text"> #ProudMalaysian <br>
              #HariKebangsaan #gbnetwork</span> </div>
          </div>
        </div>
        
        <!--row--> 
      </div>
      
      <!--container--> 
    </section>
  </div>
  <div class="copy_rights_bg col-xs-12 no_padding">
    <div class="container">
      <div class="row">
        <div class="credit_cards pull-left">
          <ul>
            <li>We Accept </li>
            <li>
              <figure> <img src="{$WEB_ROOT}/templates/{$template}/assets/images/credit_cards.png"></figure>
            </li>
          </ul>
        </div>
        <div class="socail_media pull-right">
          <ul>
            <li> Get Social With Us</li>
            <li> <a href="https://www.facebook.com/akdesignerdotcom"> <i class="fa fa-facebook" aria-hidden="true"></i> </a> </li>
            <li> <a href="https://twitter.com/akdesigner"> <i class="fa fa-twitter" aria-hidden="true"></i> </a> </li>
            
            <li> <a href="https://plus.google.com/+Akdesigner"> <i class="fa fa-google-plus" aria-hidden="true"></i> </a> </li>
          </ul>
        </div>
        
        <!--row--> 
      </div>
      <!--container--> 
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="trade_marked col-xs-12 text-center">
        <h5>*Prices reflect discount on first term </h5>
        <p class="white_text"> All brand names are trademarks of their respective owners. All prices, plans, and options listed are what has been publicly disclosed as of 08/10/2016</p>
        <span class="yellow_text"> Prices and features are subject to change without notice.</span> 
        
        <!--trade_marked--> 
      </div>
      
      <!--row--> 
    </div>
    <!--container--> 
  </div>
  <!--footerbox-->
  </div>
  <!--footercon--> 
</footer>
{/if}

<div class="modal system-modal fade" id="modalAjax" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content panel panel-primary">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title">Title</h4>
            </div>
            <div class="modal-body panel-body">
                Loading...
            </div>
            <div class="modal-footer panel-footer">
                <div class="pull-left loader">
                    <i class="fa fa-circle-o-notch fa-spin"></i> Loading...
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary modal-submit">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>



<script src="{$WEB_ROOT}/templates/{$template}/assets/js/smoove.js" type="text/javascript"></script> 

{literal}

<script>
$(document).ready(function(e) {
    $('.main-val').click(function() {
        if($(this).find('input[type=radio]').val()=='windows'&&$(this).find('input[type=radio]').prop('checked')==true){
			$('.sub-val').hide();
			$('#plsk').show();	
		}
		else if($(this).find('input[type=radio]').val()=='centos'&&$(this).find('input[type=radio]').prop('checked')==true){
			$('.sub-val').hide();
			$('#no-cp').show();	
			$('#cp').show();
		}
		else{
			$('.sub-val').hide();
		}
		
    });
	
$(window).resize("resize",function(){  
    animation($(this).width());
});
animation($(window).width());
function animation(width){
     if(width>768) {
        $('.block').smoove({offset:'15%'});
     }
}
	$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
	
}); 
</script>



	

 {/literal}  


{$footeroutput}

</body>
</html>
