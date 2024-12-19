<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:30:09
         compiled from "C:\OSPanel\domains\tovarka\wa-system\design\templates-legacy\Theme.html" */ ?>
<?php /*%%SmartyHeaderCode:33380065663670a1c2f7e6-34665459%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2686091c767d1e33ba9211b0ba41ec30f3651755' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-system\\design\\templates-legacy\\Theme.html',
      1 => 1679048654,
      2 => 'file',
    ),
    'cb4af02d33e5b287e809804a433ea59edba7e31c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-system\\design\\templates-legacy\\ThemeDialogs.inc.html',
      1 => 1667983931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33380065663670a1c2f7e6-34665459',
  'function' => 
  array (
    '_renderThemeSetting' => 
    array (
      'parameter' => 
      array (
        '_setting_var' => '_setting_var',
        '_setting' => 
        array (
        ),
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'theme' => 0,
    'wa_url' => 0,
    'wa' => 0,
    '_setting' => 0,
    '_global_divider' => 0,
    '_setting_var' => 0,
    '_h_level' => 0,
    '_not_empty_global_divider' => 0,
    '_var' => 0,
    '_item' => 0,
    '_field_name' => 0,
    'v' => 0,
    'o' => 0,
    'k' => 0,
    '_url' => 0,
    'id' => 0,
    'support' => 0,
    'instruction' => 0,
    'preview_url' => 0,
    'wa_backend_url' => 0,
    'theme_routes' => 0,
    'theme_warning_requirements' => 0,
    'requirement' => 0,
    'theme_original_version' => 0,
    'theme_parent_original_version' => 0,
    'theme_parent_warning_requirements' => 0,
    'theme_original_warning_requirements' => 0,
    'settings' => 0,
    '_is_trial' => 0,
    '_reset_is_disabled' => 0,
    '_reset_disabled_alert' => 0,
    '_r' => 0,
    'global_group_divideres' => 0,
    '_divider_id' => 0,
    '_divider_name' => 0,
    'cover' => 0,
    's_var' => 0,
    'setting' => 0,
    't' => 0,
    'child_themes' => 0,
    'design_url' => 0,
    '_locale' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_663670a435bd80_59373719',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_663670a435bd80_59373719')) {function content_663670a435bd80_59373719($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_wa_datetime')) include 'C:\\OSPanel\\domains\\tovarka\\wa-system/vendors/smarty-plugins\\modifier.wa_datetime.php';
?><?php $_smarty_tpl->tpl_vars['_is_trial'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value['type']===waTheme::TRIAL, null, 0);?>
<script src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/jquery-wa/design/legacy/theme.settings.js?v<?php echo $_smarty_tpl->tpl_vars['wa']->value->version();?>
"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/css/wa/design/theme.settings.css?<?php echo $_smarty_tpl->tpl_vars['wa']->value->version();?>
">
<?php if (!is_callable('smarty_function_html_options')) include 'C:\OSPanel\domains\tovarka\wa-system\vendors\smarty3\plugins\function.html_options.php';
?><?php if (!function_exists('smarty_template_function__renderThemeSetting')) {
    function smarty_template_function__renderThemeSetting($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['_renderThemeSetting']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php $_smarty_tpl->tpl_vars['_h_level'] = new Smarty_variable($_smarty_tpl->tpl_vars['_setting']->value['level'], null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='group_divider'){?><?php $_smarty_tpl->tpl_vars['_global_divider'] = new Smarty_variable($_smarty_tpl->tpl_vars['_setting']->value['level']==1, null, 0);?><?php $_smarty_tpl->tpl_vars['_not_empty_global_divider'] = new Smarty_variable($_smarty_tpl->tpl_vars['_global_divider']->value&&!empty($_smarty_tpl->tpl_vars['_setting']->value['items']), null, 0);?><div class="field-group<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['invisible'])){?> invisible-setting<?php }?>"<?php if ($_smarty_tpl->tpl_vars['_setting']->value['level']>1){?> style="margin-left: <?php echo $_smarty_tpl->tpl_vars['_setting']->value['level']*10;?>
px"<?php }?>><div class="wa-theme-setting-divider js-theme-setting-divider"data-divider-id="<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
"data-divider-level="<?php echo $_smarty_tpl->tpl_vars['_setting']->value['level'];?>
"><?php if ($_smarty_tpl->tpl_vars['_setting']->value['level']==1){?><div class="wa-theme-expand-icon-wrapper"><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['items'])){?><i class="icon16 rarr js-divider-expand" title="Развернуть"></i><?php }?></div><?php }?><h<?php echo $_smarty_tpl->tpl_vars['_h_level']->value;?>
 class="wa-theme-setting-divider-name js-divider-name js-search-item<?php if ($_smarty_tpl->tpl_vars['_not_empty_global_divider']->value){?> js-divider-expand<?php }?>"data-name="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_setting']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-search="<?php echo strip_tags($_smarty_tpl->tpl_vars['_setting']->value['name']);?>
"><span class="<?php if ($_smarty_tpl->tpl_vars['_setting']->value['var']===waTheme::OBSOLETE_SETTINGS_DIVIDER){?>gray <?php }?>js-search-item-name"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['name'];?>
</span></h<?php echo $_smarty_tpl->tpl_vars['_h_level']->value;?>
><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['tooltip'])){?><div class="wa-tooltip"><i class="icon10 info divider-tooltip-<?php echo $_smarty_tpl->tpl_vars['_setting']->value['level'];?>
"></i><div class="wa-tooltip-content"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['tooltip'];?>
</div></div><?php }?><?php if ($_smarty_tpl->tpl_vars['_not_empty_global_divider']->value){?><span class="hint wa-theme-group-all-settings js-group-all-settings" style="display: none;">Показать все настройки группы <i class="icon10 darr"></i></span><?php }?><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['items'])){?><div class="wa-theme-settings-group js-settings-group"<?php if ($_smarty_tpl->tpl_vars['_global_divider']->value){?> style="display: none;"<?php }?> data-divider-level="<?php echo $_smarty_tpl->tpl_vars['_setting']->value['level'];?>
"><?php  $_smarty_tpl->tpl_vars['_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_item']->_loop = false;
 $_smarty_tpl->tpl_vars['_var'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_setting']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_item']->key => $_smarty_tpl->tpl_vars['_item']->value){
$_smarty_tpl->tpl_vars['_item']->_loop = true;
 $_smarty_tpl->tpl_vars['_var']->value = $_smarty_tpl->tpl_vars['_item']->key;
?><?php smarty_template_function__renderThemeSetting($_smarty_tpl,array('_setting_var'=>$_smarty_tpl->tpl_vars['_var']->value,'_setting'=>$_smarty_tpl->tpl_vars['_item']->value));?>
<?php } ?></div><?php }?></div></div><?php }elseif($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='paragraph'){?><div class="js-search-item" data-search=""><div class="wa-theme-paragraph hint"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['name'];?>
</div></div><?php }else{ ?><div class="field<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['invisible'])){?> invisible-setting<?php }?> js-search-item" data-name="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_setting']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-search="<?php echo strip_tags($_smarty_tpl->tpl_vars['_setting']->value['name']);?>
"><div class="name"><?php if ($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='checkbox'){?><?php ob_start();?><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?><?php echo "parent_";?><?php }?><?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['_field_name'] = new Smarty_variable($_tmp1."settings[".((string)$_smarty_tpl->tpl_vars['_setting_var']->value)."]", null, 0);?><label class="js-search-item-name" for="<?php echo $_smarty_tpl->tpl_vars['_field_name']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['name'];?>
</label><?php }else{ ?><span class="js-search-item-name"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['name'];?>
</span><?php }?><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['tooltip'])){?><div class="wa-tooltip"><i class="icon10 info"></i><div class="wa-tooltip-content"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['tooltip'];?>
</div></div><?php }?></div><div class="value<?php if (in_array($_smarty_tpl->tpl_vars['_setting']->value['control_type'],array('select','radio','checkbox','file'))){?> no-shift<?php }?>"><?php if ($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='select'){?><select name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>settings[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]"><?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['_setting']->value['options'],'selected'=>ifset($_smarty_tpl->tpl_vars['_setting']->value['value'])),$_smarty_tpl);?>
</select><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['description'])){?><div class="hint"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['description'];?>
</div><?php }?><?php }elseif($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='radio'){?><?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_setting']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
$_smarty_tpl->tpl_vars['o']->_loop = true;
 $_smarty_tpl->tpl_vars['v']->value = $_smarty_tpl->tpl_vars['o']->key;
?><label><input <?php if (ifset($_smarty_tpl->tpl_vars['_setting']->value['value'])==$_smarty_tpl->tpl_vars['v']->value){?>checked<?php }?> type="radio" value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>settings[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]" > <?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
<?php if (!empty($_smarty_tpl->tpl_vars['o']->value['description'])){?><p class="hint"><?php echo $_smarty_tpl->tpl_vars['o']->value['description'];?>
</p><?php }?></label><?php } ?><?php }elseif($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='color'){?><input class="color" type="text" name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>settings[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['_setting']->value['value'];?>
"><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['description'])){?><div class="hint"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['description'];?>
</div><?php }?><?php }elseif($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='checkbox'){?><?php ob_start();?><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?><?php echo "parent_";?><?php }?><?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['_field_name'] = new Smarty_variable($_tmp2."settings[".((string)$_smarty_tpl->tpl_vars['_setting_var']->value)."]", null, 0);?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['_field_name']->value;?>
" value=""><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['_field_name']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['_field_name']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['_setting']->value['value']){?>checked<?php }?> value="1"><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['description'])){?><div class="hint"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['description'];?>
</div><?php }?><?php }elseif($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='image_select'){?><ul class="wa-theme-image-select"><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?><?php $_smarty_tpl->tpl_vars['_url'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value['parent_theme']->getUrl(), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['_url'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value->getUrl(), null, 0);?><?php }?><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['_setting']->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?><li<?php if ($_smarty_tpl->tpl_vars['_setting']->value['value']==$_smarty_tpl->tpl_vars['k']->value){?> class="selected"<?php }?> data-value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><a href="#" class="transparent-sprite"><img src="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"></a></li><?php } ?></ul><input type="hidden" name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>settings[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['_setting']->value['value'];?>
"><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['description'])){?><div class="hint"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['description'];?>
</div><?php }?><?php }elseif($_smarty_tpl->tpl_vars['_setting']->value['control_type']=='image'){?><input type="hidden" name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>settings[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]" value="<?php echo ifset($_smarty_tpl->tpl_vars['_setting']->value['value']);?>
"><input type="file" name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>image[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]"><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['value'])){?><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?><?php $_smarty_tpl->tpl_vars['_url'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value['parent_theme']->getUrl(), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['_url'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value->getUrl(), null, 0);?><?php }?><div class="image"><br><img class="transparent-sprite" src="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['_setting']->value['value'];?>
"><br><a class="small delete-image" href="#">Удалить</a></div><?php }?><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['description'])){?><div class="hint"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['description'];?>
</div><?php }?><?php }else{ ?><div><?php if (!$_smarty_tpl->tpl_vars['_setting']->value['value']||strlen($_smarty_tpl->tpl_vars['_setting']->value['value'])<=50){?><input class="flexible" id="flex-settings-<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
" type="text" name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>settings[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_setting']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
"><?php }else{ ?><textarea class="flexible" id="flex-settings-<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
" name="<?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['parent'])){?>parent_<?php }?>settings[<?php echo $_smarty_tpl->tpl_vars['_setting_var']->value;?>
]"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_setting']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
</textarea><?php }?></div><?php if (!empty($_smarty_tpl->tpl_vars['_setting']->value['description'])){?><div class="hint"><?php echo $_smarty_tpl->tpl_vars['_setting']->value['description'];?>
</div><?php }?><?php }?></div></div><?php }?>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<?php $_smarty_tpl->tpl_vars['id'] = new Smarty_variable(uniqid("wa-theme-id".((string)$_smarty_tpl->tpl_vars['theme']->value['id'])), null, 0);?>
<div class="block double-padded blank wa-theme" id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">

    
    <h1 class="wa-theme-name">
        <?php echo sprintf('Тема дизайна «%s»',htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true));?>

        <span class="hint">
            <?php echo $_smarty_tpl->tpl_vars['theme']->value['version'];?>

            <span style="font-size: smaller;" title="ID темы">(<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
)</span>
        </span>
    </h1>

    
    <div class="wa-theme-sidebar sidebar right250px">

        
        <?php if (!empty($_smarty_tpl->tpl_vars['support']->value)||!empty($_smarty_tpl->tpl_vars['instruction']->value)){?>
            <div class="block wa-theme-help">
                <div class="heading bold"><span class="wa-theme-help-icon"></span>Помощь</div>
                <ul>
                    <?php if (!empty($_smarty_tpl->tpl_vars['instruction']->value)){?>
                        <li>
                            <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['instruction']->value, ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" class="no-underline">Инструкция к теме дизайна</a> <i class="icon10 new-window"></i>
                        </li>
                    <?php }?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['support']->value)){?>
                        <li>
                            <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['support']->value, ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" class="no-underline">Поддержка</a> <i class="icon10 new-window"></i>
                        </li>
                    <?php }?>
                </ul>
            </div>
        <?php }?>

        
        <?php if ($_smarty_tpl->tpl_vars['theme']->value['type']==waTheme::TRIAL){?>

            
            <div class="block double-padded wa-theme-actions wa-theme-trial align-center">
                <ul class="menu-v with-icons">
                    <li style="text-align: center;">
                        <b><i class="icon16 exclamation"></i><?php echo _ws('Trial theme');?>
</b>
                    </li>
                </ul>

                <?php if (!empty($_smarty_tpl->tpl_vars['preview_url']->value)){?>
                    <div style="margin: 16px 0 22px 0;">
                        <a class="wa-theme-preview button blue" data-theme-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['preview_url']->value;?>
">Открыть предпросмотр</a>
                        <p class="hint" style=" margin:16px 0 0 0">
                            <strong>Сайт откроется в пробной теме только для вас.</strong>
                            Другие посетители продолжат видеть рабочую тему.
                        </p>
                    </div>
                <?php }?>

                <?php if ($_smarty_tpl->tpl_vars['wa']->value->user()->isAdmin('installer')){?>
                    <div style="margin:16px 0 12px 0;">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
installer/store/theme/<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
/" class="button green">Купить тему</a>
                    </div>
                <?php }?>
            </div>

        <?php }elseif($_smarty_tpl->tpl_vars['theme']->value['type']==waTheme::ORIGINAL){?>

            <?php if ($_smarty_tpl->tpl_vars['theme_routes']->value&&!empty($_smarty_tpl->tpl_vars['theme_warning_requirements']->value)){?>
                <div class="block double-padded wa-theme-actions wa-theme-warning">
                    <ul class="menu-v">
                        <?php  $_smarty_tpl->tpl_vars['requirement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['requirement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme_warning_requirements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['requirement']->key => $_smarty_tpl->tpl_vars['requirement']->value){
$_smarty_tpl->tpl_vars['requirement']->_loop = true;
?>
                            <li><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['requirement']->value['warning'], ENT_QUOTES, 'UTF-8', true);?>
</li>
                        <?php } ?>
                    </ul>
                </div>
            <?php }?>

            
            <div class="block double-padded wa-theme-actions wa-theme-latest">
                <ul class="menu-v with-icons">
                    <li>
                        <b><i class="icon16 yes"></i><?php echo sprintf('Оригинальная версия <strong>%s</strong>',$_smarty_tpl->tpl_vars['theme']->value['version']);?>
</b>
                        <span class="hint"><br>Вы не вносили изменения в шаблоны дизайна и настройки этой темы дизайна.</span>
                    </li>
                </ul>
            </div>

        <?php }elseif($_smarty_tpl->tpl_vars['theme']->value['type']==waTheme::OVERRIDDEN){?>

            <?php if ($_smarty_tpl->tpl_vars['theme']->value['version']==$_smarty_tpl->tpl_vars['theme_original_version']->value){?>
                <?php if (!$_smarty_tpl->tpl_vars['theme']->value['parent_theme']||$_smarty_tpl->tpl_vars['theme']->value['parent_theme']['type']==waTheme::ORIGINAL||$_smarty_tpl->tpl_vars['theme']->value['parent_theme']['version']==$_smarty_tpl->tpl_vars['theme_parent_original_version']->value){?>
                    
                    <div class="block double-padded wa-theme-actions wa-theme-latest">
                        <ul class="menu-v with-icons">
                            <li>
                                <b><i class="icon16 yes"></i><?php echo sprintf('Последняя версия <strong>%s</strong>',$_smarty_tpl->tpl_vars['theme']->value['version']);?>
</b>
                                <span class="hint"><br><?php echo sprintf('Установлена последняя версия темы дизайна %s.',htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true));?>
</span>
                            </li>
                        </ul>
                    </div>
                <?php }else{ ?>
                    
                    <?php if (!empty($_smarty_tpl->tpl_vars['theme_parent_warning_requirements']->value)){?>
                        <div class="block double-padded wa-theme-actions wa-theme-warning">
                            <strong>Обновление недоступно</strong>
                            <ul class="menu-v">
                                <?php  $_smarty_tpl->tpl_vars['requirement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['requirement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme']->value['parent_theme']->getWarningRequirements(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['requirement']->key => $_smarty_tpl->tpl_vars['requirement']->value){
$_smarty_tpl->tpl_vars['requirement']->_loop = true;
?>
                                    <li>
                                        <?php echo $_smarty_tpl->tpl_vars['requirement']->value['warning'];?>

                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    
                    <?php }elseif($_smarty_tpl->tpl_vars['theme']->value['parent_theme']&&$_smarty_tpl->tpl_vars['theme']->value['parent_theme']['type']==waTheme::OVERRIDDEN&&$_smarty_tpl->tpl_vars['theme']->value['parent_theme']['version']!=$_smarty_tpl->tpl_vars['theme_parent_original_version']->value){?>
                        <div class="block double-padded wa-theme-actions wa-theme-update-available">
                            <ul class="menu-v with-icons">
                                <li>
                                    <a class="theme-update bold" href="#" title="Все изменения, которые вы вносили в тему дизайна, будут потеряны. Сбросить все изменения?"><i class="icon16 update"></i>Доступно обновление</a>
                                    <span class="hint"><br>Обновление темы дизайна требует вашего подтверждения, так как при обновлении шаблоны дизайна и настройки темы будут перезаписаны их новыми версиями, и это может повлиять на внешний вид и работоспособность вашего сайта. Щелкните, чтобы посмотреть список файлов, которые будут обновлены.</span>
                                </li>
                            </ul>
                        </div>
                    <?php }?>
                <?php }?>
            <?php }else{ ?>
                
                <?php if ($_smarty_tpl->tpl_vars['theme']->value['version']!=$_smarty_tpl->tpl_vars['theme_original_version']->value&&!empty($_smarty_tpl->tpl_vars['theme_warning_requirements']->value)){?>
                    <div class="block double-padded wa-theme-actions wa-theme-warning">
                        <strong>Обновление недоступно</strong>
                        <ul class="menu-v">
                            <?php  $_smarty_tpl->tpl_vars['requirement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['requirement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme_warning_requirements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['requirement']->key => $_smarty_tpl->tpl_vars['requirement']->value){
$_smarty_tpl->tpl_vars['requirement']->_loop = true;
?>
                                <li>
                                    <?php echo $_smarty_tpl->tpl_vars['requirement']->value['warning'];?>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                
                <?php }elseif($_smarty_tpl->tpl_vars['theme']->value['version']!=$_smarty_tpl->tpl_vars['theme_original_version']->value&&!empty($_smarty_tpl->tpl_vars['theme_original_warning_requirements']->value)){?>
                    <div class="block double-padded wa-theme-actions wa-theme-warning">
                        <strong>Обновление недоступно</strong>
                        <ul class="menu-v">
                            <?php  $_smarty_tpl->tpl_vars['requirement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['requirement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme_original_warning_requirements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['requirement']->key => $_smarty_tpl->tpl_vars['requirement']->value){
$_smarty_tpl->tpl_vars['requirement']->_loop = true;
?>
                                <li>
                                    <?php echo $_smarty_tpl->tpl_vars['requirement']->value['warning'];?>

                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                
                <?php }elseif($_smarty_tpl->tpl_vars['theme']->value['version']!=$_smarty_tpl->tpl_vars['theme_original_version']->value){?>
                    <div class="block double-padded wa-theme-actions wa-theme-update-available">
                        <ul class="menu-v with-icons">
                            <li>
                                <a class="theme-update bold" href="#" title="Все изменения, которые вы вносили в тему дизайна, будут потеряны. Сбросить все изменения?"><i class="icon16 update"></i><?php echo sprintf('Доступно обновление до версии %s',$_smarty_tpl->tpl_vars['theme_original_version']->value);?>
</a>
                                <span class="hint"><br>Обновление темы дизайна требует вашего подтверждения, так как при обновлении шаблоны дизайна и настройки темы будут перезаписаны их новыми версиями, и это может повлиять на внешний вид и работоспособность вашего сайта. Щелкните, чтобы посмотреть список файлов, которые будут обновлены.</span>
                            </li>
                        </ul>
                    </div>
                <?php }?>
            <?php }?>

        <?php }else{ ?>

            
            <div class="block double-padded wa-theme-actions wa-theme-orphan">
                <ul class="menu-v with-icons">
                    <li>
                        <b><i class="icon16 split"></i><?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
</b>
                        <span class="hint"><br><?php echo sprintf('Эта тема дизайна была загружена в виде архива или создана как дубликат другой темы. Обновление для данной темы недоступно, так как оригинальной темы дизайна с таким же идентификатором (<strong>%s</strong>) не существует.',$_smarty_tpl->tpl_vars['theme']->value['id']);?>
</span>
                    </li>
                </ul>
            </div>

        <?php }?>

        
        <div class="block  wa-theme-actions">
            <ul class="menu-v with-icons">
                <?php if (!empty($_smarty_tpl->tpl_vars['settings']->value['items'])){?>
                    
                    <li><a class="js-export-theme-settings" href="?module=design&amp;action=themeExportSettings&amp;theme=<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
"><i class="icon16 import"></i>Экспорт настроек темы</a><span class="hidden js-export-error hint flexbox"><span class="js-export-error-caption" style="color: red;"></span></span></li>
                    
                    <li><a class="js-import-theme-settings" href="#"><i class="icon16 export"></i>Импорт настроек темы</a></li>
                <?php }?>

                <?php if (!$_smarty_tpl->tpl_vars['_is_trial']->value){?>
                    <?php if (count($_smarty_tpl->tpl_vars['theme']->value->related_themes)>1){?>
                        <li><a class="theme-download" href="#"><i class="icon16 download"></i>Скачать архив с темой дизайна</a></li>

                    <?php }else{ ?>
                        <li><a href="?module=design&amp;action=themeDownload&amp;theme=<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
"><i class="icon16 download"></i>Скачать архив с темой дизайна <span class="hint nowrap">.tar.gz</span></a></li>
                    <?php }?>
                    <li><a class="theme-copy" href="#" data-related="<?php if (count($_smarty_tpl->tpl_vars['theme']->value->related_themes)>1){?>1<?php }else{ ?>0<?php }?>"><i class="icon16 split"></i>Создать клон темы</a></li>
                    <li><a class="theme-rename" href="#"><i class="icon16 edit"></i>Переименовать тему</a></li>
                    <li class="gray">
                        <i class="icon16 link"></i>Родительская тема дизайна:<br>
                        <strong><?php if ($_smarty_tpl->tpl_vars['theme']->value['parent_theme_id']){?><?php echo $_smarty_tpl->tpl_vars['theme']->value['parent_theme_id'];?>
<?php }else{ ?>не выбрана<?php }?></strong>.
                        <a class="theme-parent inline-link" href="javascript:void(0);"><b><i><?php if ($_smarty_tpl->tpl_vars['theme']->value['parent_theme_id']){?>Сменить<?php }else{ ?>Выбрать<?php }?></i></b></a>
                        <div class="hint">Сменить тему можно в настройках поселения.</div>
                    </li>

                    <?php if (empty($_smarty_tpl->tpl_vars['theme_warning_requirements']->value)&&empty($_smarty_tpl->tpl_vars['theme_original_warning_requirements']->value)){?>
                        <?php $_smarty_tpl->tpl_vars['_reset_is_disabled'] = new Smarty_variable(false, null, 0);?>
                        <?php $_smarty_tpl->tpl_vars['_reset_disabled_alert'] = new Smarty_variable(null, null, 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['theme']->value['type']!=waTheme::OVERRIDDEN){?>
                            <?php $_smarty_tpl->tpl_vars['_reset_is_disabled'] = new Smarty_variable(true, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_reset_disabled_alert'] = new Smarty_variable(_ws('You did not apply customizations to this theme yet, and thus there is nothing to revert.'), null, 0);?>
                        <?php }?>

                        <?php if (!$_smarty_tpl->tpl_vars['theme']->value['path_original']&&$_smarty_tpl->tpl_vars['theme']->value['type']==waTheme::CUSTOM){?>
                            <?php $_smarty_tpl->tpl_vars['_reset_is_disabled'] = new Smarty_variable(true, null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_reset_disabled_alert'] = new Smarty_variable(_ws('Design theme was not installed from Webasyst Store.'), null, 0);?>
                        <?php }?>

                        <li class="top-padded">
                            <a class="theme-reset<?php if ($_smarty_tpl->tpl_vars['_reset_is_disabled']->value){?> disabled<?php }?>" href="#" title="Все изменения, которые вы вносили в тему дизайна, будут потеряны. Сбросить все изменения?"<?php if ($_smarty_tpl->tpl_vars['_reset_disabled_alert']->value){?> onClick="window.alert('<?php echo $_smarty_tpl->tpl_vars['_reset_disabled_alert']->value;?>
');"<?php }?>><i class="icon16 broom"></i>Сбросить все изменения</a>
                            <?php if ($_smarty_tpl->tpl_vars['theme']->value['path_original']&&$_smarty_tpl->tpl_vars['theme']->value['type']!=waTheme::OVERRIDDEN){?>
                                <span class="hint">Вы используете исходную версию темы дизайна. Изменения в шаблоны темы дизайна еще не вносились, поэтому пока еще нет изменений, которые можно было бы сбросить.</span>
                            <?php }elseif($_smarty_tpl->tpl_vars['theme']->value['path_original']){?>
                                <span class="hint">Очистить все изменения, которые вы вносили в тему дизайна с помощью редактора дизайна, и вернуть тему дизайна к исходному состоянию</span>
                            <?php }?>
                        </li>
                    <?php }?>

                <?php }?>
                <li class="top-padded">
                    <a class="theme-delete<?php if ($_smarty_tpl->tpl_vars['theme']->value['system']){?> disabled<?php }?>" href="#" data-confirm="Тема будет удалена без возможности восстановления. Удалить?" data-success="Тема дизайна удалена."><i class="icon16 delete"></i>Удалить тему</a>
                    <?php if ($_smarty_tpl->tpl_vars['theme']->value['system']){?><span class="hint">Эта тема дизайна не может быть удалена</span><?php }?>
                </li>
            </ul>
        </div>

        
        <div class="block wa-theme-usage fields">

            <?php if (count($_smarty_tpl->tpl_vars['theme_routes']->value)){?><h4 class="heading">Использование темы</h4><?php }?>

            <div class="field">
                <div class="name">
                    ID темы
                </div>
                <div class="value">
                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>

                </div>
            </div>

            <div class="field">
                <div class="name">
                    Версия темы
                </div>
                <div class="value">
                    <?php echo $_smarty_tpl->tpl_vars['theme']->value['version'];?>

                </div>
            </div>

            <?php if (!$_smarty_tpl->tpl_vars['_is_trial']->value){?>
                <div class="field">
                    <div class="name">
                        Путь к папке темы
                    </div>
                    <div class="value">
                        <?php if ($_smarty_tpl->tpl_vars['theme']->value['type']==waTheme::ORIGINAL){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['original'], ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><strong><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['custom'], ENT_QUOTES, 'UTF-8', true);?>
</strong><?php }?>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['theme']->value['type']!=waTheme::ORIGINAL){?>
                        <div class="value hint">
                            Последнее изменение: <strong><?php echo smarty_modifier_wa_datetime($_smarty_tpl->tpl_vars['theme']->value['mtime'],"humandatetime");?>
</strong>
                        </div>
                    <?php }?>
                </div>

                <?php if (count($_smarty_tpl->tpl_vars['theme_routes']->value)){?>
                    <div class="field">
                        <div class="name">
                            Использование темы
                        </div>

                        <?php $_smarty_tpl->tpl_vars['_theme_usages'] = new Smarty_variable(array(), null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['_r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme_routes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_r']->key => $_smarty_tpl->tpl_vars['_r']->value){
$_smarty_tpl->tpl_vars['_r']->_loop = true;
?>
                            <div class="value">
                                <?php if ($_smarty_tpl->tpl_vars['_r']->value['_domain']!=$_smarty_tpl->tpl_vars['wa']->value->get('domain')&&$_smarty_tpl->tpl_vars['_r']->value['_id']!=$_smarty_tpl->tpl_vars['wa']->value->get('route')){?>
                                    <?php $_smarty_tpl->createLocalArrayVariable('_theme_usages', null, 0);
$_smarty_tpl->tpl_vars['_theme_usages']->value[] = htmlspecialchars(((string)$_smarty_tpl->tpl_vars['_r']->value['_domain'])."/".((string)$_smarty_tpl->tpl_vars['_r']->value['url']));?>
                                <?php }?>
                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_r']->value['_url'];?>
" class="no-underline bold"><?php echo $_smarty_tpl->tpl_vars['_r']->value['_domain_decoded'];?>
/<?php echo $_smarty_tpl->tpl_vars['_r']->value['url'];?>
 <i class="icon10 new-window"></i></a>
                            </div>
                        <?php } ?>

                    </div>
                <?php }?>

                <?php if (count($_smarty_tpl->tpl_vars['theme_routes']->value)>1){?>
                    <p class="gray small">
                        <i class="icon10 exclamation"></i> <?php echo sprintf('Изменение настроек темы дизайна «%s» затронет все перечисленные поселения приложения. Если вы хотите сохранить индивидуальный дизайн для каждого поселения, используйте отдельные копии (дубликаты) темы дизайна.',htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true));?>

                    </p>
                <?php }?>
            <?php }?>

        </div>
    </div>

    
    <div class="wa-theme-content content right250px">
        
        <?php if (($_smarty_tpl->tpl_vars['theme_routes']->value||$_smarty_tpl->tpl_vars['_is_trial']->value)&&!empty($_smarty_tpl->tpl_vars['settings']->value['items'])){?>
            <div class="wa-theme-navigation js-theme-navigation">
                
                <div class="wa-theme-expand-collapse">
                    <a href="javascript:void(0);" class="inline-link js-expand-collapse-all">
                        <div class="wa-theme-expand-icon-wrapper">
                            <i class="icon16"></i>
                        </div>
                        <b><i class="js-action-text"></i></b>
                    </a>
                </div>
                
                <div class="wa-theme-search-settings">
                    <input type="search" class="wa-theme-search-input js-search-setting" autocomplete="off" placeholder="Найти настройку" />
                </div>
                
                <div class="wa-theme-hidden-settings js-hidden-settings-wrapper" style="display: none;">
                    <label>
                        <input type="checkbox" class="js-show-invisible-settings" />
                        Показать скрытые настройки
                    </label>
                </div>
                <?php if (!empty($_smarty_tpl->tpl_vars['global_group_divideres']->value)){?>
                    <div class="wa-theme-anchors js-anchors">
                        <?php  $_smarty_tpl->tpl_vars['_divider_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_divider_name']->_loop = false;
 $_smarty_tpl->tpl_vars['_divider_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['global_group_divideres']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_divider_name']->key => $_smarty_tpl->tpl_vars['_divider_name']->value){
$_smarty_tpl->tpl_vars['_divider_name']->_loop = true;
 $_smarty_tpl->tpl_vars['_divider_id']->value = $_smarty_tpl->tpl_vars['_divider_name']->key;
?>
                            <a href="javascript:void(0);" class="wa-setting-anchor inline-link js-anchor-item" data-divider-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_divider_id']->value, ENT_QUOTES, 'UTF-8', true);?>
"><b><i><?php echo strip_tags($_smarty_tpl->tpl_vars['_divider_name']->value);?>
</i></b></a>
                        <?php } ?>
                        <?php if (trim($_smarty_tpl->tpl_vars['theme']->value['about'])){?>
                            <a href="javascript:void(0);" class="wa-other-anchor inline-link js-other-anchor-item" data-other-id="theme-about"><b><i>Информация о теме</i></b></a>
                        <?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['theme']->value['thumbs'])){?>
                            <a href="javascript:void(0);" class="wa-other-anchor inline-link js-other-anchor-item" data-other-id="theme-thumb"><b><i>Эскизы изображений</i></b></a>
                        <?php }?>
                    </div>
                <?php }?>
            </div>
        <?php }?>

        <?php if (!$_smarty_tpl->tpl_vars['theme_routes']->value&&!$_smarty_tpl->tpl_vars['_is_trial']->value){?>

            
            <?php if ($_smarty_tpl->tpl_vars['wa']->value->get('just_installed')){?>
                <p class="bold successmsg"><i class="icon16 yes"></i><?php echo sprintf(_ws('%s design theme has been successfully installed. Start using this theme by clicking the button below.'),htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true));?>
</p>
            <?php }else{ ?>
                <p>
                    <?php echo sprintf(_ws('%s design theme is currently not in use on your websites.'),htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true));?>

                </p>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['cover']->value){?>
                <p>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['cover']->value;?>
" class="wa-theme-cover" />
                </p>
            <?php }?>

            <?php if (!empty($_smarty_tpl->tpl_vars['theme_warning_requirements']->value)){?>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['requirement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['requirement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme_warning_requirements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['requirement']->key => $_smarty_tpl->tpl_vars['requirement']->value){
$_smarty_tpl->tpl_vars['requirement']->_loop = true;
?>
                        <li><b><?php echo $_smarty_tpl->tpl_vars['requirement']->value['warning'];?>
</b></li>
                    <?php } ?>
                </ul>
            <?php }elseif(!empty($_smarty_tpl->tpl_vars['theme_original_warning_requirements']->value)){?>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['requirement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['requirement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme_original_warning_requirements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['requirement']->key => $_smarty_tpl->tpl_vars['requirement']->value){
$_smarty_tpl->tpl_vars['requirement']->_loop = true;
?>
                        <li><b><?php echo $_smarty_tpl->tpl_vars['requirement']->value['warning'];?>
</b></li>
                    <?php } ?>
                </ul>
            <?php }elseif(!empty($_smarty_tpl->tpl_vars['theme_parent_warning_requirements']->value)){?>
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['requirement'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['requirement']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme']->value['parent_theme']->getWarningRequirements(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['requirement']->key => $_smarty_tpl->tpl_vars['requirement']->value){
$_smarty_tpl->tpl_vars['requirement']->_loop = true;
?>
                        <li><b><?php echo $_smarty_tpl->tpl_vars['requirement']->value['warning'];?>
</b></li>
                    <?php } ?>
                </ul>
            <?php }else{ ?>
                <p style="line-height: 2.2em;">
                    <a id="theme-start-using" href="#" class="button green"><?php echo sprintf('Начать использовать тему «%s»',htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true));?>
</a>
                    <?php if (!empty($_smarty_tpl->tpl_vars['preview_url']->value)){?>
                        или
                        <span class="nowrap"><a class="wa-theme-preview" data-theme-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['preview_url']->value;?>
">открыть предпросмотр</a> <i class="icon10 new-window" style="margin-top: 0.8em;"></i></span>
                    <?php }?>
                </p>
            <?php }?>
        <?php }else{ ?>

            
            <?php if (!empty($_smarty_tpl->tpl_vars['settings']->value['items'])){?>
                <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/farbtastic/farbtastic.js"></script>
                <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/farbtastic/farbtastic.css" type="text/css" />

                <iframe style="display: none" id="theme-settings-iframe" name="theme-settings-iframe"></iframe>
                <form id="theme-settings" method="post" action="?module=design&action=themeSettings&theme=<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
" enctype="multipart/form-data" target="theme-settings-iframe">
                    <?php echo $_smarty_tpl->tpl_vars['wa']->value->csrf();?>

                    <br>
                    <div class="wa-theme-search-min-symbol bold js-search-min-symbol" style="display: none;">Минимум 3 символа</div>
                    <div class="wa-theme-search-result js-search-result" style="display: none;">Результаты поиска:</div>
                    <div class="wa-theme-search-no-result js-search-no-result" style="display: none;">Настройки не найдены</div>

                    <div class="wa-theme-settings-list fields form js-settings-list">
                        <?php  $_smarty_tpl->tpl_vars['setting'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['setting']->_loop = false;
 $_smarty_tpl->tpl_vars['s_var'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['settings']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['setting']->key => $_smarty_tpl->tpl_vars['setting']->value){
$_smarty_tpl->tpl_vars['setting']->_loop = true;
 $_smarty_tpl->tpl_vars['s_var']->value = $_smarty_tpl->tpl_vars['setting']->key;
?>
                            <?php smarty_template_function__renderThemeSetting($_smarty_tpl,array('_setting_var'=>$_smarty_tpl->tpl_vars['s_var']->value,'_setting'=>$_smarty_tpl->tpl_vars['setting']->value));?>

                        <?php } ?>

                        <div class="wa-design-save-panel block bordered-top">
                            <input type="submit" class="button green js-submit" value="Сохранить">
                            <span id="theme-settings-message" style="display: none"><i class="icon16 yes" style="margin-top: 0.5em;"></i> Сохранено</span>
                            <span id="theme-settings-error" class="errormsg" style="display: inline"></span>
                        </div>
                    </div>
                </form>
            <?php }else{ ?>
                <p>
                    <br>
                    <em><?php echo sprintf('Тема дизайна «%s» не предоставляет опций для настройки внешнего вида. Используйте редактор шаблонов дизайна для настройки оформления.',htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true));?>
</em>
                </p>
            <?php }?>

        <?php }?>

    <div class="wa-theme-other">
        
        <?php if (trim($_smarty_tpl->tpl_vars['theme']->value['about'])){?>
            <div class="wa-theme-other-data js-theme-other-data" data-id="theme-about">
                <h4 class="label js-other-label"><i class="icon16 rarr"></i>Информация о теме</h4>
                <div class="content js-other-content" style="display: none;">
                    <?php echo $_smarty_tpl->tpl_vars['theme']->value['about'];?>

                </div>
            </div>
        <?php }?>

        
        <?php if (!empty($_smarty_tpl->tpl_vars['theme']->value['thumbs'])){?>
            <div class="wa-theme-other-data js-theme-other-data" data-id="theme-thumb">
                <h4 class="label js-other-label"><i class="icon16 rarr"></i>Эскизы изображений</h4>
                <div class="content js-other-content" style="display: none;">
                    <p>Эта тема дизайна использует эскизы изображений перечисленных ниже размеров. Если в настройках вашего приложения возможность автоматического создания эскизов «на лету» отключена, убедитесь, что все указанные размеры добавлены в список разрешенных. Если создание эскизов «на лету» разрешено, изображения указанных ниже размеров будут создаваться автоматически.</p>
                    <ul class="bold" style="line-height: 1.5em;">
                        <?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['t']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme']->value['thumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
$_smarty_tpl->tpl_vars['t']->_loop = true;
?>
                            <li><?php echo $_smarty_tpl->tpl_vars['t']->value;?>
</li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php }?>
    </div>

    <div class="clear-both"></div>

</div>


<?php /*  Call merged included template "./ThemeDialogs.inc.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('./ThemeDialogs.inc.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '33380065663670a1c2f7e6-34665459');
content_663670a390c544_67621834($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./ThemeDialogs.inc.html" */?>

