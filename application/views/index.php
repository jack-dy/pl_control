<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>static/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?=base_url()?>static/css/style.css" rel='stylesheet' type='text/css' />

<!-- Graph CSS -->
<link href="<?=base_url()?>static/css/lines.css" rel='stylesheet' type='text/css' />
<link href="<?=base_url()?>static/css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="<?=base_url()?>static/js/jquery.min.js"></script>
<!----webfonts--->
<!-- <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'> -->
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="<?=base_url()?>static/css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url()?>static/js/metisMenu.min.js"></script>
<script src="<?=base_url()?>static/js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="<?=base_url()?>static/js/d3.v3.js"></script>
<script src="<?=base_url()?>static/js/rickshaw.js"></script>
<!-- layer -->
<script src="<?=base_url()?>static/js/layer/layer.js"></script>
<link href="<?=base_url()?>static/css/css.css?<?=time()?>" rel='stylesheet' type='text/css' />
</head>

<body>
<style>
.lists{ padding-top:20px;}
.file_list{

}
.file_list img{
    width:100%;

}
.file_list p{
    word-break: break-all;
}
.file_list a{
	display:block;
}

</style>
<div id="wrapper">
	<div id="page-wrapper">
        <div class="col-md-12 graphs">
        	<div class="xs">
            	<!-- <h3>上传文件</h3> -->
                <div class="well1 white">
                    <div class='lists row'>
                        <?php
                            foreach($file as $k=>$v){
                        ?>
                            <div class="col-xs-6  col-sm-3 col-md-2 col-lg-1 file_list">
                            <?php
                                $arr_type=array('png','jpeg','jpg','gif');
                                if(in_array(substr($v['file_url'],strripos($v['file_url'],'.')+1),$arr_type) ){
                                    ?>
                                    <img src="<?php echo base_url().'static/uploads/thumb/'.$v['file_url']?>">
                                    
                                    <?php
                                }else{
                                ?>
                                <img src="<?php echo base_url()?>static/uploads/thumb/file.png" >
                                <?php
                                }
                            ?>
                                <p class="text-center"><?=$v['file_name']?></p>
								<a class="text-center" href="<?=site_url('main/down')?>/<?=$v['file_url']?>" target="_blank">下载</a>
                            </div>
                        <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        	
		</div>
    </div>   
</div>
<script src="<?=base_url()?>static/js/bootstrap.min.js"></script>
<script>


</script>
</body>
</html>