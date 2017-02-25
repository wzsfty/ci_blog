<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>后台管理_个人信息</title>
        <link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/admin/index/'?>css/style.css">
    </head>
    <body style="background-image: url(<?php echo base_url().'style/admin/index/'  ?>img/bgpicture.jpg); background-size: 100% auto; ">
        <div class = "header">
            <p>欢迎来到管理后台</p>
            <div>
                <img class= "logout_picture" src="<?php echo base_url().'style/admin/index/'  ?>img/logout.png" width="25px" height="25px" a href="<?php echo site_url('admin/login/index') ?>">
                
            </div> 
        </div>
        <div class="menu_list">
            <ul>
                <li class="menu1">个人管理</li>
               <li onclick="location.href='<?php echo site_url('admin/admin/index') ?>'">个人信息</li>
                <li class="menu2">文章管理</li>
                <li onclick="location.href='<?php echo site_url('admin/article/add_article') ?> '">发表文章</li>
                <li onclick="location.href='<?php echo site_url('admin/article/edit_article') ?>'">修改文章</li>
                <li onclick="location.href='<?php echo site_url('admin/category/edit_category') ?>'">分类管理</li>
            </ul>
        </div>
        <form class="main_body"  action="<?php echo site_url('admin/admin/save_info')?> " method="POST" enctype="multipart/form-data">
            <div class="ad_name">
                <span>用&nbsp户&nbsp名&nbsp：</span>
                <input class="c_name" name="username" type="text" value="<?php echo $user_data[0]['username'] ?>">
            </div>
            <div class="ad_pwd">
                <span>密&nbsp&nbsp&nbsp&nbsp&nbsp码&nbsp&nbsp:&nbsp&nbsp</span>
                <input class="c_pwd" name="pwd" type="text">
            </div>
             <div class = "picture">
                <img class="header_picture" src="<?php echo base_url().$user_data[0]['head_image'] ?>" width='80px' height='100px'>
                <input type="file" name="head_image"  />
               <!--  <input type="file" name="thumb"/> -->
            </div>


            </div>
<!--             <div class="ad_describe">
                <span>个人简介：</span>
                <textarea class="c_describe" name="admin_describe" type="text"  ><?php echo $user_data[0]['admin_describe'] ?></textarea>         
            </div>
            <div class="ad_signature">
                <span>个性签名：</span>
                <textarea class="signature" name="signature" type="text" ><?php echo $user_data[0]['signature'] ?> </textarea>
            </div> -->
            <div class="ad_describe">
            <span style="position:absolute; top:217px; left:390px;font-size:19px;color:#cee9ee;">个人简介：</span>
            <textarea class="c_describe" name="admin_describe" type="text"> <?php echo $user_data[0]['admin_describe'] ?> </textarea>         
        </div>
        <div class="ad_signature">
            <span style="position:absolute; top:13px; left:-100px;font-size:19px;color:#cee9ee;">个性签名：</span>
            <textarea class="c_signature" name="signature" type="text"><?php echo $user_data[0]['signature'] ?> </textarea>
        </div>

         <button class="save" type="submit">保存</button> 
          </form>              
</body>
</html>