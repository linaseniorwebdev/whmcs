<?php
/* Smarty version 3.1.33-p1, created on 2019-07-08 22:09:47
  from '/home/azur/webapps/app-whmcs/templates/AKD/store/spamexperts/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33-p1',
  'unifunc' => 'content_5d23a30b6dad58_92351511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b56d3bbe0d8a6972c223957de2eee1d72d7acdbe' => 
    array (
      0 => '/home/azur/webapps/app-whmcs/templates/AKD/store/spamexperts/index.tpl',
      1 => 1562091562,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d23a30b6dad58_92351511 (Smarty_Internal_Template $_smarty_tpl) {
$template = $_smarty_tpl;
?><link href="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/six/store/css/style.css" rel="stylesheet">

<div class="landing-page mail-services">

    <div class="hero">
        <div class="container">
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.emailServices.headline"),$_smarty_tpl ) );?>
</h2>
            <h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.emailServices.tagline"),$_smarty_tpl ) );?>
</h3>
        </div>
    </div>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-landing-page" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="collapse navbar-collapse" id="nav-landing-page">
          <ul class="nav navbar-nav">
            <li><a href="#" onclick="smoothScroll('#overview');return false">Overview</a></li>
            <li><a href="#" onclick="smoothScroll('#howitworks');return false">How It Works</a></li>
            <li><a href="#" onclick="smoothScroll('#pricing');return false">Pricing</a></li>
            <li><a href="#" onclick="smoothScroll('#faq');return false">FAQ</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="product-options" id="overview">
        <div class="container">
            <?php if ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value > 0) {?>
                <div class="row">
                    <?php if ($_smarty_tpl->tpl_vars['products']->value['incoming']) {?>
                        <div class="<?php if ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value == 1) {?>col-sm-6 col-sm-offset-3<?php } elseif ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value == 2) {?>col-sm-6<?php } else { ?>col-sm-6 col-md-4<?php }?>">
                            <div class="item">
                                <h4>Incoming Email Filtering</h4>
                                <div class="icon">
                                    <i class="fa fa-envelope-open-o"></i>
                                </div>
                                <span>Protect your network</span>
                                <p>Eliminate Spam & Viruses from email before they ever reach your network</p>
                                <?php if ($_smarty_tpl->tpl_vars['products']->value['incoming']->pricing()->best()) {?>
                                    <div class="price">From <?php echo $_smarty_tpl->tpl_vars['products']->value['incoming']->pricing()->best()->toFullString();?>
/domain</div>
                                <?php }?>
                                <a href="#" class="btn btn-learn-more" data-target="incoming">
                                    Learn more
                                </a>
                                <a href="#" class="btn btn-buy" data-target="incoming">
                                    Buy
                                </a>
                            </div>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['products']->value['outgoing']) {?>
                        <div class="<?php if ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value == 1) {?>col-sm-6 col-sm-offset-3<?php } elseif ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value == 2) {?>col-sm-6<?php } else { ?>col-sm-6 col-md-4<?php }?>">
                            <div class="item">
                                <h4>Outgoing Email Filtering</h4>
                                <div class="icon">
                                    <i class="fa fa-envelope-open"></i>
                                </div>
                                <span>Safeguard your reputation</span>
                                <p>Prevent Spam & Viruses from ever unknowingly leaving your network</p>
                                <?php if ($_smarty_tpl->tpl_vars['products']->value['outgoing']->pricing()->best()) {?>
                                    <div class="price">From <?php echo $_smarty_tpl->tpl_vars['products']->value['outgoing']->pricing()->best()->toFullString();?>
/domain</div>
                                <?php }?>
                                <a href="#" class="btn btn-learn-more" data-target="outgoing">
                                    Learn more
                                </a>
                                <a href="#" class="btn btn-buy" data-target="outgoing">
                                    Buy
                                </a>
                            </div>
                        </div>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['products']->value['archiving']) {?>
                        <div class="<?php if ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value == 1) {?>col-sm-6 col-sm-offset-3<?php } elseif ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value == 2) {?>col-sm-6<?php } else { ?>col-sm-6 col-md-4<?php }?>">
                            <div class="item">
                                <h4>Email Archiving</h4>
                                <div class="icon">
                                    <i class="fa fa-cube"></i>
                                </div>
                                <span>Backup and Compliance</span>
                                <p>Never lose an email again and ensure email data integrity for legal compliance</p>
                                <?php if ($_smarty_tpl->tpl_vars['products']->value['archiving']->pricing()->best()) {?>
                                    <div class="price">From <?php echo $_smarty_tpl->tpl_vars['products']->value['archiving']->pricing()->best()->toFullString();?>
/domain</div>
                                <?php }?>
                                <a href="#" class="btn btn-learn-more" data-target="archiving">
                                    Learn more
                                </a>
                                <a href="#" class="btn btn-buy" data-target="archiving">
                                    Buy
                                </a>
                            </div>
                        </div>
                    <?php }?>
                </div>
            <?php } elseif ($_smarty_tpl->tpl_vars['inPreview']->value) {?>
                <div class="text-center lead preview-text">Email service products you activate will be displayed here</div>
            <?php }?>
            <div class="powered-by">
                Powered by <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/spamexperts/logo_white.png">
            </div>
        </div>
    </div>

    <div class="content-block text20 text-center">
        <div class="container">
            <h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['lang'][0], array( array('key'=>"store.emailServices.blockSpamHeadline"),$_smarty_tpl ) );?>
</h2>
        </div>
    </div>

    <div class="content-block tabs light-grey-bg" id="howitworks">
        <div class="container">
                <ul class="nav nav-tabs" role="tablist">
                    <?php if ($_smarty_tpl->tpl_vars['products']->value['incoming'] || $_smarty_tpl->tpl_vars['inPreview']->value) {?>
                        <li role="presentation" class="active">
                            <a href="#incoming" aria-controls="incoming" role="tab" data-toggle="tab">Incoming Email Filtering</a>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['products']->value['outgoing'] || $_smarty_tpl->tpl_vars['inPreview']->value) {?>
                        <li role="presentation">
                            <a href="#outgoing" aria-controls="outgoing" role="tab" data-toggle="tab">Outgoing Email Filtering</a>
                        </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['products']->value['archiving'] || $_smarty_tpl->tpl_vars['inPreview']->value) {?>
                        <li role="presentation">
                            <a href="#archiving" aria-controls="archiving" role="tab" data-toggle="tab">Email Archiving</a>
                        </li>
                    <?php }?>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="incoming">

                        <div class="benefits">
                            <h3>Incoming email filtering gives you all these benefits...</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Full Inbox protection at competitive prices
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Extremely accurate filtering
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Easy configuration
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Increase inbound email continuity & redundancy
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Various reporting options
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Friendly interface to keep you in full control over your email
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Increase employee productivity
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Compatible with any mail server
                                </div>
                            </div>
                        </div>

                        <h3>Why Choose SpamExperts Incoming Filter?</h3>
                        <p>Incoming Email Filtering filters all inbound email and eliminates spam & viruses before these threats reach your network at a nearly 100% accuracy rate. The extensive control-panel allows you to remain in full control. Moreover, in case your email server is down, your email will be queued. Queued email can be accessed, read, and replied to via the web-interface adding to your inbound email continuity!</p>

                        <h3>Why do you need a professional Incoming Filter?</h3>

                        <p>Stop running the risk of IT network threats. If your Inbox is crowded with unsolicited bulk mail every day, then that's a sign you need a professional Incoming Filter solution. Get full protection for your Inbox and say goodbye to spam, virus and malware threats!</p>

                        <h3>How it works</h3>

                        <p>Once your domain is (automatically) deployed to the Incoming Filter, and filtering is activated, email will pass through the SpamExperts filtering cloud. Incoming emails are securely analyzed and scanned in real time. No training or configurations are required and everything works out of the box. Any message detected as spam is moved to the quarantine, while non-spam is sent to your email server. The quarantine can be monitored in the user-friendly SpamPanel, through email-reports, or even directly in your email client! No more wasted time in dealing with spam, simply focus your energy on business tasks, while you remain in full control.</p>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="outgoing">

                        <div class="benefits">
                            <h3>Outgoing email filtering gives you all these benefits...</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    No more blacklisting
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Protect the reputation of your brand and IT-systems
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Avoid de-listing related costs
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Increase outbound email continuity and delivery
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Enhance employee productivity
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Improve abuse manageability
                                </div>
                            </div>
                        </div>

                        <h3>What is outgoing filtering?</h3>

                        <p>Outgoing Email Filtering is vital to safeguard your IT infrastructure reputation and ensure all your outgoing email arrives safely where it should. This professional solution will block spam & viruses from leaving your network and prevent your IP(s) from being blacklisted ever again. Moreover, the SpamExperts Outgoing Filter gives you the reporting and tools to detect compromised accounts and lock-down spamming users.</p>

                        <h3>Why you need it?</h3>

                        <p>Has your network ever sent out spam email without your knowledge? Due to network weaknesses almost any device can be compromised to transmit outbound SMTP, allowing spam or malware to be sent out from your network without you even knowing it! Therefore, it's critical you invest in a professional Outgoing Filter solution. Maintain your company’s good reputation, stop spam from leaving your network and prevent being blacklisted so that your email always arrives where it is meant to go.</p>

                    </div>
                    <div role="tabpanel" class="tab-pane" id="archiving">

                        <div class="benefits">
                            <h3>Email archiving gives you all these benefits...</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Never lose an email again!
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Achieve legal compliance
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Improve IT system performance
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    User friendly data-protection management
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Added email continuity, journaling support, and easy re-delivery
                                </div>
                                <div class="col-md-6">
                                    <i class="fa fa-check"></i>
                                    Compressed, encrypted and secure archive
                                </div>
                            </div>
                        </div>

                        <h3>Email Archiving</h3>

                        <p>Email Archiving preserves and protects all inbound and outbound email messages for later access. It is a great way to recover lost or accidentally deleted emails, accelerate audit response, secure intellectual property emails and attachments, as well as for “eDiscovery” purposes in case of litigation.</p>

                        <h3>Why you need it</h3>

                        <p>Are you desperately looking for an important email from last year, but can’t seem to find it and you’re risking a fine or losing an important business deal as the result of this? Prevent this with a professional Email Archiving solution. Email Archiving is a critical tool to preserve a secure backup of all email and be legally compliant.</p>
                        <p>At the same time, as email exchanges have judicial power and are legally binding, email compliance has become an extremely important concern for organizations. Therefore it is mandatory in certain industries to preserve a secure backup of all email messages and be legally compliant.</p>

                    </div>
                </div>
        </div>
    </div>

    <div class="content-block get-started" id="pricing">
        <div class="container">
            <form method="post" action="<?php echo routePath('store-order');?>
">
                <input type="hidden" name="productkey" value="<?php echo $_smarty_tpl->tpl_vars['products']->value['incoming']->productKey;?>
" id="productKey">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Signup and Get Started</h2>
                        <h4>Choose Product</h4>
                        <?php if ($_smarty_tpl->tpl_vars['numberOfFeaturedProducts']->value > 0) {?>
                            <div class="btn-group choose-product" role="group">
                                <?php if ($_smarty_tpl->tpl_vars['products']->value['incoming']) {?>
                                    <button type="button" class="btn btn-default active" data-product="incoming">Incoming Filtering</button>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['products']->value['outgoing']) {?>
                                    <button type="button" class="btn btn-default" data-product="outgoing">Outgoing Filtering</button>
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['products']->value['archiving']) {?>
                                    <button type="button" class="btn btn-default" data-product="archiving">Email Archiving</button>
                                <?php }?>
                            </div>
                        <?php } elseif ($_smarty_tpl->tpl_vars['inPreview']->value) {?>
                            Email service products you activate will display here
                        <?php }?>
                        <br><br>
                        <h4>Additional Options</h4>
                        <div class="additional-options">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productOptions']->value, 'options', false, 'productKey');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['productKey']->value => $_smarty_tpl->tpl_vars['options']->value) {
?>
                                <div class="option options-<?php echo $_smarty_tpl->tpl_vars['productKey']->value;?>
">
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['options']->value, 'option');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
?>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="options" value="<?php echo $_smarty_tpl->tpl_vars['option']->value['product'];?>
">
                                            <?php echo $_smarty_tpl->tpl_vars['option']->value['description'];?>
 for <span>just <?php echo $_smarty_tpl->tpl_vars['option']->value['pricing']->toFullString();?>
 more</span>
                                        </label><br>
                                    <?php
}
} else {
?>
                                        None available
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right">
                        <?php if ($_smarty_tpl->tpl_vars['products']->value['incoming'] && $_smarty_tpl->tpl_vars['products']->value['incoming']->pricing()->best()) {?>
                            <span class="price price-incoming"><?php echo $_smarty_tpl->tpl_vars['products']->value['incoming']->pricing()->best()->toFullString();?>
</span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['products']->value['outgoing'] && $_smarty_tpl->tpl_vars['products']->value['outgoing']->pricing()->best()) {?>
                            <span class="price price-outgoing"><?php echo $_smarty_tpl->tpl_vars['products']->value['outgoing']->pricing()->best()->toFullString();?>
</span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['products']->value['archiving'] && $_smarty_tpl->tpl_vars['products']->value['archiving']->pricing()->best()) {?>
                            <span class="price price-archiving"><?php echo $_smarty_tpl->tpl_vars['products']->value['archiving']->pricing()->best()->toFullString();?>
</span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['products']->value['incomingoutgoing'] && $_smarty_tpl->tpl_vars['products']->value['incomingoutgoing']->pricing()->best()) {?>
                            <span class="price price-incomingoutgoing"><?php echo $_smarty_tpl->tpl_vars['products']->value['incomingoutgoing']->pricing()->best()->toFullString();?>
</span>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['products']->value['incomingoutgoingarchiving'] && $_smarty_tpl->tpl_vars['products']->value['incomingoutgoingarchiving']->pricing()->best()) {?>
                            <span class="price price-incomingoutgoingarchiving"><?php echo $_smarty_tpl->tpl_vars['products']->value['incomingoutgoingarchiving']->pricing()->best()->toFullString();?>
</span>
                        <?php }?>
                        <br><br><br><br><br>
                        <button type="submit" class="btn btn-order-now btn-lg">
                            Order Now
                        </button>
                    </div>
                </div>
            </form>

            <?php if (!$_smarty_tpl->tpl_vars['loggedin']->value && $_smarty_tpl->tpl_vars['currencies']->value) {?>
                <br>
                <form method="post" action="">
                    <select name="currency" class="form-control ssl-currency-selector" onchange="submit()" style="width:250px;">
                        <option>Change Currency (<?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['activeCurrency']->value['code'];?>
)</option>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['currencies']->value, 'currency');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['currency']->value) {
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['currency']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['currency']->value['prefix'];?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value['code'];?>
</option>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </form>
            <?php }?>

        </div>
    </div>

    <div class="content-block faq" id="faq">
        <div class="container">
            <h3 class="text-center">Frequently Asked Questions</h3>
            <div class="row">
                <div class="col-md-4">
                <h4>How does it work?</h4>
                <p>Email is routed through SpamExperts intelligent self-learning servers that will detect and block spam before it ever reaches you.</p>
                <hr>
                <h4>How accurate is the filtering?</h4>
                <p>Thanks to processing millions of emails every day, our email filters have an industry leading rate with close to 100% accuracy.</p>
                <div class="hidden-md hidden-lg"><hr></div>
                </div>
                <div class="col-md-4">
                <h4>Can I recover messages that get blocked?</h4>
                <p>Yes, a comprehensive control panel with log-search, quarantine, and many other tools allows you to check the status of any email which passed through the system.</p>
                <hr>
                <h4>How long does it take to setup?</h4>
                <p>Setup is fast, automated and it will be up and running protecting your email in minutes.</p>
                <div class="hidden-md hidden-lg"><hr></div>
                </div>
                <div class="col-md-4">
                <h4>What is Email Archiving?</h4>
                <p>Email is so important nowadays, with archiving email is securely stored, giving you extra confidence and peace of mind.</p>
                <hr>
                <h4>How much email can I store?</h4>
                <p>Email Archiving includes 10GB of compressed email storage by default. If you need more storage, additional 10GB licenses can be added.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content-block">
        <div class="container text-center">
            <img src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/assets/img/marketconnect/spamexperts/logo.png">
        </div>
    </div>

</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['WEB_ROOT']->value;?>
/templates/six/store/spamexperts/master.js"><?php echo '</script'; ?>
>
<?php }
}
