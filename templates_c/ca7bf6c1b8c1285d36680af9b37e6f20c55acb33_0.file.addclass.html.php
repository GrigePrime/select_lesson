<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-12 18:15:54
  from 'D:\lesson\select_lesson\templates\addclass.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6551165acd7d38_58627448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca7bf6c1b8c1285d36680af9b37e6f20c55acb33' => 
    array (
      0 => 'D:\\lesson\\select_lesson\\templates\\addclass.html',
      1 => 1699812951,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6551165acd7d38_58627448 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>加選</h2>
<br>
<form action="Addclass.php" class="form-inline" method="get" style="padding-left: 70px;">
    <input class="form-control" id="class_id" name="class_id" placeholder="請輸入課程代號" style="margin-top: 5px; margin-bottom: 3px;"
           type="text">
    <button id="add_search"  style="width: 30px;height: 30px;" type="submit">
        <img src="templates/web_image/search.png" alt="search" width="20px">
    </button>
    <?php if (isset($_smarty_tpl->tpl_vars['msg']->value)) {?>
    <br>
    <b class="text-danger">●<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</b>
    <?php }?>
</form>
<?php }
}
