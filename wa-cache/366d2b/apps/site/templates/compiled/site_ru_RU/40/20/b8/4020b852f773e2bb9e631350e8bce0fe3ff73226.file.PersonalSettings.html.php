<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:30:32
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\templates\actions-legacy\personal\PersonalSettings.html" */ ?>
<?php /*%%SmartyHeaderCode:731503850663670b81b9850-05520488%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4020b852f773e2bb9e631350e8bce0fe3ff73226' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\templates\\actions-legacy\\personal\\PersonalSettings.html',
      1 => 1667983931,
      2 => 'file',
    ),
    'fd29350173d52b37ddce833de29409e64e1b2dcc' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\templates\\actions-legacy\\personal\\PersonalSettingsHelpers.inc.html',
      1 => 1624000810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '731503850663670b81b9850-05520488',
  'function' => 
  array (
    'auth_endpoints_select' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'password_system' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'timeout' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'auth_by_login' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'email_settings' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'social_networks_settings' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'phone_settings' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'register_form' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
    'login_form' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'wrapper_class' => 0,
    'wrapper_id' => 0,
    'domain' => 0,
    'auth_endpoints' => 0,
    'auth_config' => 0,
    'no_channels' => 0,
    'domain_id' => 0,
    '_locale' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_663670ba28be66_55488487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_663670ba28be66_55488487')) {function content_663670ba28be66_55488487($_smarty_tpl) {?>
<?php /*  Call merged included template "./PersonalSettingsHelpers.inc.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./PersonalSettingsHelpers.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '731503850663670b81b9850-05520488');
content_663670b83a6268_54542891($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./PersonalSettingsHelpers.inc.html" */?>

<?php $_smarty_tpl->tpl_vars['wrapper_class'] = new Smarty_variable('s-personal-settings-wrapper', null, 0);?>
<?php $_smarty_tpl->tpl_vars['wrapper_id'] = new Smarty_variable(uniqid($_smarty_tpl->tpl_vars['wrapper_class']->value), null, 0);?>
<div class="<?php echo $_smarty_tpl->tpl_vars['wrapper_class']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['wrapper_id']->value;?>
">
    <h1 style="padding: 20px 20px 0 20px;"><?php echo sprintf('Настройки входа и регистрации на %s',htmlspecialchars((string)$_smarty_tpl->tpl_vars['domain']->value, ENT_QUOTES, 'UTF-8', true));?>
