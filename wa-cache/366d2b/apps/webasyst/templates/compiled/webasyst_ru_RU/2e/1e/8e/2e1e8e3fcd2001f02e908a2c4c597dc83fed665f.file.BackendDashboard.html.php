<?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:41:56
         compiled from "C:\OSPanel\domains\tovartest\wa-system\webasyst\templates\actions\backend\BackendDashboard.html" */ ?>
<?php /*%%SmartyHeaderCode:1570431680676468f4305152-10995175%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e1e8e3fcd2001f02e908a2c4c597dc83fed665f' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-system\\webasyst\\templates\\actions\\backend\\BackendDashboard.html',
      1 => 1713188366,
      2 => 'file',
    ),
    '265863844bc2d2ad274c01b6c8eb4974bb1cd934' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-system\\webasyst\\templates\\actions\\backend\\BackendDashboardHeaderAnnouncements.inc.html',
      1 => 1713865968,
      2 => 'file',
    ),
    'a9e5a04e7d76a24d621586dd942a8f2c74477065' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-system\\webasyst\\templates\\actions\\dashboard\\DashboardActivityFilter.inc.html',
      1 => 1713188366,
      2 => 'file',
    ),
    '1e608bef942f5473e5cc10d13a2fe57730b5e80c' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-system\\webasyst\\templates\\actions\\dashboard\\DashboardActivity.html',
      1 => 1713188366,
      2 => 'file',
    ),
    '73cb38ad6c7103ee0ad1acb344141a1a7ad1085d' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-system\\webasyst\\templates\\actions\\dashboard\\DashboardWidget.html',
      1 => 1648029634,
      2 => 'file',
    ),
    'b57b5a2b99a8ceb603b3b9ae331be1036736cfd7' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovartest\\wa-system\\webasyst\\templates\\actions\\dashboard\\DashboardWidgets.html',
      1 => 1713533556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1570431680676468f4305152-10995175',
  'function' => 
  array (
    'announcement_item' => 
    array (
      'parameter' => 
      array (
        'n' => NULL,
        'group_notifications' => NULL,
        'is_group' => false,
        'index' => 0,
        'count_announcements' => 0,
      ),
      'compiled' => '',
    ),
    'announcement_group_controls' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'show_connection_banner' => 0,
    'current_domain' => 0,
    'webasyst_id_settings_url' => 0,
    'wa_backend_url' => 0,
    'webasyst_id_auth_banner' => 0,
    'today_users' => 0,
    'group_id' => 0,
    'today_group' => 0,
    'birthday_user' => 0,
    'user_count' => 0,
    '_is_calendar_group' => 0,
    'contact' => 0,
    'contact_count' => 0,
    'no_today_activity' => 0,
    'activity' => 0,
    'request_uri' => 0,
    'backend_url' => 0,
    'selected_sidebar_item' => 0,
    'user' => 0,
    'dashboard_module_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_676468f4a972a9_27338321',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_676468f4a972a9_27338321')) {function content_676468f4a972a9_27338321($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include 'C:\\OSPanel\\domains\\tovartest\\wa-system\\vendors\\smarty3\\plugins\\modifier.regex_replace.php';
if (!is_callable('smarty_modifier_replace')) include 'C:\\OSPanel\\domains\\tovartest\\wa-system\\vendors\\smarty3\\plugins\\modifier.replace.php';
?><div id="dashboard-wrapper" >
    
    <?php /*  Call merged included template "./BackendDashboardHeaderAnnouncements.inc.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./BackendDashboardHeaderAnnouncements.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1570431680676468f4305152-10995175');
content_676468f445c0e0_56781487($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./BackendDashboardHeaderAnnouncements.inc.html" */?>
    
    <section id="wa_apps">
        <?php echo $_smarty_tpl->getSubTemplate ("../dashboard/DashboardAppsBlock.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php if (!empty($_smarty_tpl->tpl_vars['show_connection_banner']->value)){?>
            <div class="box rounded highlighted green custom-px-16 custom-py-12 custom-mx-16 js-waid-alert">
                <div class="flexbox">
                    <div class="js-webasyst-id-announcement js-webasyst-id-auth-announcement js-webasyst-id-connect-announcement w-webasyst-id-banner">
                        <p class="small">
                            <i class="icon webasyst-magic-wand"></i>
                            <strong>Подключите вход с Webasyst ID</strong> — единый способ авторизации, который объединяет вход в бекенд Webasyst на вашем сайте, Центр заказчика Webasyst, все приложения, сайты и сервисы экосистемы Webasyst.&nbsp;
                            <a href="javascript:void(0)"
                               class="bold js-webasyst-id-connect"><?php echo sprintf('Подключить&nbsp;Webasyst&nbsp;ID на %s — бесплатно и безопасно!',mb_strtoupper(htmlspecialchars((string)$_smarty_tpl->tpl_vars['current_domain']->value, ENT_QUOTES, 'UTF-8', true)));?>
</a>&nbsp;
                            <a href="javascript:void(0);" class="gray js-webasyst-id-helplink">Как это работает?</a>
                        </p>
                    </div>
                    <a href="javascript:void(0);" class="alert-close" title="Закрыть">
                        <i class="fas fa-times custom-ml-16 black opacity-30"></i>
                    </a>
                </div>
                <script>
                    const $waid_alert = $('.js-waid-alert');

                    $waid_alert.on('click', '.js-webasyst-id-connect', function (e) {
                        e.preventDefault();
                        location.href = '<?php echo $_smarty_tpl->tpl_vars['webasyst_id_settings_url']->value;?>
';
                    });

                    $waid_alert.on('click', '.js-webasyst-id-helplink', function (e) {
                        e.preventDefault();
                        const url = "<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
?module=backend&action=webasystIDHelp";
                        $.get(url, html => $('body').append(html));
                    });

                    $waid_alert.on("click", ".alert-close", function(e) {
                        e.preventDefault();
                        const url = "<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
?module=settings&action=save";
                        $.post(url, {
                            app_id: 'webasyst',
                            name: 'webasyst_id_announcement_close',
                            value: 'now()'
                        }, function () {
                            $waid_alert.hide()
                        });
                    });
                </script>
            </div>
        <?php }elseif(!empty($_smarty_tpl->tpl_vars['webasyst_id_auth_banner']->value)){?>
            <div class="box rounded highlighted green custom-p-16 custom-pt-12 custom-mx-16 js-link-phone-alert">
                <div class="flexbox">
                    <div>
                        <p class="custom-mb-8 small">
                            <i class="icon webasyst-magic-wand"></i>
                            <strong>Подключите безопасный вход с двухфакторной аутентификацией (2FA).</strong> Ваш аккаунт будет подключен к Webasyst ID, и все попытки входа с новых устройств будут защищены подтверждением по SMS.
                        </p>
                        <form class="flexbox middle space-16">
                            <input type="tel" placeholder="+7" class="solid bold" value="<?php echo htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['webasyst_id_auth_banner']->value['phone'])===null||$tmp==='' ? '+7' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
" style="background-color: var(--background-color-blank);">
                            <button type="submit" class="button green">Подключить</button>
                            <a href="javascript:void(0);" class="js-webasyst-id-helplink small">Как это работает?</a>
                            <script>
                                const $link_phone_alert = $('.js-link-phone-alert');
                                const $link_phone_form = $link_phone_alert.find('form');

                                $link_phone_form.on('submit', function (e) {
                                    e.preventDefault();
                                    const phone_number = $(this).find('input').val();
                                    let phone_param = '';

                                    if (phone_number) {
                                        phone_param = '&phone=' + phone_number.replace(/[^-0-9\s.():+]/g,'')
                                    }

                                    const referrer_url = window.location.href;
                                    window.location.replace('<?php echo $_smarty_tpl->tpl_vars['webasyst_id_auth_banner']->value['url'];?>
&referrer_url=' + encodeURIComponent(referrer_url) + phone_param)
                                });

                                $link_phone_form.on('click', '.js-webasyst-id-helplink', function (e) {
                                    e.preventDefault();
                                    const url = "<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
?module=backend&action=webasystIDHelp";
                                    $.get(url, html => $('body').append(html));
                                });

                                $link_phone_alert.on("click", ".alert-close", function(e) {
                                    e.preventDefault();
                                    const url = "<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
?module=settings&action=save";
                                    $.post(url, {
                                        app_id: 'webasyst',
                                        name: 'webasyst_id_announcement_close',
                                        value: 'now()'
                                    }, function () {
                                        $link_phone_alert.hide()
                                    });
                                });
                            </script>
                        </form>
                    </div>
                    <a href="javascript:void(0);" class="alert-close" title="Закрыть">
                        <i class="fas fa-times custom-ml-16 black opacity-30"></i>
                    </a>
                </div>
            </div>
        <?php }?>
    </section>

    <section id="wa_activity">
        <?php /*  Call merged included template "../dashboard/DashboardActivityFilter.inc.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("../dashboard/DashboardActivityFilter.inc.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1570431680676468f4305152-10995175');
content_676468f46d3273_50714329($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "../dashboard/DashboardActivityFilter.inc.html" */?>

        <?php if ($_smarty_tpl->tpl_vars['today_users']->value){?>
            <div class="activity-list-block">
                <div class="activity-divider h3 today">Сегодня</div>
                    <?php  $_smarty_tpl->tpl_vars['today_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['today_group']->_loop = false;
 $_smarty_tpl->tpl_vars['group_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['today_users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['today_group']->key => $_smarty_tpl->tpl_vars['today_group']->value){
$_smarty_tpl->tpl_vars['today_group']->_loop = true;
 $_smarty_tpl->tpl_vars['group_id']->value = $_smarty_tpl->tpl_vars['today_group']->key;
?>
                        <div class="users-group">
                            
                            <?php if (stristr($_smarty_tpl->tpl_vars['group_id']->value,'birthday')!==false){?>
                                <?php $_smarty_tpl->tpl_vars['user_count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['today_group']->value), null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['_is_calendar_group'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['today_group']->value['calendar']), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['birthday_user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['birthday_user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['today_group']->value['contacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['birthday_user']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['birthday_user']->iteration=0;
 $_smarty_tpl->tpl_vars['birthday_user']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['birthday_user']->key => $_smarty_tpl->tpl_vars['birthday_user']->value){
$_smarty_tpl->tpl_vars['birthday_user']->_loop = true;
 $_smarty_tpl->tpl_vars['birthday_user']->iteration++;
 $_smarty_tpl->tpl_vars['birthday_user']->index++;
 $_smarty_tpl->tpl_vars['birthday_user']->last = $_smarty_tpl->tpl_vars['birthday_user']->iteration === $_smarty_tpl->tpl_vars['birthday_user']->total;
?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
contacts/#/contact/<?php echo $_smarty_tpl->tpl_vars['birthday_user']->value['id'];?>
" class="userpic userpic48 outlined" data-wa-tooltip-content="День рождения" style="z-index:<?php echo $_smarty_tpl->tpl_vars['user_count']->value-$_smarty_tpl->tpl_vars['birthday_user']->index;?>
">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['birthday_user']->value['photo_url_48'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['birthday_user']->value['formatted_name'], ENT_QUOTES, 'UTF-8', true);?>
">

                                        <?php if ($_smarty_tpl->tpl_vars['birthday_user']->last&&$_smarty_tpl->tpl_vars['birthday_user']->iteration<5){?>
                                            <span class="userstatus birthday"><i class="fas fa-birthday-cake"></i></span>
                                            <?php if ($_smarty_tpl->tpl_vars['_is_calendar_group']->value){?>
                                                <span class="userstatus"><i class="<?php echo $_smarty_tpl->tpl_vars['today_group']->value['calendar']['icon'];?>
"></i></span>
                                            <?php }?>
                                        <?php }?>
                                    </a>
                                <?php } ?>
                                <?php if ($_smarty_tpl->tpl_vars['today_group']->value['rest_count']>0){?>
                                    <span class="userpic userpic48 rest-count">
                                        <span>&plus;<?php echo $_smarty_tpl->tpl_vars['today_group']->value['rest_count'];?>
</span>
                                        <span class="userstatus birthday">
                                            <i class="fas fa-birthday-cake"></i>
                                        </span>
                                    </span>
                                <?php }?>
                            
                            <?php }else{ ?>
                                <?php $_smarty_tpl->tpl_vars['contact_count'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['today_group']->value['contacts']), null, 0);?>
                                <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['today_group']->value['contacts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['contact']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['contact']->iteration=0;
 $_smarty_tpl->tpl_vars['contact']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value){
$_smarty_tpl->tpl_vars['contact']->_loop = true;
 $_smarty_tpl->tpl_vars['contact']->iteration++;
 $_smarty_tpl->tpl_vars['contact']->index++;
 $_smarty_tpl->tpl_vars['contact']->last = $_smarty_tpl->tpl_vars['contact']->iteration === $_smarty_tpl->tpl_vars['contact']->total;
?>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
contacts/#/contact/<?php echo $_smarty_tpl->tpl_vars['contact']->value['id'];?>
" class="userpic userpic48 outlined" data-wa-tooltip-content="<?php if (!empty($_smarty_tpl->tpl_vars['contact']->value['summary'])){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['summary'], ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['today_group']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" style="z-index:<?php echo $_smarty_tpl->tpl_vars['contact_count']->value-$_smarty_tpl->tpl_vars['contact']->index;?>
">
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['contact']->value['photo_url_48'];?>
" alt="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['formatted_name'], ENT_QUOTES, 'UTF-8', true);?>
">
                                        <?php if ($_smarty_tpl->tpl_vars['contact']->last&&$_smarty_tpl->tpl_vars['contact']->iteration<5){?>
                                            <span class="userstatus" style="background-color:<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['today_group']->value['bg_color'], ENT_QUOTES, 'UTF-8', true);?>
;color:<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['today_group']->value['font_color'], ENT_QUOTES, 'UTF-8', true);?>
">
                                                <i class="<?php echo (($tmp = @htmlspecialchars((string)$_smarty_tpl->tpl_vars['today_group']->value['icon'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? 'fas fa-calendar-alt' : $tmp);?>
"></i>
                                            </span>
                                        <?php }?>
                                    </a>
                                <?php } ?>
                                <?php if ($_smarty_tpl->tpl_vars['today_group']->value['rest_count']>0){?>
                                    <span class="userpic userpic48 rest-count">
                                        <span>&plus;<?php echo $_smarty_tpl->tpl_vars['today_group']->value['rest_count'];?>
</span>
                                        <span class="userstatus" style="background-color:<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['today_group']->value['bg_color'], ENT_QUOTES, 'UTF-8', true);?>
;color:<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['today_group']->value['font_color'], ENT_QUOTES, 'UTF-8', true);?>
">
                                            <i class="<?php echo (($tmp = @htmlspecialchars((string)$_smarty_tpl->tpl_vars['today_group']->value['icon'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? 'fas fa-calendar-alt' : $tmp);?>
"></i>
                                        </span>
                                    </span>
                                <?php }?>
                            <?php }?>
                        </div>
                    <?php } ?>
                <hr class="custom-my-16">
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['no_today_activity']->value){?>
            <div class="activity-list-block activity-empty-today">
                <?php if (!$_smarty_tpl->tpl_vars['today_users']->value){?>
                    <div class="activity-divider today h3">Сегодня</div>
                <?php }?>
                <div class="activity-item activity-empty-today custom-mb-24">
                    <div class="item-content-wrapper">
                        <div class="inline-content">
                            Сегодня еще не было событий.
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>

        <div class="activity-list-block js-activity-list-block custom-pb-24" data-empty-text="Лента событий пока пуста." data-empty-today-text="Сегодня еще не было событий." data-today-text="Сегодня">
            <?php if (!empty($_smarty_tpl->tpl_vars['activity']->value)){?>
                <?php /*  Call merged included template "../dashboard/DashboardActivity.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("../dashboard/DashboardActivity.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1570431680676468f4305152-10995175');
content_676468f4801ad0_08593309($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "../dashboard/DashboardActivity.html" */?>
            <?php }?>
        </div>
    </section>

    
    <section id="wa_widgets" class="js-dashboard-widgets">
        <?php /*  Call merged included template "../dashboard/DashboardWidgets.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("../dashboard/DashboardWidgets.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1570431680676468f4305152-10995175');
content_676468f48ccc00_50546062($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "../dashboard/DashboardWidgets.html" */?>
        <div class="d-settings-wrapper" id="d-settings-wrapper" style="display: none">
            <div class="d-settings-container" id="d-settings-container">

                <div class="d-settings-inner-container">
                    <div class="d-settings-block" id="d-settings-block"></div>
                </div>

            </div>
        </div>
        
    </section>
    <?php if ($_smarty_tpl->tpl_vars['request_uri']->value==$_smarty_tpl->tpl_vars['backend_url']->value||$_smarty_tpl->tpl_vars['request_uri']->value==((string)$_smarty_tpl->tpl_vars['backend_url']->value)."/"||strpos($_smarty_tpl->tpl_vars['request_uri']->value,"/webasyst/dashboard/dashboard/")!==false){?>
    <div class="grid-placeholder">&nbsp;</div>
    <div class="dashboard-controls" style="position: sticky; bottom: 2rem; grid-column: 2/-1; text-align: center">

            <div class="dashboard-customize">
                <a href="javascript:void(0);"
                   class="button rounded nowrap white d-dashboard-edit-button js-dashboard-edit"
                   data-current_dashboard-id="<?php echo smarty_modifier_regex_replace((($tmp = @$_smarty_tpl->tpl_vars['selected_sidebar_item']->value)===null||$tmp==='' ? 0 : $tmp),'/[^0-9]/','');?>
"
                   id="show-dashboard-editable-mode_">
                    <i class="fas fa-sliders-h text-gray custom-mr-4"></i> <span>Виджеты</span>
                </a>
                <a href="javascript:void(0);"
                   class="button rounded nowrap white d-dashboard-edit-button js-dashboard-edit-close"
                   style="display: none;">
                    <span>Готово</span>
                </a>
            </div>

    </div>
    <?php }?>
</div>
<script id="script-dashboard-init">
    $(function () {
        // make header sticky
        WaHeader.headerBehavior('#wa_apps', { rootMargin: `1px 0px -100% 0px`, threshold: [0, 1], topBlockSelector: '#wa_announcement' });

        new Dashboard();
        new Group();
        new Page({
            locale: "<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['user']->value->getLocale(),'_','-');?>
"
        });

        $(".js-activity-filter-toggler").on("click", function(event) {
            event.preventDefault();
            $('#activity-filter').slideToggle();
        });

        $('#wa_activity [data-wa-tooltip-content]').waTooltip({
            arrow: false,
            placement: "bottom"
        });
    });
</script>
<script>
    $(function () {
        const $section_widgets = $('#wa_widgets');
        const default_dashboard = $section_widgets.clone();
        $section_widgets.on('click', 'li:not(.selected) a[data-dashboard]', function () {
            const $self = $(this);
            if ($self.find('.js-loading').not('.hidden').length) {
                return true;
            }

            const dashboard_id = $self.data('dashboard');
            if (dashboard_id === 'new_dashboard') {
                return true;
            }

            if (dashboard_id === 0) {
                // update list
                const $updated_list = $section_widgets.find('.js-dashboards-list');
                $updated_list.find('li').removeClass('selected').filter(':first').addClass('selected');
                default_dashboard.find('.js-dashboards-list').replaceWith($updated_list);
                // view default widgets
                $section_widgets.html(default_dashboard.html());

                new Page({
                    locale: "<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['user']->value->getLocale(),'_','-');?>
"
                });

                return false;
            }

            $self.find('.js-loading').removeClass('hidden');
            const deferred = $.Deferred();
            $self.data('promise', deferred.promise());
            $.get('<?php echo $_smarty_tpl->tpl_vars['dashboard_module_url']->value;?>
dashboard/'+dashboard_id+'/', function (r) {
                deferred.resolve();
                if (!r) {
                    return;
                }

                const $dashboard_widgets = $(r);
                if (!$dashboard_widgets.length) {
                    return;
                }

                // insert widget list
                const $widgets_inner = $dashboard_widgets.find('#wa_widgets').children();
                $section_widgets.empty().append($widgets_inner);
                // insert dropdown
                $dashboard_widgets.find('#d-dashboard-link-wrapper')
                    .insertAfter($section_widgets.find('.js-dashboards-list'));
                // run script
                $dashboard_widgets.filter('#script-dashboard-init').insertAfter($('#script-dashboard-init'));

                $dashboard_widgets.remove();
            });

            return false;
        });
    });
