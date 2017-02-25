<!DOCTYPE html><!--
<html>
    <head>
        <meta charset="utf-8" />
        <title>发布文章</title>
        <link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/admin/add/'  ?>css/style.css">
<script type="text/javascript" src="<?php echo base_url() ?>org/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript">
        window.UEDITOR_HOME_URL = "<?php echo base_url() ?>org/ueditor/";
        window.onload = function(){
            window.UEDITOR_CONFIG.initialFrameWidth = 900;
            window.UEDITOR_CONFIG.initialFrameHeight = 600;
            UE.getEditor('content');
        }
    </script>
    <script type="text/javascript" src="<?php echo base_url() ?>org/ueditor/ueditor.config.js"></script>
   
    </head> -->


    <html>
    <head>
        <meta charset="utf-8" />
        <title>发布文章</title>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'style/admin/add/'  ?>src/jquery.tagsinput.js"></script>
        <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />
        <link rel = "stylesheet" type="text/css" href = "<?php echo base_url().'style/admin/add/'  ?>src/jquery.tagsinput.css" >
        <link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/admin/add/'  ?>css/style.css">
    </head>

    <script type="text/javascript">

        function onAddTag(tag) {
            alert("Added a tag: " + tag);
        }
        function onRemoveTag(tag) {
            alert("Removed a tag: " + tag);
        }

        function onChangeTag(input,tag) {
            alert("Changed a tag: " + tag);
        }

        $(function() {

            $('#tags').tagsInput(
                {
               
                    height:'32px',
                    autocomplete_url:'test/fake_json_endpoint.html' 
                });
            
         })



    </script>
    <body style="background-image: url(<?php echo base_url().'style/admin/add/'?>img/bgpicture.jpg); background-size: 100% auto; ">
        <div class="content">
            <div class = "header">
                <p>发表文章</p>
            </div>
            <form class="main_form" method="POST" action="<?php echo site_url('admin/article/add')?>">
                <div class="article_title">
                    <label class="title_label">文章标题</label>
                    <input class="title_text" name="a_title"  value="<?php  echo set_value('a_title');?>" type="text">
                    <?php echo form_error('a_title','<span>','</span>') ?>

                </div>

                <!--
                 <div class="article_tag">
                    <?php echo form_error('a_tag','<span>','</span>') ?>
                    <label class="tag_label">标签（关键字）</label>
                    <input class="tag_text" name="a_tag" type="text" value="<?php  echo set_value('a_tag');?>">
                 
                </div> -->

                <div class="article_tag">
                    <label class="tag_label">标签（关键字）</label>
                    <input name="a_tag" id="tags" value="<?php  echo set_value('a_tag');?>">
                </div>

                 <button class="btn" type="submit" name="submit">发表文章&nbsp<img src="<?php echo base_url().'style/admin/add/'  ?>img/letter.png" width="20px" height="20px" alt=""></button>
                <div class="article_describe">
                    <label class="describe_label">文章描述</label>
                    <input class="describe_text" name="a_describe" type="text" value="<?php  echo set_value('a_describe');?>">
                    <?php echo form_error('a_describe','<span>','</span>') ?>
                </div>
               <div class="article_classify">
                    <label class="classify_label">文章分类</label>
                    <td>
                        <select id="s1" name='cid' >
                        <?php  foreach ($category as $v):?>
                        <option  value=" <?php echo $v['cid']?>" <?php echo set_select('cid',$v['cid']) ?>><?php echo $v['cname'] ?></option>
                    <?php endforeach?>

                        </select>
                       
                    </td>
                   
                </div>
                <div class="article_content" id="content" >
                        <p class="content_label">文章内容</p>
                         <?php echo form_error('a_content','<span>','</span>') ?>
                        <textarea name="a_content" class="content_area" value="<?php  echo set_value('a_content');?>" >
                        </textarea>
                        
                </div>
               
               
            </form>
        </div>

</body>
</html>