</h1>

    <?php if ($_smarty_tpl->tpl_vars['auth_endpoints']->value){?>
        
        <div class="fields">
            <div class="field" style="padding: 0 20px;">
                <div class="name">Личный кабинет пользователя</div>
                <div class="value">
                    <div class="s-ibutton-checkbox">
                        <ul class="menu-h s-ibutton-checkbox">
                            <li>
                                <div>
                                    <input id="s-auth-enabled" name="enabled" class="ibutton" type="checkbox"
                                        <?php if (!$_smarty_tpl->tpl_vars['auth_endpoints']->value){?> disabled="disabled"<?php }?>
                                        <?php if ($_smarty_tpl->tpl_vars['auth_config']->value['auth']){?> checked="checked"<?php }?>>
                                </div>
                            </li>
                            <li><label for="s-auth-enabled"><span id="s-personal-app-enabled-label">включен</span></label></li>
                        </ul>
                        <br>
                        <p<?php if ($_smarty_tpl->tpl_vars['auth_config']->value['auth']){?> style="display:none"<?php }?> class="gray"><i class="icon10 no-bw top-padded"></i> <?php echo sprintf('Регистрация пользователей, авторизация и личный кабинет выключены на сайте %s.',$_smarty_tpl->tpl_vars['domain']->value);?>
</p>
                    </div>
                </div>
            </div>

            <form action="?module=personalSettingsSave">
                <div class="s-auth-content js-auth-content"<?php if (!$_smarty_tpl->tpl_vars['auth_config']->value['auth']){?> style="display:none"<?php }?>>

                    
                    <?php smarty_template_function_auth_endpoints_select($_smarty_tpl,array());?>


                    
                    <div class="s-big-label">
                        <h2>Способы входа и регистрации</h2>
                        <p>Настройте, как посетители будут входить и регистрироваться на сайте.</p>
                    </div>

                    
                    <?php smarty_template_function_password_system($_smarty_tpl,array());?>


                    
                    <?php smarty_template_function_timeout($_smarty_tpl,array());?>


                    <?php smarty_template_function_auth_by_login($_smarty_tpl,array());?>


                    
                    <div class="s-auth-methods js-auth-methods">
                        <table class="s-big-table">
                            <tbody>
                                
                                <?php smarty_template_function_email_settings($_smarty_tpl,array());?>


                                
                                <?php smarty_template_function_phone_settings($_smarty_tpl,array());?>


                                
                                <?php smarty_template_function_social_networks_settings($_smarty_tpl,array());?>

                            </tbody>
                        </table>
                    </div>
                    
                    <div class="s-big-label">
                        <h2>Формы входа и регистрации</h2>
                        <p>Настройте поля форм входа и регистрации, которые будут заполнять посетители сайта.</p>
                        <div class="s-auth-forms">
                            <table class="s-big-table">
                                <tbody>
                                    
                                    <?php smarty_template_function_register_form($_smarty_tpl,array());?>

                                    
                                    <?php smarty_template_function_login_form($_smarty_tpl,array());?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                
                <div class="s-form-buttons js-form-buttons blank"<?php if (!$_smarty_tpl->tpl_vars['auth_config']->value['auth']){?> style="display:none"<?php }?>>
                    <div class="s-footer-actions js-footer-actions">
                        <div class="fixed">
                            
                            <input class="button green js-submit-button" type="submit" name="" value="Сохранить">
                            <i class="icon16 loading s-loading" style="display: none;"></i>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        
        <div class="dialog s-minimum-auth-type-dialog" id="s-minimum-auth-type-dialog">
            <div class="dialog-background"> </div>
            <div class="dialog-window">
                <div class="dialog-content">
                    <div class="dialog-content-indent">
                        <h2>Нельзя отключать оба способа авторизации «Email» и «Телефон»</h2>
                        <p>Оставьте включенным хотя бы один из этих двух основных способов авторизации, чтобы посетители сайта могли входить в личный кабинет.</p>
                        <p>По умолчанию используется авторизация с помощью email-адреса.</p>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="dialog-buttons">
                    <div class="dialog-buttons-gradient">
                        <a href="javascript:void(0);" class="button cancel">Закрыть</a>
                    </div>
                </div>
            </div>
        </div>

        <?php $_smarty_tpl->tpl_vars['_locale'] = new Smarty_variable(array('enabled'=>_w('Enabled'),'disabled'=>_w('Disabled'),'login_names'=>array('email'=>_w('Email'),'phone'=>_w('Phone'),'email_or_phone'=>_w('Email or phone'))), null, 0);?>

        <script type="text/javascript">
            $(function () {
                new SitePersonalSettings({
                    $wrapper: $('#<?php echo $_smarty_tpl->tpl_vars['wrapper_id']->value;?>
'),
                    no_channels: <?php echo json_encode($_smarty_tpl->tpl_vars['no_channels']->value);?>
,
                    $minimum_auth_type_dialog: $('#s-minimum-auth-type-dialog'),
                    domain_id: <?php echo json_encode($_smarty_tpl->tpl_vars['domain_id']->value);?>
,
                    locale: <?php echo json_encode($_smarty_tpl->tpl_vars['_locale']->value);?>

                });
            });
        </script>
    <?php }else{ ?>
        <p>Чтобы сделать доступной авторизацию на этом сайте, установите хотя бы одно приложение, которое поддерживает формы авторизации,  и настройте для него маршрутизацию.</p>
    <?php }?>
</div>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:30:32
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\templates\actions-legacy\personal\PersonalSettingsHelpers.inc.html" */ ?>
<?php if ($_valid && !is_callable('content_663670b83a6268_54542891')) {function content_663670b83a6268_54542891($_smarty_tpl) {?>
<?php if (!function_exists('smarty_template_function_auth_endpoints_select')) {
    function smarty_template_function_auth_endpoints_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['auth_endpoints_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

    <?php $_smarty_tpl->tpl_vars['_selected_route_url'] = new Smarty_variable('', null, 0);?>
    <?php $_smarty_tpl->tpl_vars['_selected_endpoint'] = new Smarty_variable(array(), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['_selected_app'] = new Smarty_variable(array(), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['_selected_app_id'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['_selected_app']->value['id'])===null||$tmp==='' ? '' : $tmp), null, 0);?>

    <?php if (!empty($_smarty_tpl->tpl_vars['auth_config']->value['route_url'])&&isset($_smarty_tpl->tpl_vars['auth_endpoints']->value[$_smarty_tpl->tpl_vars['auth_config']->value['route_url']])){?>
        <?php $_smarty_tpl->tpl_vars['_selected_endpoint'] = new Smarty_variable($_smarty_tpl->tpl_vars['auth_endpoints']->value[$_smarty_tpl->tpl_vars['auth_config']->value['route_url']], null, 0);?>
        <?php $_smarty_tpl->tpl_vars['_selected_route_url'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['auth_config']->value['route_url'])===null||$tmp==='' ? '' : $tmp), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['_selected_app'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['_selected_endpoint']->value['app'])===null||$tmp==='' ? array() : $tmp), null, 0);?>
    <?php }?>

    <div class="field">
        <div class="name">Раздел сайта для авторизации и регистрации</div>
        <div class="value">
            <div style="margin-bottom: 10px;">Выберите раздел сайта, в котором посетители будут регистрироваться и входить в личный кабинет.</div>
            <ul class="menu-h dropdown s-auth-apps-select js-auth-apps-select">
                <li>
                    <a class="inline-link s-selected-app" href="javascript:void(0);">
                        <img class="s-app16x16icon-menu-v js-selected-app-icon" src="<?php if ($_smarty_tpl->tpl_vars['_selected_app']->value){?><?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['_selected_app']->value['icon'][16];?>
<?php }?>">
                        <b><i>
                            <span class="js-selected-app-name">
                                <?php if ($_smarty_tpl->tpl_vars['_selected_app']->value){?>
                                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_selected_app']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 <span class="hint">(<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_selected_route_url']->value, ENT_QUOTES, 'UTF-8', true);?>
)</span>
                                <?php }else{ ?>
                                    Выберите приложение
                                <?php }?>
                            </span>
                        </i></b>&nbsp;<i class="icon10 darr"></i>
                    </a>

                    <div class="hint js-endpoint-login-url" style="margin-top: 6px;"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['_selected_endpoint']->value['login_url'])===null||$tmp==='' ? null : $tmp);?>
</div>
                    <div class="hint js-endpoint-signup-url"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['_selected_endpoint']->value['signup_url'])===null||$tmp==='' ? null : $tmp);?>
