<?php /* Smarty version Smarty-3.1.14, created on 2024-05-04 20:17:16
         compiled from "C:\OSPanel\domains\tovarka\wa-apps\installer\lib\handlers\templates\webasyst.backend_header.top_header.announcement.html" */ ?>
<?php /*%%SmartyHeaderCode:202648643466366d9c699510-89444259%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7bcac0cc1d870b23982c7e1b5151d2428492a14' => 
    array (
      0 => 'C:\\OSPanel\\domains\\tovarka\\wa-apps\\installer\\lib\\handlers\\templates\\webasyst.backend_header.top_header.announcement.html',
      1 => 1620131879,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202648643466366d9c699510-89444259',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'announcements' => 0,
    '_key' => 0,
    '_a' => 0,
    'current_app_id' => 0,
    'wa_backend_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_66366d9c788100_54013795',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_66366d9c788100_54013795')) {function content_66366d9c788100_54013795($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['announcements']->value){?>
    <div class="js-wa-announcement-wrap">
        <style>
            .wa-announcement {
                position: relative; padding: 0;
                background-image: initial; background-color: #4e4d12; box-shadow: rgba(13, 13, 13, 0.13) 0px 1px 3px -1px;
                background: #ffd; font-size: 0.9em;
                border-bottom: 1px solid silver;
            }
            .wa-announcement a.wa-announcement-close {
                float: right; display: inline-block;
                margin-right: 12px; margin-top: 7px; margin-left: 13px;
                font-size: 1.6em; color: #c2bf94; text-decoration-color: initial; text-decoration: none;
            }
            .wa-announcement .wa-announcement-content { padding: .75rem 2.5rem .75rem 5%; }
        </style>

        <?php  $_smarty_tpl->tpl_vars['_a'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['_a']->_loop = false;
 $_smarty_tpl->tpl_vars['_key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['announcements']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['_a']->key => $_smarty_tpl->tpl_vars['_a']->value){
$_smarty_tpl->tpl_vars['_a']->_loop = true;
 $_smarty_tpl->tpl_vars['_key']->value = $_smarty_tpl->tpl_vars['_a']->key;
?>
            <div class="wa-announcement js-wa-announcement" data-key="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
">

                
                <?php if (!$_smarty_tpl->tpl_vars['_a']->value['always_open']){?>
                    <a title="закрыть" class="wa-announcement-close js-announcement-close" href="javascript:void(0);" rel="installer" data-key="<?php echo $_smarty_tpl->tpl_vars['_key']->value;?>
">×</a>
                <?php }?>

                <?php echo $_smarty_tpl->tpl_vars['_a']->value['html'];?>

            </div>
        <?php } ?>
    </div>
<?php }?>

<script>
    $(function() {
        <?php if ($_smarty_tpl->tpl_vars['announcements']->value){?>
        var $wrapper = $('.js-wa-announcement-wrap');

        $wrapper.off('click', '.js-announcement-close').on('click', '.js-announcement-close', function (e) {
            e.preventDefault();
            $wrapper.trigger('close-banner', [ $(this).data('key') ]);
        });

        $wrapper.off('close-banner').on('close-banner', function (e, key) {
            e.preventDefault();

            var $banner = $wrapper.find('.js-wa-announcement[data-key="' + key + '"]'),
                data = { key: key, app_id: <?php echo json_encode($_smarty_tpl->tpl_vars['current_app_id']->value);?>
 };
            $.post('<?php echo $_smarty_tpl->tpl_vars['wa_backend_url']->value;?>
installer/?module=announcement&action=hide', data, function(response) {
                if (response === 'ok') {
                    $banner.remove();
                }
            });
        });

        <?php }?>
    });
</script>
<?php }} ?>