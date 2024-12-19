<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:16:54
         compiled from "C:\OSPanel\domains\tovarka\wa-widgets\weather\templates\Default.html" */ ?>
<?php /*%%SmartyHeaderCode:18112773466366d86365278-04581094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0737a67514d3cf01ea5e0362e921ce275b6b268e' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-widgets\\weather\\templates\\Default.html',
      1 => 1624000810,
      2 => 'file',
    ),
    '639a2f840371388908b0bc775fdb51afe93cd847' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-widgets\\weather\\css\\weather.css',
      1 => 1617787741,
      2 => 'file',
    ),
    '5e4696c15a70bbb43a2cadbf94e87373da5c7985' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-widgets\\weather\\css\\weather-legacy.css',
      1 => 1617787741,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18112773466366d86365278-04581094',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ui' => 0,
    'weather' => 0,
    '_widget_class' => 0,
    'info' => 0,
    'city' => 0,
    'wa_url' => 0,
    'unit' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_66366d868550f8_53959659',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66366d868550f8_53959659')) {function content_66366d868550f8_53959659($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['ui']->value=='2.0'){?>
    <style>
        <?php /*  Call merged included template "../css/weather.css" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("../css/weather.css", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '18112773466366d86365278-04581094');
content_66366d86439202_99272100($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "../css/weather.css" */?>
    </style>

    <?php $_smarty_tpl->tpl_vars['_widget_class'] = new Smarty_variable("s-weather-day", null, 0);?>
    <?php if (empty($_smarty_tpl->tpl_vars['weather']->value['weather']['icon'])){?>
        <?php $_smarty_tpl->tpl_vars['_widget_class'] = new Smarty_variable("s-weather-notavailable", null, 0);?>
    <?php }else{ ?>
        <?php if (strstr($_smarty_tpl->tpl_vars['weather']->value['weather']['icon'],'n')){?>
            <?php $_smarty_tpl->tpl_vars['_widget_class'] = new Smarty_variable("s-weather-night", null, 0);?>
        <?php }?>
    <?php }?>

    <div class="s-weather <?php echo $_smarty_tpl->tpl_vars['_widget_class']->value;?>
" id="s-weather-widget-<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
">

        <?php if (empty($_smarty_tpl->tpl_vars['weather']->value)||!empty($_smarty_tpl->tpl_vars['weather']->value['message'])){?>
            <?php if (!empty($_smarty_tpl->tpl_vars['weather']->value['message'])&&$_smarty_tpl->tpl_vars['weather']->value['message']!=='Error: Not found city'){?>
                <div class="state-error"><?php echo $_smarty_tpl->tpl_vars['weather']->value['message'];?>
</div>
            <?php }else{ ?>
                <h5 class="align-center hint wa-no-weather">
                    <?php if ($_smarty_tpl->tpl_vars['city']->value){?>
                        <?php echo sprintf('Информация о погоде в городе <strong>%s</strong> не найдена. Пожалуйста, проверьте правильность написания города в профиле вашего пользователя.',(($tmp = @htmlspecialchars((string)$_smarty_tpl->tpl_vars['city']->value, ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '(неизвестный город)' : $tmp));?>

                    <?php }else{ ?>
                        Введите название города в профиле пользователя или в настройках виджета.
                    <?php }?>
                </h5>
            <?php }?>
        <?php }else{ ?>

            <div class="s-weather-icon-wrapper">
                <div class="s-weather-icon" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-widgets/weather/img/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['weather']->value['weather']['icon'])===null||$tmp==='' ? 'unknown' : $tmp);?>
.png');"></div>
            </div>
            <div class="info-wrapper">
                <h2><?php echo $_smarty_tpl->tpl_vars['weather']->value['main']['temp'];?>
&deg;<?php if ($_smarty_tpl->tpl_vars['unit']->value=="F"){?>F<?php }?></h2>
                <h6><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['city']->value, ENT_QUOTES, 'UTF-8', true);?>
</h6>
            </div>
        <?php }?>
    </div>

    <script>(function($) {

        setTimeout(function() {
            var widget_id = "<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
";
            try {
                DashboardWidgets[widget_id].renderWidget();
            } catch (e) {}
        }, 15 * 60 * 1000);

    })(jQuery);</script>
