<div class="kb_hw">

<h2>{$LANG.knowledgebasecategories}</h2>

{if $kbcats}
    <div class="row">
        {foreach from=$kbcats name=kbcats item=kbcat}
            <div class="col-sm-4 kw_catg padding-left">
                <ul>
                <li>
                <a href="{routePath('knowledgebase-category-view', {$kbcat.id}, {$kbcat.urlfriendlyname})}">
                    <i class="fa fa-folder-open-o"></i>
                    {$kbcat.name} ({$kbcat.numarticles})
                </a>
                 </li>
                  </ul>
                <p>{$kbcat.description}</p>
          
           
            </div>
            {if $smarty.foreach.kbcats.iteration mod 3 == 0}
                </div><div class="row">
            {/if}
        {/foreach}
    </div>
{else}
    {include file="$template/includes/alert.tpl" type="info" msg=$LANG.knowledgebasenoarticles textcenter=true}
{/if}

{if $kbmostviews}

    <h2>{$LANG.knowledgebasepopular}</h2>

    <div class="kbarticles kw_arcticles">
        {foreach from=$kbmostviews item=kbarticle}
            <a href="{routePath('knowledgebase-article-view', {$kbarticle.id}, {$kbarticle.urlfriendlytitle})}">
                <span class="glyphicon glyphicon-file"></span>&nbsp;{$kbarticle.title}
            </a>
            <p>{$kbarticle.article|truncate:100:"..."}</p>
        {/foreach}
    </div>

{/if}


</div>