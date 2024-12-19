<?php /* Smarty version Smarty-3.1.14, created on 2024-05-09 12:04:41
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\site\templates\actions-legacy\files\Files.html" */ ?>
<?php /*%%SmartyHeaderCode:504746974663c91a9b3e1f0-28995999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b9195ce9349e10ed03525256f7624c57639483b' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\site\\templates\\actions-legacy\\files\\Files.html',
      1 => 1624000810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '504746974663c91a9b3e1f0-28995999',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wa_url' => 0,
    'domain' => 0,
    'wa' => 0,
    'dirs' => 0,
    'sub_dirs_decoded' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_663c91a9bec8a3_05410559',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_663c91a9bec8a3_05410559')) {function content_663c91a9bec8a3_05410559($_smarty_tpl) {?><script src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/jquery-plugins/fileupload/jquery.iframe-transport.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['wa_url']->value;?>
wa-content/js/jquery-plugins/fileupload/jquery.fileupload.js"></script>
<script type="text/javascript">
    document.title = 'Файлы — ' + <?php echo json_encode(waIdna::dec($_smarty_tpl->tpl_vars['domain']->value));?>
;
</script>

<div class="sidebar left250px s-internal-sidebar">
	<div class="block not-padded">
		<div class="s-files-baseurl">
			<a id="s-add-folder" href="#" class="count" title="Новая папка"><i class="icon16 add"></i></a>
			<a href="#/files/" class="s-baseurl"><i class="icon16 folder"></i>wa-data/public/site</a>
		</div>

		<div class="hierarchical" id="s-files-tree">

		</div>
	</div>
</div>

<div class="content left250px">
	<div class="s-editor s-white bordered-left">
		<div class="block s-grey-toolbar">

			<h4><span class="s-files-path-to-folder">wa-data/public/site</span><span id="s-current-path"></span></h4>
			<ul class="menu-h with-icons dropdown s-filelist-actions-menu">
				<li>
					<a id="s-upload-link" href="#" class="bold">
						<i class="icon16 upload"></i>Загрузить файлы
					</a>
				</li>
				<li>
					<a href="javascript:void(0)" class="inline-link"><b><i>Выбранные файлы (<span id="s-files-count">0</span>)</i></b><i class="icon10 darr"></i>
					</a>
					<ul class="menu-v">
						<li><a id="s-files-move" href="#"><i class="icon16 move"></i>Переместить в папку</a></li>
						<li><a id="s-files-delete" href="#"><i class="icon16 delete"></i>Удалить</a></li>
					</ul>
				</li>
				<li id="s-folder-actions-li">
					<a href="javascript:void(0)" class="inline-link"><b><i>Папка</i></b><i class="icon10 darr"></i></a>
					<ul class="menu-v">
						<li><a id="s-folder-rename" href="#"><i class="icon16 edit"></i>Переименовать</a></li>
						<li><a id="s-folder-move" href="#"><i class="icon16 move"></i>Переместить в папку</a></li>
						<li><a id="s-folder-delete" href="#"><i class="icon16 delete"></i>Удалить</a></li>
					</ul>
				</li>
			</ul>
            <span class="hint">Загруженные здесь файлы доступны всем посетителям сайта без авторизации. Не загружайте личные файлы.</span>
		</div>
		<table id="s-files-grid" class="zebra s-filelist">
		<tr>
				<th class="min-width"><input class="all" type="checkbox"></th>
				<th>Файл</th>
				<th>Изменен</th>
				<th><span class="float-right">Размер</span></th>
		</tr>
		</table>
        <div class="s-pagination"></div>
		<div class="clear"></div>
	</div>
</div>
<div class="dialog" id="s-add-folder-dialog">
		<div class="dialog-background"> </div>
		<div class="dialog-window" style="height: 110px; min-height: 110px; width: 350px">
			<form>
			<div class="dialog-content">
					<div class="dialog-content-indent">
						<h1>Новая папка</h1>
						<span></span> <input type="text" id="s-folder-name" name="name" class="bold large" value="" />
					</div>
			</div>
			<div class="dialog-buttons">
					<div class="dialog-buttons-gradient">
							<input type="submit" class="button green" value="Создать">
							или <a href="#" class="inline-link cancel"><b><i>отмена</i></b></a> </div>
			</div>
			</form>
		</div>
</div>
<div class="dialog" id="s-upload-dialog">
		<div class="dialog-background"> </div>
		<div class="dialog-window" style="height: 140px; min-height: 140px; width: 350px; min-width: 350px">
			<form id="s-upload-form" method="post" action="?module=files&action=upload" enctype="multipart/form-data">
            <?php echo $_smarty_tpl->tpl_vars['wa']->value->csrf();?>

			<div class="dialog-content">
					<div class="dialog-content-indent">
						<h1>Загрузить файлы</h1>

                        <div style="overflow: hidden; width: 100%;">
						    <input id="s-input-file" type="file" name="files[]" multiple>
                        </div>

						<input type="hidden" name="path" id="s-upload-path" value="" />
						<div class="loading" style="display:none; margin-top: 10px">
							<i class="icon16 loading"></i> Загрузка...
						</div>
					</div>
			</div>
			<div class="dialog-buttons">
					<div class="dialog-buttons-gradient">
							<input type="submit" class="button green" value="Загрузить">
							или <a href="#" class="inline-link cancel"><b><i>отмена</i></b></a>
                    </div>
			</div>
			</form>
		</div>
</div>


<div class="dialog" id="s-rename-dialog">
		<div class="dialog-background"> </div>
		<div class="dialog-window" style="height: 110px; min-height: 110px; width: 350px">
			<form>
			<div class="dialog-content">
					<div class="dialog-content-indent">
						<h1>Переименовать</h1>
						<span></span> <input type="text" id="s-name" name="name" class="bold large" value="" />
					</div>
			</div>
			<div class="dialog-buttons">
					<div class="dialog-buttons-gradient">
							<input type="submit" class="button green" value="Сохранить">
							или <a href="#" class="inline-link cancel"><b><i>отмена</i></b></a> </div>
			</div>
			</form>
		</div>
</div>
<div class="dialog" id="s-move-dialog">
		<div class="dialog-background"> </div>
		<div class="dialog-window" style="height: 110px; min-height: 110px; width: 350px; min-width: 350px">
			<form>
			<div class="dialog-content">
					<div class="dialog-content-indent">
						<h1>Переместить в папку <span style="color: #aaa;"></span></h1>
						<select name="new_path"></select>
						<input type="hidden" name="path" />
						<div id="s-move-dialog-files" style="display:none"></div>
					</div>
			</div>
			<div class="dialog-buttons">
					<div class="dialog-buttons-gradient">
							<input type="submit" class="button blue" value="Переместить">
							или <a href="#" class="inline-link cancel"><b><i>отмена</i></b></a> </div>
			</div>
			</form>
			<div class="clear"></div>
		</div>
</div>

<div class="dialog" id="s-delete-dialog">
		<div class="dialog-background"> </div>
		<div class="dialog-window" style="height: 110px; min-height: 110px; width: 350px; min-width: 350px">
			<form>
			<div class="dialog-content">
					<div class="dialog-content-indent">
					</div>
			</div>
			<div class="dialog-buttons">
					<div class="dialog-buttons-gradient">
							<input type="submit" class="button red" value="Удалить">
							или <a href="#" class="inline-link cancel"><b><i>отмена</i></b></a> </div>
			</div>
			</form>
			<div class="clear"></div>
		</div>
</div>

<script type="text/javascript">
	$("#s-files-tree").append($.wa.site.getTreeHTML(<?php echo json_encode($_smarty_tpl->tpl_vars['dirs']->value);?>
, "s-folderlist", '', <?php echo json_encode($_smarty_tpl->tpl_vars['sub_dirs_decoded']->value);?>
));

    $('#s-input-file').fileupload({
        add: function(e, data) {
			if (data.files[0]['size'] > <?php echo waRequest::getUploadMaxFilesize();?>
) {
				alert('<?php ob_start();?><?php echo waRequest::getUploadMaxFilesize();?>
<?php $_tmp1=ob_get_clean();?><?php echo sprintf('Слишком большой файл. Либо установите ограничение на размер загружаемых файлов в конфигурации PHP выше %s байтов, либо попробуйте загрузить файл меньшего размера.',$_tmp1);?>
')
            } else {
                data.submit();
            }
		},
        dataType: 'json',
        start: function (e, data) {
	        $("#s-upload-dialog div.loading").show();
	        $("#s-upload-dialog input[type=submit]").attr('disabled', 'disabled');
        },
        done: function (e, data) {
            if (data.result.status == 'fail') {
                alert(data.result.errors);
            }
            $.wa.site.filesList();
        },

        stop: function () {
            $("#s-upload-dialog").hide();
            $("#s-upload-dialog div.loading").hide();
            $("#s-upload-dialog input[type=submit]").removeAttr('disabled');
        }
    });

	$("#s-upload-link").click(function () {
    	$("#s-upload-dialog").waDialog({
            esc: false,
        	onLoad: function () {
        		if (!$.browser.msie) {
	       			$('#s-input-file').click();
        		}
    		}
    	});

		return false;
	});

	$("#s-files-grid input").live('click', function () {
		if ($(this).hasClass('all')) {
			if ($(this).is(':checked')) {
				$("#s-files-grid input").attr('checked', 'checked');
			} else {
				$("#s-files-grid input").removeAttr('checked');
			}
		} else {
			if (!$(this).is(':checked')) {
				$("#s-files-grid input.all").removeAttr('checked');
			} else if ($("#s-files-grid input:not(:checked)").length == 1) {
				$("#s-files-grid input.all").attr('checked', 'checked');
			}
		}
		var n = $("#s-files-grid input:checked").length - ($("#s-files-grid input.all").is(":checked") ? 1 : 0);
		$("#s-files-count").html(n);
	});

	$("#s-files-grid ul.dropdown.clickable > li > a").live('click', function (e) {
		if (!$(this).next().length) {
			var file = $(this).parents('tr').find('input[type=checkbox]').val();
			var menu = $.wa.site.getFileMenu(file);
			menu.insertAfter(this);
		} else {
			var menu = $(this).next();
			if (menu.is(":visible")) {
				return false;
			}
			menu.show();
		}
		$(document).one('click', function (e) {
			menu.hide();
		});
		return false;
	});

	$("#s-add-folder").click(function () {
		$("#s-add-folder-dialog").waDialog({
			onLoad: function () {
				$(this).find('span').html($.wa.site.filesPath(true));
                $('#s-folder-name').focus();
			},
			disableButtonsOnSubmit: true,
			onSubmit: function () {
				var folder = $("#s-folder-name").val();
				$.post('?module=files&action=addFolder', { path: $.wa.site.filesPath(), name: folder}, function (response) {
					if (response.status == 'ok') {
						$.wa.site.filesAction(true);
						$("#s-add-folder-dialog").hide();
					} else if (response.status == 'fail') {
						alert(response.errors);
						$("#s-add-folder-dialog input[type=submit]").removeAttr('disabled');
					}
				}, "json");
				return false;
			}
		});
		return false;
	});

	$("#s-folder-rename").click(function () {
		$("#s-rename-dialog").waDialog({
			disableButtonsOnSubmit: true,
			onLoad: function () {
				$("#s-name").val($("#s-files-tree li.selected a b").html()).focus().select();
				$(this).find('span').html($.wa.site.filesPath(true).replace(/[^\/]+\/$/, ''));
			},
			onSubmit: function () {
				var name = $("#s-name").val();
				$.post('?module=files&action=rename', { path: $.wa.site.filesPath(), name: name}, function (response) {
					if (response.status == 'ok') {
						$("#s-files-tree li.selected > a b").html(response.data.name);
						$("#s-files-tree li.selected > a").attr('href', response.data.hash);
						$.wa.setHash(response.data.hash);
						$("#s-rename-dialog").hide();
					} else if (response.status == 'fail') {
						alert(response.errors);
						$("#s-rename-dialog input[type=submit]").removeAttr('disabled');
					}
				}, "json");
				return false;
			}
		});
		return false;
	});

	$("#s-folder-move, #s-files-move").click(function () {
		var is_files = $(this).attr('id') == 's-files-move';
		$("#s-move-dialog select").html($.wa.site.filesPathOptions($("#s-files-tree > ul.s-folderlist"), '', is_files ? false : true));
		$("#s-move-dialog-files").empty();
		if (is_files) {
			var n = 0;
			$("#s-files-grid input:checked").each(function () {
				if (!$(this).hasClass('all')) {
					n++;
					$("#s-move-dialog-files").append('<input type="hidden" name="file[]" value="' + $(this).val() + '" />');
				}
			});
			if (!n) {
				return false;
			}
			$("#s-move-dialog h1 span").html('(' + n + ')');
		} else {
			$("#s-move-dialog h1 span").empty();
		}
		$("#s-move-dialog input[name=path]").val($.wa.site.filesPath());
		$("#s-move-dialog").waDialog({
			disableButtonsOnSubmit: true,
			onSubmit: function () {
				$.post('?module=files&action=move', $("#s-move-dialog form").serialize() , function (response) {
					if (response.status == 'ok') {
						$("#s-move-dialog").hide();
						if (is_files) {
							$.wa.site.filesList();
						} else {
							$.wa.site.filesAction(true, response.data.hash);
						}
					} else if (response.status == 'fail') {
						alert(response.errors);
						$("#s-move-dialog input[type=submit]").removeAttr('disabled');
					}
				}, "json");
				return false;
			}
		});
		return false;
	});

	$("#s-folder-delete").click(function () {
	    if ($.wa.site.filesPath()) {
            $("#s-delete-dialog").waDialog({
                content: '<h1>Удалить папку</h1><p>Папка будет удалена без возможности восстановления.</p>',
                disableButtonsOnSubmit: true,
                onSubmit: function () {
                    $.post('?module=files&action=delete', { path: $.wa.site.filesPath()}, function (response) {
                        if (response.status == 'ok') {
                            $("#s-delete-dialog").hide();
                            var li = $("#s-files-tree li.selected");
                            if (li.prev().length) {
                                var hash = li.prev().find('a').attr('href');
                            } else if (li.next().length) {
                                var hash = li.next().find('a').attr('href');
                            } else if (li.parents('li').length) {
                                var hash = li.parents('li').find('a').attr('href');
                                li.parents('li').children('i').remove();
                            } else {
                                var hash = '#/files/';
                            }
                            li.remove();
                            $.wa.setHash(hash);
                        } else if (response.status == 'fail') {
                            alert(response.errors);
                            $("#s-delete-dialog input[type=submit]").removeAttr('disabled');
                        }
                    }, "json");
                }
            });
        }
		return false;
	});

	$("#s-files-delete").click(function () {
		var files = [];
		$("#s-files-grid input:checked").each(function () {
			if (!$(this).hasClass('all')) {
				files.push($(this).val());
			}
		});
		if (!files.length) {
			return false;
		}
		$("#s-delete-dialog").waDialog({
			content: '<h1>Удалить файлы <span style="color: #aaa;">(' + files.length + ')</span></h1><p>Файлы будут удалены без возможности восстановления.</p>',
			disableButtonsOnSubmit: true,
			onSubmit: function () {
				$.post('?module=files&action=delete', { path: $.wa.site.filesPath(), "file[]": files}, function (response) {
					if (response.status == 'ok') {
						$("#s-delete-dialog").hide();
						$.wa.site.filesList();
					} else if (response.status == 'fail') {
						alert(response.errors);
						$("#s-delete-dialog input[type=submit]").removeAttr('disabled');
					}
				}, "json");
			}
		});
		return false;
	});
</script><?php }} ?>