<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:30:02
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\themes\default\my.nav.html" */ ?>
<?php /*%%SmartyHeaderCode:16107153086636709ab3bd33-98020125%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92034463905a1538969c58b1e049997471a65c2c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\themes\\default\\my.nav.html',
      1 => 1540900260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16107153086636709ab3bd33-98020125',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'my_app' => 0,
    'wa' => 0,
    'my_nav_selected' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_6636709ac30bb6_45015805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6636709ac30bb6_45015805')) {function content_6636709ac30bb6_45015805($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['my_app']->value==$_smarty_tpl->tpl_vars['wa']->value->app()){?>
    <li class="site <?php if ($_smarty_tpl->tpl_vars['my_nav_selected']->value=='profile'){?>selected<?php }?>">
        <a href="<?php echo $_smarty_tpl->tpl_vars['wa']->value->getUrl('/frontend/myProfile');?>
">Мой профиль</a>
    </li>
<?php }?><?php }} ?>