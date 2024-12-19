<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:29:49
         compiled from "C:\OSPanel\domains\tovarka\wa-system\design\templates-legacy\Design.html" */ ?>
<?php /*%%SmartyHeaderCode:15930102846636708d7a0882-03347311%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b877c8773d2da4fdc0a73e49e790630dd7ba7abd' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-system\\design\\templates-legacy\\Design.html',
      1 => 1709650897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15930102846636708d7a0882-03347311',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'options' => 0,
    'wa_url' => 0,
    'wa' => 0,
    'app' => 0,
    'route' => 0,
    'theme' => 0,
    '_route_label' => 0,
    'themes_routes' => 0,
    'r' => 0,
    'themes' => 0,
    '_theme' => 0,
    'design_url' => 0,
    '_r_label' => 0,
    '_theme_is_trial' => 0,
    'current_url' => 0,
    '_url' => 0,
    '_title' => 0,
    'themes_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_6636708eb6f973_21213987',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6636708eb6f973_21213987')) {function content_6636708eb6f973_21213987($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\OSPanel\\domains\\tovarka\\wa-system\\vendors\\smarty3\\plugins\\modifier.truncate.php';
?><?php if ($_smarty_tpl->tpl_vars['options']->value['js']['ace']){?><script src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/ace/ace.js"></script><?php }?>
<?php if ($_smarty_tpl->tpl_vars['options']->value['js']['editor']){?><script src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/jquery-wa/wa.elrte.ace.js?v<?php echo $_smarty_tpl->tpl_vars['wa']->value->version();?>
"></script><?php }?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/css/wa/design.css?<?php echo $_smarty_tpl->tpl_vars['wa']->value->version();?>
">

<?php if ($_smarty_tpl->tpl_vars['options']->value['container']){?>
<div class="shadowed wa-design">
<?php }?>
    <div>
        <!-- theme navigation -->
        <ul class="menu-h dropdown wa-theme-globalnav" id="wa-design-menu">
            <li class="wa-theme-globalnav-switch">
                <!-- active app settlement / theme selector -->
                <a href="#" class="inline-link" id="wa-theme-active">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['app']->value['icon'][48];?>
" style="width:48px;height:48px;">
                    <b><i><span class="url"><?php if ($_smarty_tpl->tpl_vars['route']->value){?><?php $_smarty_tpl->tpl_vars['_route_label'] = new Smarty_variable(($_smarty_tpl->tpl_vars['route']->value['_domain']).('/').($_smarty_tpl->tpl_vars['route']->value['url']), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['_route_label'] = new Smarty_variable($_smarty_tpl->tpl_vars['theme']->value['name'], null, 0);?><?php }?><?php echo smarty_modifier_truncate(str_replace('www.','',$_smarty_tpl->tpl_vars['_route_label']->value),23,'...',false,true);?>
</span></i></b>
                    <i class="icon10 darr"></i>
                    <br>
                    <span class="hint"><?php if ($_smarty_tpl->tpl_vars['route']->value){?><?php echo $_smarty_tpl->tpl_vars['theme']->value['name'];?>
<?php }?></span>
                </a>
                <ul id="wa-theme-list" class="menu-v">
                    <?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['r']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['themes_routes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
$_smarty_tpl->tpl_vars['r']->_loop = true;
?>
                        <?php if (is_array($_smarty_tpl->tpl_vars['r']->value)){?>
                            
                            <?php $_smarty_tpl->tpl_vars['_theme'] = new Smarty_variable($_smarty_tpl->tpl_vars['themes']->value[$_smarty_tpl->tpl_vars['r']->value['theme']], null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_theme_is_trial'] = new Smarty_variable(($_smarty_tpl->tpl_vars['_theme']->value['type']==waTheme::TRIAL), null, 0);?>
                            <?php ob_start();?><?php echo urlencode($_smarty_tpl->tpl_vars['r']->value['_domain']);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['_url'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['design_url']->value)."theme=".((string)$_smarty_tpl->tpl_vars['r']->value['theme'])."&domain=".$_tmp1."&route=".((string)$_smarty_tpl->tpl_vars['r']->value['_id']), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_r_label'] = new Smarty_variable((waIdna::dec($_smarty_tpl->tpl_vars['r']->value['_domain'])).('/').($_smarty_tpl->tpl_vars['r']->value['url']), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_title'] = new Smarty_variable(str_replace('www.','',$_smarty_tpl->tpl_vars['_r_label']->value), null, 0);?>

                            <li class="no-icon 2<?php if ($_smarty_tpl->tpl_vars['_theme_is_trial']->value){?> is-trial<?php }?><?php if ($_smarty_tpl->tpl_vars['current_url']->value==$_smarty_tpl->tpl_vars['_url']->value){?> selected<?php }?>"<?php if (!empty($_smarty_tpl->tpl_vars['r']->value['_routing_url'])){?> data-routing="<?php echo $_smarty_tpl->tpl_vars['r']->value['_routing_url'];?>
"<?php }?> data-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <a class="bold" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
" data-preview-label="Сайт" data-url="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['r']->value['_preview_url'], ENT_QUOTES, 'UTF-8', true);?>
">
                                    <span class="url"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_title']->value,45,'...',false,true);?>
</span>
                                    <span class="hint"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                </a>
                            </li>

                            
                            <?php if (!empty($_smarty_tpl->tpl_vars['r']->value['theme_mobile'])&&($_smarty_tpl->tpl_vars['r']->value['theme_mobile']!=$_smarty_tpl->tpl_vars['r']->value['theme'])&&!empty($_smarty_tpl->tpl_vars['themes']->value[$_smarty_tpl->tpl_vars['r']->value['theme_mobile']])){?>
                                <?php $_smarty_tpl->tpl_vars['_theme'] = new Smarty_variable($_smarty_tpl->tpl_vars['themes']->value[$_smarty_tpl->tpl_vars['r']->value['theme_mobile']], null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['_theme_is_trial'] = new Smarty_variable(($_smarty_tpl->tpl_vars['_theme']->value['type']==waTheme::TRIAL), null, 0);?>
                                <?php ob_start();?><?php echo urlencode($_smarty_tpl->tpl_vars['r']->value['_domain']);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['_url'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['design_url']->value)."theme=".((string)$_smarty_tpl->tpl_vars['r']->value['theme_mobile'])."&domain=".$_tmp2."&route=".((string)$_smarty_tpl->tpl_vars['r']->value['_id']), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['_r_label'] = new Smarty_variable((waIdna::dec($_smarty_tpl->tpl_vars['r']->value['_domain'])).('/').($_smarty_tpl->tpl_vars['r']->value['url']), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['_title'] = new Smarty_variable(str_replace('www.','',$_smarty_tpl->tpl_vars['_r_label']->value), null, 0);?>

                                <li class="no-icon 3<?php if ($_smarty_tpl->tpl_vars['_theme_is_trial']->value){?> is-trial<?php }?><?php if ($_smarty_tpl->tpl_vars['current_url']->value==$_smarty_tpl->tpl_vars['_url']->value){?> selected<?php }?>" <?php if (!empty($_smarty_tpl->tpl_vars['r']->value['_routing_url'])){?>data-routing="<?php echo $_smarty_tpl->tpl_vars['r']->value['_routing_url'];?>
"<?php }?> data-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
                                    <a class="bold" href="<?php echo $_smarty_tpl->tpl_vars['_url']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['_title']->value;?>
" data-preview-label="Предпросмотр"<?php if (!empty($_smarty_tpl->tpl_vars['_theme']->value['preview_url'])){?> data-url="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['preview_url'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>>
                                        <i class="icon16 mobile float-right"></i>
                                        <span class="url"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['_title']->value,45,'...',false,true);?>
</span>
                                        <span class="hint"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                    </a>
                                </li>
                            <?php }?>
                        <?php }else{ ?>
                            
                            <?php $_smarty_tpl->tpl_vars['_theme'] = new Smarty_variable($_smarty_tpl->tpl_vars['themes']->value[$_smarty_tpl->tpl_vars['r']->value], null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_theme_is_trial'] = new Smarty_variable(($_smarty_tpl->tpl_vars['_theme']->value['type']==waTheme::TRIAL), null, 0);?>
                            <?php $_smarty_tpl->tpl_vars['_url'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['design_url']->value)."theme=".((string)$_smarty_tpl->tpl_vars['_theme']->value['id']), null, 0);?>
                            <li class="no-icon 1<?php if ($_smarty_tpl->tpl_vars['_theme_is_trial']->value){?> is-trial<?php }?><?php if ($_smarty_tpl->tpl_vars['current_url']->value==$_smarty_tpl->tpl_vars['_url']->value){?> selected<?php }?>" data-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
theme=<?php echo $_smarty_tpl->tpl_vars['_theme']->value['id'];?>
" data-preview-label="Предпросмотр"<?php if (!empty($_smarty_tpl->tpl_vars['_theme']->value['preview_url'])){?> data-url="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['preview_url'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>>
                                    <span class="url"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_theme']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                </a>
                            </li>
                        <?php }?>
                    <?php } ?>
                </ul>
            </li>

            <li data-action="theme" class="info selected"><a class="wa-themes-link" href="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
theme=<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
&action=theme"><i class="icon48 appearance"></i>Оформление</a></li>
            <li data-action="edit" class="templates" style="display: none;"><a href="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
theme=<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
&action=edit"><i class="icon48 templates"></i>Шаблоны</a></li>
            <li data-action="settings" class="settings"><a href="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
action=settings"><i class="icon48 settings"></i>Настройки</a></li>
            <?php if (!empty($_smarty_tpl->tpl_vars['options']->value['pages'])&&$_smarty_tpl->tpl_vars['wa']->value->userRights('pages')){?><li class="pages"><a data-action="pages" href="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
pages/"><i class="icon48 pages"></i>Страницы</a></li><?php }?>
            <?php if ($_smarty_tpl->tpl_vars['wa']->value->user()->getRights('installer')){?><li class="themes"><a class="wa-themes-link" href="<?php echo $_smarty_tpl->tpl_vars['themes_url']->value;?>
"><i class="icon48 store"></i>Темы дизайна</a></li><?php }?>

            <?php if ($_smarty_tpl->tpl_vars['theme']->value['preview_url']){?>
                <li class="float-right">
                    <a data-url="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['preview_url'], ENT_QUOTES, 'UTF-8', true);?>
" data-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['preview_url'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank" class="wa-theme-preview" style="color: #000;">
                        <i class="icon48 preview"></i><span><?php if ($_smarty_tpl->tpl_vars['theme']->value['is_used']){?>Сайт<?php }else{ ?>Предпросмотр<?php }?></span>
                    </a>
                </li>
            <?php }?>
        </ul>
    </div>

    <div id="wa-design-container" class="blank">
        <div class="block double-padded">
            Загрузка... <i class="icon16 loading"></i>
            <div class="clear"></div>
        </div>
    </div>

    <div class="dialog" id="wa-design-preview">
        <div class="dialog-background"> </div>
        <div class="dialog-window" style="bottom: auto; min-height: 150px; width: 400px; min-width: 400px">
            <form>
                <input type="hidden" id="wa-preview-key" value="" />
                <div class="dialog-content">
                    <div class="dialog-content-indent">
                        <h1>Предварительный просмотр</h1>
                        <p>Тема дизайна «<strong id="wa-current-theme"></strong>» временно активирована для вашего пользователя. Вы можете полноценно просматривать сайт в выбранной теме дизайна, и другие посетители сайта этого не увидят.</p>
                        <?php if ($_smarty_tpl->tpl_vars['theme']->value['preview_url']){?>
                            <a href="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['theme']->value['preview_url'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank">
                                <span>Предпросмотр</span><i class="icon10 new-window" style="vertical-align: baseline;margin-left: 4px;"></i>
                            </a>
                        <?php }?>
                    </div>
                </div>
                <div class="dialog-buttons">
                    <div class="dialog-buttons-gradient">
                        <input type="submit" class="button" value="Завершить предварительный просмотр">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var wa_url = "<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
";

        var $theme_preview_link = $('#wa-design-menu .wa-theme-preview'),
            $theme_edit_link = $('#wa-design-menu li[data-action="edit"]');

        function waDesignConfirm() {
            if ($("#wa-design-button").length && $('#wa-design-button').hasClass('yellow')) {
                if (!confirm("Несохраненные изменения будут потеряны. Продолжить?")) {
                    return false;
                }
            }
            return true;
        }
        $(window).on('beforeunload', function () {
            if ($("#wa-design-button").length && $('#wa-design-button').hasClass('yellow')) {
                return "Несохраненные изменения будут потеряны. Продолжить?";
            }
        });

        $('.wa-theme-globalnav').on('mouseover', function () {
            $('#wa-theme-list').css('display', '');
        });

        var waDesignHash = function (url) {
            if (!url || !url.length) {
                return '';
            }
            url = url.replace(/\/$/, '').replace(/^#/, '')
            var urls = url.split('/');
            var n = urls.length;
            url = urls[n - 1];
            var i = n - 2;
            while (i >= 0 && urls[i].indexOf('=') != -1) {
                url = urls[i] + '/' + url;
                i--;
            }
            return url;
        };

        var waDesignParams = function (url) {
            url = waDesignHash(url);
            var params_ar = url.split('&');
            var params = { };
            for (var i = 0; i < params_ar.length; i++) {
                var tmp = params_ar[i].split('=');
                params[tmp[0]] = tmp[1];
            }
            return params;
        };

        $("#wa-theme-list li a").click(function (e, set_active_only) {
            var $self = $(this),
                href = $self.attr('href');

            $('#wa-theme-list').hide();
            $('#wa-theme-list li').removeClass('selected');
            $self.parent().addClass('selected');
            var params = waDesignParams(href);
            if (params['theme']) {
                $("#wa-theme-active span.url").html($self.find('span.url').html());
                if ($self.find('span.hint').length) {
                    $("#wa-theme-active span.hint").html($self.find('span.hint').html());
                } else {
                    $("#wa-theme-active span.hint").empty();
                }

                $('#wa-design-menu > li > a').each(function () {
                    var $menu_link = $(this);
                    if ($menu_link.parent().data('action')) {
                        $menu_link.attr('href', href + '&action=' + $menu_link.parent().data('action'));
                    } else {
                        var menu_link_href = $menu_link.attr('href');
                        if (menu_link_href.indexOf('theme=') !== -1) {
                            $menu_link.attr('href', menu_link_href.replace(/theme=[^&]+/, 'theme=' + params['theme']));
                        }
                    }
                });

                // Setup preview link
                var preview_href = ($self.data('url')) ? $self.data('url') : $theme_preview_link.data('url');
                $theme_preview_link.attr('href', preview_href).data('theme-id', params['theme']);
                $theme_preview_link.find('span').text($self.data('preview-label'));

                if (set_active_only) {
                    return false;
                }

                var hash = location.hash;
                if (hash.indexOf('theme=') !== -1) {
                    if (!params['route']) {
                        hash = hash.replace(/&route=[^&]+/, '');
                    } else if (hash.indexOf('route=') !== -1) {
                        hash = hash.replace(/route=[^&]+/, 'route=' + params['route']);
                    } else {
                        hash = hash + '&route=' + params['route'];
                    }
                    if (!params['domain']) {
                        hash = hash.replace(/&domain=[^&]+/, '');
                    } else if (hash.indexOf('domain=') !== -1) {
                        hash = hash.replace(/domain=[^&]+/, 'domain=' + params['domain']);
                    } else {
                        hash = hash + '&domain=' + params['domain'];
                    }
                    $.wa.setHash(hash.replace(/theme=[^&]+/, 'theme=' + params['theme']));
                } else {
                    location.href = href;
                }

                <?php if (!$_smarty_tpl->tpl_vars['options']->value['is_ajax']){?>waDesignLoad();<?php }?>
                return false;
            }
        });

        $('#wa-design-menu,#wa-design-container').on('click', ".wa-theme-preview", function (e) {
            var $self = $(this),
                theme_id = $self.data('theme-id'),
                url = $self.attr('href'),
                tmp_params = waDesignParams($('#wa-theme-list li.selected a').attr('href'));

            if (!tmp_params['route']) {
                e.preventDefault();
                var href = "?module=design&action=setPreview",
                    data = {
                        theme_id: theme_id
                    };

                $.post(href, data, function () {
                    window.open(url, "_blank");
                });

                $('#wa-current-theme').html($('#wa-theme-active .url').html());
                $("#wa-design-preview").waDialog({
                    esc: false,
                    onSubmit: function () {
                        if (url.indexOf('?theme_hash') === -1) {
                            url += '?theme_hash=&set_force_theme=';
                        }
                        $("#wa-design-preview").hide();
                        $("body").append($('<iframe style="display:none" src="' + url.replace(/(set_force_theme=).*$/, '$1') + '" />').load(function () {
                            $(this).remove();
                        }));
                        return false;
                    }
                });
            }
        });

        $("#wa-design-sidebar h2 a").click(function () {
            if (!waDesignConfirm()) return false;
        });

        <?php if (!$_smarty_tpl->tpl_vars['options']->value['is_ajax']){?>
            $('#wa-design-menu > li > a').not('.wa-theme-preview').click(function () {
                waDesignLoad($(this).attr('href').replace(/.*?#\//, '').replace(/\/$/, ''));
            });
        <?php }?>

        var site_routing_full = function () { };
        var wa_design_not_load = false;
        function waDesignLoad(hash) {
            <?php if ($_smarty_tpl->tpl_vars['design_url']->value&&is_string($_smarty_tpl->tpl_vars['design_url']->value)&&$_smarty_tpl->tpl_vars['design_url']->value!='#/'){?>
                var design_url = <?php echo json_encode($_smarty_tpl->tpl_vars['design_url']->value);?>
.replace(/.*?#\//, '');
                if (design_url && design_url.length && hash && hash.length) {
                    if (hash.substr(0, design_url.length) == design_url) {
                        hash = hash.substr(design_url.length);
                    }
                }
            <?php }?>
            var theme_is_trial = false,
                hash_params = waDesignParams(hash || location.hash);

            if (hash_params['theme']) {
                var $selected_theme_item = $('#wa-theme-list > li[data-id="'+ hash_params['theme'] +'"]');
                if ($selected_theme_item.hasClass('is-trial')) {
                    theme_is_trial = true;
                    hash_params['action'] = 'theme';
                    $theme_edit_link.hide();
                    $theme_preview_link.addClass('is-trial').parents('li').removeClass('float-right');
                } else {
                    $theme_edit_link.show();
                    $theme_preview_link.removeClass('is-trial').parents('li').addClass('float-right');
                }
            }

            if (hash_params['theme']) {
                var current_theme_url = 'theme=' + hash_params['theme'];
                if (hash_params['domain']) {
                    current_theme_url += '&domain=' + hash_params['domain'];
                }
                if (hash_params['route']) {
                    current_theme_url += '&route=' + hash_params['route'];
                }
                if ($('#wa-theme-list a[href="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
' + current_theme_url + '"]').length) {
                    $('#wa-theme-list a[href="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
' + current_theme_url + '"]').trigger('click', [true]);
                } else {
                    $('#wa-theme-list a[href^="<?php echo $_smarty_tpl->tpl_vars['design_url']->value;?>
theme=' + hash_params['theme'] + '"]:first').trigger('click', [true]);
                }
            }

            var a = $('#wa-design-menu li.selected a');
            if (a.length) {
                var a_params = waDesignParams(a.attr('href')),
                    data_routing = $('#wa-theme-list .selected').data('routing');

                if (a_params['route'] && data_routing) {
                    $('#wa-design-menu li.settings a').attr('href', a.attr('href') + '&action=settings');
                    $('#wa-design-menu li.settings').show();
                } else {
                    $('#wa-design-menu li.settings').hide();
                }
            }

            if (wa_design_not_load) {
                wa_design_not_load = false;
                return;
            }
            if (hash  === undefined) {
                hash = waDesignHash(location.hash);
            }

            if (hash.length) {
                if (hash == 'themes') {
                    $('#wa-design-menu > .selected').removeClass('selected');
                    $('#wa-design-menu .themes').addClass('selected');
                    $("#wa-design-container").load("?module=design&action=themes", function () {
                        if ($(".s-scrollable-part").length) {
                            $(".s-scrollable-part").scrollTop(0);
                        } else {
                            $(document).scrollTop(0);
                        }
                    });
                } else if (hash.substr(0, 5) == 'pages') {
                    $('#wa-design-menu > .selected').removeClass('selected');
                    $('#wa-design-menu .pages ').addClass('selected');
                    $("#wa-design-container").load("?module=pages", function (responseText, textStatus, XMLHttpRequest) {
                        if ($(".s-scrollable-part").length) {
                            $(".s-scrollable-part").scrollTop(0);
                        } else {
                            $(document).scrollTop(0);
                        }
                        try{
                            if (response = $.parseJSON(responseText)) {
                                if(response.data && response.data.redirect) {
                                    var href = location.href.replace(/#.*$/,'') + response.data.redirect;
                                    location.replace(href);
                                }
                            }
                        }catch(e) { }
                    });
                } else if (hash.indexOf('action=settings') != -1) {
                    $('#wa-design-menu > .selected').removeClass('selected');
                    $('#wa-design-menu .settings ').addClass('selected');
                    if ($('#wa-theme-list li.selected').length) {
                        var li = $('#wa-theme-list li.selected');
                    } else {
                        var li = $('#wa-theme-list li:first');
                    }
                    var hash_params = waDesignParams(hash);
                    if (li.data('routing')) {
                        var li_route = li.data('routing').replace(/.*route=([^&]+).*?/i, '$1');
                        if (hash_params['route'] && (hash_params['route'] != li_route)) {
                            var tmp_li = $('#wa-theme-list li[data-routing$="route=' + hash_params['route'] + '"]:first');
                            if (tmp_li.length) {
                                tmp_li.find('a').click();
                            }
                        } else {
                            $("#wa-design-container").load(li.data('routing') + '&reload_on_change=1', function () {
                                $("#wa-design-container .back").remove();
                                $(".s-route-core").hide();
                                $('.s-route-details .fields').
                                        prepend($('<div class="field-group"></div>').
                                                append($('<div class="field"><div class="name">URL</div></div>').
                                                        append($('<div class="value"></div>').html($('#s-route-where').html()))
                                        )
                                );
                                $("#wa-design-container .s-route-delete").closest('div').remove();
                            });
                        }
                    } else {
                        if (hash_params['route']) {
                            var tmp_li = $('#wa-theme-list li[data-routing$="route=' + hash_params['route'] + '"]:first');
                            if (tmp_li.length) {
                                tmp_li.find('a').click();
                            }
                        } else {
                            $.wa.setHash(location.hash.replace(/&?action=settings/, ''));
                        }
                    }
                } else {
                    if (hash.indexOf('action=') == -1) {
                        if (hash.indexOf('file=') == -1) {
                            hash = 'action=theme&' + hash;
                        } else {
                            hash = 'action=edit&' + hash;
                        }
                    }
                    if (hash.indexOf('theme=') != -1) {
                        var params = hash.split('&');
                        for (var j = 0; j < params.length; j++) {
                            var tmp = params[j].split('=');

                            if (tmp[0] == 'theme') {
                                $('#wa-design-sidebar a[href="' + location.hash + '"]').parent().addClass('selected');
                            }
                        }
                    }
                    if (hash.indexOf('action=edit') !== -1) {
                        $('#wa-design-menu > .selected').removeClass('selected');
                        if (theme_is_trial) {
                            hash = hash.replace('action=edit', 'action=theme');
                            $('#wa-design-menu .info').addClass('selected');
                        } else {
                            $('#wa-design-menu .templates').addClass('selected');
                        }
                    } else if (hash.indexOf('action=theme') !== -1) {
                        $('#wa-design-menu > .selected').removeClass('selected');
                        $('#wa-design-menu .info').addClass('selected');
                    }
                    // Save theme settings
                    $("#wa-design-container").load("?module=design&" + hash, function (responseText, textStatus, XMLHttpRequest) {
                        if ($(".s-scrollable-part").length) {
                            //$(".s-scrollable-part").scrollTop(0);
                        } else {
                            //$(document).scrollTop(0);
                        }
                        try{
                            if (response = $.parseJSON(responseText)) {
                                if(response.data && response.data.redirect) {
                                    var href = location.href.replace(/#.*$/,'') + response.data.redirect;
                                    location.replace(href);
                                }
                            }
                        }catch(e) { }
                    });
                }
            } else {
                $("#wa-theme-list li a:first").click();
            }
        }
        $(document).ready(function () {
            $('#wa-app').css('overflow', 'visible');
            var a = $('#wa-design-sidebar .wa-theme-block a[href="' + location.hash + '"]:first');
            if (a.length) {
                a.parent().addClass('selected');
                var t = a.closest('.wa-theme-block').show().attr('id').replace(/wa-theme-block-/, '');
                $("#wa-theme-active").text($('#wa-theme-list-' + t).find('a span.wa-theme-name').text());
            }
            <?php if (!$_smarty_tpl->tpl_vars['options']->value['is_ajax']){?>
                waDesignLoad();
            <?php }?>
        });
    </script>
<?php if ($_smarty_tpl->tpl_vars['options']->value['container']){?>
</div>
<?php }?>
<?php }} ?>