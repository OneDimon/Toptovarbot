<?php /* Smarty version Smarty-3.1.14, created on 2024-05-09 12:04:54
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\templates\actions-legacy\blocks\Blocks.html" */ ?>
<?php /*%%SmartyHeaderCode:1428380554663c91b622a480-13946392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c277f4e68ec53d5d7ab61ca932c870eed508df9' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\templates\\actions-legacy\\blocks\\Blocks.html',
      1 => 1673257478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1428380554663c91b622a480-13946392',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wa_url' => 0,
    'wa' => 0,
    'block' => 0,
    'blocks' => 0,
    'b' => 0,
    'confirm_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_663c91b6387735_08089318',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_663c91b6387735_08089318')) {function content_663c91b6387735_08089318($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/jquery-wa/wa.elrte.ace.js?v<?php echo $_smarty_tpl->tpl_vars['wa']->value->version();?>
"></script>
<script type="text/javascript">
document.title = <?php if ($_smarty_tpl->tpl_vars['block']->value&&$_smarty_tpl->tpl_vars['block']->value['id']){?>'Блок ' + <?php echo json_encode($_smarty_tpl->tpl_vars['block']->value['id']);?>
<?php }else{ ?>'Новый блок'<?php }?> + ' — <?php echo $_smarty_tpl->tpl_vars['wa']->value->appName();?>
';
</script>
<div class="sidebar left200px s-internal-sidebar">

    <div class="block not-padded">
            <ul id="ul-blocks" class="menu-v with-icons">
                <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocks']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value){
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
                <li data-block-id="<?php echo $_smarty_tpl->tpl_vars['b']->value['id'];?>
" class="<?php if (!isset($_smarty_tpl->tpl_vars['b']->value['app'])){?>sortable<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value&&$_smarty_tpl->tpl_vars['b']->value['id']==$_smarty_tpl->tpl_vars['block']->value['id']){?> selected<?php }?>">
                    <a href="#/blocks/id=<?php echo $_smarty_tpl->tpl_vars['b']->value['id'];?>
"><?php if (isset($_smarty_tpl->tpl_vars['b']->value['app'])||isset($_smarty_tpl->tpl_vars['b']->value['app_icon'])){?><img style="margin-left: -20px; margin-right: 4px; vertical-align: middle;" src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
<?php if (isset($_smarty_tpl->tpl_vars['b']->value['app'])){?><?php echo $_smarty_tpl->tpl_vars['b']->value['app']['icon'][16];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['b']->value['app_icon'][16];?>
<?php }?>" width="16" height="16"><?php }else{ ?><i class="icon16 zone"></i><?php }?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['b']->value['id'], ENT_QUOTES, 'UTF-8', true);?>

                        <span class="hint"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['b']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</span>
                    </a>
                </li>
                <?php } ?>
                <li class="top-padded<?php if (!$_smarty_tpl->tpl_vars['block']->value){?> selected<?php }?>">
                    <a href="#/blocks/add/" class="small"><i class="icon10 add"></i>Новый блок</a>
                </li>

            </ul>
    </div>

</div>
<div class="content left200px">
    <div class="s-editor s-white bordered-left">
    <form id="site-form" method="post" action="?module=blocks&action=save<?php if ($_smarty_tpl->tpl_vars['block']->value&&!isset($_smarty_tpl->tpl_vars['block']->value['app'])){?>&id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>">
        <div class="block s-grey-toolbar">
            <?php if ($_smarty_tpl->tpl_vars['block']->value){?>
            <div class="float-right">
            <ul class="menu-h">
                <?php if (isset($_smarty_tpl->tpl_vars['block']->value['original'])){?>
                <li><a href="#" class="s-block-view-original"><i class="icon16 script-lock"></i>Посмотреть оригинал</a></li>
                <?php }?>
                <li><a href="#" class="inline-link" id="s-block-settings-toggle"><i class="icon16 settings"></i><b><i>Настройки блока</i></b></a></li>
                <?php if (!isset($_smarty_tpl->tpl_vars['block']->value['app'])){?>
                <li><a id="s-block-delete" href="#"><?php if (isset($_smarty_tpl->tpl_vars['block']->value['original'])){?><i class="icon16 broom"></i>Восстановить из оригинала<?php }else{ ?><i class="icon16 delete"></i>Удалить<?php }?></a></li>
                <?php }?>
            </ul>
            </div>
            <h4><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
</h4>
            <span class="hint">Встроить на страницу или в шаблон:<br>
                <strong class="s-block-code">&#123;$wa-&gt;block("<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
")&#125;</strong>
            </span>
            <?php }?>
            <div id="s-block-settings" style="<?php if ($_smarty_tpl->tpl_vars['block']->value){?>display: none;<?php }?>">
                <div class="fields form">
                    <div class="field">
                        <div class="name bold">
                            ID
                        </div>
                        <div class="value">
                            <input name="info[id]" type="text" class="bold large" value="<?php if ($_smarty_tpl->tpl_vars['block']->value){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" />
                        </div>
                    </div>
                    <div class="field">
                        <div class="name">
                            Описание
                        </div>
                        <div class="value">
                            <textarea name="info[description]"><?php if ($_smarty_tpl->tpl_vars['block']->value){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?></textarea>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="s-editor-core-wrapper">
            <div class="ace">
                <textarea id="content" name="info[content]" class="s-entire-core" style="width:99%"><?php if ($_smarty_tpl->tpl_vars['block']->value){?><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['content'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?></textarea>
            </div>
        </div>
    </form>
    <div class="clear"></div>
    </div>
</div>

<?php if (isset($_smarty_tpl->tpl_vars['block']->value['original'])){?>
<div id="s-block-view-original-dialog" class="dialog">
    <div class="dialog-background"></div>
    <div class="dialog-window">
        <div class="dialog-content">
            <div class="dialog-content-indent">
                <h1><?php echo $_smarty_tpl->tpl_vars['block']->value['id'];?>
</h1>
                <div id="s-block-original" style="width: 100%; height: 220px;"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['original'], ENT_QUOTES, 'UTF-8', true);?>
</div>
            </div>
        </div>
        <div class="dialog-buttons">
            <div class="dialog-buttons-gradient"><input type="button" class="button cancel" value="Close"></div>
        </div>
    </div>
</div>
<?php }?>

<script type="text/javascript">
    $("#site-form").submit(function () {
        waEditorUpdateSource({ 'id': 'content'});
        var form = $(this);
        $("#wa-editor-status").html("<i class='icon16 loading'></i> " + $_('Saving...')).fadeIn("slow");
        $.post(form.attr('action'), form.serialize(), function (response) {
            if (response.status == 'ok') {
                $(".error").removeClass('error');
                $("#wa-editor-status").html('<i class="icon16 yes"></i>' + $_('Saved')).fadeOut('slow');
                $('#s-editor-save-button').removeClass('yellow').removeClass('red').addClass('green');

                var blockHtml = function(b) {
                    var icon = '';
                    if (b.app_icon) {
                        icon = '<img style="margin-left: -20px; margin-right: 4px; vertical-align: middle;" src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
' + b.app_icon['16'] + '" width="16" height="16">';
                    } else {
                        icon = '<i class="icon16 zone"></i>';
                    }
                    return '<li data-block-id="' + b.id + '" class="selected sortable">' +
                            '<a href="#/blocks/id=' + b.id + '">' + icon + b.id +
                            ' <span class="hint">' + b.description + '</span></a></li>';
                }

                var blocks_ul = $("#ul-blocks");
                <?php if (!$_smarty_tpl->tpl_vars['block']->value||isset($_smarty_tpl->tpl_vars['block']->value['app'])){?>
                    form.attr('action', form.attr('action') + '&id=' + response.data.id);
                    var b = response.data;
                    <?php if ($_smarty_tpl->tpl_vars['block']->value){?>
                        blocks_ul.find('li[data-block-id="' + b.id + '"]').remove();
                    <?php }?>

                    blocks_ul.find("li.selected").removeClass('selected');

                    var insert_target = blocks_ul.find("li.sortable:last");
                    if (insert_target.length) {
                        insert_target.after(blockHtml(b));
                    } else {
                        insert_target = blocks_ul.find("li:first");
                        if (insert_target.length) {
                            insert_target.before(blockHtml(b));
                        } else {
                            blocks_ul.append(blockHtml(b));
                        }
                    }
                    $.History.stop = true;
                    location.hash = '#/blocks/id=' + b.id;
                <?php }else{ ?>
                    form.attr('action', form.attr('action') + '&id=' + response.data.id);
                    var b = response.data;
                    var li = blocks_ul.find('li[data-block-id="' + (b.old_id || b.id) + '"]');
                    if (b.old_id) {
                        li.replaceWith(blockHtml(b));
                    } else {
                        li.find('.hint').text(b.description);
                    }
                    $.History.stop = true;
                    location.hash = '#/blocks/id=' + b.id;
                <?php }?>
            } else if (response.status == 'fail') {
                if ($.isArray(response.errors)) {
                    var e = response.errors[0];
                    $(response.errors[1]).addClass('error');
                } else {
                    var e = response.errors;
                }
                $("#wa-editor-status").html('<b style="color:red">' + (e ? e : $_('An error occurred while saving')) + '</b>');
                $('#s-editor-save-button').removeClass('yellow').removeClass('green').addClass('red');
            }
        }, "json");
        return false;
    });
$("#ul-blocks").sortable({
    distance: 5,
    helper: 'clone',
    items: 'li.sortable',
    opacity: 0.75,
    tolerance: 'pointer',
    stop: function (event, ui) {
        var li = $(ui.item);
        var id = li.data('block-id');
        var pos = li.prevAll('li.sortable').size() + 1;
        $.post("?module=blocks&action=sort", { id: id, pos: pos}, function () {
        }, "json");
    }
});

$(".s-block-code").click(function () {
    var el = $('<input style="font-weight: bold; margin-top:2px; border: 1px solid #ccc; padding: 1px; width:' + ($(this).width() + 2) + 'px" type="text" readonly="readonly" />').val($(this).text()).focus(function () {
        $(this).select();
    }).mouseup(function(e){
        e.preventDefault();
    });
    $(this).replaceWith(el);
    el.select();
});

<?php if (isset($_smarty_tpl->tpl_vars['block']->value['original'])){?>
    <?php $_smarty_tpl->tpl_vars['confirm_message'] = new Smarty_variable('Восстановление из оригинала сбросит все изменения, которые вы применяли к блоку. Продолжить?', null, 0);?>
<?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['confirm_message'] = new Smarty_variable('Блок будет удален и перестанет подключаться в шаблонах и на страницах, на которые был добавлен до этого. Удалить блок?', null, 0);?>
<?php }?>

$("#s-block-delete").click(function () {
    <?php if (!empty($_smarty_tpl->tpl_vars['block']->value)){?>
    if (confirm('<?php echo $_smarty_tpl->tpl_vars['confirm_message']->value;?>
')) {
        $.post("?module=blocks&action=delete", { id: "<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"}, function (response) {
            if (response.status == 'ok') {
                <?php if (!isset($_smarty_tpl->tpl_vars['block']->value['original'])){?>
                    var li = $("#ul-blocks li.selected");
                    if (li.prev().length) {
                        var hash = li.prev().addClass('selected').find('a').attr('href');
                    } else {
                        var hash = li.next().addClass('selected').find('a').attr('href');
                    }
                <?php }?>
                $("div.s-editor").empty();
                $('#ul-blocks li[data-block-id="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['block']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
"]').remove();
                <?php if (!isset($_smarty_tpl->tpl_vars['block']->value['original'])){?>
                    $.wa.setHash(hash);
                <?php }else{ ?>
                    location.reload();
                <?php }?>
            }
        }, "json");
    }
    <?php }?>

    return false;
});

$('.s-block-view-original').click(function() {
    var d = $('#s-block-view-original-dialog');
    if (d.length) {
        d.waDialog({
            onLoad: function() {
                var editor = ace.edit('s-block-original');
                ace.config.set("basePath", wa_url + 'wa-content/js/ace/');
                editor.setTheme("ace/theme/eclipse");
                var session = editor.getSession();
                session.setMode("ace/mode/css");
                session.setMode("ace/mode/javascript");
                session.setMode("ace/mode/smarty");
                session.setUseWrapMode(true);
                editor.renderer.setShowGutter(false);
                editor.setShowPrintMargin(false);
                editor.setFontSize(13);
                editor.setHighlightActiveLine(false);
                editor.setReadOnly(true);

                setTimeout(function () {
                    var newHeight = editor.getSession().getScreenLength() * editor.renderer.lineHeight + editor.renderer.scrollBar.getWidth();
                    if (newHeight < 220) {
                        newHeight = 220;
                    }
                    $('#s-block-original').height(newHeight.toString() + "px");
                    editor.resize();
                }, 50);
            }
        });
    }
    return false;
});

$('#s-block-settings-toggle').click(function(){
    $('#s-block-settings').toggle();
    return false;
});


</script>
<?php }} ?>