</div>

                    <ul class="menu-v with-icons" style="margin-top: 12px; min-width: 300px;">
                        <?php  $_smarty_tpl->tpl_vars['_endpoint'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_endpoint']->_loop = false;
 $_smarty_tpl->tpl_vars['_route_url'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['auth_endpoints']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_endpoint']->key => $_smarty_tpl->tpl_vars['_endpoint']->value){
$_smarty_tpl->tpl_vars['_endpoint']->_loop = true;
 $_smarty_tpl->tpl_vars['_route_url']->value = $_smarty_tpl->tpl_vars['_endpoint']->key;
?><?php $_smarty_tpl->tpl_vars['_app'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['_endpoint']->value['app'])===null||$tmp==='' ? array() : $tmp), null, 0);?><?php $_smarty_tpl->tpl_vars['_icon'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['wa_url']->value).((string)$_smarty_tpl->tpl_vars['_app']->value['icon'][16]), null, 0);?><li class="s-auth-app<?php if ($_smarty_tpl->tpl_vars['_selected_route_url']->value===$_smarty_tpl->tpl_vars['_route_url']->value){?> selected<?php }?>"><a class="js-auth-app" href="javascript:void(0);"data-route-url="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_route_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"data-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_app']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"data-name="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_app']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"data-icon="<?php echo $_smarty_tpl->tpl_vars['_icon']->value;?>
"data-login-url="<?php echo $_smarty_tpl->tpl_vars['_endpoint']->value['login_url'];?>
"data-signup-url="<?php echo $_smarty_tpl->tpl_vars['_endpoint']->value['signup_url'];?>
"><img class="s-app16x16icon-menu-v" src="<?php echo $_smarty_tpl->tpl_vars['_icon']->value;?>
"><span class="s-app-name"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_app']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 <span class="hint" title="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_route_url']->value, ENT_QUOTES, 'UTF-8', true);?>
">(<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_route_url']->value, ENT_QUOTES, 'UTF-8', true);?>
)</span></span><i class="shortener"></i></a></li><?php } ?>
                    </ul>
                    <input class="js-selected-app-id" type="hidden" name="route_url" value="<?php if ($_smarty_tpl->tpl_vars['_selected_route_url']->value){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_selected_route_url']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" />
                </li>
            </ul>
        </div>
    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<?php if (!function_exists('smarty_template_function_password_system')) {
    function smarty_template_function_password_system($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['password_system']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <div class="s-password-system">
        <div class="field-group">
            <div class="field">
                <div class="name">Система паролей</div>
                <div class="value no-shift-field">
                    <ul class="menu-v js-auth-type-select">
                        <?php $_smarty_tpl->tpl_vars['_auth_type'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['auth_config']->value['auth_type'])===null||$tmp==='' ? waAuthConfig::AUTH_TYPE_USER_PASSWORD : $tmp), null, 0);?>
                        <?php if ($_smarty_tpl->tpl_vars['no_channels']->value){?>
                            <?php $_smarty_tpl->tpl_vars['_auth_type'] = new Smarty_variable(waAuthConfig::AUTH_TYPE_USER_PASSWORD, null, 0);?>
                        <?php }?>
                        <?php  $_smarty_tpl->tpl_vars['_auth_type_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_auth_type_info']->_loop = false;
 $_smarty_tpl->tpl_vars['_auth_type_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['auth_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_auth_type_info']->key => $_smarty_tpl->tpl_vars['_auth_type_info']->value){
$_smarty_tpl->tpl_vars['_auth_type_info']->_loop = true;
 $_smarty_tpl->tpl_vars['_auth_type_id']->value = $_smarty_tpl->tpl_vars['_auth_type_info']->key;
?>
                            <?php $_smarty_tpl->tpl_vars['_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['_auth_type_info']->value['name'], null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_is_checked'] = new Smarty_variable($_smarty_tpl->tpl_vars['_auth_type']->value==$_smarty_tpl->tpl_vars['_auth_type_id']->value, null, 0);?>
                            <li class="js-auth-type">
                                <label>
                                    <input type="radio" name="auth_type" value="<?php echo $_smarty_tpl->tpl_vars['_auth_type_id']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['_is_checked']->value){?> checked="checked"<?php }?><?php if ($_smarty_tpl->tpl_vars['no_channels']->value&&!$_smarty_tpl->tpl_vars['_is_checked']->value){?> disabled<?php }?>>
                                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_name']->value, ENT_QUOTES, 'UTF-8', true);?>

                                </label>
                                
                                <?php if ($_smarty_tpl->tpl_vars['_auth_type_id']->value==waAuthConfig::AUTH_TYPE_USER_PASSWORD){?>
                                    <div class="js-auth-type-fields" style="margin: 10px 20px 0 20px;<?php if ($_smarty_tpl->tpl_vars['_auth_type']->value!==waAuthConfig::AUTH_TYPE_USER_PASSWORD){?> display: none;<?php }?>">
                                        <?php $_smarty_tpl->tpl_vars['_confirm'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['auth_config']->value['signup_confirm'])===null||$tmp==='' ? false : $tmp), null, 0);?>
                                        <label>
                                            <input type="hidden" name="signup_confirm" value="0">
                                            
                                            <input class="js-signup-confirm" type="checkbox" name="signup_confirm" value="1"<?php if ($_smarty_tpl->tpl_vars['_confirm']->value&&!$_smarty_tpl->tpl_vars['no_channels']->value){?> checked="checked"<?php }?><?php if ($_smarty_tpl->tpl_vars['no_channels']->value){?> disabled<?php }?>>
                                            Подтверждать регистрацию
                                        </label>
                                        <div class="hint" style="margin-top: 6px;">Ссылка или код для подтверждения регистрации будут отправлены в уведомлении.<br>
                                            Зарегистрированный посетитель сможет войти только после подтверждения email-адреса или номера телефона.</div>
                                    </div>
                                <?php }?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="field">
                <div class="name">Уведомление о завершении регистрации</div>
                <div class="value">
                    <?php $_smarty_tpl->tpl_vars['_notify'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['auth_config']->value['signup_notify'])===null||$tmp==='' ? null : $tmp)||$_smarty_tpl->tpl_vars['_auth_type']->value==waAuthConfig::AUTH_TYPE_GENERATE_PASSWORD, null, 0);?>
                    <label>
                        <input type="hidden" name="signup_notify" value="0">
                        <input type="checkbox" name="signup_notify" value="1" class="js-signup-notify"<?php if ($_smarty_tpl->tpl_vars['_notify']->value&&!$_smarty_tpl->tpl_vars['no_channels']->value){?> checked="checked"<?php }?><?php if (($_smarty_tpl->tpl_vars['no_channels']->value||$_smarty_tpl->tpl_vars['_auth_type']->value==waAuthConfig::AUTH_TYPE_GENERATE_PASSWORD)){?> disabled="disabled"<?php }?>>
                        Отправлять пользователям уведомление о завершении регистрации
                    </label>
                </div>
            </div>
        </div>
    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (!function_exists('smarty_template_function_timeout')) {
    function smarty_template_function_timeout($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['timeout']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <div class="field-group">
        <div class="field">
            <div class="name">Повторная отправка кода подтверждения</div>
            <div class="value">
                <div style="margin-bottom: 10px;">
                    <label>
                        Интервал в секундах перед отправкой следующего кода подтверждения:
                        <input type="text" class="semi" name="timeout" value="<?php echo $_smarty_tpl->tpl_vars['auth_config']->value['onetime_password_timeout'];?>
">
                    </label>
                </div>
            </div>
        </div>
    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>


<?php if (!function_exists('smarty_template_function_auth_by_login')) {
    function smarty_template_function_auth_by_login($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['auth_by_login']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <div class="field-group">
        <div class="field">
            <div class="name">
                <label for="s-auth-by-login">Вход по имени пользователя</label>
            </div>
            <div class="value">
                <input type="hidden" name="can_login_by_contact_login" value="0" />
                <input id="s-auth-by-login" name="can_login_by_contact_login" class="ibutton" type="checkbox" value="1"
                        <?php if ($_smarty_tpl->tpl_vars['auth_config']->value['can_login_by_contact_login']){?> checked="checked"<?php }?>>
            </div>
            <div class="value hint">Включите, чтобы пользователи бекенда могли входить на сайт со своими логинами. Поддерживаются имена пользователей, отличающиеся от телефонных номеров, т. е. состоящие не только из цифр.</div>
        </div>
    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<?php if (!function_exists('smarty_template_function_email_settings')) {
    function smarty_template_function_email_settings($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['email_settings']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php $_smarty_tpl->tpl_vars['_email_used'] = new Smarty_variable(in_array(waAuthConfig::AUTH_METHOD_EMAIL,$_smarty_tpl->tpl_vars['used_auth_methods']->value), null, 0);?>
<tr<?php if (!$_smarty_tpl->tpl_vars['_email_used']->value){?> class="gray"<?php }?>>
    <td class="min-width gray valign-top"></td>
    <td class="big-width">
        <div class="float-right links">
            <span class="hint js-method-disable-hint"<?php if ($_smarty_tpl->tpl_vars['_email_used']->value){?> style="display: none;"<?php }?>>Выключена</span>
            <a href="javascript:void(0);" class="link-options inline-link inline js-settings-link"<?php if (!$_smarty_tpl->tpl_vars['_email_used']->value){?> style="display: none"<?php }?>><i class="icon16 settings"></i><b><i>Настройки</i></b></a>
            <input name="used_auth_methods[<?php echo waAuthConfig::AUTH_METHOD_EMAIL;?>
]" data-method="<?php echo waAuthConfig::AUTH_METHOD_EMAIL;?>
" data-registration-linked-field="email" class="ibutton js-auth-method-toogle" type="checkbox"<?php if ($_smarty_tpl->tpl_vars['_email_used']->value){?> checked="checked"<?php }?>>
        </div>
        <h3 class="name">Email</h3>
        <div class="s-settings-wrapper js-settings-wrapper" style="display: none;">
            
            <div class="field-group">
                <div class="field">
                    <div class="name">Уведомления пользователей</div>
                    <div class="value">
                        Выберите группу шаблонов уведомлений для отправки уведомлений при входе, регистрации и смене пароля.
                        <div class="hint" style="margin: 8px 0;"><?php echo sprintf('Изменяйте шаблоны email-уведомлений в приложении «<a href="%s">Настройки</a>».',((string)$_smarty_tpl->tpl_vars['wa_backend_url']->value)."webasyst/settings/email/template/");?>
</div>
                        <div class="field">
                            <div class="name">Шаблоны уведомлений</div>
                            <div class="value">
                                <?php if ($_smarty_tpl->tpl_vars['no_channels']->value){?>
                                    <?php echo sprintf('Не заполнен email-адрес отправителя в разделе «<a href="%s">Настройки email</a>» приложения «Настройки».',((string)$_smarty_tpl->tpl_vars['wa_backend_url']->value)."webasyst/settings/email/");?>

                                <?php }else{ ?>
                                    <select name="verification_channel_ids[]" class="js-template">
                                        <option value="">Выберите шаблон</option>
                                        <?php  $_smarty_tpl->tpl_vars['_channel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_channel']->_loop = false;
 $_smarty_tpl->tpl_vars['_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['email_channels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_channel']->key => $_smarty_tpl->tpl_vars['_channel']->value){
$_smarty_tpl->tpl_vars['_channel']->_loop = true;
 $_smarty_tpl->tpl_vars['_id']->value = $_smarty_tpl->tpl_vars['_channel']->key;
?>
                                            <option value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_id']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (in_array($_smarty_tpl->tpl_vars['_id']->value,$_smarty_tpl->tpl_vars['auth_config']->value['verification_channel_ids'])){?> selected<?php }?>><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_channel']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                                        <?php } ?>
                                    </select>
                                    <div class="hint" style="margin-top: 12px;"><?php echo sprintf('Измените список в разделе «<a href="%s">Email-шаблоны</a>».',((string)$_smarty_tpl->tpl_vars['wa_backend_url']->value)."webasyst/settings/email/template/");?>
</div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td class="min-width gray valign-top"></td>
</tr>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<?php if (!function_exists('smarty_template_function_social_networks_settings')) {
    function smarty_template_function_social_networks_settings($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['social_networks_settings']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php $_smarty_tpl->tpl_vars['_social_used'] = new Smarty_variable(in_array(waAuthConfig::AUTH_METHOD_SOCIAL,$_smarty_tpl->tpl_vars['used_auth_methods']->value), null, 0);?>
<tr<?php if (!$_smarty_tpl->tpl_vars['_social_used']->value){?> class="gray"<?php }?>>
    <td class="min-width gray valign-top"></td>
    <td class="big-width">
        <div class="float-right links">
            <span class="hint js-method-disable-hint"<?php if ($_smarty_tpl->tpl_vars['_social_used']->value){?> style="display: none;"<?php }?>>Выключена</span>
            <a href="javascript:void(0);" class="link-options inline-link inline js-settings-link"<?php if (!$_smarty_tpl->tpl_vars['_social_used']->value){?> style="display: none"<?php }?>><i class="icon16 settings"></i><b><i>Настройки</i></b></a>
            <input name="used_auth_methods[<?php echo waAuthConfig::AUTH_METHOD_SOCIAL;?>
]" data-method="<?php echo waAuthConfig::AUTH_METHOD_SOCIAL;?>
" class="ibutton js-auth-method-toogle" type="checkbox"<?php if ($_smarty_tpl->tpl_vars['_social_used']->value){?> checked="checked"<?php }?>>
        </div>
        <h3 class="name">Социальные сети (дополнительный способ входа)</h3>
        <div class="s-settings-wrapper js-settings-wrapper" style="display: none;">
            <p class="hint">Позволяет посетителям вашего сайта быстро зарегистрироваться или авторизоваться через аккаунты в популярных сторонних сервисах, например, через «Фейсбук» или «Твиттер». <a href="https://support.webasyst.ru/5554/third-party-auth-setup/" target="_blank">Документация по настройке</a> <i class="icon10 new-window"></i></p>
            <div class="field">
                <div class="name">Сервисы</div>
                <div class="value">
                    <ul class="menu-v" style="margin-top: 0;">
                        <?php  $_smarty_tpl->tpl_vars['adapter'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['adapter']->_loop = false;
 $_smarty_tpl->tpl_vars['adapter_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['auth_adapters']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['adapter']->key => $_smarty_tpl->tpl_vars['adapter']->value){
$_smarty_tpl->tpl_vars['adapter']->_loop = true;
 $_smarty_tpl->tpl_vars['adapter_id']->value = $_smarty_tpl->tpl_vars['adapter']->key;
?>
                            <li>
                                <input class="adapter" id="s-auth-adapter-<?php echo $_smarty_tpl->tpl_vars['adapter_id']->value;?>
" name="adapter_ids[]" value="<?php echo $_smarty_tpl->tpl_vars['adapter_id']->value;?>
" type="checkbox" <?php if (!empty($_smarty_tpl->tpl_vars['auth_config']->value['adapters'][$_smarty_tpl->tpl_vars['adapter_id']->value])){?>checked="checked"<?php }?>>
                                <label for="s-auth-adapter-<?php echo $_smarty_tpl->tpl_vars['adapter_id']->value;?>
">
                                    <img style="vertical-align: middle; padding-bottom: 3px;" alt="<?php echo $_smarty_tpl->tpl_vars['adapter']->value->getName();?>
" src="<?php echo $_smarty_tpl->tpl_vars['adapter']->value->getIcon('');?>
">
                                    <?php echo $_smarty_tpl->tpl_vars['adapter']->value->getName();?>

                                </label>
                                <div class="s-adapter-controls js-adapter-controls"<?php if (empty($_smarty_tpl->tpl_vars['auth_config']->value['adapters'][$_smarty_tpl->tpl_vars['adapter_id']->value])){?> style="display:none"<?php }?>>
                                    <?php  $_smarty_tpl->tpl_vars['control_name'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['control_name']->_loop = false;
 $_smarty_tpl->tpl_vars['control_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['adapter']->value->getControls(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['control_name']->key => $_smarty_tpl->tpl_vars['control_name']->value){
$_smarty_tpl->tpl_vars['control_name']->_loop = true;
 $_smarty_tpl->tpl_vars['control_id']->value = $_smarty_tpl->tpl_vars['control_name']->key;
?>
                                        <div class="field">
                                            <div class="name" style="width: 120px;">
                                                <span class="small"><?php echo $_smarty_tpl->tpl_vars['control_name']->value;?>
</span>
                                            </div>
                                            <div class="value" style="margin-left: 130px;">
                                                <input type="text" name="adapters[<?php echo $_smarty_tpl->tpl_vars['adapter_id']->value;?>
][<?php echo $_smarty_tpl->tpl_vars['control_id']->value;?>
]" value="<?php if (!empty($_smarty_tpl->tpl_vars['auth_config']->value['adapters'][$_smarty_tpl->tpl_vars['adapter_id']->value])){?><?php echo $_smarty_tpl->tpl_vars['auth_config']->value['adapters'][$_smarty_tpl->tpl_vars['adapter_id']->value][$_smarty_tpl->tpl_vars['control_id']->value];?>
<?php }?>" style="font-size: 0.9em;">
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="clear"></div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </td>
    <td class="min-width gray valign-top"></td>
</tr>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<?php if (!function_exists('smarty_template_function_phone_settings')) {
    function smarty_template_function_phone_settings($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['phone_settings']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<?php $_smarty_tpl->tpl_vars['_sms_used'] = new Smarty_variable(in_array(waAuthConfig::AUTH_METHOD_SMS,$_smarty_tpl->tpl_vars['used_auth_methods']->value), null, 0);?>
<tr<?php if (!$_smarty_tpl->tpl_vars['_sms_used']->value){?> class="gray"<?php }?>>
    <td class="min-width gray valign-top"></td>
    <td class="big-width">
        <div class="float-right links">
            <span class="hint js-method-disable-hint"<?php if ($_smarty_tpl->tpl_vars['_sms_used']->value){?> style="display: none;"<?php }?>>Выключена</span>
            <a class="link-options inline-link inline js-settings-link"<?php if (!$_smarty_tpl->tpl_vars['_sms_used']->value){?> style="display: none"<?php }?>><i class="icon16 settings"></i><b><i>Настройки</i></b></a>
            <input name="used_auth_methods[<?php echo waAuthConfig::AUTH_METHOD_SMS;?>
]" data-method="<?php echo waAuthConfig::AUTH_METHOD_SMS;?>
" data-registration-linked-field="phone" class="ibutton js-auth-method-toogle" type="checkbox"<?php if ($_smarty_tpl->tpl_vars['_sms_used']->value){?> checked="checked"<?php }?>>
        </div>
        <h3 class="name">Телефон</h3>
        <div class="s-settings-wrapper js-settings-wrapper" style="display: none;">
            
            <div class="field-group">
                <div class="field">
                    <div class="name">Уведомления пользователей</div>
                    <div class="value">
                        Выберите группу шаблонов уведомлений для отправки уведомлений при входе, регистрации и смене пароля.
                        <?php if (!empty($_smarty_tpl->tpl_vars['sms_channels']->value)){?>
                            <div class="hint" style="margin: 8px 0;"><?php echo sprintf('Изменяйте шаблоны SMS-уведомлений в приложении «<a href="%s">Настройки</a>».',((string)$_smarty_tpl->tpl_vars['wa_backend_url']->value)."webasyst/settings/sms/template/");?>
</div>
                        <?php }?>
                        <div class="field">
                            <div class="name">Шаблоны уведомлений</div>
                            <div class="value">
                                <select name="verification_channel_ids[]" class="js-template">
                                    <option value="">Выберите шаблон</option>
                                    <?php  $_smarty_tpl->tpl_vars['_channel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_channel']->_loop = false;
 $_smarty_tpl->tpl_vars['_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['sms_channels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_channel']->key => $_smarty_tpl->tpl_vars['_channel']->value){
$_smarty_tpl->tpl_vars['_channel']->_loop = true;
 $_smarty_tpl->tpl_vars['_id']->value = $_smarty_tpl->tpl_vars['_channel']->key;
?>
                                        <option value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_id']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (in_array($_smarty_tpl->tpl_vars['_id']->value,$_smarty_tpl->tpl_vars['auth_config']->value['verification_channel_ids'])){?> selected<?php }?>><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_channel']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                                    <?php } ?>
                                </select>
                                <div class="hint" style="margin-top: 12px;"><?php echo sprintf('Измените список в разделе «<a href="%s">SMS-шаблоны</a>».',((string)$_smarty_tpl->tpl_vars['wa_backend_url']->value)."webasyst/settings/sms/template/");?>
</div>
                            </div>
                        </div>
                        <div class="field">
                            <div class="name">Приоритет над email-уведомлениями</div>
                            <div class="value">
                                <?php $_smarty_tpl->tpl_vars['_priority'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['auth_config']->value['priority_auth_method'])===null||$tmp==='' ? null : $tmp), null, 0);?>
                                <label>
                                    <input type="hidden" name="priority_auth_method" value="">
                                    <input type="checkbox" name="priority_auth_method" value="sms"<?php if ($_smarty_tpl->tpl_vars['_priority']->value===waAuthConfig::AUTH_METHOD_SMS){?> checked="checked"<?php }?>>
                                    Приоритет SMS над email при отправке уведомлений. В случае сбоя в отправке SMS будет отправлено email-уведомление.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="name">Код междугородней связи</div>

                    <?php $_smarty_tpl->tpl_vars['_phone_transform_prefix'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['auth_config']->value['phone_transform_prefix'])===null||$tmp==='' ? array() : $tmp), null, 0);?>

                    <div class="value">
                        <?php $_smarty_tpl->tpl_vars['_input_code'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['_phone_transform_prefix']->value['input_code'])===null||$tmp==='' ? '' : $tmp), null, 0);?>
                        <input type="text" class="short" name="phone_transform_prefix[input_code]" value="<?php echo $_smarty_tpl->tpl_vars['_input_code']->value;?>
">
                        <div class="hint" style="margin-top: 10px;">
                            Введите код, с помощью которого совершаются междугородние звонки в вашей стране. Пример кода для Российской Федерации: 8.<br>
                            Если указан код междугородней связи, то в номерах посетителей сайта он будет заменен на телефонный код страны.
                        </div>
                    </div>
                    <div class="name">Код страны</div>
                    <div class="value">
                        <?php $_smarty_tpl->tpl_vars['_output_code'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['_phone_transform_prefix']->value['output_code'])===null||$tmp==='' ? '' : $tmp), null, 0);?>
                        + <input type="text" class="short" name="phone_transform_prefix[output_code]" value="<?php echo $_smarty_tpl->tpl_vars['_output_code']->value;?>
">
                        <div class="hint" style="margin-top: 10px;">
                            Международный код вашей страны, который будет использоваться в телефонных номерах посетителей сайта вместо кода междугородней связи.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td class="min-width gray valign-top"></td>
</tr>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<?php if (!function_exists('smarty_template_function_register_form')) {
    function smarty_template_function_register_form($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['register_form']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<tr class="js-register-form-wrapper">
    <td class="min-width valign-top"></td>
    <td class="big-width">
        <div class="float-right links">
            <a href="javascript:void(0);" class="link-options inline-link inline js-settings-link"><i class="icon16 settings"></i><b><i>Настройки</i></b></a>
        </div>
        <h3 class="name">Форма регистрации</h3>
        <div class="s-settings-wrapper js-settings-wrapper" style="display: none;">
            
            <div class="field-group">
                
                <div class="field s-data-processing js-data-processing-wrapper">
                    <div class="name">Обработка персональных данных</div>
                    
                    <div class="value">
                        <label>
                            <input type="radio" name="params[service_agreement]" value=""<?php if (empty($_smarty_tpl->tpl_vars['params']->value['service_agreement'])){?> checked<?php }?>>
                            Не требовать согласия с политикой обработки персональных данных
                        </label>
                    </div>
                    
                    <div class="value">
                        <?php $_smarty_tpl->tpl_vars['link_tag'] = new Smarty_variable(sprintf('<a href="%s" target="_blank">',_w('---INSERT A LINK HERE!---')), null, 0);?>
                        <label data-default-text="<?php echo htmlspecialchars((string)sprintf_wp('By submitting this form I agree to %spersonal data protection policy%s',$_smarty_tpl->tpl_vars['link_tag']->value,'</a>'), ENT_QUOTES, 'UTF-8', true);?>
">
                            <input type="radio" name="params[service_agreement]" value="notice"<?php if (ifset($_smarty_tpl->tpl_vars['params']->value['service_agreement'])=='notice'){?> checked<?php }?>>
                            Показывать только подсказку со ссылкой на политику
                        </label>
                    </div>
                    
                    <div class="value">
                        <label data-default-text="<?php echo htmlspecialchars((string)sprintf_wp('I agree to %spersonal data protection policy%s',$_smarty_tpl->tpl_vars['link_tag']->value,'</a>'), ENT_QUOTES, 'UTF-8', true);?>
">
                            <input type="radio" name="params[service_agreement]" value="checkbox"<?php if (ifset($_smarty_tpl->tpl_vars['params']->value['service_agreement'])=='checkbox'){?> checked<?php }?>>
                            Предлагать включить обязательный флажок с подсказкой и ссылкой
                        </label>
                    </div>
                    
                    <div class="hidden s-agreement-text js-text-editor">
                        <textarea class="js-agreement-text-textarea" name="params[service_agreement_text]"><?php echo htmlspecialchars((string)ifset($_smarty_tpl->tpl_vars['params']->value['service_agreement_text']), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                        <div class="hint">
                            <a href="javascript:void(0)" class="inline-link js-restore-text"><b><i>Восстановить стандартный текст</i></b></a>
                        </div>
                    </div>
                </div>

                
                <div class="field s-signup-captcha">
                    <div class="name">
                        Капча
                        <div class="hint">Пользователь должен ввести символы с изображения</div>
                    </div>
                    <div class="value">
                        <input type="hidden" name="signup_captcha" value="0" />
                        <input id="s-signup-captcha" name="signup_captcha" class="ibutton js-signup-captcha-toogle" type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['signup_captcha']->value){?> checked="checked"<?php }?>>
                        <label for="s-signup-captcha"><span class="js-signup-captcha-status s-captcha-status"><?php if ($_smarty_tpl->tpl_vars['signup_captcha']->value){?>Включена<?php }else{ ?>Выключена<?php }?></span></label>
                    </div>
                </div>

                
                <div class="field" style="margin-top: 16px;">
                    <div class="name">Поля</div>
                    <div class="value s-fields js-fields">
                        
                        <div class="s-available-fields-list js-available-fields-list">
                            
                            <?php  $_smarty_tpl->tpl_vars['_a_field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_a_field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['available_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_a_field']->key => $_smarty_tpl->tpl_vars['_a_field']->value){
$_smarty_tpl->tpl_vars['_a_field']->_loop = true;
?>
                                <div class="s-form-available-field">
                                    <label class="js-available-field" data-id="<?php echo $_smarty_tpl->tpl_vars['_a_field']->value['id'];?>
">
                                        <input type="checkbox" data-field-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_a_field']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if ($_smarty_tpl->tpl_vars['_a_field']->value['checked']){?> checked<?php }?><?php if ($_smarty_tpl->tpl_vars['_a_field']->value['disabled']){?> disabled<?php }?>> <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_a_field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                                    </label>
                                </div>
                            <?php } ?>
                        </div>
                        
                        <div class="s-enabled-fields-list s-register-form-constructor js-register-form-constructor shadowed">
                            <div>
                                
                                <?php  $_smarty_tpl->tpl_vars['_e_field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_e_field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['enable_fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_e_field']->key => $_smarty_tpl->tpl_vars['_e_field']->value){
$_smarty_tpl->tpl_vars['_e_field']->_loop = true;
?>
                                    <?php $_smarty_tpl->tpl_vars['_required_checked'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['_e_field']->value['required'])||$_smarty_tpl->tpl_vars['_e_field']->value['disabled'], null, 0);?>
                                    <?php $_smarty_tpl->tpl_vars['_required_disabled'] = new Smarty_variable(!$_smarty_tpl->tpl_vars['_e_field']->value['checked']||$_smarty_tpl->tpl_vars['_e_field']->value['disabled'], null, 0);?>
                                    <div data-field-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="field sortable js-sortable-field<?php if (!$_smarty_tpl->tpl_vars['_e_field']->value['checked']){?> hidden<?php }?>" style="position: relative;">
                                        <i class="icon16 sort"></i>
                                        <input title="Обязательное поле" type="checkbox" name="fields[<?php echo $_smarty_tpl->tpl_vars['_e_field']->value['id'];?>
][required]"<?php if ($_smarty_tpl->tpl_vars['_required_checked']->value){?> checked<?php }?> value="true" style="position: absolute;left: -20px;top: 7px;"<?php if ($_smarty_tpl->tpl_vars['_required_disabled']->value){?> disabled<?php }?>/>
                                        <div class="s-field-name name">
                                            <span class="js-editable-wrapper" title="Редактировать название поля">
                                                <label class="s-editable-item s-editable-text js-editable-item">
                                                    <?php if (isset($_smarty_tpl->tpl_vars['_e_field']->value['caption'])){?>
                                                        <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['caption'], ENT_QUOTES, 'UTF-8', true);?>

                                                    <?php }else{ ?>
                                                        <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                                                    <?php }?>
                                                </label>
                                                <input type="text" class="s-editable-field-label hidden" name="fields[<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
][caption]" value="<?php if (isset($_smarty_tpl->tpl_vars['_e_field']->value['caption'])){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['caption'], ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['_e_field']->value['checked']){?> disabled<?php }?>/>
                                            </span>
                                        </div>
                                        <div class="value s-field-value placeholder" title="Редактировать подсказку к полю">
                                            <input type="text" class="fill s-placeholder-input" name="fields[<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
][placeholder]" value="<?php if (isset($_smarty_tpl->tpl_vars['_e_field']->value['placeholder'])){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_e_field']->value['placeholder'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['_e_field']->value['checked']){?> disabled<?php }?>/>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            
                            <div class="s-preview-agreement-text-wrapper js-preview-agreement-text-wrapper">
                                <input type="checkbox" style="vertical-align: top;" checked disabled>
                                <div class="js-preview-text" style="max-width: 300px; display: inline-block;"></div>
                            </div>

                            
                            <div class="js-captcha-preview"<?php if (!$_smarty_tpl->tpl_vars['signup_captcha']->value){?> style="display: none;"<?php }?>>
                                <?php if ($_smarty_tpl->tpl_vars['demo_captcha']->value->getOption('invisible')){?>
                                    <div class="hint">Будет использована невидимая капча</div>
                                <?php }else{ ?>
                                    <?php echo $_smarty_tpl->tpl_vars['demo_captcha']->value->getHtml();?>

                                <?php }?>
                            </div>

                            
                            <div class="js-editable-wrapper">
                                <input type="button" class="s-editable-button js-editable-item js-editable-button" value="<?php echo htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['params']->value['button_caption'])===null||$tmp==='' ? 'Регистрация' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" title="Редактировать текст на кнопке">
                                <input type="text" class="hidden" name="params[button_caption]" value="<?php echo htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['params']->value['button_caption'])===null||$tmp==='' ? 'Регистрация' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td class="min-width valign-top"></td>
</tr>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>



<?php if (!function_exists('smarty_template_function_login_form')) {
    function smarty_template_function_login_form($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['login_form']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
<tr>
    <td class="min-width valign-top"></td>
    <td class="big-width">
        <div class="float-right links">
            <a href="javascript:void(0);" class="link-options inline-link inline js-settings-link"><i class="icon16 settings"></i><b><i>Настройки</i></b></a>
        </div>
        <h3 class="name">Форма входа</h3>
        <div class="s-settings-wrapper js-settings-wrapper js-login-form-wrapper" style="display: none;">
            <div class="field-group">
                
                <div class="field js-captcha-wrapper">
                    <div class="name">
                        Капча
                        <div class="hint">Пользователь должен ввести символы с изображения</div>
                    </div>
                    <div class="value no-shift-field">
                        <ul class="menu-v">
                            <?php  $_smarty_tpl->tpl_vars['_variant_info'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_variant_info']->_loop = false;
 $_smarty_tpl->tpl_vars['_variant_val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['login_captcha_variants']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_variant_info']->key => $_smarty_tpl->tpl_vars['_variant_info']->value){
$_smarty_tpl->tpl_vars['_variant_info']->_loop = true;
 $_smarty_tpl->tpl_vars['_variant_val']->value = $_smarty_tpl->tpl_vars['_variant_info']->key;
?>
                                <?php $_smarty_tpl->tpl_vars['_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['_variant_info']->value['name'], null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['_is_checked'] = new Smarty_variable($_smarty_tpl->tpl_vars['auth_config']->value['login_captcha']===$_smarty_tpl->tpl_vars['_variant_val']->value, null, 0);?>
                                <li>
                                    <label>
                                        <input type="radio" name="login_captcha" value="<?php echo $_smarty_tpl->tpl_vars['_variant_val']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['_is_checked']->value){?> checked="checked"<?php }?>>
                                        <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_name']->value, ENT_QUOTES, 'UTF-8', true);?>

                                    </label>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                
                <div class="field s-rememberme-auth">
                    <div class="name">
                        Автоматическая авторизация
                        <div class="hint">Флажок «Запомнить меня»</div>
                    </div>
                    <div class="value">
                        <input type="hidden" name="rememberme" value="0" />
                        <input id="s-rememberme-auth" name="rememberme" class="ibutton js-rememberme-auth-toogle" type="checkbox" value="1"<?php if ($_smarty_tpl->tpl_vars['rememberme']->value){?> checked="checked"<?php }?>>
                        <label for="s-rememberme-auth"><span class="js-rememberme-auth-status s-rememberme-auth-status"><?php if ($_smarty_tpl->tpl_vars['rememberme']->value){?>Включена<?php }else{ ?>Выключена<?php }?></span></label>
                    </div>
                </div>
            </div>

            
            <div class="s-login-form-preview shadowed">
                <div class="s-login-form-constructor js-login-form-constructor">
                    
                    <div data-field-id="login" class="field" style="position: relative;">
                        <div class="s-field-name name">
                            <span class="js-editable-wrapper" title="Редактировать название поля">
                                <label class="s-editable-item s-editable-text js-editable-item">
                                    <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['auth_config']->value['login_caption'], ENT_QUOTES, 'UTF-8', true);?>

                                </label>
                                <input type="text" class="s-editable-field-label hidden" name="login_caption" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['auth_config']->value['login_caption'], ENT_QUOTES, 'UTF-8', true);?>
"/>
                            </span>
                        </div>
                        <div class="value placeholder" title="Редактировать подсказку к полю">
                            <input type="text" class="fill s-placeholder-input" name="login_placeholder" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['auth_config']->value['login_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
"/>
                        </div>
                    </div>

                    
                    <div class="field">
                        <div class="s-field-name name">Пароль</div>
                        <div class="value">
                            <input class="fill s-placeholder-input" type="text" name="password_placeholder" placeholder="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['auth_config']->value['password_placeholder'], ENT_QUOTES, 'UTF-8', true);?>
" />
                        </div>
                    </div>

                    
                    <div class="field js-remember-me-preview"<?php if (!$_smarty_tpl->tpl_vars['rememberme']->value){?> style="display: none;"<?php }?>>
                        <div class="value">
                            <label><input type="checkbox" checked="checked" disabled /> Запомнить меня</label>
                        </div>
                    </div>

                    
                    <div class="s-captcha-preview js-captcha-preview"<?php if ($_smarty_tpl->tpl_vars['auth_config']->value['login_captcha']!==waAuthConfig::LOGIN_CAPTCHA_ALWAYS){?> style="display: none;"<?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['demo_captcha']->value->getOption('invisible')){?>
                            <div class="hint">Будет использована невидимая капча</div>
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['demo_captcha']->value->getHtml();?>

                        <?php }?>
                    </div>

                    
                    <div>
                        <input type="button" value="Войти" disabled />
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td class="min-width valign-top"></td>
</tr>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<?php }} ?>