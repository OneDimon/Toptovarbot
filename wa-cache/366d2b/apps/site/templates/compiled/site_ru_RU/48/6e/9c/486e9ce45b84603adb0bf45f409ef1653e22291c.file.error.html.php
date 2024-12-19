<?php /* Smarty version Smarty-3.1.14, created on 2024-05-09 09:44:32
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\themes\default\error.html" */ ?>
<?php /*%%SmartyHeaderCode:448260548663c70d05f29b1-95530026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '486e9ce45b84603adb0bf45f409ef1653e22291c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\themes\\default\\error.html',
      1 => 1540900260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '448260548663c70d05f29b1-95530026',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_code' => 0,
    'error_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_663c70d1112541_83938666',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_663c70d1112541_83938666')) {function content_663c70d1112541_83938666($_smarty_tpl) {?><h1>
	<?php if ($_smarty_tpl->tpl_vars['error_code']->value){?><?php echo $_smarty_tpl->tpl_vars['error_code']->value;?>
. <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['error_message']->value){?><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
<?php }else{ ?>Ошибка<?php }?>
</h1>
Запрашиваемый ресурс недоступен.
<?php }} ?>