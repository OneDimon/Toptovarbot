<?php /* Smarty version Smarty-3.1.14, created on 2024-05-09 12:18:34
         compiled from "C:\OSPanel\domains\tovarka\wa-system\page\templates-legacy\Help.html" */ ?>
<?php /*%%SmartyHeaderCode:551768738663c94ea397702-24269770%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a930baa716af48ea993763aad5aa6cb1815c4ed0' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-system\\page\\templates-legacy\\Help.html',
      1 => 1617787741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '551768738663c94ea397702-24269770',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_id' => 0,
    'apps_info' => 0,
    '_icon_24' => 0,
    'wa_url' => 0,
    'page' => 0,
    'vars' => 0,
    'id' => 0,
    'name' => 0,
    'tab_names' => 0,
    '_tab_name' => 0,
    'wa_vars' => 0,
    'show_header_flag' => 0,
    'smarty_vars' => 0,
    'blocks' => 0,
    'plugins' => 0,
    'app_vars' => 0,
    'v' => 0,
    'desc' => 0,
    'sub_v' => 0,
    'sub_desc' => 0,
    'show_body_flag' => 0,
    'block_id' => 0,
    'b' => 0,
    'data' => 0,
    'sub_id' => 0,
    'sub_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_663c94ea592d32_23962795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_663c94ea592d32_23962795')) {function content_663c94ea592d32_23962795($_smarty_tpl) {?><!-- cheat sheet -->
<?php $_smarty_tpl->tpl_vars['show_body_flag'] = new Smarty_variable(false, null, 0);?>
<?php $_smarty_tpl->tpl_vars['show_header_flag'] = new Smarty_variable(false, null, 0);?>

<ul class="tabs">
    <?php if (!empty($_smarty_tpl->tpl_vars['app_id']->value)&&!empty($_smarty_tpl->tpl_vars['apps_info']->value[$_smarty_tpl->tpl_vars['app_id']->value])){?>
        <?php $_smarty_tpl->tpl_vars['_icon_24'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['apps_info']->value[$_smarty_tpl->tpl_vars['app_id']->value]['icon'][24])===null||$tmp==='' ? '' : $tmp), null, 0);?>
        <li class="no-tab">
            <?php if ($_smarty_tpl->tpl_vars['_icon_24']->value){?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['apps_info']->value[$_smarty_tpl->tpl_vars['app_id']->value]['icon'][24];?>
" alt="">
            <?php }?>
            <p class="bold"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['page']->value, ENT_QUOTES, 'UTF-8', true);?>
</p>
            <p>
                <span class="hint"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['apps_info']->value[$_smarty_tpl->tpl_vars['app_id']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
            </p>
        </li>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['vars']->value)){?>
        <?php  $_smarty_tpl->tpl_vars['app_vars'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['app_vars']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['app_vars']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['app_vars']->key => $_smarty_tpl->tpl_vars['app_vars']->value){
$_smarty_tpl->tpl_vars['app_vars']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['app_vars']->key;
 $_smarty_tpl->tpl_vars['app_vars']->index++;
 $_smarty_tpl->tpl_vars['app_vars']->first = $_smarty_tpl->tpl_vars['app_vars']->index === 0;
?>
            <?php if (!empty($_smarty_tpl->tpl_vars['apps_info']->value[$_smarty_tpl->tpl_vars['id']->value])){?>
                <li id="wa-help-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-vars-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['app_vars']->first){?>class="selected"<?php }?>>
                    <?php $_smarty_tpl->tpl_vars['_tab_name'] = new Smarty_variable(htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['tab_names']->value[$_smarty_tpl->tpl_vars['id']->value])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true), null, 0);?>
                    <?php if (!$_smarty_tpl->tpl_vars['_tab_name']->value){?>
                        <?php $_smarty_tpl->tpl_vars['_tab_name'] = new Smarty_variable(htmlspecialchars((string)$_smarty_tpl->tpl_vars['apps_info']->value[$_smarty_tpl->tpl_vars['id']->value]['name'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
                    <?php }?>
                    <a href="#"><?php echo $_smarty_tpl->tpl_vars['_tab_name']->value;?>
</a>
                </li>
            <?php }?>
        <?php } ?>
        <?php $_smarty_tpl->tpl_vars['show_header_flag'] = new Smarty_variable(true, null, 0);?>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['wa_vars']->value)){?>
        <li id="wa-help-wa-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php if (!$_smarty_tpl->tpl_vars['show_header_flag']->value){?> class="selected"<?php }?>>
            <a href="#">$wa</a>
        </li>
        <?php $_smarty_tpl->tpl_vars['show_header_flag'] = new Smarty_variable(true, null, 0);?>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['smarty_vars']->value)){?>
        <li id="wa-help-smarty-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php if (!$_smarty_tpl->tpl_vars['show_header_flag']->value){?> class="selected"<?php }?>>
            <a href="#">Smarty</a>
        </li>
        <?php $_smarty_tpl->tpl_vars['show_header_flag'] = new Smarty_variable(true, null, 0);?>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['blocks']->value)){?>
        <li id="wa-helper-blocks-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php if (!$_smarty_tpl->tpl_vars['show_header_flag']->value){?> class="selected"<?php }?>>
            <a href="#">Блоки</a>
        </li>
        <?php $_smarty_tpl->tpl_vars['show_header_flag'] = new Smarty_variable(true, null, 0);?>
    <?php }?>
    <?php if (!empty($_smarty_tpl->tpl_vars['plugins']->value)){?>
        <li id="wa-help-plugins-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php if (!$_smarty_tpl->tpl_vars['show_header_flag']->value){?> class="selected"<?php }?>>
            <a href="#">Плагины</a>
        </li>
        <?php $_smarty_tpl->tpl_vars['show_header_flag'] = new Smarty_variable(true, null, 0);?>
    <?php }?>
</ul>

<!-- app specific vars -->
<?php if (!empty($_smarty_tpl->tpl_vars['vars']->value)){?>
    <?php  $_smarty_tpl->tpl_vars['app_vars'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['app_vars']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['app_vars']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['app_vars']->key => $_smarty_tpl->tpl_vars['app_vars']->value){
$_smarty_tpl->tpl_vars['app_vars']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['app_vars']->key;
 $_smarty_tpl->tpl_vars['app_vars']->index++;
 $_smarty_tpl->tpl_vars['app_vars']->first = $_smarty_tpl->tpl_vars['app_vars']->index === 0;
?>
        <div id="wa-help-<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-vars-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-content" class="tab-content wa-cheatsheet-dropdown-content" style="<?php if (!$_smarty_tpl->tpl_vars['app_vars']->first){?>display:none;<?php }?>">
            <div class="fields">
                <?php  $_smarty_tpl->tpl_vars['desc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['desc']->_loop = false;
 $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['app_vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['desc']->key => $_smarty_tpl->tpl_vars['desc']->value){
$_smarty_tpl->tpl_vars['desc']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->value = $_smarty_tpl->tpl_vars['desc']->key;
?>
                    <div class="field">
                        <div class="name"><a href="#" class="inline-link"><b><i>&#123;<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&#125;</i></b></a></div>
                        <?php if (!is_array($_smarty_tpl->tpl_vars['desc']->value)){?>
                            <div class="value"><span class="hint"><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</span></div><?php }?>
                    </div>
                    <?php if (is_array($_smarty_tpl->tpl_vars['desc']->value)){?>
                        <?php  $_smarty_tpl->tpl_vars['sub_desc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub_desc']->_loop = false;
 $_smarty_tpl->tpl_vars['sub_v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['desc']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub_desc']->key => $_smarty_tpl->tpl_vars['sub_desc']->value){
$_smarty_tpl->tpl_vars['sub_desc']->_loop = true;
 $_smarty_tpl->tpl_vars['sub_v']->value = $_smarty_tpl->tpl_vars['sub_desc']->key;
?>
                            <div class="field subfield">
                                <div class="name"><a href="#" class="inline-link"><b><i>&#123;<?php echo $_smarty_tpl->tpl_vars['sub_v']->value;?>
&#125;</i></b></a></div>
                                <div class="value"><span class="hint"><?php echo $_smarty_tpl->tpl_vars['sub_desc']->value;?>
</span></div>
                            </div>
                        <?php } ?>
                    <?php }?>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <?php $_smarty_tpl->tpl_vars['show_body_flag'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['wa_vars']->value)){?>
    <!-- misc $wa vars -->
    <div id="wa-help-wa-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-content" class="tab-content wa-cheatsheet-dropdown-content" <?php if ($_smarty_tpl->tpl_vars['show_body_flag']->value){?>style="display:none"<?php }?>>
        <div class="fields">
            <?php  $_smarty_tpl->tpl_vars['desc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['desc']->_loop = false;
 $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['wa_vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['desc']->key => $_smarty_tpl->tpl_vars['desc']->value){
$_smarty_tpl->tpl_vars['desc']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->value = $_smarty_tpl->tpl_vars['desc']->key;
?>
                <div class="field">
                    <div class="name"><a href="#" class="inline-link"><b><i>&#123;<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&#125;</i></b></a></div>
                    <div class="value"><span class="hint"><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</span></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php $_smarty_tpl->tpl_vars['show_body_flag'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['smarty_vars']->value)){?>
    <!-- misc Smarty vars -->
    <div id="wa-help-smarty-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-content" class="tab-content wa-cheatsheet-dropdown-content" <?php if ($_smarty_tpl->tpl_vars['show_body_flag']->value){?>style="display:none"<?php }?>>
        <div class="fields">
            <?php  $_smarty_tpl->tpl_vars['desc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['desc']->_loop = false;
 $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['smarty_vars']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['desc']->key => $_smarty_tpl->tpl_vars['desc']->value){
$_smarty_tpl->tpl_vars['desc']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->value = $_smarty_tpl->tpl_vars['desc']->key;
?>
                <div class="field">
                    <div class="name"><a href="#" class="inline-link"><b><i><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['v']->value, ENT_QUOTES, 'UTF-8', true);?>
</i></b></a></div>
                    <div class="value"><span class="hint"><?php echo $_smarty_tpl->tpl_vars['desc']->value;?>
</span></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php $_smarty_tpl->tpl_vars['show_body_flag'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['blocks']->value)){?>
    <div id="wa-helper-blocks-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-content" class="tab-content wa-cheatsheet-dropdown-content" <?php if ($_smarty_tpl->tpl_vars['show_body_flag']->value){?>style="display:none"<?php }?>>
        <div class="fields">
            <div class="field">
                <div class="name"><a href="#" class="inline-link"><b><i>{$wa->block(<em>'id', $params=[]'</em>)}</i></b></a></div>
                <div class="value"><span class="hint"><strong>id</strong>: ID блока.<br><strong>$params</strong>: ассоциативный массив дополнительных параметров, переданных в блок (пример: <code>['myparam' => 100]</code>). Параметр доступен по своему имени в коде блока в виде переменной Smarty (пример: <code>$myparam</code>).</span></div>
            </div>
            <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_smarty_tpl->tpl_vars['block_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
$_smarty_tpl->tpl_vars['b']->_loop = true;
 $_smarty_tpl->tpl_vars['block_id']->value = $_smarty_tpl->tpl_vars['b']->key;
?>
                <div class="field">
                    <div class="name"><a href="#" class="inline-link"><b><i>{$wa->block('<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block_id']->value, ENT_QUOTES, 'UTF-8', true);?>
')}</i></b></a></div>
                    <div class="value"><span class="hint"><?php echo $_smarty_tpl->tpl_vars['b']->value['description'];?>
</span></div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php $_smarty_tpl->tpl_vars['show_body_flag'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<?php if (!empty($_smarty_tpl->tpl_vars['plugins']->value)){?>
    <div id="wa-help-plugins-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
-content" class="tab-content wa-cheatsheet-dropdown-content" <?php if ($_smarty_tpl->tpl_vars['show_body_flag']->value){?>style="display:none"<?php }?>>
        <div class="fields">
            <?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['plugins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
                <div class="field">
                    <div class="name"><a href="#" class="inline-link"><b><i>&#123;<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
&#125;</i></b></a></div>
                    <?php if (!is_array($_smarty_tpl->tpl_vars['data']->value)){?>
                        <div class="value"><span class="hint"><?php echo $_smarty_tpl->tpl_vars['data']->value;?>
</span></div><?php }?>
                </div>
                <?php if (is_array($_smarty_tpl->tpl_vars['data']->value)){?>
                    <?php  $_smarty_tpl->tpl_vars['sub_data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sub_data']->_loop = false;
 $_smarty_tpl->tpl_vars['sub_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sub_data']->key => $_smarty_tpl->tpl_vars['sub_data']->value){
$_smarty_tpl->tpl_vars['sub_data']->_loop = true;
 $_smarty_tpl->tpl_vars['sub_id']->value = $_smarty_tpl->tpl_vars['sub_data']->key;
?>
                        <div class="field subfield">
                            <div class="name"><a href="#" class="inline-link"><b><i>&#123;<?php echo $_smarty_tpl->tpl_vars['sub_id']->value;?>
&#125;</i></b></a></div>
                            <div class="value"><span class="hint"><?php echo $_smarty_tpl->tpl_vars['sub_data']->value;?>
</span></div>
                        </div>
                    <?php } ?>
                <?php }?>
            <?php } ?>
        </div>
    </div>
    <?php $_smarty_tpl->tpl_vars['show_body_flag'] = new Smarty_variable(true, null, 0);?>
<?php }?>

<script type="text/javascript">
    $("#wa-editor-help-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 ul.tabs li a").click(function () {
        $("#wa-editor-help-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 ul.tabs li.selected").removeClass('selected');
        var id = $(this).parent().addClass('selected').attr('id') + '-content';
        $("#wa-editor-help-<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 div.tab-content").hide();
        $('#' + id).show();
        return false;
    });


    //@todo for compatibility to old versions. Need delete.
    // Start delete.

    $(".wa-dropdown").addClass('wa-cheatsheet-dropdown');
    $(".wa-dropdown-block").addClass('wa-cheatsheet-dropdown-block');

    $("#wa-editor-help ul.tabs li a").click(function () {
        $("#wa-editor-help ul.tabs li.selected").removeClass('selected');
        var id = $(this).parent().addClass('selected').attr('id') + '-content';
        $("#wa-editor-help div.tab-content").hide();
        $('#' + id).show();
        return false;
    });

    // End delete

</script>
<?php }} ?>