</div>

<?php $_smarty_tpl->tpl_vars['_locale'] = new Smarty_variable(array('will_be_lost'=>_ws('All customizations you’ve made to this file will be lost!'),'update_notice'=>mb_strtoupper(_ws('All selected files will be overwritten with their newest versions from the original theme. In case of incompatibility between your customizations and newer theme templates, CSS, and images, your site looks may change unexpectedly. There will be no way to automatically rollback this update. Update?')),'expand_all'=>_ws('Expand all'),'collapse_all'=>_ws('Collapse all'),'expand'=>_ws('Expand'),'collapse'=>_ws('Collapse')), null, 0);?>
<script>
    (function ($) {
        new WAThemeSettings({
            $wrapper: $("#<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"),
            theme_id: <?php echo json_encode($_smarty_tpl->tpl_vars['theme']->value['id']);?>
,
            theme_routes: <?php echo json_encode($_smarty_tpl->tpl_vars['theme_routes']->value);?>
,
            has_child_themes: !<?php echo json_encode(empty($_smarty_tpl->tpl_vars['child_themes']->value));?>
,
            design_url: <?php echo json_encode($_smarty_tpl->tpl_vars['design_url']->value);?>
,
            locale: <?php echo json_encode($_smarty_tpl->tpl_vars['_locale']->value);?>
,
            wa_url: <?php echo json_encode($_smarty_tpl->tpl_vars['wa_url']->value);?>

        });
    })(jQuery);
