<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:17:17
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\installer\lib\handlers\templates\webasyst.backend_header.notification.announcement.html" */ ?>
<?php /*%%SmartyHeaderCode:194630549766366d9d024e28-58244934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05d195809084554c514955392408506f96e1e54a' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\installer\\lib\\handlers\\templates\\webasyst.backend_header.notification.announcement.html',
      1 => 1713188366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194630549766366d9d024e28-58244934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'announcements' => 0,
    'wa' => 0,
    'app_id' => 0,
    '_key' => 0,
    'wa_url' => 0,
    'apps' => 0,
    '_a' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_66366d9d0b7735_33005650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66366d9d0b7735_33005650')) {function content_66366d9d0b7735_33005650($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['announcements']->value){?>
    <?php $_smarty_tpl->tpl_vars['apps'] = new Smarty_variable($_smarty_tpl->tpl_vars['wa']->value->apps(), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['app_id'] = new Smarty_variable('installer', null, 0);?>

    <?php  $_smarty_tpl->tpl_vars['_a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_a']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['announcements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_a']->key => $_smarty_tpl->tpl_vars['_a']->value){
$_smarty_tpl->tpl_vars['_a']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_a']->key;
?>
    <div class="alert wa-notification js-announcement-group js-announcement-single wa-announcement-group is-unread-group" data-app-id="<?php echo $_smarty_tpl->tpl_vars['app_id']->value;?>
">
        <div class="wa-notification-body js-wa-announcement-wrap">
            <ul class="wa-announcement-list list">

                <li class="js-wa-announcement wa-announcement-item is-unread" data-key="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
">
                    <div class="wa-announcement-item-inner flexbox space-8">
                        <span>
                            <img class="icon size-20"
                                src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['apps']->value['installer']['icon'][24];?>
"
                                data-wa-tooltip-content="Инсталлер"
                                data-wa-tooltip-placement="right"
                            >
                        </span>
                        <div class="wa-announcement-item-main semibold"><?php echo $_smarty_tpl->tpl_vars['_a']->value['html'];?>
</div>

                        
                        <?php if (empty($_smarty_tpl->tpl_vars['_a']->value['always_open'])){?>
                            <a data-app-id="<?php echo $_smarty_tpl->tpl_vars['app_id']->value;?>
" href="javascript:void(0);" class="wa-announcement-close js-announcement-close back" title="Пометить как прочитанное"><i class="fas fa-times"></i></a>
                        <?php }?>
                    </div>
                </li>

            </ul>
        </div>
    </div>
    <?php } ?>
<?php }?>
<?php }} ?>