</script>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:41:56
         compiled from "C:\OSPanel\domains\tovartest\wa-system\webasyst\templates\actions\backend\BackendDashboardHeaderAnnouncements.inc.html" */ ?>
<?php if ($_valid && !is_callable('content_676468f445c0e0_56781487')) {function content_676468f445c0e0_56781487($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_wa_datetime')) include 'C:\\OSPanel\\domains\\tovartest\\wa-system/vendors/smarty-plugins\\modifier.wa_datetime.php';
?><section id="wa_announcement">
    <?php $_smarty_tpl->tpl_vars['has_dasboard'] = new Smarty_variable(($_smarty_tpl->tpl_vars['current_app']->value==='webasyst'&&isset($_smarty_tpl->tpl_vars['activity']->value)), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['has_dasboard']->value){?>
        <link href="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/redactor/2/redactor.css?v<?php echo $_smarty_tpl->tpl_vars['wa']->value->version(true);?>
" rel="stylesheet">
        <script id="redactor_2-js" src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/redactor/2/redactor.min.js?v<?php echo $_smarty_tpl->tpl_vars['wa']->value->version(true);?>
"></script>
        <?php if (substr($_smarty_tpl->tpl_vars['wa']->value->locale(),0,2)!='en'){?>
            <script id="redactor_2-lang-js" src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/redactor/2/<?php echo substr($_smarty_tpl->tpl_vars['wa']->value->locale(),0,2);?>
.js?v<?php echo $_smarty_tpl->tpl_vars['wa']->value->version(true);?>
"></script>
        <?php }?>
        <script id="wa-announcement-js" src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/jquery-wa/wa.header.announcement.js?v<?php echo $_smarty_tpl->tpl_vars['wa']->value->version(true);?>
"></script>
        <script>
            $(function () {
                new WaHeaderAnnouncement();
            });
        </script>
    <?php }?>

    <?php $_smarty_tpl->tpl_vars['can_edit_notifications'] = new Smarty_variable($_smarty_tpl->tpl_vars['wa']->value->user()->getRights('team','edit_announcements'), null, 0);?>

    <?php if (!function_exists('smarty_template_function_announcement_item')) {
    function smarty_template_function_announcement_item($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['announcement_item']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>

        <?php $_smarty_tpl->tpl_vars['_info'] = new Smarty_variable($_smarty_tpl->tpl_vars['group_notifications']->value['app'], null, 0);?>
        
        <?php if (!empty($_smarty_tpl->tpl_vars['_info']->value['version'])){?>
            <?php $_smarty_tpl->tpl_vars['_version'] = new Smarty_variable("?v=".((string)htmlspecialchars((string)$_smarty_tpl->tpl_vars['_info']->value['version'], ENT_QUOTES, 'UTF-8', true)), null, 0);?>
        <?php }else{ ?>
            <?php $_smarty_tpl->tpl_vars['_version'] = new Smarty_variable(null, null, 0);?>
        <?php }?>

        <?php $_smarty_tpl->tpl_vars['_is_contact'] = new Smarty_variable(false, null, 0);?>
        <?php ob_start();?><?php if (!empty($_smarty_tpl->tpl_vars['_info']->value['icon'][24])){?><?php echo (string)$_smarty_tpl->tpl_vars['_info']->value['icon'][24];?><?php }else{ ?><?php echo (string)$_smarty_tpl->tpl_vars['_info']->value['img'];?><?php }?><?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['_icon_app'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['root_url']->value).$_tmp1.((string)$_smarty_tpl->tpl_vars['_version']->value), null, 0);?>
        <?php if (!empty($_smarty_tpl->tpl_vars['group_notifications']->value['contact'])){?>
            <?php $_smarty_tpl->tpl_vars['_icon_app'] = new Smarty_variable($_smarty_tpl->tpl_vars['group_notifications']->value['contact']['photo_url_32'], null, 0);?>
            <?php $_smarty_tpl->tpl_vars['_is_contact'] = new Smarty_variable(true, null, 0);?>
        <?php }?>

        <?php $_smarty_tpl->tpl_vars['is_editing'] = new Smarty_variable($_smarty_tpl->tpl_vars['_is_contact']->value&&($_smarty_tpl->tpl_vars['is_admin']->value||($_smarty_tpl->tpl_vars['can_edit_notifications']->value&&$_smarty_tpl->tpl_vars['n']->value['contact_id']==$_smarty_tpl->tpl_vars['wa']->value->user('id'))), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['visible_counter'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_announcements']->value>1&&($_smarty_tpl->tpl_vars['index']->value===0||($_smarty_tpl->tpl_vars['index']->value===1&&$_smarty_tpl->tpl_vars['_counter']->value<$_smarty_tpl->tpl_vars['count_rows']->value)), null, 0);?>

        <li class="js-wa-announcement wa-announcement-item js-announcement-toggle-group" data-app-id="<?php echo $_smarty_tpl->tpl_vars['n']->value['app_id'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['n']->value['id'];?>
"
            <?php if ($_smarty_tpl->tpl_vars['visible_counter']->value){?> title="<?php echo _w('Another notification','%d more notifications',$_smarty_tpl->tpl_vars['count_announcements']->value-1);?>
"<?php }?>>
            <input type="hidden" class="js-is-allowed-edit" value="<?php if ($_smarty_tpl->tpl_vars['is_editing']->value){?>1<?php }else{ ?>0<?php }?>">

            <div class="wa-announcement-item-inner">
                <i class="icon size-24<?php if ($_smarty_tpl->tpl_vars['_is_contact']->value){?> userpic userpic-24<?php }?>" data-wa-tooltip-content="<?php if ($_smarty_tpl->tpl_vars['_is_contact']->value){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['group_notifications']->value['contact']['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }else{ ?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_info']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" data-wa-tooltip-placement="right" style="background: url(<?php echo $_smarty_tpl->tpl_vars['_icon_app']->value;?>
);"></i>
                <span class="wa-announcement-item-main">
                    <?php if ($_smarty_tpl->tpl_vars['visible_counter']->value){?>
                        <span class="badge gray bold small js-announcement-count"><?php echo $_smarty_tpl->tpl_vars['count_announcements']->value;?>
</span>
                    <?php }?>
                    <span class="js-announcement-pinned wa-announcement-pinned<?php if (!$_smarty_tpl->tpl_vars['n']->value['is_pinned']){?> hidden<?php }?>"><i class="fas fa-bolt text-orange"></i></span>
                    <span class="js-announcement-content wa-announcement-content semibold"><?php echo $_smarty_tpl->tpl_vars['n']->value['text'];?>
</span>
                    <span class="flexbox-inline">
                        <span class="js-announcement-time nowrap hint"><?php echo waDateTime::format('humandatetime',$_smarty_tpl->tpl_vars['n']->value['datetime']);?>
</span>

                        <span class="wa-announcement-controls flexbox-inline">
                            <?php if ($_smarty_tpl->tpl_vars['is_editing']->value){?>
                                <span class="js-announcement-edit wa-announcement-show-by-hover custom-ml-8 cursor-pointer smaller small-mobile" title="Редактировать"><span><i class="fas fa-edit text-blue"></i></span></span>
                            <?php }?>
                        </span>
                    </span>
                </span>
            </div>

        </li>
    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

    <?php if (!function_exists('smarty_template_function_announcement_group_controls')) {
    function smarty_template_function_announcement_group_controls($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['announcement_group_controls']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
        <span class="js-announcement-close wa-announcement-close nowrap back custom-ml-8 cursor-pointer small"
            title="Пометить как прочитанное">
            <span><i class="fas fa-times"></i></span>
        </span>
    <?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

    <div class="wa-announcement-wrapper custom-mt-12-mobile">
        
        <form id="js-form-new-announcement" class="wa-announcement-form" style="display:none;">
            <div class="fields">
                <div class="fields-group">
                    <div class="flexbox middle full-width space-12 wrap-mobile custom-mb-12">
                        <div id="dropdown-notify-to-users" class="dropdown width-100-mobile" style="min-width: 250px;">

                            <button type="button" class="dropdown-toggle button light-gray width-100 small"
                                style="text-align:left;" data-init-text="Всем сотрудникам">Всем сотрудникам</button>

                            <div class="dropdown-body">
                                <div class="box flexbox vertical">
                                    <div class="toggle small middle" id="toggle-groups-or-users">
                                        <span class="selected" data-type="groups">Группы</span>
                                        <span data-type="contacts">Сотрудники</span>
                                    </div>
                                </div>

                                <ul id="notify-to-groups-list" class="menu custom-mt-0" data-list="group">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['groups']->value)){?>
                                        <?php  $_smarty_tpl->tpl_vars['_g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_g']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_g']->key => $_smarty_tpl->tpl_vars['_g']->value){
$_smarty_tpl->tpl_vars['_g']->_loop = true;
 $_smarty_tpl->tpl_vars['_g']->index++;
?>
                                            <li data-id="<?php echo $_smarty_tpl->tpl_vars['_g']->value['id'];?>
">
                                                <div class="item">
                                                    <span>
                                                        <label class="flexbox" data-contact-ids="<?php echo implode(',',$_smarty_tpl->tpl_vars['_g']->value['contact_ids']);?>
"<?php if (!empty($_smarty_tpl->tpl_vars['_g']->value['description'])){?> title="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_g']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?>>
                                                            <span class="wa-checkbox">
                                                                <input type="checkbox" name="group_ids[<?php echo $_smarty_tpl->tpl_vars['_g']->index;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['_g']->value['id'];?>
">
                                                                <span>
                                                                    <span class="icon">
                                                                        <i class="fas fa-check"></i>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <?php $_smarty_tpl->tpl_vars['icon'] = new Smarty_variable('fas fa-user', null, 0);?>
                                                            <?php if ($_smarty_tpl->tpl_vars['_g']->value['icon']){?>
                                                                <?php if (strpos($_smarty_tpl->tpl_vars['_g']->value['icon'],'fa-')!==false){?>
                                                                    <?php $_smarty_tpl->tpl_vars['icon'] = new Smarty_variable($_smarty_tpl->tpl_vars['_g']->value['icon'], null, 0);?>
                                                                <?php }else{ ?>
                                                                    <?php $_smarty_tpl->tpl_vars['icon'] = new Smarty_variable('fas fa-user-friends', null, 0);?>
                                                                <?php }?>
                                                            <?php }?>
                                                            <i class="fas fa-<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['icon']->value, ENT_QUOTES, 'UTF-8', true);?>
 custom-mx-4"></i>
                                                            <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_g']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                                                        </label>
                                                    </span>
                                                    <span class="count"><?php echo count($_smarty_tpl->tpl_vars['_g']->value['contact_ids']);?>
</span>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    <?php }else{ ?>
                                        <p class="hint align-center custom-mb-8">
                                            Пригласите сотрудников в приложении «Команда».
                                        </p>
                                    <?php }?>
                                </ul>

                                <ul id="notify-to-users-list" class="menu custom-mt-0" data-list="contact" style="display: none;">
                                    <?php if (!empty($_smarty_tpl->tpl_vars['contacts']->value)){?>
                                        <?php  $_smarty_tpl->tpl_vars['_c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['_c']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['_c']->key => $_smarty_tpl->tpl_vars['_c']->value){
$_smarty_tpl->tpl_vars['_c']->_loop = true;
 $_smarty_tpl->tpl_vars['_c']->index++;
?>
                                            <li data-id="<?php echo $_smarty_tpl->tpl_vars['_c']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['_c']->value['id']===$_smarty_tpl->tpl_vars['wa']->value->user('id')){?>class="disabled"<?php }?>>
                                                <div class="item">
                                                    <span>
                                                        <label class="flexbox">
                                                            <span class="wa-checkbox">
                                                                <input type="checkbox" name="contact_ids[<?php echo $_smarty_tpl->tpl_vars['_c']->index;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['_c']->value['id'];?>
">
                                                                <span>
                                                                    <span class="icon">
                                                                        <i class="fas fa-check"></i>
                                                                    </span>
                                                                </span>
                                                            </span>
                                                            <i class="userpic userpic-20 custom-ml-8 custom-mr-4" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['_c']->value['photo_url_96'];?>
')"></i>
                                                            <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['_c']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

                                                        </label>
                                                    </span>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    <?php }else{ ?>
                                        <p class="hint align-center custom-mb-8">
                                            Пригласите сотрудников в приложении «Команда».
                                        </p>
                                    <?php }?>
                                </ul>
                            </div>

                        </div>
                        <label>
                            <span class="wa-checkbox">
                                <input type="checkbox" name="data[is_notify]" value="1">
                                <span>
                                    <span class="icon">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </span>
                            </span>
                            <span class="small">
                                
                                
                                Уведомить всех по почте и SMS
                                <?php $_smarty_tpl->tpl_vars['_count_notifocations'] = new Smarty_variable(htmlspecialchars((string)count($_smarty_tpl->tpl_vars['contacts']->value), ENT_QUOTES, 'UTF-8', true), null, 0);?>
                                <span id="js-announcement-notify-counter" class="badge gray small" data-init-value="<?php echo $_smarty_tpl->tpl_vars['_count_notifocations']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['_count_notifocations']->value;?>
</span>
                            </span>
                        </label>
                    </div>
                    <textarea id="js-announcement-textarea" class="width-100" name="data[text]"
                        placeholder="Объявление увидят все сотрудники" data-lang="<?php echo substr($_smarty_tpl->tpl_vars['wa']->value->locale(),0,2);?>
"></textarea>

                    <div id="js-announcement-fields" style="display: none;">
                        <div class="fields custom-pb-8">
                        <div class="fields-group custom-p-12 custom-m-0">
                            <div class="field">
                                <div class="name for-input">Показывать до</div>
                                <div class="value">
                                    <input type="date" id="js-announcement-ttl-date" class="wa-datepicker small">
                                    <input type="time" id="js-announcement-ttl-time" class="small">
                                    <p class="hint">
                                      Объявление автоматически пропадет в указанное время.<br>
                                      Текущее время: <strong><?php echo smarty_modifier_wa_datetime(time());?>
</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="field">
                                <div class="name for-checkbox">Закрепить вверху</div>
                                <div class="value">
                                    <label>
                                        <span class="wa-checkbox">
                                            <input type="checkbox" name="data[is_pinned]" value="0">
                                            <span>
                                                <span class="icon">
                                                    <i class="fas fa-check"></i>
                                                </span>
                                            </span>
                                        </span>
                                        <span class="small"><i class="fas fa-bolt text-orange custom-ml-4"></i> Новость-молния</span>
                                        <span class="hint">поднимет объявление выше других</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        </div>
                    </div>
                    
                    <div class="flexbox middle space-4 wrap small custom-mt-12">
                        <button type="button" id="js-publish-announcement" class="button green">Опубликовать</button>
                        <button type="button" id="js-update-announcement" class="button green hidden">Сохранить</button>
                        <button type="button" id="js-preview-announcement" class="button green outlined" data-active-text="Предпросмотр" data-inactive-text="Завершить предпросмотр">Предпросмотр</button>
                        <button type="button" id="js-cancel-announcement-form" class="button light-gray hidden">Отмена</button>
                        <div class="custom-ml-auto flexbox middle custom-mt-8-mobile">
                            <button type="button" id="js-announcement-remove" class="button outlined red small hidden"
                                data-button-delete="Удалить" data-button-cancel="Отмена" data-text-delete="Удалить уведомление навсегда?">
                                Удалить
                            </button>
                            <a href="javascript:void(0)" id="js-announcement-fields-more" class="button nobutton text-gray">
                                Параметры <i class="fas fa-caret-down"></i>
                            </a>
                        </div>
                    </div>
                    <div id="js-announcement-error" class="state-caution-hint custom-mt-8 hidden">Возникла неизвестная ошибка. Обновите страницу и повторите попытку.</div>
                </div>
            </div>
        </form>
        
        <div class="wa-announcement-list-wrapper custom-px-16-mobile">
            <?php $_smarty_tpl->tpl_vars['count_notifications'] = new Smarty_variable(!empty($_smarty_tpl->tpl_vars['notifications']->value) ? count($_smarty_tpl->tpl_vars['notifications']->value) : 0, null, 0);?>
            <ul id="js-announcement-groups" class="wa-announcement-groups list custom-m-0">
                <?php if ($_smarty_tpl->tpl_vars['count_notifications']->value){?>
                    <?php  $_smarty_tpl->tpl_vars['group_notifications'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_notifications']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['group_notifications']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['group_notifications']->key => $_smarty_tpl->tpl_vars['group_notifications']->value){
$_smarty_tpl->tpl_vars['group_notifications']->_loop = true;
 $_smarty_tpl->tpl_vars['group_notifications']->iteration++;
?>
                    <?php $_smarty_tpl->tpl_vars['count_rows'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['group_notifications']->value['rows']), null, 0);?>
                        
                        <?php if ($_smarty_tpl->tpl_vars['group_notifications']->value['app_id']==='installer'&&!empty($_smarty_tpl->tpl_vars['group_notifications']->value['is_virtual'])){?>
                            <?php echo $_smarty_tpl->tpl_vars['group_notifications']->value['text'];?>

                            <?php if ($_smarty_tpl->tpl_vars['count_rows']->value===1){?>
                                <?php continue 1?>
                            <?php }?>
                        <?php }?>
                        <li class="wa-announcement-group js-announcement-group<?php if ($_smarty_tpl->tpl_vars['count_rows']->value>1){?> is-collapsed<?php }?><?php if ($_smarty_tpl->tpl_vars['group_notifications']->iteration>5){?> hidden<?php }?>"
                            data-app-id="<?php echo $_smarty_tpl->tpl_vars['group_notifications']->value['app_id'];?>
"<?php if (!empty($_smarty_tpl->tpl_vars['group_notifications']->value['contact'])){?> data-contact-id="<?php echo $_smarty_tpl->tpl_vars['group_notifications']->value['contact']['id'];?>
"<?php }?>>

                            <ul class="js-announcement-list wa-announcement-list menu large custom-mb-0">
                                <?php $_smarty_tpl->tpl_vars['_counter'] = new Smarty_variable($_smarty_tpl->tpl_vars['count_rows']->value, null, 0);?>
                                <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int)ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['count_rows']->value-1+1 - (0) : 0-($_smarty_tpl->tpl_vars['count_rows']->value-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0){
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++){
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
                                    <?php $_smarty_tpl->tpl_vars['n'] = new Smarty_variable($_smarty_tpl->tpl_vars['group_notifications']->value['rows'][$_smarty_tpl->tpl_vars['i']->value], null, 0);?>
                                    <?php if ($_smarty_tpl->tpl_vars['i']->value===0&&!empty($_smarty_tpl->tpl_vars['n']->value['is_virtual'])){?>
                                        <?php $_smarty_tpl->tpl_vars['_counter'] = new Smarty_variable($_smarty_tpl->tpl_vars['_counter']->value-1, null, 0);?>
                                        <?php continue 1?>
                                    <?php }?>
                                    <?php smarty_template_function_announcement_item($_smarty_tpl,array('n'=>$_smarty_tpl->tpl_vars['n']->value,'group_notifications'=>$_smarty_tpl->tpl_vars['group_notifications']->value,'index'=>$_smarty_tpl->tpl_vars['i']->value,'count_announcements'=>$_smarty_tpl->tpl_vars['_counter']->value));?>

                                <?php }} ?>
                            </ul>

                            <?php smarty_template_function_announcement_group_controls($_smarty_tpl,array());?>

                        </li>

                    <?php } ?>
                <?php }?>
            </ul>
            <div id="js-announcement-show-more" class="wa-announcement-show-more custom-mt-8 custom-ml-4">
                <?php if ($_smarty_tpl->tpl_vars['count_notifications']->value>5){?>
                    <a href="javascript:void(0)" class="back">
                        <span class="custom-pl-4"><i class="fas fa-caret-down"></i> Показать еще</span>
                    </a>
                <?php }?>
            </div>
        </div>
        
        <?php $_smarty_tpl->tpl_vars['_default_app'] = new Smarty_variable('webasyst', null, 0);?>
        <script id="js-announcement-preview-template" type="text/html">
            <li class="wa-announcement-group js-announcement-group wa-announcement-preview-group js-announcement-preview-group" data-app-id="<?php echo $_smarty_tpl->tpl_vars['_default_app']->value;?>
" data-contact-id="<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
">
                <ul class="js-announcement-list wa-announcement-list menu large custom-mb-0">
                    <li class="js-announcement-preview-item js-wa-announcement wa-announcement-item wa-announcement-preview-item" data-app-id="<?php echo $_smarty_tpl->tpl_vars['_default_app']->value;?>
" data-id="">
                        <input type="hidden" class="js-is-allowed-edit" value="1">
                        <div class="wa-announcement-item-inner">
                            <i class="icon size-24 userpic userpic-24" data-wa-tooltip-content="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['user']->value->getName(), ENT_QUOTES, 'UTF-8', true);?>
" data-wa-tooltip-placement="right" style="background: url('<?php echo $_smarty_tpl->tpl_vars['user']->value->getPhoto("32");?>
');"></i>
                            <span class="wa-announcement-item-main">
                                <span class="js-announcement-pinned wa-announcement-pinned hidden"><i class="fas fa-bolt text-orange"></i></span>
                                <span class="js-announcement-content wa-announcement-content semibold"></span>
                                <span class="flexbox-inline">
                                    
                                    <span class="wa-announcement-controls flexbox-inline">
                                        <span class="js-announcement-edit wa-announcement-show-by-hover custom-ml-8 cursor-pointer smaller small-mobile" title="Редактировать"><span><i class="fas fa-edit text-blue"></i></span></span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    </li>
                </ul>

                <?php smarty_template_function_announcement_group_controls($_smarty_tpl,array());?>

            </li>
        </script>
    </div>

</section>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:41:56
         compiled from "C:\OSPanel\domains\tovartest\wa-system\webasyst\templates\actions\dashboard\DashboardActivityFilter.inc.html" */ ?>
<?php if ($_valid && !is_callable('content_676468f46d3273_50714329')) {function content_676468f46d3273_50714329($_smarty_tpl) {?>    <div class="activity-filter-wrapper">
        <?php $_smarty_tpl->tpl_vars['checked'] = new Smarty_variable('', null, 0);?>
        <?php $_smarty_tpl->tpl_vars['is_not_full'] = new Smarty_variable(false, null, 0);?>
        <?php $_smarty_tpl->tpl_vars['check_count'] = new Smarty_variable(0, null, 0);?>
        <?php $_smarty_tpl->_capture_stack[0][] = array('default', "select_options", null); ob_start(); ?>
            <?php  $_smarty_tpl->tpl_vars['app'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['app']->_loop = false;
 $_smarty_tpl->tpl_vars['app_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['apps']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['app']->key => $_smarty_tpl->tpl_vars['app']->value){
$_smarty_tpl->tpl_vars['app']->_loop = true;
 $_smarty_tpl->tpl_vars['app_id']->value = $_smarty_tpl->tpl_vars['app']->key;
?>
                <?php if (in_array($_smarty_tpl->tpl_vars['app_id']->value,$_smarty_tpl->tpl_vars['user_filters']->value)||!$_smarty_tpl->tpl_vars['user_filters']->value){?>
                    <?php $_smarty_tpl->tpl_vars['checked'] = new Smarty_variable("checked", null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['check_count'] = new Smarty_variable($_smarty_tpl->tpl_vars['check_count']->value+1, null, 0);?>
                <?php }else{ ?>
                    <?php $_smarty_tpl->tpl_vars['checked'] = new Smarty_variable('', null, 0);?>
                    <?php $_smarty_tpl->tpl_vars['is_not_full'] = new Smarty_variable(true, null, 0);?>
                <?php }?>
                <li class="white">
                    <span class="chip">
                        <label for="field_<?php echo $_smarty_tpl->tpl_vars['app_id']->value;?>
">
                            <span class="wa-checkbox">
                                <input <?php echo $_smarty_tpl->tpl_vars['checked']->value;?>
 type="checkbox" id="field_<?php echo $_smarty_tpl->tpl_vars['app_id']->value;?>
" name="app_id[]" value="<?php echo $_smarty_tpl->tpl_vars['app_id']->value;?>
">
                                <span>
                                    <span class="icon">
                                        <i class="fas fa-check"></i>
                                    </span>
                                </span>
                            </span>
                            <?php echo $_smarty_tpl->tpl_vars['app']->value['name'];?>

                        </label>
                    </span>
                </li>
            <?php } ?>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <i class="fas fa-spinner fa-pulse loading" title="Загрузка" style="display: none"></i>
        <a href="javascript:void(0);" class="button light-gray rounded smaller activity-filter-toggler js-activity-filter-toggler">
            <i class="fas fa-filter"></i>
            <span id="activity-select-text" data-text="Фильтр">Фильтр<?php if ($_smarty_tpl->tpl_vars['is_not_full']->value){?>  (<?php echo $_smarty_tpl->tpl_vars['check_count']->value;?>
)<?php }?></span>
            <i class="fas fa-caret-down"></i>
        </a>
    </div>
    <form action="" id="activity-filter" style="display: none">
        <?php if (!empty($_smarty_tpl->tpl_vars['has_team_app_access']->value)&&$_smarty_tpl->tpl_vars['teams']->value){?>
            <div class="flexbox">
                <ul class="tabs wide width-0 custom-pl-0">
                    <?php if (count($_smarty_tpl->tpl_vars['teams']->value)>=2){?>
                        <li class="selected" data-header-title="Вся команда" data-group-id>
                            <a href="javascript:void(0)">
                                <span>Вся команда</span>
                            </a>
                        </li>
                    <?php }?>
                    <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value){
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
                        <li<?php if ($_smarty_tpl->tpl_vars['selected_sidebar_item']->value==="team/".((string)$_smarty_tpl->tpl_vars['team']->value['id'])){?> class="selected"<?php }?>
                            data-header-title="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['team']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-group-id="<?php echo $_smarty_tpl->tpl_vars['team']->value['id'];?>
">
                            <a href="javascript:void(0)">
                                <i class="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['team']->value['icon'], ENT_QUOTES, 'UTF-8', true);?>
"></i>
                                <span><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['team']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                                
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        <?php }?>

        <ul class="chips small rounded">
            <?php echo preg_replace('!\s+!u', ' ',$_smarty_tpl->tpl_vars['select_options']->value);?>

        </ul>
    </form>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:41:56
         compiled from "C:\OSPanel\domains\tovartest\wa-system\webasyst\templates\actions\dashboard\DashboardActivity.html" */ ?>
<?php if ($_valid && !is_callable('content_676468f4801ad0_08593309')) {function content_676468f4801ad0_08593309($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\OSPanel\\domains\\tovartest\\wa-system\\vendors\\smarty3\\plugins\\modifier.replace.php';
?><?php $_smarty_tpl->tpl_vars['_group'] = new Smarty_variable((($tmp = @$_smarty_tpl->tpl_vars['datetime_group']->value)===null||$tmp==='' ? '' : $tmp), null, 0);?>

<?php  $_smarty_tpl->tpl_vars['activity_item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['activity_item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['activity']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['activity_item']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['activity_item']->key => $_smarty_tpl->tpl_vars['activity_item']->value){
$_smarty_tpl->tpl_vars['activity_item']->_loop = true;
 $_smarty_tpl->tpl_vars['activity_item']->index++;
 $_smarty_tpl->tpl_vars['activity_item']->first = $_smarty_tpl->tpl_vars['activity_item']->index === 0;
?>
    <?php $_smarty_tpl->tpl_vars['app_name'] = new Smarty_variable($_smarty_tpl->tpl_vars['activity_item']->value['app']['name'], null, 0);?>
    <?php $_smarty_tpl->tpl_vars['app_color'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['activity_item']->value['app']['sash_color'],"#aaa"), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['is_today'] = new Smarty_variable($_smarty_tpl->tpl_vars['activity_item']->value['datetime_group']===_ws('Today'), null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['activity_item']->first&&$_smarty_tpl->tpl_vars['activity_item']->value['datetime_group']==$_smarty_tpl->tpl_vars['_group']->value){?>
        <div class="activity-divider h3<?php if ($_smarty_tpl->tpl_vars['is_today']->value){?> hidden today<?php }?>"><?php echo $_smarty_tpl->tpl_vars['activity_item']->value['datetime_group'];?>
</div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['activity_item']->value['datetime_group']!=$_smarty_tpl->tpl_vars['_group']->value){?>
        <div class="activity-divider h3<?php if ($_smarty_tpl->tpl_vars['is_today']->value&&$_smarty_tpl->tpl_vars['activity_item']->first){?> today<?php }?>"><?php echo $_smarty_tpl->tpl_vars['activity_item']->value['datetime_group'];?>
</div>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['_group'] = new Smarty_variable($_smarty_tpl->tpl_vars['activity_item']->value['datetime_group'], null, 0);?>

    <div class="activity-item" data-id="<?php echo $_smarty_tpl->tpl_vars['activity_item']->value['id'];?>
">
        <?php if (!empty($_smarty_tpl->tpl_vars['activity_item']->value['contact_photo'])&&$_smarty_tpl->tpl_vars['activity_item']->value['is_user']){?>
            <header class="item-image-wrapper userpic userpic48">
                <img class="image-item" src="<?php echo waContact::getPhotoUrl($_smarty_tpl->tpl_vars['activity_item']->value['contact_id'],$_smarty_tpl->tpl_vars['activity_item']->value['contact_photo'],48,48);?>
" alt="">
            </header>
        <?php }?>
        <div class="item-content-wrapper">
            <div class="inline-content small">
                <a class="activity-username" href="<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
contacts/#/contact/<?php echo $_smarty_tpl->tpl_vars['activity_item']->value['contact_id'];?>
"><?php echo htmlspecialchars((string)(($tmp = @$_smarty_tpl->tpl_vars['activity_item']->value['contact_name'])===null||$tmp==='' ? '' : $tmp), ENT_QUOTES, 'UTF-8', true);?>
</a>
                <span class="activity-action gray"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['activity_item']->value['action_name'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                <?php if (!empty($_smarty_tpl->tpl_vars['activity_item']->value['params_html'])){?>
                    <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['activity_item']->value['params_html'],'&nbsp;',' ');?>

                <?php }?>
            </div>
            <span class="badge small" style="background: <?php echo $_smarty_tpl->tpl_vars['app_color']->value;?>
; font-weight: normal;"><?php echo $_smarty_tpl->tpl_vars['app_name']->value;?>
</span>
            <span class="activity-datetime hint"><?php echo waDateTime::format('humandatetime',$_smarty_tpl->tpl_vars['activity_item']->value['datetime']);?>
</span>
        </div>
    </div>
<?php } ?>

<?php if (!empty($_smarty_tpl->tpl_vars['activity_load_more']->value)){?>
    <div class="activity-divider show-more-activity-wrapper is-loading">
        <a class="d-load-more-activity inline-link small button light-gray rounded" id="d-load-more-activity" href="javascript:void(0);">Показать еще</a>
        <i class="d-load-more-animation fas fa-spinner fa-pulse wa-animation-spin speed-1000 fa-lg" title="Loading"></i>
    </div>
<?php }?>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:41:56
         compiled from "C:\OSPanel\domains\tovartest\wa-system\webasyst\templates\actions\dashboard\DashboardWidgets.html" */ ?>
<?php if ($_valid && !is_callable('content_676468f48ccc00_50546062')) {function content_676468f48ccc00_50546062($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\OSPanel\\domains\\tovartest\\wa-system\\vendors\\smarty3\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_join')) include 'C:\\OSPanel\\domains\\tovartest\\wa-system/vendors/smarty-plugins\\modifier.join.php';
?><?php $_smarty_tpl->tpl_vars['_capture_array'] = new Smarty_variable(array(), null, 0);?>
<div class="d-widgets-block<?php if (empty($_smarty_tpl->tpl_vars['public_dashboards']->value)&&empty($_smarty_tpl->tpl_vars['is_admin']->value)){?> custom-pt-32<?php }?>"><?php if (!empty($_smarty_tpl->tpl_vars['public_dashboards']->value)||!empty($_smarty_tpl->tpl_vars['is_admin']->value)){?><ul class="chips rounded dashboards-list js-dashboards-list custom-mr-8 custom-mb-32 custom-mt-16 desktop-and-tablet-only"><li class="<?php if ($_smarty_tpl->tpl_vars['selected_sidebar_item']->value==='my'){?> selected<?php }?>" data-header-title="Мои приложения"><a href="javascript:void(0)" data-dashboard="0"><span class="semibold">Мой дашборд</span></a></li><?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['d']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['public_dashboards']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
$_smarty_tpl->tpl_vars['d']->_loop = true;
?><li<?php if ($_smarty_tpl->tpl_vars['selected_sidebar_item']->value==="dashboard/".((string)$_smarty_tpl->tpl_vars['d']->value['id'])){?> class="selected"<?php }?> data-header-title="Вся команда"><a href="javascript:void(0)" data-dashboard="<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" title="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['d']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><span class="semibold"><?php echo smarty_modifier_truncate(htmlspecialchars((string)$_smarty_tpl->tpl_vars['d']->value['name'], ENT_QUOTES, 'UTF-8', true),32);?>
</span><span class="js-loading hidden custom-mr-0 custom-ml-4 small"><i class="fas fa-spinner fa-spin" style="color:var(--text-color);"></i></span></a></li><?php } ?><?php if (!empty($_smarty_tpl->tpl_vars['is_admin']->value)){?><li class="transparent"><a class="js-new-dashboard" href="javascript:void(0);" data-dashboard="new_dashboard" title="Новый дашборд"><i class="fas fa-plus text-gray"></i></a></li><?php }?></ul><?php }?><script src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/d3/d3.min.js"></script><div class="empty-widgets-wrapper <?php if (empty($_smarty_tpl->tpl_vars['widgets']->value)){?>is-shown<?php }?>" id="empty-widgets-wrapper"><p>Ваш дашборд пуст. Добавьте на него виджеты с помощью кнопки «Виджеты» вверху.</p></div><div id="d-widgets-block"><?php  $_smarty_tpl->tpl_vars['block_widgets'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block_widgets']->_loop = false;
 $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['widgets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['block_widgets']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['block_widgets']->key => $_smarty_tpl->tpl_vars['block_widgets']->value){
$_smarty_tpl->tpl_vars['block_widgets']->_loop = true;
 $_smarty_tpl->tpl_vars['block']->value = $_smarty_tpl->tpl_vars['block_widgets']->key;
 $_smarty_tpl->tpl_vars['block_widgets']->index++;
?><?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block_widgets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
$_smarty_tpl->tpl_vars['w']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['size_sum'] = new Smarty_variable(array_sum($_smarty_tpl->tpl_vars['w']->value['size']), null, 0);?><?php $_smarty_tpl->tpl_vars['is_small'] = new Smarty_variable($_smarty_tpl->tpl_vars['size_sum']->value==2, null, 0);?><?php $_smarty_tpl->tpl_vars['is_medium'] = new Smarty_variable($_smarty_tpl->tpl_vars['size_sum']->value==3, null, 0);?><?php $_smarty_tpl->tpl_vars['is_big'] = new Smarty_variable($_smarty_tpl->tpl_vars['size_sum']->value==4, null, 0);?><?php $_smarty_tpl->tpl_vars['has_small_size'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['w']->value['has_sizes']['small']), null, 0);?><?php $_smarty_tpl->tpl_vars['has_medium_size'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['w']->value['has_sizes']['medium']), null, 0);?><?php $_smarty_tpl->tpl_vars['has_big_size'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['w']->value['has_sizes']['big']), null, 0);?><?php } ?><div class="widget-group-wrapper<?php if ($_smarty_tpl->tpl_vars['is_small']->value||$_smarty_tpl->tpl_vars['is_medium']->value){?> js-nested-sortable<?php }?>"><?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['w']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block_widgets']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
$_smarty_tpl->tpl_vars['w']->_loop = true;
?><?php /*  Call merged included template "./DashboardWidget.html" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./DashboardWidget.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '1570431680676468f4305152-10995175');
content_676468f4999656_94921519($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "./DashboardWidget.html" */?><?php $_smarty_tpl->_capture_stack[0][] = array('default', null, "_capture_array"); ob_start(); ?><script>DashboardWidgets[<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
] = new DashboardWidget({widget_id: <?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
,widget_href: <?php echo json_encode(((string)$_smarty_tpl->tpl_vars['w']->value['href'])."&ui=2.0");?>
,widget_sort: <?php echo $_smarty_tpl->tpl_vars['w']->value['sort'];?>
,widget_group_index: <?php echo $_smarty_tpl->tpl_vars['block_widgets']->index;?>
,widget_size: {width: <?php echo $_smarty_tpl->tpl_vars['w']->value['size'][0];?>
,height: <?php echo $_smarty_tpl->tpl_vars['w']->value['size'][1];?>
}});</script><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php } ?></div><?php } ?><div class="widget-group-wrapper js-nested-sortable js-empty-group"></div></div><div id="widgets-list-wrapper" data-backend-url="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['wa_backend_url']->value, ENT_QUOTES, 'UTF-8', true);?>
"></div></div><?php echo preg_replace('!\s+!u', ' ',smarty_modifier_join($_smarty_tpl->tpl_vars['_capture_array']->value,''));?>


<style>
    .widget-group-wrapper.widget-chosen {
        transition: auto !important;
    }
    .widget-ghost:not(.widget-drag) {
        opacity: 0;
    }
    .widget-drag {
       opacity: 1 !important;
       background: rgba(0,0,0,0.06);
        overflow: hidden;
        border-radius: 1rem;
    }
    .widget-chosen:not(.widget-drag) {
        cursor: move;
    }
    .widget-drag .widget-controls-wrapper {
        display: none !important;
    }

    .sortable-fallback {
        background: var(--background-color-blank)
    }

    @keyframes zoomIn {
        from {
            opacity: 0;
            transform: scale3d(0.3, 0.3, 0.3);
        }

        50% {
            opacity: 1;
        }
    }

    .zoomIn {
        animation-name: zoomIn;
        animation-duration: 500ms;
        animation-fill-mode: both;
    }
</style>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-12-19 21:41:56
         compiled from "C:\OSPanel\domains\tovartest\wa-system\webasyst\templates\actions\dashboard\DashboardWidget.html" */ ?>
<?php if ($_valid && !is_callable('content_676468f4999656_94921519')) {function content_676468f4999656_94921519($_smarty_tpl) {?><?php $_smarty_tpl->tpl_vars['_widget_width'] = new Smarty_variable($_smarty_tpl->tpl_vars['w']->value['size'][0], null, 0);?><?php $_smarty_tpl->tpl_vars['_widget_height'] = new Smarty_variable($_smarty_tpl->tpl_vars['w']->value['size'][1], null, 0);?><?php $_smarty_tpl->tpl_vars['is_small'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_widget_width']->value==1)&&($_smarty_tpl->tpl_vars['_widget_height']->value==1)), null, 0);?><?php $_smarty_tpl->tpl_vars['is_medium'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_widget_width']->value==2)&&($_smarty_tpl->tpl_vars['_widget_height']->value==1)), null, 0);?><?php $_smarty_tpl->tpl_vars['is_big'] = new Smarty_variable((($_smarty_tpl->tpl_vars['_widget_width']->value==2)&&($_smarty_tpl->tpl_vars['_widget_height']->value==2)), null, 0);?><?php ob_start();?><?php echo rand(0,9);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo rand(0,9);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo rand(0,9);?>
<?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['widget_color'] = new Smarty_variable("#".$_tmp1.$_tmp2.$_tmp3, null, 0);?><?php $_smarty_tpl->tpl_vars['has_small_size'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['w']->value['has_sizes']['small']), null, 0);?><?php $_smarty_tpl->tpl_vars['has_medium_size'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['w']->value['has_sizes']['medium']), null, 0);?><?php $_smarty_tpl->tpl_vars['has_big_size'] = new Smarty_variable(ifset($_smarty_tpl->tpl_vars['w']->value['has_sizes']['big']), null, 0);?><?php $_smarty_tpl->tpl_vars['has_settings'] = new Smarty_variable(!empty($_smarty_tpl->tpl_vars['w']->value['has_settings']), null, 0);?><div class="widget-wrapper widget-<?php echo $_smarty_tpl->tpl_vars['w']->value['size'][0];?>
x<?php echo $_smarty_tpl->tpl_vars['w']->value['size'][1];?>
" id="widget-wrapper-<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
" data-widget-id="<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><div class="widget-outer-container"><div class="widget-inner-container"><div class="widget-settings-wrapper"></div><div class="widget-block" id="widget-<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><div class="loading-wrapper"><i class="fas fa-spinner fa-spin"></i></div></div><div class="widget-controls-wrapper"><div class="delete-control-wrapper"><a class="control-item delete-widget-link" href="javascript:void(0);" title="Удалить виджет" draggable="false"><i class="fas fa-times"></i></a></div><div class="size-controls-wrapper"><?php if ($_smarty_tpl->tpl_vars['has_small_size']->value){?><a class="control-item set-small-size <?php if ($_smarty_tpl->tpl_vars['is_small']->value){?>is-active<?php }?>" href="javascript:void(0);" title="Маленький размер" draggable="false"><span></span><span></span><span></span><span></span></a><?php }?><?php if ($_smarty_tpl->tpl_vars['has_medium_size']->value){?><a class="control-item set-medium-size <?php if ($_smarty_tpl->tpl_vars['is_medium']->value){?>is-active<?php }?>" href="javascript:void(0);" title="Средний размер" draggable="false"><span></span><span></span><span></span></a><?php }?><?php if ($_smarty_tpl->tpl_vars['has_big_size']->value){?><a class="control-item set-big-size <?php if ($_smarty_tpl->tpl_vars['is_big']->value){?>is-active<?php }?>" href="javascript:void(0);" title="Большой размер" draggable="false"></a><?php }?></div><?php if ($_smarty_tpl->tpl_vars['has_settings']->value){?><div class="settings-control-wrapper"><a class="control-item show-settings-link bold" href="javascript:void(0);" title="Настройки" draggable="false"><i class="fas fa-cog" style="display: none"></i><span>Настройки</span></a></div><?php }?></div></div></div></div>
<?php }} ?>