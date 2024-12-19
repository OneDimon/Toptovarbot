<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:30:07
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\templates\actions-legacy\routing\Routing.html" */ ?>
<?php /*%%SmartyHeaderCode:21126392416636709f0563f7-84091874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f39c9d574f2754b1cb1dae48b061a63032ed9621' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\templates\\actions-legacy\\routing\\Routing.html',
      1 => 1667983931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21126392416636709f0563f7-84091874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'routing_errors' => 0,
    'routes' => 0,
    'route_id' => 0,
    'url' => 0,
    'route' => 0,
    'wa_url' => 0,
    'wa_app_static_url' => 0,
    'domain_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_6636709f55c487_23733976',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6636709f55c487_23733976')) {function content_6636709f55c487_23733976($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'C:\\OSPanel\\domains\\tovarka\\wa-system\\vendors\\smarty3\\plugins\\modifier.truncate.php';
?><div class="content">
    <div class="s-editor s-white">
        <div class="block s-grey-toolbar">
            <h4 style="margin-left: 4px; margin-top:2px;">Структура сайта</h4>
        </div>
        <div class="block s-routing-header">
            <a href="#" class="inline-link" id="s-routing-addrule"><i class="icon16 add"></i><b><i>Новое правило</i></b></a>
            <?php $_smarty_tpl->tpl_vars['routing_errors'] = new Smarty_variable(siteHelper::getRoutingErrorsInfo(), null, 0);?>
            <span class="errormsg" id="not-install-error" style="margin: 1em 0;"><?php if (!empty($_smarty_tpl->tpl_vars['routing_errors']->value['not_install'])){?><?php echo $_smarty_tpl->tpl_vars['routing_errors']->value['not_install'];?>
<?php }?></span>
            <span class="errormsg" id="incorrect-install-error" style="margin: 1em 0;"><?php if (!empty($_smarty_tpl->tpl_vars['routing_errors']->value['incorrect'])){?><?php echo nl2br(htmlspecialchars((string)$_smarty_tpl->tpl_vars['routing_errors']->value['incorrect'], ENT_QUOTES, 'UTF-8', true));?>
<?php }?></span>
        </div>
        <div>
            <div class="sidebar" style="width:75%;">
                <table id="s-rules" class="zebra s-routing">
                    <?php  $_smarty_tpl->tpl_vars['route'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['route']->_loop = false;
 $_smarty_tpl->tpl_vars['route_id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['routes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['route']->key => $_smarty_tpl->tpl_vars['route']->value){
$_smarty_tpl->tpl_vars['route']->_loop = true;
 $_smarty_tpl->tpl_vars['route_id']->value = $_smarty_tpl->tpl_vars['route']->key;
?>
                    <tr id="route-<?php echo $_smarty_tpl->tpl_vars['route_id']->value;?>
" class="s-inc">
                        <td class="s-url">
                            <span><a style="display:inline" href="#"><i class="icon16 sort"></i></a></span>
                            <span class="s-domain-url"><?php echo $_smarty_tpl->tpl_vars['url']->value;?>
/</span><span class="s-editable-url" <?php if (!empty($_smarty_tpl->tpl_vars['route']->value['private'])||(!empty($_smarty_tpl->tpl_vars['route']->value['app'])&&!is_array($_smarty_tpl->tpl_vars['route']->value['app']))){?> style="color: #aaa;"<?php }?>><?php echo smarty_modifier_truncate(htmlspecialchars((string)$_smarty_tpl->tpl_vars['route']->value['url'], ENT_QUOTES, 'UTF-8', true),30,'...',false,true);?>
</span>
                            <span class="s-exclamation" title="Это правило отключено, потому что оно находится ниже более общего правила. Перенесите правило выше, чтобы включить его."><i class="icon10 exclamation"></i></span>
                        </td>
                        <td class="s-app<?php if (!empty($_smarty_tpl->tpl_vars['route']->value['private'])||!empty($_smarty_tpl->tpl_vars['route']->value['disabled'])||(!empty($_smarty_tpl->tpl_vars['route']->value['app'])&&!is_array($_smarty_tpl->tpl_vars['route']->value['app']))){?> gray<?php }?>">
                            <?php if (!empty($_smarty_tpl->tpl_vars['route']->value['app'])){?>
                                <?php if (is_array($_smarty_tpl->tpl_vars['route']->value['app'])){?>
                                <img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php echo $_smarty_tpl->tpl_vars['route']->value['app']['icon'][24];?>
" class="s-app24x24icon-menu-v" alt=""><?php echo $_smarty_tpl->tpl_vars['route']->value['app']['name'];?>

                                <?php }elseif($_smarty_tpl->tpl_vars['route']->value['app']===':text'){?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['wa_app_static_url']->value;?>
img/script-code.png?v=1" class="s-app24x24icon-menu-v" alt=""><span class="text"><?php echo htmlspecialchars((string)smarty_modifier_truncate((($tmp = @$_smarty_tpl->tpl_vars['route']->value['text'])===null||$tmp==='' ? '' : $tmp),32), ENT_QUOTES, 'UTF-8', true);?>
</span>
                                <?php }else{ ?>
                                <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['route']->value['app'], ENT_QUOTES, 'UTF-8', true);?>

                                <?php }?>
                            <?php }else{ ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['wa_app_static_url']->value;?>
img/arrow.png" class="s-app24x24icon-menu-v" alt="">
                            <span class="redirect"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['route']->value['redirect'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                            <?php }?>
                        </td>
                        <td class="s-actions align-right">
                            <?php if (empty($_smarty_tpl->tpl_vars['route']->value['temporarily_off'])){?>
                            <a href="#" class="s-route-action s-route-settings" title="Настройки"><i class="icon16 settings"></i></a>
                            <?php }else{ ?>
                            <i class="icon16 broom-bw"></i>
                            <?php }?>
                            <i class="icon16 lock <?php if ((($tmp = @$_smarty_tpl->tpl_vars['route']->value['ssl_all'])===null||$tmp==='' ? false : $tmp)){?><?php }else{ ?>hidden<?php }?>" title="Перенаправлять на HTTPS"></i>
                        </td>
                    </tr>
                    <?php } ?>
                    <!-- /fields -->
                </table>
                <p class="block double-padded align-center hint" id="s-routing-disclaimer">
                    Структура сайта определяется правилами маршрутизации. Каждое правило указывает, по какому адресу работает каждое приложение. По аналогии с тем, как папки используются для организации файлов на компьютере, правила маршрутизации используются для распределения приложений по разделам сайта.
               		Правила обрабатываются по одному в указанном порядке. Обработка начинается с первого правила в списке и заканчивается на правиле, которое соответствует текущему HTTP-запросу (адресу). Для обозначения любых символов в качестве маски используйте звездочку (*).
                	<span class="nowrap"><a href="http://www.webasyst.ru/developers/docs/routing/site-app-routing/" target="_blank">Помощь</a> <i class="icon10 new-window"></i></span>
                </p>
            </div>
            <div id="s-route-params" class="content bordered-left" style="margin-left:75%;">
            	<div class="block double-padded align-center hint">
            		<br />
            		<img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-apps/site/img/gear.png"><br /><br />
            		Выберите правило маршрутизации для редактирования его настроек
            		<div class="clear"></div>
            	</div>
            </div>
        </div>
        <div class="clear-left"></div>
    </div>
</div>
<script type="text/javascript">

    //add notification to the route
$.wa.site.updateIncorrectRouting(<?php echo json_encode($_smarty_tpl->tpl_vars['routing_errors']->value['incorrect_ids']);?>
);

function site_routing_full()
{
    $("#s-route-params").html('<div class="block double-padded align-center hint"><br />' +
            '<img src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-apps/site/img/gear.png"><br /><br />Выберите правило маршрутизации для редактирования его настроек' +
            '<div class="clear"></div></div>'
    ).animate({ 'margin-left': '75%'}, 'slow');
    $(".s-editor .sidebar").animate({ 'width':'75%'}, 'slow');
    $("#s-rules").removeClass('s-routing-minimized');
    $("#s-rules .s-domain-url").show();
    $("#s-rules tr.selected").removeClass('selected');
}

$("a#s-routing-addrule").click(function () {
    $("#s-rules tr.selected").removeClass('selected');
    $(".s-editor .sidebar").animate({ 'width':'25%'}, 'slow');
    $("#s-rules").addClass('s-routing-minimized');
    $("#s-route-params").animate({ 'margin-left':'25%'}, 'slow');
    $("#s-rules .s-domain-url").hide();
    $("#s-route-params").load('?module=routing&action=edit', 'domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
&route=', function () {
        $(".s-route-core input:first").focus();
    });
    return false;
});

$("#s-rules").on('click', "tr", function () {
    $("#s-rules tr.selected").removeClass('selected');
    $(this).addClass('selected');
    var route = $(this).attr('id').replace(/^route-/, '');
    $(".s-editor .sidebar").animate({ 'width':'25%'}, 'slow');
    $("#s-rules").addClass('s-routing-minimized');
    $("#s-route-params").animate({ 'margin-left':'25%'}, 'slow');
    $("#s-rules .s-domain-url").hide();
    $("#s-route-params").load('?module=routing&action=edit', 'domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
&route=' + route, function () {

    });
    return false;
});


$("#s-rules").sortable({
    distance: 5,
    helper: function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index){
            // Set helper cell sizes to match the original sizes
            $(this).width($originals.eq(index).width())
        });
        return $helper;
    },
    items: 'tr',
    handle: "i.sort",
    opacity: 0.75,
    tolerance: 'pointer',
    stop: function (event, ui) {
        var tr = $(ui.item);
        var id = tr.attr('id').replace(/route-/, '');
        var pos = tr.prevAll('tr').size();
        $.post("?module=routing&action=sort&domain_id=<?php echo $_smarty_tpl->tpl_vars['domain_id']->value;?>
" , { route: id, pos: pos}, function (response) {
            $.wa.site.updateRoutingErrors(response.data.routing_errors);
        }, "json");
    }
});
</script>
<?php }} ?>