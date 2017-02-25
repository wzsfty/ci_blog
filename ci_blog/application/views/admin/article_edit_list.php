<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>后台管理_修改文章</title>
        <link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/admin/edit_list/'?>css/style.css">
    </head>
    <body style="background-image: url(<?php echo base_url().'style/admin/edit_list/'?>img/bgpicture.jpg); background-size: 100% auto; ">
        <div class = "header">
            <p>欢迎来到管理后台</p>
            <div>
                <img class= "logout_picture" src="<?php echo base_url().'style/admin/edit_list/'?>img/logout.png" width="25px" height="25px">
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
        </div>
        <div class="main_list">
        <?php foreach($article as $v): ?>

        <form  action="<?php echo site_url('admin/article/edit/').$v['aid'];?>"  method="POST"  >
            <ul class="list">
                <li>
                    <div class="list_content">
                        <p class="title"><?php echo $v['title']?> </p>   
                        <p class="list_describe"><?php echo $v['a_describe']?></p>
                        <p class="list_classify"><?php echo $v['cname']?></p> 
 <p class="list_tag"><?php echo date('Y-m-d,h:i',$v['time']) ?> </p>
                        <button class="btn1" type="submit" name="modify" >编&nbsp辑</button><button class="btn2" type="submit" name="delete" >删&nbsp除</button>  
                    </div>          
                </li>
                <hr class="level" width="860" / >       
            </ul>    </form>
        <?php endforeach?>

        <?php echo $links;?>
        <!-- 分页 -->
        </div>

        <!-- <button class="save" type="submit">保存</button>  -->
               
</body>
</html>