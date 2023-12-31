<?php
/* Smarty version 3.1.34-dev-7, created on 2023-10-25 04:05:33
  from 'D:\lesson\0.0\templates\pageBar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6538940d965ad1_43170301',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d63492177c3b82135cd6903b4653a16bd06b36e' => 
    array (
      0 => 'D:\\lesson\\0.0\\templates\\pageBar.html',
      1 => 1698204721,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6538940d965ad1_43170301 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="row" style="padding-top: 100px;">
    <div class="col-md-12">
      <div class="text-center">
        <nav>
          <ul class="pagination">
            <li class="page-link"><a id="goFirstPage" href="#re" onclick="changePage('first')">«</a></li>
            <li class="page-link"><a id="goPreviousPage" href="#re" onclick="changePage('pre')">‹</a></li>
            <li class="page-link"><a id="goNextPage" href="#re" onclick="changePage('next')">›</a></li>
            <li class="page-link"><a id="goLastPage" href="#re" onclick="changePage('last')">»</a></li>
          </ul>
        </nav>
      </div>
    </div>
</div>
<p id="showPageNum" class ="text-center">頁數: </p>
<?php echo '<script'; ?>
>
    let page_prod_count = 8;
    let page = document.getElementById("showPageNum");
    let pageNum = 1;
    let total = <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
;
    let totalPage = Math.ceil(total / page_prod_count);
    page.innerHTML = "頁數: " + pageNum + " / " + totalPage;
    applyPage();
    function changePage(opt){
        switch(opt){
            case "first":
                pageNum = 1;
                break;
            case "pre":
                if(pageNum > 1){
                    pageNum--;
                }
                break;
            case "next":
                if(pageNum < totalPage){
                    pageNum++;
                }
                break;
            case "last":
                pageNum = totalPage;
                break;
        }
        applyPage();
    }

    function applyPage(){
        let all_prod = document.getElementsByClassName('showProduct');
        for (let i = 0; i < all_prod.length; i++) {
            if (i >= (pageNum - 1) * page_prod_count && i < pageNum * page_prod_count){
                all_prod[i].style.display = "";
            }
            else{
                all_prod[i].style.display = "none";
            }
            
        }
        page.innerHTML = "頁數: " + pageNum + " / " + totalPage;
    }

<?php echo '</script'; ?>
><?php }
}