<?php }else{ ?>
    <style>
        <?php /*  Call merged included template "../css/weather-legacy.css" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("../css/weather-legacy.css", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '18112773466366d86365278-04581094');
content_66366d8663ad71_33269058($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "../css/weather-legacy.css" */?>
        .s-weather.s-weather-night {
            background: #0f2657 url("<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-widgets/weather/img-legacy/night.jpg") no-repeat;
        }
    </style>

    <?php $_smarty_tpl->tpl_vars['_widget_class'] = new Smarty_variable("s-weather-day", null, 0);?>
    <?php if (empty($_smarty_tpl->tpl_vars['weather']->value['weather']['icon'])){?>
        <?php $_smarty_tpl->tpl_vars['_widget_class'] = new Smarty_variable("s-weather-notavailable", null, 0);?>
    <?php }else{ ?>
        <?php if (strstr($_smarty_tpl->tpl_vars['weather']->value['weather']['icon'],'n')){?>
            <?php $_smarty_tpl->tpl_vars['_widget_class'] = new Smarty_variable("s-weather-night", null, 0);?>
        <?php }?>
    <?php }?>

    <div class="s-weather <?php echo $_smarty_tpl->tpl_vars['_widget_class']->value;?>
" id="s-weather-widget-<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
">

        <?php if (empty($_smarty_tpl->tpl_vars['weather']->value)||!empty($_smarty_tpl->tpl_vars['weather']->value['message'])){?>
            <?php if (!empty($_smarty_tpl->tpl_vars['weather']->value['message'])&&$_smarty_tpl->tpl_vars['weather']->value['message']!=='Error: Not found city'){?>
                <div class="errormsg"><?php echo $_smarty_tpl->tpl_vars['weather']->value['message'];?>
</div>
            <?php }else{ ?>
                <h5 class="align-center hint wa-no-weather">
                    <?php if ($_smarty_tpl->tpl_vars['city']->value){?>
                        <?php echo sprintf('Информация о погоде в городе <strong>%s</strong> не найдена. Пожалуйста, проверьте правильность написания города в профиле вашего пользователя.',(($tmp = @htmlspecialchars((string)$_smarty_tpl->tpl_vars['city']->value, ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? '(неизвестный город)' : $tmp));?>

                    <?php }else{ ?>
                        Введите название города в профиле пользователя или в настройках виджета.
                    <?php }?>
                </h5>
            <?php }?>
        <?php }else{ ?>

            <div class="s-weather-icon-wrapper">
                <div class="s-weather-icon" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-widgets/weather/img-legacy/<?php echo (($tmp = @$_smarty_tpl->tpl_vars['weather']->value['weather']['icon'])===null||$tmp==='' ? 'unknown' : $tmp);?>
.png');"></div>
            </div>

            <h2><?php echo $_smarty_tpl->tpl_vars['weather']->value['main']['temp'];?>
&deg;<?php if ($_smarty_tpl->tpl_vars['unit']->value=="F"){?>F<?php }?></h2>
            <h6><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['city']->value, ENT_QUOTES, 'UTF-8', true);?>
</h6>

        <?php }?>
    </div>

    <script>(function($) {

            setTimeout(function() {
                var widget_id = "<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
";
                try {
                    DashboardWidgets[widget_id].renderWidget();
                } catch (e) {}
            }, 15 * 60 * 1000);

        })(jQuery);</script>
<?php }?>
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:16:54
         compiled from "C:\OSPanel\domains\tovarka\wa-widgets\weather\css\weather.css" */ ?>
<?php if ($_valid && !is_callable('content_66366d86439202_99272100')) {function content_66366d86439202_99272100($_smarty_tpl) {?>.s-weather {
  height: 100%;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  background: #1c60ac;
  text-align: center;
  font-size: 16px;
  color: #fff;
  padding: 16px;
}
.s-weather .s-weather-icon-wrapper {
  position: absolute;
  top: -1rem;
  left: 0;
  width: 100%;
  height: auto;
  text-align: center;
}
.s-weather .s-weather-icon-wrapper .s-weather-icon {
  position: relative;
  display: inline-block;
  width: 16em;
  height: 16em;
  background-size: 16em 16em;
}
.s-weather .info-wrapper > * {
  color: #fff;
}
.s-weather .info-wrapper h2 {
  margin: 0 0 4px 0;
  font-weight: 700;
  font-size: 3.5rem;
  padding-left: 6%;
}
.s-weather .info-wrapper h4 {
  margin: 0.75em 0 0;
  opacity: 0.8;
  font-weight: normal;
}
.s-weather .wa-no-weather {
  padding: 2em 0;
  font-weight: normal;
  color: #fff;
}
.s-weather.s-weather-day {
  background: radial-gradient(68.67% 68.67% at 50% 31.33%, #8ad6e6 0%, #45a2e6 100%);
}
.s-weather.s-weather-night {
  background: radial-gradient(68.67% 68.67% at 50% 31.33%, #2f2d73 0%, #270e33 100%);
  background-image: url("/wa-widgets/weather/img/night.jpg");
  background-size: cover;
}
.s-weather.s-weather-notavailable {
  background: #aaa;
}
.widget-2x1 .s-weather {
  justify-content: center;
  align-items: center;
  padding-left: calc(8.063rem + 16px);
}
.widget-2x1 .s-weather.s-weather-notavailable {
  padding-top: 0;
}
.widget-2x1 .s-weather .wa-no-weather {
  padding: 2em 2.75em;
}
.widget-2x1 .s-weather .info-wrapper h2 {
  font-size: 2.5rem;
}
.widget-2x1 .s-weather .info-wrapper h6 {
  font-size: 0.875rem;
  margin-top: 0;
}
.widget-2x1 .s-weather .s-weather-icon-wrapper {
  top: 0.5rem;
  left: 0.5rem;
  text-align: left;
}
.widget-2x1 .s-weather .s-weather-icon-wrapper .s-weather-icon {
  width: 8.063rem;
  height: 8.063rem;
  background-size: 8.063rem 8.063rem;
}
.widget-1x1 .s-weather.s-weather-notavailable {
  padding-top: 0;
}
.widget-1x1 .s-weather .s-weather-icon-wrapper {
  top: -0.25rem;
  text-align: center;
}
.widget-1x1 .s-weather .s-weather-icon-wrapper .s-weather-icon {
  width: 6rem;
  height: 6rem;
  background-size: 6rem 6rem;
}
.widget-1x1 .s-weather h2 {
  font-size: 1.3rem;
}
.widget-1x1 .s-weather h6 {
  margin: 0;
  display: inline-block;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  width: 100%;
}
.widget-2x2 .s-weather.s-weather-notavailable {
  padding-top: 0;
}
.widget-2x2 .s-weather .info-wrapper h6 {
  font-size: 1.125rem;
  margin: 0;
}
.widget-2x2 .s-weather .wa-no-weather {
  padding: 4em 1.5em;
}
.mobile .s-weather {
  font-size: 1.1rem;
}
.mobile .widget-1x1 .s-weather h2,
.mobile .widget-2x1 .s-weather h2 {
  font-size: 2em;
}
<?php }} ?><?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:16:54
         compiled from "C:\OSPanel\domains\tovarka\wa-widgets\weather\css\weather-legacy.css" */ ?>
<?php if ($_valid && !is_callable('content_66366d8663ad71_33269058')) {function content_66366d8663ad71_33269058($_smarty_tpl) {?>.s-weather {
  height: 100%;
  box-sizing: border-box;
  background: #1c60ac;
  text-align: center;
  font-size: 16px;
  color: #fff;
  padding: 10em 0 0 0;
}
.s-weather .s-weather-icon-wrapper {
  position: absolute;
  top: -2.5em;
  left: 0;
  width: 100%;
  height: auto;
  text-align: center;
}
.s-weather .s-weather-icon-wrapper .s-weather-icon {
  position: relative;
  display: inline-block;
  width: 16em;
  height: 16em;
  background-size: 16em 16em;
}
.s-weather h2 {
  position: relative;
  left: 0.2em;
  margin: 0;
  font-weight: normal;
  font-size: 4em;
}
.s-weather h4 {
  margin: 0.75em 0 0;
  opacity: 0.8;
  font-weight: normal;
}
.s-weather .wa-no-weather {
  padding: 2em 0;
  font-weight: normal;
  color: #fff;
}
.s-weather.s-weather-day {
  background: -moz-linear-gradient(top, #133682 0%, #2793df 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #133682), color-stop(100%, #2793df));
  background: -webkit-linear-gradient(top, #133682 0%, #2793df 100%);
  background: -o-linear-gradient(top, #133682 0%, #2793df 100%);
  background: -ms-linear-gradient(top, #133682 0%, #2793df 100%);
  background: linear-gradient(to bottom, #133682 0%, #2793df 100%);
}
.s-weather.s-weather-night {
  background-size: cover;
}
.s-weather.s-weather-notavailable {
  background: #aaa;
}
.widget-1x1 .s-weather,
.widget-2x1 .s-weather {
  padding-top: 5em;
}
.widget-1x1 .s-weather.s-weather-notavailable,
.widget-2x1 .s-weather.s-weather-notavailable {
  padding-top: 0;
}
.widget-1x1 .s-weather .s-weather-icon-wrapper,
.widget-2x1 .s-weather .s-weather-icon-wrapper {
  top: -1.25em;
}
.widget-1x1 .s-weather .s-weather-icon-wrapper .s-weather-icon,
.widget-2x1 .s-weather .s-weather-icon-wrapper .s-weather-icon {
  width: 8em;
  height: 8em;
  background-size: 8em 8em;
}
.widget-1x1 .s-weather h2,
.widget-2x1 .s-weather h2 {
  font-size: 2em;
}
.widget-2x1 .s-weather .wa-no-weather {
  padding: 2em 2.75em;
}
.widget-2x2 .s-weather.s-weather-notavailable {
  padding-top: 0;
}
.widget-2x2 .s-weather h6 {
  font-size: 1.3em;
}
.widget-2x2 .s-weather .wa-no-weather {
  padding: 4em 1.5em;
}
.tv .s-weather-day {
  background: -moz-linear-gradient(top, #0f2d62 0%, #1b679c 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #0f2d62), color-stop(100%, #1b679c));
  background: -webkit-linear-gradient(top, #0f2d62 0%, #1b679c 100%);
  background: -o-linear-gradient(top, #0f2d62 0%, #1b679c 100%);
  background: -ms-linear-gradient(top, #0f2d62 0%, #1b679c 100%);
  background: linear-gradient(to bottom, #0f2d62 0%, #1b679c 100%);
}
.tv .s-weather,
.mobile .s-weather {
  font-size: 1.1rem;
}
.mobile .widget-1x1 .s-weather h2,
.mobile .widget-2x1 .s-weather h2 {
  font-size: 2em;
}
<?php }} ?>