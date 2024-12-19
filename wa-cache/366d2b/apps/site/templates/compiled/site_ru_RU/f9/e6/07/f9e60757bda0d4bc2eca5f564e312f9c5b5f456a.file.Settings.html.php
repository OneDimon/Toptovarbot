<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:29:56
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\templates\actions-legacy\settings\Settings.html" */ ?>
<?php /*%%SmartyHeaderCode:62580885266367094932dc6-85018661%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9e60757bda0d4bc2eca5f564e312f9c5b5f456a' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\templates\\actions-legacy\\settings\\Settings.html',
      1 => 1684416005,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62580885266367094932dc6-85018661',
  'function' => 
  array (
    '_renderCdnItem' => 
    array (
      'parameter' => 
      array (
        '_cdn' => '',
      ),
      'compiled' => '',
    ),
    '_renderRobotsControl' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    '_cdn' => 0,
    'robots' => 0,
    'robots_message' => 0,
    'domain_idn' => 0,
    'backend_settings' => 0,
    '_' => 0,
    'domain_id' => 0,
    'wa' => 0,
    'domain' => 0,
    'title' => 0,
    'domain_alias' => 0,
    'ssl_all' => 0,
    'is_https' => 0,
    'domain_apps_type' => 0,
    'domain_apps' => 0,
    'row' => 0,
    'classes' => 0,
    'c' => 0,
    'style' => 0,
    'wa_url' => 0,
    'google_analytics' => 0,
    'code_hint' => 0,
    'head_js' => 0,
    'favicon' => 0,
    'favicon_message' => 0,
    'touchicon' => 0,
    'touchicon_message' => 0,
    'cdn_list' => 0,
    'url_notification' => 0,
    'domains' => 0,
    '_domains' => 0,
    'latter_apps_names' => 0,
    '_latter_apps_names' => 0,
    '_domains_count' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_66367095b1a7c8_39177929',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66367095b1a7c8_39177929')) {function content_66367095b1a7c8_39177929($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_join')) include 'C:\\OSPanel\\domains\\tovarka\\wa-system/vendors/smarty-plugins\\modifier.join.php';
?><?php if (!function_exists('smarty_template_function__renderCdnItem')) {
    function smarty_template_function__renderCdnItem($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['_renderCdnItem']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <div class="s-cdn-item js-cdn">
        <input class="s-cdn-input" type="text" name="cdn[]" value="<?php echo $_smarty_tpl->tpl_vars['_cdn']->value;?>
" autocomplete="off" placeholder="Адрес CDN" />
        <i class="icon10 no s-cdn-remove js-cdn-remove" title="Удалить" style="display: none;"></i>
    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<?php if (!function_exists('smarty_template_function__renderRobotsControl')) {
    function smarty_template_function__renderRobotsControl($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['_renderRobotsControl']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
    <div class="field">
        <div class="name">robots.txt</div>
        <div class="value">
            <textarea name="robots"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['robots']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea>
            <br />
            <?php if (isset($_smarty_tpl->tpl_vars['robots_message']->value)){?><span class="small" style="color: #f00;"><?php echo $_smarty_tpl->tpl_vars['robots_message']->value;?>
</span><?php }else{ ?><span class="hint">Содержимое файла robots.txt этого сайта</span><?php }?>
        </div>
    </div>
<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

<script type="text/javascript">
    document.title = 'Настройка сайта — ' + <?php echo json_encode($_smarty_tpl->tpl_vars['domain_idn']->value);?>
;
</script>
<div class="content">
<div class="s-editor s-white">
<div class="block s-grey-toolbar">
    <div class="float-right">
        <ul class="menu-h">
            <!-- plugin hook: 'backend_settings.action_button_li' -->
            
            <?php  $_smarty_tpl->tpl_vars['_'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['backend_settings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_']->key => $_smarty_tpl->tpl_vars['_']->value){
$_smarty_tpl->tpl_vars['_']->_loop = true;
?><?php echo ifset($_smarty_tpl->tpl_vars['_']->value['action_button_li']);?>
<?php } ?>
            <li><a id="s-delete" href="#"><i class="icon16 delete"></i>Удалить сайт</a></li>
        </ul>
    </div>

    <h4 style="margin-left: 4px; margin-top:2px;">Настройки сайта</h4>
</div>

<div>
    <div class="block double-padded fields form">
        <form target="s-settings-iframe" id="s-settings-form" method="post" action="?module=settings&action=save&domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
" enctype="multipart/form-data">
            <?php echo $_smarty_tpl->tpl_vars['wa']->value->csrf();?>

            <div class="field-group">
                <div class="field">
                    <div class="name bold">Доменное имя</div>
                    <div class="value">
                        <strong>http://</strong><input type="text" class="bold" name="url" value="<?php echo waIdna::dec(htmlspecialchars((string)$_smarty_tpl->tpl_vars['domain']->value, ENT_QUOTES, 'UTF-8', true));?>
" /><br />
                        <span class="hint">
                            Действующий адрес (URL), который ведет на данную установку фреймворка Webasyst.<br />
                            Например, <em>domain.ru</em>, если Webasyst устанавливается в корневую директорию домена domain.ru, или <em>domain.ru/wa</em>, если Webasyst устанавливается в поддиректорию /wa/ домена domain.ru. В конце URL добавлять косую черту (/) не нужно.<br />
                            <strong>ВАЖНО:</strong> Введенный адрес должен указывать на корневую папку установки Webasyst.
                        </span>
                    </div>
                </div>
                <div class="field">
                    <div class="name bold">Название сайта</div>
                    <div class="value no-shift">
                        <input id="s-domain-title" type="checkbox" <?php if (!$_smarty_tpl->tpl_vars['title']->value){?>checked="checked"<?php }?> /> <label for="s-domain-title">Совпадает с доменным именем</label>
                        <div <?php if (!$_smarty_tpl->tpl_vars['title']->value){?>style="display:none"<?php }?>>
                            <input type="text" class="bold" name="title" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
" /><br />
                            <span class="hint">Псевдоним сайта, используемый в меню выбора сайтов (в верхнем левом углу) и в качестве текста ссылки в меню навигации фронтенда <em>$wa->apps()</em>.</span>
                        </div>
                    </div>
                </div>
            <?php if (!empty($_smarty_tpl->tpl_vars['domain_alias']->value)){?>
                <div class="field">
                    <div class="name bold">Зеркало сайта</div>
                    <div class="value no-shift">
                        <?php echo $_smarty_tpl->tpl_vars['domain_alias']->value;?>

                    </div>
                </div>
            <?php }else{ ?>

                <div class="field">
                    <div class="name bold">Безопасность</div>
                    <div class="value no-shift">
                        <label>
                            <input type="checkbox" name="ssl_all" id="ssl_all" <?php if (ifset($_smarty_tpl->tpl_vars['ssl_all']->value)){?> checked='checked'<?php }?> <?php if (empty($_smarty_tpl->tpl_vars['is_https']->value)){?>disabled<?php }?>/> Перенаправлять на HTTPS<br>
                            <span class="hint ssl_server_https bold" style="<?php if (!empty($_smarty_tpl->tpl_vars['is_https']->value)){?>display: none<?php }?>">Включение перенаправления недоступно, потому что ваш веб-сервер не позволяет отличать подключение через HTTP от HTTPS.<br></span>
                            <span class="hint ssl_all_hide bold" style="display: none">Чтобы активировать эту настройку, <a>войдите через HTTPS</a>.<br></span>
                            <span class="hint">Перенаправлять посетителей сайта с обычного HTTP- на безопасное HTTPS-подключение.
                            <br>
                            Эта настройка будет работать, только если для вашего доменного имени установлен SSL-сертификат.</span>
                        </label>
                    </div>
                </div>
                <div class="field">
                    <div class="name">
                        <strong>&#123;$wa-&gt;apps()&#125; меню</strong>
                        <br />
                        <span class="hint"> Массив, который определяет основное меню навигации на сайте</span>
                    </div>
                    <div class="value no-shift">
                        <input type="radio" name="wa_apps_type" <?php if (!$_smarty_tpl->tpl_vars['domain_apps_type']->value){?>checked<?php }?> id="waapps-auto" value="0" /><label for="waapps-auto"> Все приложения <span class="hint">Меню навигации будет сформировано автоматически согласно правилам маршрутизации этого сайта</span></label>
                    </div>
                    <div class="value">
                        <input type="radio" name="wa_apps_type" <?php if ($_smarty_tpl->tpl_vars['domain_apps_type']->value){?>checked<?php }?> id="waapps-select" value="1" /><label for="waapps-select"> Настроить</label>
                        <div <?php if (!$_smarty_tpl->tpl_vars['domain_apps_type']->value){?>style="display:none"<?php }?>>
                            <table id="s-wa-apps" class="zebra s-settings-apps">
                                <?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['domain_apps']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
                                <tr>
                                   <td class="s-app"><a style="display:inline" href="#" onclick="return false"><i class="icon16 sort"></i></a>
                                      <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                      <input style="display:none" type="text" name="apps[name][]" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
                                   </td>
                                   <td>
                                      <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                      <input style="display:none" type="text" name="apps[url][]" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['row']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" />
                                   </td>
                                   <td class="s-actions">
                                        <a href="#" class="s-apps-edit" title="Редактировать"><i class="icon16 edit"></i></a>
                                        <a href="#" class="s-apps-delete" title="Удалить"><i class="icon16 delete"></i></a>
                                   </td>
                                </tr>
                                <?php } ?>
                            </table>
                            <div style="display:none; float: right;"><em class="hint">После завершения редактирования не забудьте нажать на кнопку «Сохранить»</em></div>
                            <a href="#" class="inline-link" id="s-apps-add"><i class="icon16 add"></i>
                               <b><i>Добавить ссылку</i></b>
                            </a>

                        </div>
                    </div>
                </div>
            <?php }?>
            </div>

            <?php if (!empty($_smarty_tpl->tpl_vars['domain_alias']->value)){?>
            
            <?php smarty_template_function__renderRobotsControl($_smarty_tpl,array());?>

            <?php }?>

            <?php if (empty($_smarty_tpl->tpl_vars['domain_alias']->value)){?>
            <div class="field-group">
                <div class="field">
                    <div class="name">Фон</div>
                    <div class="value">
                        <ul class="menu-h s-site-background-selector">
                            <?php $_smarty_tpl->tpl_vars['classes'] = new Smarty_variable(array('white','grey','blue','yellow','red','green','purple'), null, 0);?>
                            <?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['classes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
                            <li class="s-<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
"><a href="javascript:void(0)"><input type="radio" name="background" value="<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['style']->value==$_smarty_tpl->tpl_vars['c']->value){?> checked="checked"<?php }?>></a></li>
                            <?php } ?>
                            <li style="">
                                <a href="javascript:void(0)" style="margin-right: 5px;<?php if (substr($_smarty_tpl->tpl_vars['style']->value,0,1)=='.'){?>background:url(<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-data/public/site/background/<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
)<?php }?>">
                                    <input name="background" type="radio" value="<?php if (substr($_smarty_tpl->tpl_vars['style']->value,0,1)=='.'){?><?php echo $_smarty_tpl->tpl_vars['style']->value;?>
<?php }?>"<?php if (substr($_smarty_tpl->tpl_vars['style']->value,0,1)=='.'){?> checked="checked"<?php }?>>
                                </a>
                                <span class="small">Загрузить:</span>
                                <input id="background_file" type="file" name="background_file">
                            </li>
                        </ul>
                        <script type="text/javascript">
                            $(".s-site-background-selector a").click(function (e) {
                                if (e.target.tagName != 'INPUT') {
                                    $(this).children('input').click();
                                }
                            });
                            $(".s-site-background-selector input:radio").click(function (e) {
                                var c = $(this).val();
                                if (c) {
                                    if (c.substr(0, 1) == '.') {
                                        $("#wa").removeAttr('class');
                                        $("#wa").css('background', 'url(<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-data/public/site/background/<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
' + c + ')');
                                    } else {
                                        $("#wa").removeAttr('style');
                                        $("#wa").attr('class', 's-' + c);
                                    }
                                } else {
                                    $("#wa").removeAttr('class');
                                }
                                return true;
                            });
                            $("#background_file").change(function () {
                               $(this).parent().children('a').click();
                            });
                        </script>
                        <span class="hint">Фон используется для индивидуальной настройки бекенда приложения «Сайт» — это удобно, если вы управляете несколькими сайтами внутри одной установки фреймворка Вебасист. Выбранный фон не виден во фронтенде.</span>
                    </div>
                </div>
                <div class="field">
                    <div class="name">Пользовательский JavaScript-код внутри &lt;head&gt;</div>
                    <div class="value">
                        Google Analytics Property ID:
                        <input type="text" name="google_analytics[code]" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['google_analytics']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
">
                        &nbsp;
                        <select name="google_analytics[universal]" class="js-ga-select">
                            <option value="1" data-hint="UA-123456-1" <?php if (!empty($_smarty_tpl->tpl_vars['google_analytics']->value['universal'])){?>selected<?php }?>>Universal Analytics</option>
                            <option value="0" data-hint="G-FJBLKODBA0" <?php if (empty($_smarty_tpl->tpl_vars['google_analytics']->value['universal'])){?>selected<?php }?>>Google Analytics 4</option>
                        </select>
                        <br />
                        <?php if (!empty($_smarty_tpl->tpl_vars['google_analytics']->value['universal'])){?>
                            <?php $_smarty_tpl->tpl_vars['code_hint'] = new Smarty_variable('UA-123456-1', null, 0);?>
                        <?php }else{ ?>
                            <?php $_smarty_tpl->tpl_vars['code_hint'] = new Smarty_variable('G-FJBLKODBA0', null, 0);?>
                        <?php }?>
                        <span class="hint ga-hint"><?php echo sprintf('Например, <strong>%s</strong><br />Если вы используете <a href="https://www.google.com/analytics/">Google Analytics</a> для отслеживания статистики посещений и конверсии вашего сайта, то вместо внедрения кода Google Analytics вручную достаточно просто ввести здесь ваш Google Analytics Property ID. Правильный код Google Analytics автоматически вставится во все темы оформления всех приложений перед закрывающим тегом &lt;/head&gt;.',$_smarty_tpl->tpl_vars['code_hint']->value);?>
</span>
                        <br /><br />
                    </div>
                    <div class="value no-shift">
                        Дополнительный JavaScript-код для вставки перед закрывающим тегом &lt;/head&gt;:<br />
                        <textarea name="head_js" placeholder="&lt;script&gt;&lt;/script&gt;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['head_js']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea><br />
                        <span class="hint">
                            &lt;/head&gt;
                        </span>
                    </div>
                </div>
            </div>

            <div class="field-group">
                
                <div class="field">
                    <div class="name">Фавиконка</div>
                    <div class="value">
                        <i class="icon16 favicon"
                            style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['favicon']->value;?>
');"></i>
                        Загрузить фавиконку (.ICO): <input name="favicon" type="file" />
                        <?php if (isset($_smarty_tpl->tpl_vars['favicon_message']->value)){?><br /><span class="small" style="color: #f00;"><?php echo $_smarty_tpl->tpl_vars['favicon_message']->value;?>
</span><?php }?>
                    </div>
                </div>

                
                <div class="field">
                    <div class="name">Фавиконка для iOS</div>
                    <div class="value">
                        <?php if ($_smarty_tpl->tpl_vars['touchicon']->value){?><img src="<?php echo $_smarty_tpl->tpl_vars['touchicon']->value;?>
" class="s-touchicon"><br><?php }?>
                        Загрузить iOS-фавиконку (.PNG, от 152х152 до 1024х1024 пикселей): <input name="touchicon" type="file" />
                        <?php if (isset($_smarty_tpl->tpl_vars['touchicon_message']->value)){?><br /><span class="small" style="color: #f00;"><?php echo $_smarty_tpl->tpl_vars['touchicon_message']->value;?>
</span><?php }?>
                    </div>
                </div>

                
                <?php smarty_template_function__renderRobotsControl($_smarty_tpl,array());?>


                
                <div class="field">
                    <div class="name">CDN</div>
                    <div class="value js-cdn-wrapper">
                        <div class="js-cdn-list">
                            <?php  $_smarty_tpl->tpl_vars['_cdn'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_cdn']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cdn_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_cdn']->key => $_smarty_tpl->tpl_vars['_cdn']->value){
$_smarty_tpl->tpl_vars['_cdn']->_loop = true;
?>
                                <?php smarty_template_function__renderCdnItem($_smarty_tpl,array('_cdn'=>$_smarty_tpl->tpl_vars['_cdn']->value));?>

                            <?php }
if (!$_smarty_tpl->tpl_vars['_cdn']->_loop) {
?>
                                <?php smarty_template_function__renderCdnItem($_smarty_tpl,array());?>

                            <?php } ?>
                        </div>
                        <a href="javascript:void(0)" class="s-cdn-add js-cdn-add inline-link"><i class="icon10 add"></i> <b><i>Добавить</i></b></a>
                        <p class="hint">
                            Введите адрес CDN (Content Delivery Network), чтобы включить его автоматическую поддержку для этого сайта.
                        </p>
                    </div>
                </div>

                
                <div class="field">
                    <div class="name">Уведомления об ошибках в структуре сайта</div>
                    <div class="value no-shift">
                        <input id="s-url-notification" name="url_notification" type="checkbox" <?php if (empty($_smarty_tpl->tpl_vars['url_notification']->value)){?>checked="checked"<?php }?> /><br>
                        <span class="hint">Показывать уведомления об ошибках в настройках структуры сайта.</span>
                    </div>
                </div>
            </div>
            <?php }?>

            <!-- plugin hook: 'backend_settings.section' -->
            
            <?php  $_smarty_tpl->tpl_vars['_'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['backend_settings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_']->key => $_smarty_tpl->tpl_vars['_']->value){
$_smarty_tpl->tpl_vars['_']->_loop = true;
?><?php echo ifset($_smarty_tpl->tpl_vars['_']->value['section']);?>
<?php } ?>

            <?php if (empty($_smarty_tpl->tpl_vars['domain_alias']->value)){?>
            <div class="field-group">
                <div class="field">
                    <div class="name">Авторизация</div>
                    <div class="value no-shift">
                        <?php echo sprintf('Личный кабинет &rarr; <a href="%s">Настройки авторизации</a>','#/personal/settings/');?>

                    </div>
                </div>
            </div>
            <?php }?>

            <div class="field">
                <div class="value">
                    <input type="submit" name="save" class="button green" value="Сохранить">
                    <span id="s-settings-form-status" style="display:none">Сохранено</span>
                </div>
            </div>
        </form>
        <iframe style="display:none" name="s-settings-iframe" id="s-settings-iframe"></iframe>
    </div>

</div>
<div class="clear"></div>
</div>
</div>
<script type="text/javascript">

    $('.js-ga-select').change(function () {
        $('.ga-hint strong').text($(this).find('option:selected').data('hint'));
        $('input[name="google_analytics[code]"]').focus();
    });

    // Disabled ssl checkbox
    if (window.location.protocol.replace(':', '') != 'https') {
        $('#ssl_all').attr('disabled', true);
        $('.ssl_server_https').hide();
        $('.ssl_all_hide').show();
        $('.ssl_all_hide a').attr('href', window.location.href.replace('http', 'https'));
    }

    $("input.adapter").click(function () {
        var el = $(this).parent().find('div.adapter-controls');
        if ($(this).is(':checked')) {
            el.show();
        } else {
            el.hide();
        }
    });

    $("#s-auth-adapters").click(function () {
        if ($(this).is(':checked')) {
            $("#s-auth-adapters-list").show();
        } else {
            $("#s-auth-adapters-list").hide();
        }
    });

    $("#s-auth-enabled").click(function () {
        if ($(this).is(":checked")) {
            $("#s-auth-app").show();
        } else {
            $("#s-auth-app").hide();
        }
    });


    $("a#s-apps-add").click(function () {
        $('#s-wa-apps').append('<tr><td><a style="display:inline" href="#" onclick="return false"><i class="icon16 sort"></i></a>' +
                              '<span></span><input type="text" name="apps[name][]" value="" /></td>' +
                              '<td><span></span><input type="text" name="apps[url][]" value="" /></td>' +
                              '<td class="s-actions">' +
                                '<a href="#" class="s-apps-edit" title="Редактировать"><i class="icon16 edit"></i></a>' +
                                '<a href="#" class="s-apps-delete" title="Удалить"><i class="icon16 delete"></i></a>' +
                              '</td></tr>');
        $('#s-wa-apps').next('div').show();
        return false;
    });

    $("#s-wa-apps a.s-apps-edit").live('click', function () {
        var tr = $(this).parents('tr');
        tr.find('span').hide();
        tr.find('input').show();
        $('#s-wa-apps').next('div').show();
        return false;
    });

    $("#s-wa-apps a.s-apps-delete").live('click', function () {
        if (confirm('Ссылка будет удалена из меню. Продолжить?')) {
            $(this).parents('tr').remove();
        }
        $('#s-wa-apps').next('div').show();
        return false;
    });

    $("#s-wa-apps").sortable({
        distance: 5,
        helper: 'clone',
        items: 'tr',
        opacity: 0.75,
        tolerance: 'pointer',
        stop: function (event, ui) {
            $("#s-wa-apps").next('div').show();
        }
    });

    $("input[name=wa_apps_type]").change(function () {
        if ($("#waapps-select").is(":checked")) {
            $("#waapps-select").parent().children('div').show();
        } else {
            $("#waapps-select").parent().children('div').hide();
        }
    });

    $("#s-domain-title").click(function () {
        if ($(this).is(":checked")) {
            $(this).parent().children('div').hide().children('input').attr('disabled', 'disabled');
        } else {
            $(this).parent().children('div').show().children('input').removeAttr('disabled');
        }
    });

    $("#s-settings-form").submit(function () {
        //Remove notification indicator
        $('#wa-app-site').find('.indicator').remove();

        $("#s-settings-iframe").one('load', function () {
            var response = $.parseJSON($(this).contents().find('body').html());
            if (response.status == 'ok') {
                $("#s-settings-form-status").html("Сохранено").css('color', '#000');
                $("#s-settings-form-status").fadeIn("slow", function () {
                    $("#s-settings-form-status").fadeOut(3000);
                });
                location.reload();
            } else {
                $("#s-settings-form-status").html(response.errors ? response.errors : response).css('color', 'red');
                $("#s-settings-form-status").fadeIn("slow");
            }
        });
    });

    $("#s-delete").click(function () {

        <?php $_smarty_tpl->tpl_vars['_domains'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['domains']->value)===null||$tmp==='' ? array() : $tmp), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['_domains_count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['_domains']->value), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['_latter_apps_names'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['latter_apps_names']->value)===null||$tmp==='' ? array() : $tmp), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['_latter_apps_names_count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['_latter_apps_names']->value), null, 0);?>

        var single_site = <?php echo json_encode(($_smarty_tpl->tpl_vars['_domains_count']->value===1));?>
,
            content = 'Будет удален весь сайт со всеми страницами без возможности восстановления. Удалить?';

        if (single_site) {
            content = 'Вместе с сайтом будут удалены правила маршрутизации для установленных приложений. Это ограничит их функциональность. Удалить сайт?';
        }
        <?php if (!empty($_smarty_tpl->tpl_vars['latter_apps_names']->value)){?>
            content = '<?php echo sprintf(_w("Deleting this site will also delete routing rules set up for <b>%s</b> app. This will limit its functionality.</p><p>Upon site deletion, set up routing rules for this app in the structure settings of remaining sites to continue using all functions.","Deleting this site will also delete routing rules set up for <b>%s</b> apps. This will limit their functionality.</p><p>Upon site deletion, set up routing rules for these apps in the structure settings of remaining sites to continue using all functions.",count($_smarty_tpl->tpl_vars['latter_apps_names']->value),false),smarty_modifier_join($_smarty_tpl->tpl_vars['latter_apps_names']->value,"»</b>, <b>«"));?>
';
        <?php }?>

        <?php if (!empty($_smarty_tpl->tpl_vars['domain_alias']->value)&&empty($_smarty_tpl->tpl_vars['latter_apps_names']->value)){?>
            content = 'Удалить этот сайт-зеркало? Никакие данные основного сайта <strong>не&nbsp;будут</strong> удалены.';
        <?php }?>

        $().waDialog({
            'title': 'Удалить сайт',
            'content': '<p>'+ content +'</p>',
            'height': '246px',
            'width': '450px',
            'buttons': '<input type="submit" class="button red" value="Удалить"> или <a href="javascript:void(0);" class="cancel">отмена</a>',
            onSubmit: function (d) {
                deleteSite();
                d.trigger('close');
                return false;
            }
        });

        function deleteSite() {
            $.post('?module=settings&action=delete', "domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
", function (response) {
                if (response.status == 'ok') {
                    if ($.wa.site.domain == <?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
) {
                        location.href = '?';
                    } else {
                        var l = $("#s-settings-domains li.selected");
                        if (l.prev().length) {
                            $.wa.setHash(l.prev().children('a').attr('href'));
                        } else if (l.next().length) {
                            $.wa.setHash(l.next().children('a').attr('href'));
                        }
                        l.remove();
                        $("a[href='?domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
']").parent().remove();
                    }
                }
            }, "json");
        }

        return false;
    });

    // CDN
    var $cdn_wrapper = $('.js-cdn-wrapper'),
        $cnd_list = $cdn_wrapper.find('.js-cdn-list'),
        $add_cdn = $cdn_wrapper.find('.js-cdn-add'),
        cdn_template = <?php ob_start();?><?php smarty_template_function__renderCdnItem($_smarty_tpl,array());?>
<?php echo json_encode(ob_get_clean())?>;

    switchCdnRemoveIcon();

    $add_cdn.on('click', function (e) {
        e.preventDefault();
        addCdnInput();
    });

    $cdn_wrapper.on('click', '.js-cdn-remove', function (e) {
        var $item = $(this).parent('.js-cdn');
        removeCdnInput($item);
    });

    function switchCdnRemoveIcon() {
        var $items = $cdn_wrapper.find('.js-cdn');

        if ($items.length > 1) {
            $items.each(function (i, item) {
                var $item = $(item);
                $item.find('.js-cdn-remove').show();
            });
        } else {
            $items.each(function (i, item) {
                var $item = $(item);
                $item.find('.js-cdn-remove').hide();
            });
        }
    }

    function addCdnInput() {
        var $item = $(cdn_template);
        $cnd_list.append($item);
        switchCdnRemoveIcon();
    }

    function removeCdnInput($item) {
        $item.remove();
        switchCdnRemoveIcon();
    }
</script>
<?php }} ?>