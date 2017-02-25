<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>后台管理_分类管理</title>
        <link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/admin/edit_cate/'?>css/style.css">
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.4.2.min.js"></script>
    </head>
    <body style="background-image: url(<?php echo base_url().'style/admin/edit_cate/'?>img/bgpicture.jpg); background-size: 100% auto; ">
        <div class = "header">
            <p>欢迎来到管理后台</p>
            <div>
                <img class= "logout_picture" src="<?php echo base_url().'style/admin/edit_cate/'?>img/logout.png" width="25px" height="25px">
                <input name="log_out" class ="logout" type="button" value="Logout">
            </div> 
        </div>
          <div class="menu_list">
            <ul>
                <li class="menu1">个人管理</li>
                <li onclick="location.href='<?php echo site_url('admin/admin/index') ?>'"">个人信息</li>
                <li class="menu2">文章管理</li>
                <li onclick="location.href='<?php echo site_url('admin/article/add_article') ?> '">发表文章</li>
                <li onclick="location.href='<?php echo site_url('admin/article/edit_article') ?>'">修改文章</li>
                <li onclick="location.href='<?php echo site_url('admin/category/edit_category') ?>'">分类管理</li>
            </ul>
        </div>      <?php foreach($category as $v):  ?>
        <form  class="main_list" action="<?php echo site_url('admin/category/edit') ?> " method="post">
            <ul class="list">
   
                <li>
                    <div  class="readonly">
                        <input type="text" class="title" readonly name="cname" value="<?php echo $v['cname'];  ?>" />
                        <input type="button" class="btn1" value="编辑" onclick="edit(this)" />
                        <input type="hidden" name="cid" value="<?php echo $v['cid'];  ?>">
                         <button class="save" type="submit" name="modify">保存修改</button> 
                        <input class="btn2" name="delete" type="submit" value="删除">

                    </div>         
                </li>
                <hr class="level" width="860" / >
            </ul>
        </form>  <?php  endforeach?>
        <!-- <input class="add" type="button" onclick="add();" value="添加标签" />  -->
       
    <script type="text/javascript">
        function add(){
            var input1 = document.createElement('input');
            input1.style.width=450+"px";
            input1.style.height=30+"px";
            input1.style.borderRadius=5+"px";
            input1.style.paddingLeft=5+"px";
            var btn1 = document.getElementById("add_tag");
            btn1.insertBefore(input1,null);
        }
        function edit(btn) {
            var toEdit = btn.value == '编辑';
            $('.main_list')[toEdit ? 'removeClass' : 'addClass']('readonly').find(':input').attr('readonly', toEdit ? false : true);
            alert("请点击文本行，进行编辑。");
            if (!toEdit) {//保存的ajax代码
                //..
            }
        }
    </script>               
</body>
</html>