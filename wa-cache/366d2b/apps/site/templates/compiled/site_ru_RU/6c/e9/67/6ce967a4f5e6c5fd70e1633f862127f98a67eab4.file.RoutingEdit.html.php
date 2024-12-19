<?php /* Smarty version Smarty-3.1.14, created on 2024-05-09 12:16:34
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\templates\actions-legacy\routing\RoutingEdit.html" */ ?>
<?php /*%%SmartyHeaderCode:1632432067663c9472947081-32584948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ce967a4f5e6c5fd70e1633f862127f98a67eab4' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\templates\\actions-legacy\\routing\\RoutingEdit.html',
      1 => 1679484626,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1632432067663c9472947081-32584948',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app' => 0,
    'app_id' => 0,
    'domain' => 0,
    'wa' => 0,
    'wa_backend_url' => 0,
    'domain_id' => 0,
    'route_id' => 0,
    'route' => 0,
    'wa_url' => 0,
    'domain_decoded' => 0,
    'apps' => 0,
    'route_name' => 0,
    'themes' => 0,
    'locales' => 0,
    '_l' => 0,
    'is_https' => 0,
    'site_url' => 0,
    'params' => 0,
    'p' => 0,
    'key' => 0,
    'value' => 0,
    'last_app_route' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_663c9472e2fcd8_62598883',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_663c9472e2fcd8_62598883')) {function content_663c9472e2fcd8_62598883($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'C:\\OSPanel\\domains\\tovarka\\wa-system\\vendors\\smarty3\\plugins\\function.html_options.php';
?><script type="text/javascript">
    document.title = <?php if ($_smarty_tpl->tpl_vars['app']->value){?><?php echo json_encode($_smarty_tpl->tpl_vars['app']->value['name']);?>
 + ' настройки'<?php }elseif($_smarty_tpl->tpl_vars['app_id']->value==':text'){?>'Произвольный текст'<?php }else{ ?>'Перенаправление'<?php }?> + ' — ' + <?php echo json_encode($_smarty_tpl->tpl_vars['domain']->value);?>
;
</script>
<?php if (!$_smarty_tpl->tpl_vars['wa']->value->get('details')){?>
<div class="s-editor s-white s-app-settings article box contentbox">
    <form id="s-settings-form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
site/?module=routing&action=save&domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
&route=<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
">
    <?php if ($_smarty_tpl->tpl_vars['wa']->value->get('reload_on_change')){?><input type="hidden" name="correct_url" value="1"><?php }?>
    <div class="float-left s-route">
        <div class="block s-route-core">

            <a href="#" class="cancel back s-route-block">&larr; Назад</a>

            <?php if (strlen($_smarty_tpl->tpl_vars['route_id']->value)){?>

                <!-- existing route -->
                <?php if (empty($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>
                    <div class="s-route-block" id="s-route-what">
                        <?php if ($_smarty_tpl->tpl_vars['app']->value){?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['app']->value['icon'][24];?>
" />
                            <h3><?php echo $_smarty_tpl->tpl_vars['app']->value['name'];?>
</h3>
                        <?php }elseif($_smarty_tpl->tpl_vars['route']->value['app']===':text'){?>
                            Произвольный текст
                        <?php }else{ ?>
                            <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['route']->value['app'], ENT_QUOTES, 'UTF-8', true);?>

                        <?php }?>
                    </div>
                <?php }?>

                <div class="s-route-block" id="s-route-where">
                    <span class="gray">
                        <?php echo $_smarty_tpl->tpl_vars['domain_decoded']->value;?>
/
                    </span><input type="text" name="params[url]" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['route']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="js-url bold large" />
                </div>

                <?php if (empty($_smarty_tpl->tpl_vars['route']->value['redirect'])&&!isset($_smarty_tpl->tpl_vars['route']->value['static_content'])&&!$_smarty_tpl->tpl_vars['app']->value){?>
                <div class="block half-padded float-right">
                    <ul class="menu-h">
                        <li><a href="#" class="s-route-action s-route-delete" title="Удалить правило"><i class="icon16 delete"></i>Удалить правило</a></li>
                    </ul>
                </div>
                <?php }?>

            <?php }else{ ?>

                <!-- new route -->
                <div class="s-route-block" id="s-route-where">
                    <span class="gray">
                        <?php echo $_smarty_tpl->tpl_vars['domain_decoded']->value;?>
/
                    </span><input type="text" name="params[url]" value="*" class="js-url bold large" />
                </div>

                <?php if (empty($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>
                    <div class="s-route-block" id="s-route-what">
                        <span class="gray">&rarr;</span>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['app']->value['icon'][24];?>
" />
                        <select class="s-select-app" name="params[app]">
                            <?php  $_smarty_tpl->tpl_vars['app'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['app']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['apps']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['app']->key => $_smarty_tpl->tpl_vars['app']->value){
$_smarty_tpl->tpl_vars['app']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['app']->value['id'];?>
" data-img="<?php echo $_smarty_tpl->tpl_vars['app']->value['icon'][24];?>
"><?php echo $_smarty_tpl->tpl_vars['app']->value['name'];?>
</option>
                            <?php } ?>
                            <option value=":text" data-img="wa-apps/site/img/script-code.png?v=1">Произвольный текст</option>
                            <option value="" data-img="wa-apps/site/img/arrow.png">Перенаправление...</option>
                        </select>
                    </div>
                <?php }?>

            <?php }?>

            <div class="s-route-block" style="margin-left: -5px;<?php if (empty($_smarty_tpl->tpl_vars['route']->value['redirect'])){?> display: none;<?php }?>" id="s-route-to">
                &rarr;
                <input type="text" name="params[redirect]" <?php if (!isset($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>disabled<?php }?> value="<?php if (!empty($_smarty_tpl->tpl_vars['route']->value['redirect'])){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['route']->value['redirect'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="bold large" placeholder="http://" />
            </div>

        </div>
<?php }?>
        <div class="block padded s-redirect-details" style="<?php if (empty($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>display: none;<?php }?>">
            
            <div class="field-group">
                <div class="field">
                    <div class="name">Временное перенаправление</div>
                    <div class="value">
                        <label>
                            <input type="checkbox" name="params[code]" value="302"<?php if (!empty($_smarty_tpl->tpl_vars['route']->value['code'])&&$_smarty_tpl->tpl_vars['route']->value['code']==302){?> checked<?php }?> />
                            Использовать код ответа сервера 302
                        </label>
                    </div>
                    <div class="value">
                        <div class="hint">Включите только для <strong>временного</strong> перенаправления, которое вы планируете отменить в будущем.</div>
                        <div class="hint">Выключите для использования <strong>постоянного</strong> перенаправления с кодом ответа сервера 301 — он сообщает поисковым системам, что новый URL должен индексироваться вместо старого.</div>
                    </div>
                </div>

                <div id="s-route-comment" class="field" style="<?php if (empty($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>display: none;<?php }?>">
                    <div class="name">Комментарий</div>
                    <div class="value">
                        <textarea name="params[comment]" class="s-comment" <?php if (!isset($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>disabled<?php }?>><?php echo htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['route']->value['comment'])===null||$tmp==='' ? null : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</textarea>
                    </div>
                </div>

                <div id="s-redirect-disabled" class="field" style="<?php if (empty($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>display: none;<?php }?>">
                    <div class="value s-ibutton-checkbox no-shift">
                        <ul class="menu-h">
                            <li>
                                <span <?php if (empty($_smarty_tpl->tpl_vars['route']->value['disabled'])&&ifempty($_smarty_tpl->tpl_vars['route']->value['disabled'])<=0){?> class="gray"<?php }?> id="s-toggle-redirect-disabled-label">
                                    <label for="js-ibutton-disabled">
                                        Выключено
                                    </label>
                                </span>
                            </li>
                            <li>
                                
                                <input type="hidden" name="params[disabled]" value="1"<?php if (!isset($_smarty_tpl->tpl_vars['route']->value['redirect'])){?> disabled<?php }?>/>
                                <input type="checkbox" id="js-ibutton-disabled" name="params[disabled]" value="0"<?php if (!isset($_smarty_tpl->tpl_vars['route']->value['redirect'])){?> disabled<?php }?><?php if (empty($_smarty_tpl->tpl_vars['route']->value['disabled'])&&ifempty($_smarty_tpl->tpl_vars['route']->value['disabled'])<=0){?> checked<?php }?>>
                            </li>
                            <li>
                                <span id="s-toggle-redirect-enabled-label" <?php if (!empty($_smarty_tpl->tpl_vars['route']->value['disabled'])){?> class="gray"<?php }?>>
                                    <label for="js-ibutton-disabled">
                                        Включено
                                    </label>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="block padded s-route-details">

            <div class="fields form">

                <?php $_smarty_tpl->tpl_vars['themes'] = new Smarty_variable(siteHelper::getThemes($_smarty_tpl->tpl_vars['app_id']->value,true), null, 0);?>
                <?php if ($_smarty_tpl->tpl_vars['app']->value){?>
                <div class="field-group">
                    <div class="field">
                        <div class="name">Название поселения</div>
                        <div class="value">
                            <input type="text" name="params[_name]" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['route_name']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="bold" /><br />
                            <span class="hint">Название используется в меню навигации <em>$wa->apps</em> этого сайта.</span>
                        </div>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['themes']->value){?>
                    <div class="field">
                        <div class="name">Тема оформления</div>
                        <div class="value">
                            <div class="wa-select">
                                <?php echo smarty_function_html_options(array('name'=>"params[theme]",'options'=>$_smarty_tpl->tpl_vars['themes']->value,'selected'=>ifempty($_smarty_tpl->tpl_vars['route']->value['theme'],'default')),$_smarty_tpl);?>

                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="name">Мобильная тема оформления</div>
                        <div class="value">
                            <div class="wa-select">
                                <?php echo smarty_function_html_options(array('name'=>"params[theme_mobile]",'options'=>$_smarty_tpl->tpl_vars['themes']->value,'selected'=>ifempty($_smarty_tpl->tpl_vars['route']->value['theme_mobile'],'default')),$_smarty_tpl);?>

                            </div>
                            <br />
                            <span class="hint">Тема оформления для мобильных multi-touch устройств (iPhone, Android и пр.)</span>
                        </div>
                    </div>
                    <div class="field">
                        <div class="name">Язык</div>
                        <div class="value">
                            <?php if (!strlen($_smarty_tpl->tpl_vars['route_id']->value)){?><?php $_smarty_tpl->tpl_vars['_l'] = new Smarty_variable($_smarty_tpl->tpl_vars['wa']->value->locale(), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['_l'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['route']->value['locale'],''), null, 0);?><?php }?>
                            <div class="wa-select">
                            <?php echo smarty_function_html_options(array('name'=>"params[locale]",'options'=>$_smarty_tpl->tpl_vars['locales']->value,'selected'=>$_smarty_tpl->tpl_vars['_l']->value),$_smarty_tpl);?>
</div><br>
                            <span class="hint">Выберите язык для перевода текстовых строк на страницах сайта.<br>
                            Если выбран вариант «Авто», язык сайта будет определен на основании настроек браузера пользователя.</span>
                        </div>
                    </div>
                    <?php }?>
                    <div class="field">
                        <div class="name">Публичность</div>
                        <div class="value">
                            <label>
                                <span class="wa-checkbox">
                                    <input type="checkbox" value="1" name="params[private]"<?php if (!empty($_smarty_tpl->tpl_vars['route']->value['private'])){?> checked<?php }?>>
                                    <span>
                                        <span class="icon">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </span>
                                </span>
                                Скрытое поселение<br />
                            <span class="hint">При включении этой настройки поселение будет считаться скрытым (не публичным). Оно будет доступно по своему прямому адресу, но не будет включено в массив $wa->apps и основной Sitemap-файл. Скрытыми удобно делать временные поселения, например, страницы «Сайт находится в разработке», и поселения, которые не должны быть включены в основное меню навигации либо индексироваться поисковыми системами.</span>
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="name">Безопасность</div>
                        <div class="value">
                            <label>
                                <span class="wa-checkbox">
                                    <input type="checkbox" value="1" id="ssl_all" name="params[ssl_all]" <?php if (!empty($_smarty_tpl->tpl_vars['route']->value['ssl_all'])){?> checked<?php }?> <?php if (empty($_smarty_tpl->tpl_vars['is_https']->value)){?>disabled<?php }?>>
                                    <span>
                                        <span class="icon">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </span>
                                </span>
                                Перенаправлять на HTTPS<br>
                                <span class="hint ssl_server_https bold" style="<?php if (!empty($_smarty_tpl->tpl_vars['is_https']->value)){?>display: none<?php }?>">Включение перенаправления недоступно, потому что ваш веб-сервер не позволяет отличать подключение через HTTP от HTTPS.<br></span>
                                <span class="hint ssl_all_hide bold" style="display: none">Чтобы активировать эту настройку, <a>войдите через HTTPS</a>.<br></span>
                                <span class="hint">Перенаправлять посетителей сайта с обычного HTTP- на безопасное HTTPS-подключение в пределах этого поселения.
                                <br>
                                Эта настройка будет работать, только если для вашего доменного имени установлен SSL-сертификат.
                                <br>
                                <?php echo sprintf(_w('To enable redirect to HTTPS for <em>all</em> website settlements, change this option in <a href="%s#/settings/">common site settings</a>.'),$_smarty_tpl->tpl_vars['site_url']->value);?>
</span>
                            </label>
                        </div>
                    </div>
                </div>
                <?php if (!empty($_smarty_tpl->tpl_vars['params']->value)){?>
                    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['params']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                    <?php if (is_array($_smarty_tpl->tpl_vars['p']->value)){?>
                        <?php if ($_smarty_tpl->tpl_vars['p']->value['type']=='hidden'){?>
                            <?php echo $_smarty_tpl->tpl_vars['p']->value['value'];?>

                        <?php }else{ ?>
                            <div class="field">
                                <div class="name"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                                <div class="value"><?php echo $_smarty_tpl->tpl_vars['p']->value['value'];?>
</div>
                            </div>
                        <?php }?>
                    <?php }else{ ?>
                        <h5 class="heading clear-both"><br><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
<br><br></h5>
                    <?php }?>
                    <?php } ?>
                <?php }?>
                <div class="field">
                    <div class="name">Дополнительные параметры</div>
                    <div class="value">
                        <textarea name="other_params"><?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['route']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?><?php if (!in_array($_smarty_tpl->tpl_vars['key']->value,array('app','url','theme','theme_mobile','locale','private','ssl','ssl_all','disabled'))&&substr($_smarty_tpl->tpl_vars['key']->value,0,1)!='_'&&!isset($_smarty_tpl->tpl_vars['params']->value[$_smarty_tpl->tpl_vars['key']->value])&&is_scalar($_smarty_tpl->tpl_vars['value']->value)){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true);?>
=<?php if ($_smarty_tpl->tpl_vars['value']->value===false){?>0<?php }else{ ?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>

<?php }?><?php } ?></textarea>
                        <br />
                        <span class="hint">Необязательный набор параметров вида <em>key=value</em>, к значениям которых можно обращаться шаблонах дизайна и страницах этого поселения как <em>&#123;$wa->param("key")&#125;</em>. Каждая пара key=value должна быть указана на отдельной строке. <a href="https://developers.webasyst.ru/docs/templates/design-themes/" target="_blank">Помощь</a> <i class="icon10 new-window"></i></span>
                    </div>
                </div>
                <?php }elseif($_smarty_tpl->tpl_vars['app_id']->value===':text'){?>
                    <div class="field-group">
                        <div class="field">
                            <div class="name">Произвольный текст</div>
                            <div class="value"><textarea name="params[static_content]" placeholder="Текст, который должен быть доступен по указанному URL"><?php echo htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['route']->value['static_content'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</textarea></div>
                        </div>
                        <div class="field">
                            <div class="name">Тип содержимого</div>
                            <div class="value">
                                <select name="params[static_content_type]">
                                    <option value=""<?php if (empty($_smarty_tpl->tpl_vars['route']->value['static_content_type'])){?> selected<?php }?>>файл</option>
                                    <option value="text/plain" <?php if (!empty($_smarty_tpl->tpl_vars['route']->value['static_content_type'])&&($_smarty_tpl->tpl_vars['route']->value['static_content_type']==='text/plain')){?> selected<?php }?>>текст (text/plain)</option>
                                    <option value="text/html" <?php if (!empty($_smarty_tpl->tpl_vars['route']->value['static_content_type'])&&($_smarty_tpl->tpl_vars['route']->value['static_content_type']==='text/html')){?> selected<?php }?>>HTML-код (text/html)</option>
                                </select>
                                <br>
                                <span class="hint">Если выбран тип содержимого «файл», то автоматически начнется скачивание файла, если в его имени не указано расширение.</span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="name">Публичность</div>
                            <div class="value">
                                <label>
                                    <input type="checkbox" value="1" name="params[private]"<?php if (!empty($_smarty_tpl->tpl_vars['route']->value['private'])||!strlen($_smarty_tpl->tpl_vars['route_id']->value)){?> checked<?php }?>> Скрытое поселение<br />
                                    <span class="hint">При включении этой настройки поселение будет считаться скрытым (не публичным). Оно будет доступно по своему прямому адресу, но не будет включено в массив $wa->apps и основной Sitemap-файл. Скрытыми удобно делать временные поселения, например, страницы «Сайт находится в разработке», и поселения, которые не должны быть включены в основное меню навигации либо индексироваться поисковыми системами.</span>
                                </label>
                            </div>
                        </div>
                    </div>

                <?php }elseif($_smarty_tpl->tpl_vars['app']->value===false){?>
                    <div class="field-group">
                        <div class="field">
                            <div class="name"></div>
                            <div class="value red">
                                <i class="icon16 exclamation"></i>
                                <?php if (empty($_smarty_tpl->tpl_vars['route']->value['temporarily_off'])){?>
                                <?php echo sprintf("Приложение [%s] удалено или отключено.",htmlspecialchars((string)$_smarty_tpl->tpl_vars['app_id']->value, ENT_QUOTES, 'UTF-8', true));?>

                                <?php }else{ ?>
                                <?php echo sprintf("Приложение [%s] отключено.",htmlspecialchars((string)$_smarty_tpl->tpl_vars['app_id']->value, ENT_QUOTES, 'UTF-8', true));?>

                                <?php }?>
                            </div>
                        </div>
                    </div>
                <?php }?>

                <?php if (!empty($_smarty_tpl->tpl_vars['route']->value['redirect'])||isset($_smarty_tpl->tpl_vars['route']->value['static_content'])||$_smarty_tpl->tpl_vars['app']->value){?>
                <div class="field">
                    <div class="<?php if (!$_smarty_tpl->tpl_vars['wa']->value->get('reload_on_change')){?>value<?php }else{ ?>wa-design-save-panel block bordered-top<?php }?>">
                        <?php if (strlen($_smarty_tpl->tpl_vars['route_id']->value)){?>
                        <div class="block half-padded float-right">
                            <ul class="menu-h">
                                <li><a href="#" class="s-route-action s-route-delete" title="Удалить правило"><i class="icon16 delete"></i>Удалить правило</a></li>
                            </ul>
                        </div>
                        <?php }?>

                        <input type="submit" name="save" class="button green" value="Сохранить" />
                        <span id="s-settings-form-status"></span>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
<?php if (!$_smarty_tpl->tpl_vars['wa']->value->get('details')){?>
    </div>
    </form>
<div class="clear"></div>
</div>


<div class="dialog width550px height200px" id="remove-last-route">
    <div class="dialog-background"> </div>
    <div class="dialog-window">
        <div class="dialog-content">
            <div class="dialog-content-indent">
                <h1>Удалить правило</h1>
                <p><?php echo sprintf('Вы удаляете единственное настроенное правило маршрутизации для приложения «<b>%s</b>».',ifempty($_smarty_tpl->tpl_vars['app']->value['name']));?>
</p><p>Это ограничит его функциональность. Удалить правило?</p>
            </div>
            <div class="clear"></div>
        </div>
        <div class="dialog-buttons">
            <div class="dialog-buttons-gradient">
                <input type="submit" class="button red" value="Удалить"> или <a href="javascript:void(0);" class="cancel">отмена</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function () {

    var $disabled_toggle = $("#js-ibutton-disabled");
    var is_new_route = <?php if (strlen($_smarty_tpl->tpl_vars['route_id']->value)){?>false<?php }else{ ?>true<?php }?>;

    function updateRoutingErrors(routing_errors)
    {
        // Page could be loaded by other apps, so $.wa.site not loaded, but updateRoutingErrors is not very important method, so we just skip call
        if ($.wa.site) {
            $.wa.site.updateRoutingErrors(routing_errors);
        } else if (routing_errors) {
            console.log(routing_errors);
        }
    }

    // Rule address contains unsupported character, regexp for define it
    var invalid_url_regexp = /(\&|\$|\+|\,|\:|\;|\=|\?|\@|\#|\<|\>|\[|\]|\}|\||\^|\%)/;

    <?php if (isset($_smarty_tpl->tpl_vars['route']->value['redirect'])){?>
        $disabled_toggle.iButton({
            labelOn: "",
            labelOff: "",
            classContainer: "c-ibutton ibutton-container mini"
        }).change(function() {
            if (this.checked) {
                $('#s-toggle-redirect-disabled-label').addClass('gray');
                $('#s-toggle-redirect-enabled-label').removeClass('gray');
            } else {
                $('#s-toggle-redirect-disabled-label').removeClass('gray');
                $('#s-toggle-redirect-enabled-label').addClass('gray');
            }
        });
    <?php }?>

    function checkUrlInput() {
        var $form = $("#s-settings-form"),
            $url_input = $form.find('.js-url'),
            url = $url_input.val(),
            res = url.match(invalid_url_regexp),
            is_valid = !res;
        if (url.length && !is_valid) {
            $url_input.attr('disabled', true);
            $url_input.append($('<input type="hidden" name="params[url]">').val(url));
        }
    }

    if (!is_new_route) {
        checkUrlInput();
    }

    function checkSSLProtocol() {
        //Disabled ssl checkbox
        if (window.location.protocol.replace(':', '') != 'https') {
            $('#ssl_all').attr('disabled', true);
            $('.ssl_server_https').hide();
            $('.ssl_all_hide').show();
            $('.ssl_all_hide a').attr('href', window.location.href.replace('http', 'https'));
        }
    }
    checkSSLProtocol();

    $("select.s-select-app").on('change', function () {
        if ($(this).val()) {
            $('.s-route-details').html('<i class="icon16 loading"></i>').load('?module=routing&action=edit', 'domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
&app=' + $(this).val() + '&details=1', function () {
                checkSSLProtocol();
            });
            if ($(this).next('.redirect').length) {
                $(this).next('.redirect').remove();
            }
            $('#s-route-what').show();
            $('#s-route-to').hide().find('input').attr('disabled', 'disabled');
            $('#s-route-comment').hide().find('textarea').attr('disabled', 'disabled');
            $('#s-redirect-disabled').hide().find('input').attr('disabled', 'disabled');
        } else {
            $('.s-route-details').find('div.field,div.field-group').not('div.field:last').remove();
            $('.s-redirect-details').show();
            if ($(this).next('.redirect').length) {
                $(this).next().find('input').val('');
            } else {
                $('<span class="redirect"> <input name="params[redirect]" class="long" type="text" /></span>').insertAfter(this);
                $(this).hide();
            }
            $('#s-route-where input').focus();
            $('#s-route-what').hide();
            $('#s-route-to').show().find('input').removeAttr('disabled');
            $('#s-route-comment').show().find('textarea').removeAttr('disabled');
            $('#s-redirect-disabled').show().find('input').removeAttr('disabled');
            $disabled_toggle.iButton({
                labelOn: "",
                labelOff: "",
                classContainer: "c-ibutton ibutton-container mini"
            });
        }

        var $select = $(this),
            $option = $select.find(':selected'),
            $img = $select.prev();

        var src = "<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
" + $option.attr('data-img');

        $img.attr('src', src).show();

        // if ($select.val() == ":text") {
        //     $img.attr('style', 'width: 16px; height: 16px;');
        // } else {
        //     $img.removeAttr('style');
        // }
    });

    // Delete route
    $("a.s-route-delete").on('click', function () {
        var last_app_route = <?php echo json_encode($_smarty_tpl->tpl_vars['last_app_route']->value);?>
,
            content = 'Правило будет удалено из структуры сайта. Продолжить?';

        if (last_app_route) {
            content = '<?php echo sprintf('Вы удаляете единственное настроенное правило маршрутизации для приложения «<b>%s</b>».',ifempty($_smarty_tpl->tpl_vars['app']->value['name']));?>
</p><p>Это ограничит его функциональность. Удалить правило?';
        }

        $().waDialog({
            'title': 'Удалить правило',
            'content': '<p>'+ content +'</p>',
            'height': '190px',
            'width': '400px',
            'buttons': '<input type="submit" class="button red" value="Удалить"> или <a href="javascript:void(0);" class="cancel">отмена</a>',
            onSubmit: function (d) {
                deleteRoute();
                d.trigger('close');
                return false;
            }
        });

        function deleteRoute() {
            $.post("?module=routing&action=delete&domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
", { "route": "<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
" }, function (response) {
                if (response.status == 'ok') {
                    $("#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
").remove();
                    $("#s-route-params").html('<div class="block double-padded align-center hint"><br />' +
                        '<img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-apps/site/img/gear.png"><br /><br />Выберите правило маршрутизации для редактирования его настроек' +
                        '<div class="clear"></div></div>'
                    ).animate({ 'margin-left': '75%' }, 'slow');
                    $(".s-editor .sidebar").animate({ 'width':'75%'}, 'slow');
                    $("#s-rules").removeClass('s-routing-minimized');
                    $("#s-rules .s-domain-url").show();

                    updateRoutingErrors(response.data.routing_errors);

                } else {
                    alert(response.errors);
                }
            }, "json");
        }

        return false;
    });

    $("#s-settings-form").on('submit', function () {
        var $form = $(this),
            $url_input = $form.find('.js-url').last();

        $("#s-settings-form-status").html('<i style="vertical-align:middle" class="icon16 loading"></i> Сохранение...').fadeIn("slow");
        var callback = function (response) {
            if (response.status === 'ok') {
                <?php if (strlen($_smarty_tpl->tpl_vars['route_id']->value)){?>
                    <?php if ($_smarty_tpl->tpl_vars['wa']->value->get('reload_on_change')){?>
                        if (response.data.change) {
                            location.reload();
                        }
                    <?php }?>
                    if (response.data.delete) {
                        $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
').insertAfter($('#route-' + response.data.delete));
                        $('#route-' + response.data.delete).remove();
                    }
                    $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .s-editable-url').text(response.data.url);
                    if (response.data.redirect) {
                        $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .redirect').text(response.data.redirect);
                        if (response.data.disabled) {
                            $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .s-app').addClass('gray');
                        } else {
                            $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .s-app').removeClass('gray');
                        }
                    } else if (response.data.static_content) {
                        $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .text').text(response.data.static_content.substr(0, 32)+(response.static_content.length>32?'...':''));
                    } else {
                        if (response.data.private) {
                            $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .s-app').addClass('gray');
                        } else {
                            $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .s-app').removeClass('gray');
                        }
                    }
                    if ($('#ssl_all').prop('checked')) {
                        $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .lock').removeClass('hidden');
                    } else {
                        $('#route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
 .lock').addClass('hidden');
                    }
                <?php }?>
                    if (response.data.add) {
                        if (response.data.add === 'top') {
                            $('#s-rules').prepend(response.data.html);
                        } else {
                            $('#s-rules').append(response.data.html);
                        }
                    }
                    $("#s-settings-form-status").html('<i style="vertical-align:middle" class="icon16 yes"></i>Сохранено').fadeOut('slow', function () {
                        site_routing_full();
                    });
                $form.find('input.button:submit').removeClass('red').addClass('green');
            } else if (response.status === 'fail') {
                $("#s-settings-form-status").html('<span class="small" style="color: #f00;">' + response.errors + '</span>');
                $form.find('input.button:submit').removeClass('green').addClass('red');
            }
        };

        // Validating unsupported characters in url
        if (!$url_input.attr('disabled') && $url_input.length) {
            var url = $url_input.val(),
                res = url.match(invalid_url_regexp);

            if (res) {

                $("#s-settings-form-status").html('');

                var title = 'Невозможно сохранить правило',
                    content = 'В адресе правила содержится недопустимый символ <strong class="highlighted">%s</strong>.';

                content = content.replace(/\%s/, res[0]);

                $().waDialog({
                    'title': title,
                    'content': '<p>'+ content +'</p>',
                    'height': '140px',
                    'width': '400px',
                    'buttons': '<a class="button red cancel">Закрыть</a>'
                });

                return false;
            }
        }

        $.post($form.attr('action'), $form.serialize(), function (response) {
            if (response.status === 'ok' && response.data.confirm) {
                if (confirm(response.data.confirm)) {
                    $.post($form.attr('action') + '&replace=' + response.data.replace, $form.serialize(), callback, 'json')
                } else {
                    $("#s-settings-form-status").empty();
                }
            } else {
                callback(response);
            }
            if (response.hasOwnProperty('data') && response.data.hasOwnProperty('routing_errors')) {
                updateRoutingErrors(response.data.routing_errors);
            }

        }, "json");
        return false;
    });
    $("#s-settings-form .cancel").click(function () {
        site_routing_full();
        return false;
    });
 });
</script>
<?php }?>
<?php }} ?>