<?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:43:13
         compiled from "C:\OSPanel\domains\tovartest\wa-apps\site\templates\layouts\Sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:72374779467646941a85b51-22407013%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcab4cd2b014d1b7c0d48f796f2b8034f7a40feb' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-apps\\site\\templates\\layouts\\Sidebar.html',
      1 => 1667983931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72374779467646941a85b51-22407013',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'domain_id' => 0,
    'domains' => 0,
    '_domain' => 0,
    'd_id' => 0,
    '_domain_title' => 0,
    'routing_errors' => 0,
    'domain_alias' => 0,
    'wa' => 0,
    'backend_sidebar' => 0,
    'output' => 0,
    'rights' => 0,
    'd' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_67646941ba28d0_18980249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_67646941ba28d0_18980249')) {function content_67646941ba28d0_18980249($_smarty_tpl) {?><div class="s-site-mgmt-tab" style="margin-top: 15px;">
    <ul class="block s-domain menu-h dropdown">
        <li class="s-domain-list">
            <a href="javascript:void(0);" class="s-selected-domain-name" title="<?php echo waIdna::dec(htmlspecialchars((string)str_replace('www.','',$_smarty_tpl->tpl_vars['domains']->value[$_smarty_tpl->tpl_vars['domain_id']->value]['title']), ENT_QUOTES, 'UTF-8', true));?>
