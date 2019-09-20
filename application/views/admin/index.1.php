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
<link rel="stylesheet" href="<?=base_url('static')?>/css/webuploader.css">
<script src="<?=base_url('static')?>/js/webuploader.html5only.js"></script>
<body>
<div id="wrapper">
	<div id="page-wrapper">
        <div class="col-md-12 graphs">
        	<div class="xs">
            	<!-- <h3>上传文件</h3> -->
                <div class="well1 white">
                    <form class="form-horizontal form">
                        <div class="form-group">
						<div id="uploader" class="wu-example">
    <!--用来存放文件信息-->
    <div id="thelist" class="uploader-list"></div>
    <div class="btns">
        <div id="picker">选择文件</div>
        <button id="ctlBtn" class="btn btn-default">开始上传</button>
    </div>
</div>
                            <!-- <div class="col-sm-10 col-xs-8 ">
                                <div class="filePicker" onclick="addWebuploadCurrent('photo')">上传文件</div>
                                <input type="hidden" name="photo" id="photo" value="">

							</div> -->
							<div id="uploader-demo">
    <!--用来存放item-->
    <div id="fileList" class="uploader-list"></div>
    <div id="filePicker">选择图片</div>
</div>
                        </div>   
                    </form>
                    
                </div>
            </div>
        	
		</div>
    </div>   
</div>
<script src="<?=base_url()?>static/js/bootstrap.min.js"></script>
<script>




var uploader = WebUploader.create({

// swf文件路径
//swf: BASE_URL + '/js/Uploader.swf',

// 文件接收服务端。
server: 'http://webuploader.duapp.com/server/fileupload.php',

// 选择文件的按钮。可选。
// 内部根据当前运行是创建，可能是input元素，也可能是flash.
pick: '#picker',

// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
resize: false
});

uploader.on( 'fileQueued', function( file ) {
    $list.append( '<div id="' + file.id + '" class="item">' +
        '<h4 class="info">' + file.name + '</h4>' +
        '<p class="state">等待上传...</p>' +
    '</div>' );
});


// 文件上传过程中创建进度条实时显示。
uploader.on( 'uploadProgress', function( file, percentage ) {
    var $li = $( '#'+file.id ),
        $percent = $li.find('.progress .progress-bar');

    // 避免重复创建
    if ( !$percent.length ) {
        $percent = $('<div class="progress progress-striped active">' +
          '<div class="progress-bar" role="progressbar" style="width: 0%">' +
          '</div>' +
        '</div>').appendTo( $li ).find('.progress-bar');
    }

    $li.find('p.state').text('上传中');

    $percent.css( 'width', percentage * 100 + '%' );
});


	
// $p_id='';
// function addWebuploadCurrent(id) {
//         $(".webupload_current").removeClass("webupload_current");
//         $("#"+id).addClass("webupload_current");
//         $p_id=id;
//         console.log(id);
//     }
// var APP='<?=site_url('admin/Uploadfile/upload')?>';
//     uploader = WebUploader.create({
//         fileNumLimit:10,
//         duplicate :true,//可以上传重复的
//         auto: true,
//         //swf: BASE_URL + '/Uploader.swf',
//         server: APP,
//         pick: '.filePicker',
//         accept: {
//             title: 'Images',
//             extensions: 'gif,jpg,jpeg,bmp,png'
//         }
//     });
//     uploader.on('fileQueued', function (file) {
//         $(".webupload_current").before('<label><?=$language['uploading']?></label>');
//     });
//     uploader.on( 'uploadSuccess', function( file, data) {
//         $("#" + file.id).remove();
//         $(".webupload_current").prev().remove();
//         $(".webupload_current").val(data.name);
//         console.log(data);
//         $('.doctor_url').css("background-image","url(<?=base_url()?>static/uploads/"+data.name+")");
//     });
//     uploader.on('error', function (type) {
//         if (type === 'F_DUPLICATE') {

//         }else if(type == "Q_EXCEED_SIZE_LIMIT"){
//             alert( maxSize + '<?=$language['uploader2']?>');
//         }
//         else if (type === 'F_EXCEED_SIZE') {
//             alert( minSize + '<?=$language['uploader3']?>');
//         }
//     });






//     $(function(){
//         $('.up_btn').click(function(){
//             loading = layer.load(1, {
//   shade: [0.1,'#000'] //0.1透明度的白色背景
// });
//             $.ajax({
// 				url:"<?=site_url('doctor/user/edit_info')?>",
// 				data:$('.form').serialize(),
// 				dataType:"JSON",
// 				type:"POST",
// 				success: function(data){
//                     layer.close(loading);
//                     if(data.code=='1'){
//                         window.location.href="<?=site_url('doctor/user/index')?>";
//                     }else{
//                         layer.msg(data.msg)
//                     }
					
// 				},
// 				error:function(d){layer.close(loading); console.log(d);}
				
// 			});
//         })
//     })


</script>
</body>
</html>