</script>

<div class="wa-design-scroll-action" id="wa-design-scroll-top">
    <div class="icon-wrapper">
        <div class="icon-to-top"></div>
    </div>
    Наверх
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:30:11
         compiled from "C:\OSPanel\domains\tovarka\wa-system\design\templates-legacy\ThemeDialogs.inc.html" */ ?>
<?php if ($_valid && !is_callable('content_663670a390c544_67621834')) {function content_663670a390c544_67621834($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\OSPanel\\domains\\tovarka\\wa-system\\vendors\\smarty3\\plugins\\modifier.truncate.php';
?>

<div class="width650px height400px" id="wa-theme-update-dialog"></div>

<div class="dialog width500px height200px" id="wa-theme-reset-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <form>
            <div class="dialog-content">
                <div class="dialog-content-indent">
                    <h1>Восстановить из исходной версии</h1>
                    <p><i class="icon10 exclamation"></i> Очистить все изменения, которые вы вносили в тему дизайна с помощью редактора дизайна, и вернуть тему дизайна к исходному состоянию?</p>

                    <?php if ($_smarty_tpl->tpl_vars['theme']->value['parent_theme']&&$_smarty_tpl->tpl_vars['theme']->value['parent_theme']['type']==waTheme::OVERRIDDEN){?>
                        <label>
                            <input type="checkbox" name="parent" value="1"> <?php echo sprintf("Также сбросить все изменения, которые вносились в родительскую тему дизайна <strong>%s</strong>",$_smarty_tpl->tpl_vars['theme']->value['parent_theme_id']);?>

                        </label>
                    <?php }?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dialog-buttons">
                <div class="dialog-buttons-gradient">
                    <input type="hidden" name="theme" value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
">
                    <input type="submit" class="button red" value="Восстановить из исходной версии">
                    или <a href="#/design/themes/" class="cancel">отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="dialog width600px height300px" id="wa-theme-start-using-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <form>
            <div class="dialog-content">
                <div class="dialog-content-indent">
                    <h1><?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
</h1>
                    <p><?php echo sprintf("Подключите тему дизайна к одному из существующих поселений приложения «%s» или создайте новое правило маршрутизации:",$_smarty_tpl->tpl_vars['app']->value['name']);?>
</p>

                    <div class="fields width100px form">
                        <div class="field">
                            <div class="name">Выберите правило</div>
                            <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['routes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['r']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
 $_smarty_tpl->tpl_vars['r']->index++;
 $_smarty_tpl->tpl_vars['r']->first = $_smarty_tpl->tpl_vars['r']->index === 0;
?>
                                <div class="value no-shift">
                                    <label>
                                        <input name="route" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['_domain'];?>
|<?php echo $_smarty_tpl->tpl_vars['r']->value['_id'];?>
" type="radio" <?php if ($_smarty_tpl->tpl_vars['r']->first){?>checked<?php }?>>
                                        <?php echo waIdna::dec($_smarty_tpl->tpl_vars['r']->value['_domain']);?>
/<?php echo $_smarty_tpl->tpl_vars['r']->value['url'];?>

                                        <span class="hint"><?php if (isset($_smarty_tpl->tpl_vars['r']->value['theme'])){?><?php echo $_smarty_tpl->tpl_vars['r']->value['theme'];?>
<?php }else{ ?>default<?php }?></span>
                                    </label>
                                </div>
                                <?php }
if (!$_smarty_tpl->tpl_vars['r']->_loop) {
?>
                                <div class="value gray">
                                    <?php echo sprintf('На этом сайте нет поселений приложения «%s».',$_smarty_tpl->tpl_vars['app']->value['name']);?>

                                </div>
                            <?php } ?>
                        </div>
                        <div class="field">
                            <div class="name">Новое правило</div>
                            <div class="value">
                                <input name="route" id="create-new-route-choice" value="new" type="radio"<?php if (!count($_smarty_tpl->tpl_vars['routes']->value)){?> checked<?php }?>>

                                <?php if (count($_smarty_tpl->tpl_vars['domains']->value)==1){?>
                                    <input name="domain" type="hidden" value="<?php echo current($_smarty_tpl->tpl_vars['domains']->value);?>
">
                                    <?php echo current($_smarty_tpl->tpl_vars['domains']->value);?>
/<?php }else{ ?>
                                    <select name="domain" class="create-new-route-control">
                                        <?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['domains']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['d']->value;?>
"><?php echo smarty_modifier_truncate(str_replace('www.','',$_smarty_tpl->tpl_vars['d']->value),23,'...',false,true);?>
</option>
                                        <?php } ?>
                                    </select>/
                                <?php }?>
                                <input type="text" name="url" value="" placeholder="*" class="short create-new-route-control">
                            </div>
                        </div>

                        <div class="field">
                            <div class="value">
                                <label>
                                    <input type="checkbox" name="mobile_only" value="1" <?php if ($_smarty_tpl->tpl_vars['theme']->value['id']=='mobile'){?>checked<?php }?>>
                                    Использовать только для мобильных устройств
                                </label>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="clear"></div>
            </div>
            <div class="dialog-buttons">
                <div class="dialog-buttons-gradient">
                    <input type="hidden" name="theme" value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
">
                    <input type="submit" class="button green" value="<?php echo sprintf("Начать использовать тему «%s»",$_smarty_tpl->tpl_vars['theme']->value['name']);?>
">
                    или <a href="#" class="cancel">отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="dialog height250px" id="wa-theme-name-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <form>
            <div class="dialog-content">
                <div class="dialog-content-indent">
                    <h1>Переименовать тему</h1>
                    <span class="wa-theme-dialog-error" style="color: red;font-weight: bold;"></span>
                    <div class="fields form">
                        <div class="field">
                            <div class="name">
                                Название темы
                            </div>
                            <div class="value">
                                <input type="text" id="wa-theme-rename-name" name="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" >
                            </div>
                        </div>
                        <div class="field">
                            <div class="name">
                                ID темы
                            </div>
                            <div class="value">
                                <?php echo $_smarty_tpl->tpl_vars['path']->value;?>
/<input type="text" id="wa-theme-rename-id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
"  class="bold">
                            </div>
                            <div class="value">
                                <p class="small"><i class="icon10 exclamation"></i> ВАЖНО: изменяйте ID темы, только если вы полностью уверены в своих действиях. Если эта тема используется в ваших сайтах, вам придется вручную обновить настройки этих сайтов для использования этой или другой темы после изменения ID темы. В противном случае ваши сайты могут оказаться нерабочими из-за ошибки «Невозможно загрузить файл шаблона».</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dialog-buttons">
                <div class="dialog-buttons-gradient">
                    <input type="submit" class="button green" value="Сохранить">
                    или <a href="#/design/themes/" class="cancel">отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="dialog height200px" id="wa-theme-copy-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <form>
            <div class="dialog-content">
                <div class="dialog-content-indent">
                    <h1>Создать клон темы</h1>
                    <div class="fields form">
                        <div class="field">
                            <div class="name">
                                Название темы
                            </div>
                            <div class="value">
                                <input type="text" id="wa-theme-copy-name" name="name" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 1" >
                            </div>
                        </div>
                        <div class="field">
                            <div class="name">
                                ID темы
                            </div>
                            <div class="value">
                                <input type="text" id="wa-theme-copy-id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
1"  class="bold">
                            </div>
                        </div>
                        <div class="field">
                            <div class="name">
                                Клонировать темы
                            </div>
                            <div class="value no-shift">
                                <label><strong><input name="related" type="radio" value="1" checked="checked">&nbsp;<?php echo htmlspecialchars((string)sprintf('Тема «%s» для всех приложений (рекомендуется)',$_smarty_tpl->tpl_vars['theme']->value['name']), ENT_QUOTES, 'UTF-8', true);?>
</strong></label>
                            </div>
                            <div class="value no-shift">
                                <label><input name="related" type="radio" value="0">&nbsp;<?php echo htmlspecialchars((string)sprintf('Тема «%s» только для приложения «%s»',$_smarty_tpl->tpl_vars['theme']->value['name'],ifempty($_smarty_tpl->tpl_vars['apps']->value[$_smarty_tpl->tpl_vars['theme']->value['app']]['name'],$_smarty_tpl->tpl_vars['theme']->value['app'])), ENT_QUOTES, 'UTF-8', true);?>
</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dialog-buttons">
                <div class="dialog-buttons-gradient">
                    <input type="submit" class="button green" value="Создать клон темы">
                    или <a href="#/design/themes/" class="cancel">отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="dialog height300px" id="wa-theme-download-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <form>
            <div class="dialog-content">
                <div class="dialog-content-indent">
                    <h1><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1>
                    <ul class="menu-v with-icons">
                        <?php  $_smarty_tpl->tpl_vars['related_theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['related_theme']->_loop = false;
 $_smarty_tpl->tpl_vars['related_theme_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['theme']->value['related_themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['related_theme']->key => $_smarty_tpl->tpl_vars['related_theme']->value){
$_smarty_tpl->tpl_vars['related_theme']->_loop = true;
 $_smarty_tpl->tpl_vars['related_theme_id']->value = $_smarty_tpl->tpl_vars['related_theme']->key;
?>
                            <li<?php if (($_smarty_tpl->tpl_vars['theme']->value['app_id']==$_smarty_tpl->tpl_vars['related_theme']->value['app_id'])||($_smarty_tpl->tpl_vars['theme']->value['parent_theme_id']==$_smarty_tpl->tpl_vars['related_theme_id']->value)){?> class="bold"<?php }?>><a href="?module=design&amp;action=themeDownload&amp;theme=<?php echo $_smarty_tpl->tpl_vars['related_theme']->value['id'];?>
&amp;app_id=<?php echo $_smarty_tpl->tpl_vars['related_theme']->value['app_id'];?>
"><i class="icon16 download"></i><?php echo htmlspecialchars((string)sprintf('Тема «%s» (версия %s) для приложения «%s»',$_smarty_tpl->tpl_vars['related_theme']->value['name'],$_smarty_tpl->tpl_vars['related_theme']->value['version'],ifempty($_smarty_tpl->tpl_vars['apps']->value[$_smarty_tpl->tpl_vars['related_theme']->value['app_id']]['name'],$_smarty_tpl->tpl_vars['related_theme']->value['app'])), ENT_QUOTES, 'UTF-8', true);?>
 <span class="hint nowrap">.tar.gz</span></a></li>
                        <?php } ?>

                    </ul>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dialog-buttons">
                <div class="dialog-buttons-gradient">
                    <a href="#/design/themes/" class="cancel button">Закрыть</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="dialog width650px height250px" id="wa-theme-parent-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <form>
            <div class="dialog-content">
                <div class="dialog-content-indent">
                    <h1>Родительская тема дизайна</h1>
                    <span class="wa-theme-dialog-error" style="color: red;font-weight: bold;"></span>
                    <div class="fields form">
                        <div class="field">
                            <div class="name">
                                Сменить родительскую тему
                            </div>
                            <div class="value">
                                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
">
                                <select name="parent_theme_id">
                                    <option value=""<?php if (!$_smarty_tpl->tpl_vars['theme']->value['parent_theme_id']){?> selected="selected"<?php }?>>Не задана</option>
                                    <?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['info']->_loop = false;
 $_smarty_tpl->tpl_vars['app_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['parent_themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value){
$_smarty_tpl->tpl_vars['info']->_loop = true;
 $_smarty_tpl->tpl_vars['app_id']->value = $_smarty_tpl->tpl_vars['info']->key;
?>
                                        <optgroup label="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['info']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo $_smarty_tpl->tpl_vars['app_id']->value;?>
">
                                            <?php  $_smarty_tpl->tpl_vars['theme_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme_name']->_loop = false;
 $_smarty_tpl->tpl_vars['parent_theme_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['info']->value['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme_name']->key => $_smarty_tpl->tpl_vars['theme_name']->value){
$_smarty_tpl->tpl_vars['theme_name']->_loop = true;
 $_smarty_tpl->tpl_vars['parent_theme_id']->value = $_smarty_tpl->tpl_vars['theme_name']->key;
?>
                                                <?php $_smarty_tpl->tpl_vars['parent_theme_id'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['app_id']->value).":".((string)$_smarty_tpl->tpl_vars['parent_theme_id']->value), null, 0);?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['parent_theme_id']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['parent_theme_id']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['parent_theme_id']->value==$_smarty_tpl->tpl_vars['theme']->value['parent_theme_id']){?> selected="selected"<?php }elseif(($_smarty_tpl->tpl_vars['parent_theme_id']->value==((string)$_smarty_tpl->tpl_vars['theme']->value['app_id']).":".((string)$_smarty_tpl->tpl_vars['theme']->value['id']))||($_smarty_tpl->tpl_vars['parent_theme_id']->value==$_smarty_tpl->tpl_vars['theme']->value['id'])){?> disabled="disabled"<?php }?>><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme_name']->value, ENT_QUOTES, 'UTF-8', true);?>
 (<?php echo $_smarty_tpl->tpl_vars['parent_theme_id']->value;?>
)</option>
                                            <?php } ?>
                                        </optgroup>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="value">
                                <p class="small"><i class="icon10 exclamation"></i>ВАЖНО: Подключение родительской темы позволит использовать в данной теме дизайна HTML-шаблоны, CSS-стили и изображения из родительской темы. Если родительская тема уже задана, то имейте ввиду, что ее смена может привести к ошибкам доступа к уже используемым файлам родительской темы. Для любой темы дизайна можно задать не более одной родительской темы.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dialog-buttons">
                <div class="dialog-buttons-gradient">
                    <input type="submit" class="button green" value="Сохранить">
                    или <a href="#/design/themes/" class="cancel">отмена</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="dialog width600px height200px" id="wa-theme-import-settings-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <div class="block double-padded wa-theme-settings-import-message">Текущие настройки дизайна будут потеряны в ходе импорта. Экспортируйте текущие настройки до импорта, чтобы восстановить их при необходимости.</div>
        <form>
            <div class="dialog-content">
                <div class="dialog-content-indent">
                    <h1>Импорт настроек темы</h1>
                    <div class="fields form">
                        <div class="field">
                            <div class="name">
                                Выберите архив
                            </div>
                            <div class="value">
                                <div class="js-input-wrapper">
                                    <input type="file" name="theme_settings" accept=".gz">
                                    <div class="hint">Выберите файл в формате TAR.GZ</div>
                                </div>
                                <div class="wa-archive-name js-archive-name"></div>
                            </div>
                        </div>
                        <div class="wa-theme-settings-import-dialog-error js-error-place"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="dialog-buttons">
                <div class="dialog-buttons-gradient">
                    <input type="submit" class="button green" value="Импорт" disabled="disabled">
                    или <a href="#/design/themes/" class="cancel">отмена</a>
                    <i class="icon16 loading" style="vertical-align: middle; margin-left: 6px; display: none;"></i>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="dialog width600px height300px" id="wa-theme-blocking-removal-dialog">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <div class="dialog-content block double-padded">
            <h1>Удаление темы дизайна невозможно</h1>
            <ol style="<?php if (!empty($_smarty_tpl->tpl_vars['theme_routes']->value)&&!empty($_smarty_tpl->tpl_vars['child_themes']->value)){?>padding-left: 16px;<?php }else{ ?>padding-left: 0;list-style: none;<?php }?>">
                <?php if (!empty($_smarty_tpl->tpl_vars['theme_routes']->value)){?>
                    <li>
                        <p>
                            Эта тема дизайна еще используется на вашем сайте.<br>
                            Чтобы удалить тему дизайна, сначала смените ее на другую тему в настройках следующих поселений:
                        </p>
                        <ul>
                            <?php  $_smarty_tpl->tpl_vars['_r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['theme_routes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_r']->key => $_smarty_tpl->tpl_vars['_r']->value){
$_smarty_tpl->tpl_vars['_r']->_loop = true;
?>
                                <li>
                                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['_r']->value['_url'];?>
" class="no-underline"><?php echo $_smarty_tpl->tpl_vars['_r']->value['_domain_decoded'];?>
/<?php echo $_smarty_tpl->tpl_vars['_r']->value['url'];?>
 <i class="icon10 new-window"></i></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['child_themes']->value)){?>
                    <li>
                        <p>
                            Эта тема дизайна является родительской, и у нее есть дочерние темы.<br>
                            Удалите дочерние темы дизайна или выберите для них другую родительскую.
                        </p>
                        <ul class="zebra">
                            <?php  $_smarty_tpl->tpl_vars['_theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['child_themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_theme']->key => $_smarty_tpl->tpl_vars['_theme']->value){
$_smarty_tpl->tpl_vars['_theme']->_loop = true;
?>
                                <li><?php echo sprintf('Тема «%s» для приложения «%s»',htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['name'], ENT_QUOTES, 'UTF-8', true),htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['app_name'], ENT_QUOTES, 'UTF-8', true));?>
</li>
                            <?php } ?>
                        </ul>
                    </li>
                <?php }?>
            </ol>
            <div class="clear"></div>
        </div>
        <div class="dialog-buttons">
            <div class="dialog-buttons-gradient">
                <input type="submit" class="cancel button" value="Закрыть">
            </div>
        </div>
    </div>
</div>
<?php }} ?>