">
                <?php echo waIdna::dec(htmlspecialchars((string)str_replace('www.','',$_smarty_tpl->tpl_vars['domains']->value[$_smarty_tpl->tpl_vars['domain_id']->value]['title']), ENT_QUOTES, 'UTF-8', true));?>

                <i class="icon10 darr"></i>
                <i class="shortener"></i>
            </a>
            
            <ul class="menu-v right s-domain-list-wrapper">
                <?php  $_smarty_tpl->tpl_vars['_domain'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_domain']->_loop = false;
 $_smarty_tpl->tpl_vars['d_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['domains']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_domain']->key => $_smarty_tpl->tpl_vars['_domain']->value){
$_smarty_tpl->tpl_vars['_domain']->_loop = true;
 $_smarty_tpl->tpl_vars['d_id']->value = $_smarty_tpl->tpl_vars['_domain']->key;
?>
                    <?php $_smarty_tpl->tpl_vars['_domain_title'] = new Smarty_variable(waIdna::dec(str_replace('www.','',$_smarty_tpl->tpl_vars['_domain']->value['title'])), null, 0);?>
                    <li class="s-domain-list-item<?php if ($_smarty_tpl->tpl_vars['d_id']->value==$_smarty_tpl->tpl_vars['domain_id']->value){?> active<?php }?>">
                        <a href="?domain_id=<?php echo $_smarty_tpl->tpl_vars['d_id']->value;?>
" class="s-domain-link" title="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_domain_title']->value, ENT_QUOTES, 'UTF-8', true);?>
">
                            <i class="indicator red error-domain-icon <?php if (isset($_smarty_tpl->tpl_vars['routing_errors']->value['apps'][$_smarty_tpl->tpl_vars['d_id']->value])){?>visible<?php }else{ ?>hide<?php }?>" id="error-domain-<?php echo $_smarty_tpl->tpl_vars['d_id']->value;?>
">!</i>
                            <i class="icon16 favicon" style="background-image:url('http<?php if (waRequest::isHttps()){?>s<?php }?>://<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_domain']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
/favicon.ico')"></i><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_domain_title']->value, ENT_QUOTES, 'UTF-8', true);?>

                            <i class="shortener"></i>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    </ul>

    
    <ul class="menu-v s-links with-icons">
        <?php if (empty($_smarty_tpl->tpl_vars['domain_alias']->value)){?>
            <li id="s-link-pages">
                <a href="#/pages/">
                    <i class="icon16 notebook"></i>Страницы
                </a>
            </li>
            <?php if ($_smarty_tpl->tpl_vars['wa']->value->userRights('design')){?>
                <li id="s-link-design"><a href="#/design/"><i class="icon16 palette"></i>Дизайн</a></li>
            <?php }?>
            <li id="s-link-routing">
                <a href="#/routing/">
                    <i class="icon16 split"></i>Структура
                </a>
                <i class="indicator red error-structure-icon" style="display: <?php if (isset($_smarty_tpl->tpl_vars['routing_errors']->value['not_install'])||isset($_smarty_tpl->tpl_vars['routing_errors']->value['apps'][$_smarty_tpl->tpl_vars['domain_id']->value])){?>block<?php }else{ ?>none<?php }?>">!</i>
            </li>
            <li id="s-link-personal">
                <a href="#/personal/" title="Вход, регистрация и личный кабинет">
                    <i class="icon16 access"></i>Личный кабинет
                </a>
            </li>
        <?php }?>
        <li id="s-link-settings">
            <a href="#/settings/">
                <i class="icon16 settings"></i>Настройки сайта
            </a>
        </li>

        
        <!-- plugin hook: "backend_sidebar.menu" -->
        <?php  $_smarty_tpl->tpl_vars['output'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['output']->_loop = false;
 $_smarty_tpl->tpl_vars['plugin'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['backend_sidebar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['output']->key => $_smarty_tpl->tpl_vars['output']->value){
$_smarty_tpl->tpl_vars['output']->_loop = true;
 $_smarty_tpl->tpl_vars['plugin']->value = $_smarty_tpl->tpl_vars['output']->key;
?>
            <?php if (is_array($_smarty_tpl->tpl_vars['output']->value)&&isset($_smarty_tpl->tpl_vars['output']->value['menu_li'])){?><?php echo $_smarty_tpl->tpl_vars['output']->value['menu_li'];?>
<?php }?>
        <?php } ?>
    </ul>
    <?php if (!empty($_smarty_tpl->tpl_vars['domain_alias']->value)){?>
    <div class="block align-center hint">
        <?php echo sprintf('Это зеркало сайта <strong>%s</strong>',$_smarty_tpl->tpl_vars['domain_alias']->value);?>

    </div>
    <?php }?>
</div>


<?php if ($_smarty_tpl->tpl_vars['rights']->value['admin']){?>
    <div class="s-add-site-block">
        <ul class="menu-v s-links with-icons">
            <li class="s-domain-list-item">
                <a href="javascript:void(0);" class="s-add-new-site inline-link">
                    <b><i><i class="icon16 add"></i>Новый сайт</i></b>
                </a>
            </li>
        </ul>
    </div>
<?php }?>


<div class="s-system-block">
	<ul class="menu-v with-icons s-links">
		<?php if ($_smarty_tpl->tpl_vars['rights']->value['blocks']){?><li id="s-link-blocks"><a href="#/blocks/"><i class="icon16 zone"></i>Блоки</a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['rights']->value['files']){?><li id="s-link-files"><a href="#/files/"><i class="icon16 upload"></i>Файл-менеджер</a></li><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['rights']->value['admin']){?>
            <li id="s-link-plugins"><a href="#/plugins/"><i class="icon16 plugins"></i>Плагины</a></li>
        <?php }?>

        
        <!-- plugin hook: "backend_sidebar.system" -->
        <?php  $_smarty_tpl->tpl_vars['output'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['output']->_loop = false;
 $_smarty_tpl->tpl_vars['plugin'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['backend_sidebar']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['output']->key => $_smarty_tpl->tpl_vars['output']->value){
$_smarty_tpl->tpl_vars['output']->_loop = true;
 $_smarty_tpl->tpl_vars['plugin']->value = $_smarty_tpl->tpl_vars['output']->key;
?>
        <?php if (is_array($_smarty_tpl->tpl_vars['output']->value)&&isset($_smarty_tpl->tpl_vars['output']->value['system_li'])){?><?php echo $_smarty_tpl->tpl_vars['output']->value['system_li'];?>
<?php }?>
        <?php } ?>
	</ul>
</div>


<div style="display:none" id="addsite-dialog">
    <form method="post" action="?module=domains&amp;action=save">
        <div class="dialog-content">
            <h1>Новый сайт</h1>
            <p>
                <strong class="large">http://</strong><input type="text" id="domain-name" name="name" class="bold large long" value="" placeholder="www.mydomain.ru" />
                <br /><span class="hint">Например, mydomain.ru, www.mydomain.ru, subdomain.mydomain.ru</span>
            </p>

            <p>Введите URL нового сайта. Вы должны быть владельцем доменного имени и предварительно настроить домен так, чтобы он указывал на данную установку Webasyst. Для настройки доменного имени обратитесь за помощью к вашему хостинг-провайдеру. <a href="http://www.webasyst.ru/developers/docs/routing/site-app-routing/" target="_blank">Помощь</a> <i class="icon10 new-window"></i></p>

            <p>
            <ul class="menu-v">
                <li>
                    <label>
                        <input type="radio" name="alias" value="0" checked> Новый сайт
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" name="alias" value="1">
                        Зеркало сайта
                        <select id="alias-domain" name="domain">
                            <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_smarty_tpl->tpl_vars['d_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['domains']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
 $_smarty_tpl->tpl_vars['d_id']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
                                <?php if (empty($_smarty_tpl->tpl_vars['d']->value['is_alias'])){?>
                                    <option value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['d']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo waIdna::dec($_smarty_tpl->tpl_vars['d']->value['name']);?>
</option>
                                <?php }?>
                            <?php } ?>
                        </select>
                        <script type="text/javascript">
                            $('#alias-domain').on('change', function () {
                                $('#alias-domain').parent().find('input').attr('checked', 'checked');
                            });
                        </script>
                    </label>
                </li>
            </ul>
            </p>
            <span class="errormsg"></span>
        </div>
        <div class="dialog-buttons">
            <input type="submit" class="button green" value="Создать сайт">
            или <a href="#" class="inline-link cancel"><b><i>отмена</i></b></a>

        </div>
    </form>
</div>
<?php }} ?>