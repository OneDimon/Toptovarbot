<?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:43:19
         compiled from "C:\OSPanel\domains\tovartest\wa-system\webasyst\templates\actions\dashboard\DashboardActivity.html" */ ?>
<?php /*%%SmartyHeaderCode:99308411367646947bd53c9-88486069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e608bef942f5473e5cc10d13a2fe57730b5e80c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-system\\webasyst\\templates\\actions\\dashboard\\DashboardActivity.html',
      1 => 1713188366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99308411367646947bd53c9-88486069',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datetime_group' => 0,
    'activity' => 0,
    'activity_item' => 0,
    '_group' => 0,
    'is_today' => 0,
    'wa_backend_url' => 0,
    'app_color' => 0,
    'app_name' => 0,
    'activity_load_more' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_67646947c9ac82_81194822',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67646947c9ac82_81194822')) {function content_67646947c9ac82_81194822($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\OSPanel\\domains\\tovartest\\wa-system\\vendors\\smarty3\\plugins\\modifier.replace.php';
?><?php $_smarty_tpl->tpl_vars['_group'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['datetime_group']->value)===null||$tmp==='' ? '' : $tmp), null, 0);?>

<?php  $_smarty_tpl->tpl_vars['activity_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activity_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activity']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['activity_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['activity_item']->key => $_smarty_tpl->tpl_vars['activity_item']->value){
$_smarty_tpl->tpl_vars['activity_item']->_loop = true;
 $_smarty_tpl->tpl_vars['activity_item']->index++;
 $_smarty_tpl->tpl_vars['activity_item']->first = $_smarty_tpl->tpl_vars['activity_item']->index === 0;
?>
    <?php $_smarty_tpl->tpl_vars['app_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['activity_item']->value['app']['name'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars['app_color'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['activity_item']->value['app']['sash_color'],"#aaa"), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['is_today'] = new Smarty_variable($_smarty_tpl->tpl_vars['activity_item']->value['datetime_group']===_ws('Today'), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['activity_item']->first&&$_smarty_tpl->tpl_vars['activity_item']->value['datetime_group']==$_smarty_tpl->tpl_vars['_group']->value){?>
        <div class="activity-divider h3<?php if ($_smarty_tpl->tpl_vars['is_today']->value){?> hidden today<?php }?>"><?php echo $_smarty_tpl->tpl_vars['activity_item']->value['datetime_group'];?>
</div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['activity_item']->value['datetime_group']!=$_smarty_tpl->tpl_vars['_group']->value){?>
        <div class="activity-divider h3<?php if ($_smarty_tpl->tpl_vars['is_today']->value&&$_smarty_tpl->tpl_vars['activity_item']->first){?> today<?php }?>"><?php echo $_smarty_tpl->tpl_vars['activity_item']->value['datetime_group'];?>
</div>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['_group'] = new Smarty_variable($_smarty_tpl->tpl_vars['activity_item']->value['datetime_group'], null, 0);?>

    <div class="activity-item" data-id="<?php echo $_smarty_tpl->tpl_vars['activity_item']->value['id'];?>
">
        <?php if (!empty($_smarty_tpl->tpl_vars['activity_item']->value['contact_photo'])&&$_smarty_tpl->tpl_vars['activity_item']->value['is_user']){?>
            <header class="item-image-wrapper userpic userpic48">
                <img class="image-item" src="<?php echo waContact::getPhotoUrl($_smarty_tpl->tpl_vars['activity_item']->value['contact_id'],$_smarty_tpl->tpl_vars['activity_item']->value['contact_photo'],48,48);?>
" alt="">
            </header>
        <?php }?>
        <div class="item-content-wrapper">
            <div class="inline-content small">
                <a class="activity-username" href="<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
contacts/#/contact/<?php echo $_smarty_tpl->tpl_vars['activity_item']->value['contact_id'];?>
"><?php echo htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['activity_item']->value['contact_name'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</a>
                <span class="activity-action gray"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['activity_item']->value['action_name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                <?php if (!empty($_smarty_tpl->tpl_vars['activity_item']->value['params_html'])){?>
                    <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['activity_item']->value['params_html'],'&nbsp;',' ');?>

                <?php }?>
            </div>
            <span class="badge small" style="background: <?php echo $_smarty_tpl->tpl_vars['app_color']->value;?>
; font-weight: normal;"><?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</span>
            <span class="activity-datetime hint"><?php echo waDateTime::format('humandatetime',$_smarty_tpl->tpl_vars['activity_item']->value['datetime']);?>
</span>
        </div>
    </div>
<?php } ?>

<?php if (!empty($_smarty_tpl->tpl_vars['activity_load_more']->value)){?>
    <div class="activity-divider show-more-activity-wrapper is-loading">
        <a class="d-load-more-activity inline-link small button light-gray rounded" id="d-load-more-activity" href="javascript:void(0);">Показать еще</a>
        <i class="d-load-more-animation fas fa-spinner fa-pulse wa-animation-spin speed-1000 fa-lg" title="Loading"></i>
    </div>
<?php }?>
<?php }} ?>