<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-12 15:30:02
  from 'D:\lesson\select_lesson\templates\addclass.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6550ef7a670409_21029616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca7bf6c1b8c1285d36680af9b37e6f20c55acb33' => 
    array (
      0 => 'D:\\lesson\\select_lesson\\templates\\addclass.html',
      1 => 1699802996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:showaddclass.html' => 1,
  ),
),false)) {
function content_6550ef7a670409_21029616 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>加選</h2>
<br>
<form class="form-inline" action="" method="get" style="padding-left: 70px;">
    <input id="keep_pd" type="hidden" name="pdType" value="">
    <input type="text" style="margin-top: 5px; margin-bottom: 3px;" class="form-control" id="class_id" name="class_id" placeholder="請輸入課程代號">
    <button id="add_search" type="submit" style="width: 30px;height: 30px;">
        <img src="templates/web_image/search.png" width="20px">
<!--        <?php $_smarty_tpl->_subTemplateRender('file:showaddclass.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>-->
    </button>
</form>
<?php }
}
