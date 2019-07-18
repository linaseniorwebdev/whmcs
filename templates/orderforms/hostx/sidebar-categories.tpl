{if $totalNoOffProductGroups gt 5}
  <script type="text/javascript">
      jQuery(document).on('ready', function() {
		jQuery("#categoriesBox").slick({
            dots: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            autoplay: false,
            autoplaySpeed: 2000,
            variableWidth: false,
			responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 5,
                        slidesToScroll: 5,
                    }
                },
               {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 4
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 280,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
          });
    });
  </script>
{/if}
<div class="choose-more-product">
    <div class="top">
        <h3><i class="fa fa-list"></i> {$LANG.choosemoreproduct}</h3>
        <div class="pull-right right-links">
            <a href="cart.php?a=add&domain=register"><i class="fa fa-globe"></i> {$LANG.newdomain}</a>
            <a href="cart.php?a=add&domain=transfer"><i class="fa fa-share-square"></i> {$LANG.transferinadomain}</a>  
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row" id="categoriesBox">  
        {foreach $groupCats as $child}
            <div class="col-sm-2">
              <a href="cart.php?gid={$child->id}">
                <div class="more-product-col">
                    <img src="templates/{$template}/caticons/{$child->icon}" alt="{$child->icon}">
                    <h3>{$child->name}</h3>                                
                </div>
              </a>
            </div>
        {/foreach}
    </div>    
</div>
<div class="clearfix"></div>