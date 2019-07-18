<?php
/* Smarty version 3.1.33-p1, created on 2019-07-08 17:20:19
  from '/home/azur/webapps/app-whmcs/templates/AKD/announcements.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d235f3369d870_05564149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06eb1ee464e300adbdbb1c9856aef4439daa58a8' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/AKD/announcements.tpl',
      1 => 1562091557,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d235f3369d870_05564149 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
if ($_smarty_tpl->tpl_vars['announcementsFbRecommend']->value) {?>
    <?php echo '<script'; ?>
>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/<?php echo $_smarty_tpl->tpl_vars['LANG']->value['locale'];?>
/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    <?php echo '</script'; ?>
>
<?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['announcements']->value, 'announcement');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['announcement']->value) {
?>

    <div class="anounment_seperator">
    <div class="announcement-single anoun_arti">

        <a href="<?php echo routePath('announcement-view',$_smarty_tpl->tpl_vars['announcement']->value['id'],$_smarty_tpl->tpl_vars['announcement']->value['urlfriendlytitle']);?>
" class="title">
            <?php echo $_smarty_tpl->tpl_vars['announcement']->value['title'];?>

        </a>
        <div class="article-items">
            <i class="fa fa-calendar"></i> <?php echo date("jS M Y",$_smarty_tpl->tpl_vars['announcement']->value['timestamp']);?>

        </div>

        <?php if (strlen(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['announcement']->value['text'])) < 350) {?>
            <p><?php echo $_smarty_tpl->tpl_vars['announcement']->value['text'];?>
</p>
        <?php } else { ?>
            <p><?php echo $_smarty_tpl->tpl_vars['announcement']->value['summary'];?>
 </p>
             <a href="<?php echo routePath('announcement-view',$_smarty_tpl->tpl_vars['announcement']->value['id'],$_smarty_tpl->tpl_vars['announcement']->value['urlfriendlytitle']);?>
" class="label label-warning"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['readmore'];?>
</a>
        <?php }?>
</div>
        


        <?php if ($_smarty_tpl->tpl_vars['announcementsFbRecommend']->value) {?>
            <div class="fb-like hidden-sm hidden-xs" data-layout="standard" data-href="<?php echo fqdnRoutePath('announcement-view',$_smarty_tpl->tpl_vars['announcement']->value['id'],$_smarty_tpl->tpl_vars['announcement']->value['urlfriendlytitle']);?>
" data-send="true" data-width="450" data-show-faces="true" data-action="recommend"></div>
            <div class="fb-like hidden-lg hidden-md" data-layout="button_count" data-href="<?php echo fqdnRoutePath('announcement-view',$_smarty_tpl->tpl_vars['announcement']->value['id'],$_smarty_tpl->tpl_vars['announcement']->value['urlfriendlytitle']);?>
" data-send="true" data-width="450" data-show-faces="true" data-action="recommend"></div>
        <?php }?>

    </div>

<?php
}
} else {
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['template']->value)."/includes/alert.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('type'=>"info",'msg'=>((string)$_smarty_tpl->tpl_vars['LANG']->value['noannouncements']),'textcenter'=>true), 0, true);
?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php if ($_smarty_tpl->tpl_vars['prevpage']->value || $_smarty_tpl->tpl_vars['nextpage']->value) {?>

    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
        <form class="form-inline" role="form">
            <div class="form-group">
                <div class="input-group">
                    <?php if ($_smarty_tpl->tpl_vars['prevpage']->value) {?>
                        <span class="input-group-btn">
                            <a href="<?php echo routePath('announcement-index-paged',$_smarty_tpl->tpl_vars['prevpage']->value,$_smarty_tpl->tpl_vars['view']->value);?>
" class="btn btn-default">&laquo; <?php echo $_smarty_tpl->tpl_vars['LANG']->value['previouspage'];?>
</a>
                        </span>
                    <?php }?>
                    <input class="form-control" style="text-align: center;" value="<?php echo $_smarty_tpl->tpl_vars['LANG']->value['page'];?>
 <?php echo $_smarty_tpl->tpl_vars['pagenumber']->value;?>
" disabled="disabled">
                    <?php if ($_smarty_tpl->tpl_vars['nextpage']->value) {?>
                        <span class="input-group-btn">
                            <a href="<?php echo routePath('announcement-index-paged',$_smarty_tpl->tpl_vars['nextpage']->value,$_smarty_tpl->tpl_vars['view']->value);?>
" class="btn btn-default"><?php echo $_smarty_tpl->tpl_vars['LANG']->value['nextpage'];?>
 &raquo;</a>
                        </span>
                    <?php }?>
                </div>
            </div>
        </form>
    </div>
<?php }
}
}
