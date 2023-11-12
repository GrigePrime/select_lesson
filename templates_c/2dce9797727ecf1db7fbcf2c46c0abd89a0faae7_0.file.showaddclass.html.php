<?php
/* Smarty version 3.1.34-dev-7, created on 2023-11-12 16:06:25
  from 'D:\lesson\select_lesson\templates\showaddclass.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6550f801046423_04106899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2dce9797727ecf1db7fbcf2c46c0abd89a0faae7' => 
    array (
      0 => 'D:\\lesson\\select_lesson\\templates\\showaddclass.html',
      1 => 1699803926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6550f801046423_04106899 (Smarty_Internal_Template $_smarty_tpl) {
?><table class="table">
    <thead>
    <tr>
        <th>課程代號</th>
        <th>課程名稱</th>
        <th>教授</th>
        <th>學分</th>
        <th>必選修</th>
        <th>開課班級</th>
        <th>上課時間</th>
        <th>上課地點</th>
        <th>人數</th>
    </tr>
    </thead>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_class']->value, 'class');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['class']->value) {
?>
    <tbody>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_name'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_teacher'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_credit'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_RE'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_garde'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_time'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_room'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['class']->value['course_people'];?>
</td>
    </tr>
    </tbody>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
