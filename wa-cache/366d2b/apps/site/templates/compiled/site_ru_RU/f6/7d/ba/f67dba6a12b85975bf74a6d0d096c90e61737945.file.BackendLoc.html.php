<?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:43:19
         compiled from "C:\OSPanel\domains\tovartest\wa-apps\site\templates\actions-legacy\backend\BackendLoc.html" */ ?>
<?php /*%%SmartyHeaderCode:193564444767646947c41d81-30550495%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f67dba6a12b85975bf74a6d0d096c90e61737945' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-apps\\site\\templates\\actions-legacy\\backend\\BackendLoc.html',
      1 => 1624000810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193564444767646947c41d81-30550495',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'strings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_67646947c93be7_72964238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67646947c93be7_72964238')) {function content_67646947c93be7_72964238($_smarty_tpl) {?>$.wa.locale = $.extend($.wa.locale, <?php ob_start();?><?php echo json_encode($_smarty_tpl->tpl_vars['strings']->value);?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
);<?php }} ?>