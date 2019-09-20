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

.left_nav{
    position:fixed;
    left:0;
    top:0;
    width: 250px;
    height:100vh;
    overflow-y: auto;
    background: #000;
    padding-top: 2em;
}
.left_nav_area{

}
.left_nav_ul{

}
.fileitem_list{

}
.fileitem_list a{
    display: block;
    padding: 10px;
    color:#fff;
    text-decoration: none;
}
.fileitem_list .sel_nav{
    color:#000;
}
@media(min-width:768px) {
    .page-wrapper{
        margin: 0 0 0 250px;
    }
    
}
@media(max-width:768px) {
    .left_nav{
        position: relative;
    width: 100%;
    height: auto;
    }
}

</style>
<div id="wrapper">

<nav class="left_nav">
        <div class="left_nav_area">
            <ul class="left_nav_ul">
                <li class="fileitem_list"><a  class="add_fileItem" href="javascript:;">添加文件夹</a></li>
                <li class='fileitem_list'  @click="selitem(i)" v-for="(item,i) in fileitem" :sid="i"><a  :class="{sel_nav:selfile==i  }" href="javascript:;">{{item.name}}</a></li>
                
            </ul>
        </div>
    </nav>




	<div id="page-wrapper" class="page-wrapper">
        <div class="col-md-12 graphs">
        	<div class="xs">
            	<!-- <h3>上传文件</h3> -->
                <div class="well1 white">
                    
                    <form class="form-horizontal form">
                        <input class="hiddenitem" type="hidden" name="" :value="hiddenitem">
                        <div class="form-group">
                            <div class="col-sm-10 col-xs-8 ">
                                <div class="filePicker" onclick="addWebuploadCurrent('photo')">上传文件</div>
                                <input type="hidden" name="photo" id="photo" value="">
                                <div>最大为10M,支持文件 （video、jpg、 png、 gif、 word、 excel、 txt、 pdf） </div>
							</div>
						</div>	  
                    <div class='lists row'>
                        <div  v-for="(item, i) in file" :key='i' >
                            
                            <div v-if="selfile==0" class="col-xs-6  col-sm-3 col-md-2 col-lg-1 file_list">
                                <img v-if="item.file_type.indexOf('image')!=-1" :src="baseurl+'static/uploads/thumb/'+item.file_url" />
                                <img v-if="item.file_type.indexOf('image')==-1" :src="baseurl+'static/uploads/thumb/file.png'" />
                                <!-- 'baseurl+'static/uploads/thumb/'+item.file_url' -->
                                <p class="text-center">{{item.file_name}}</p>
                            </div>

                            <div v-else-if="fileitem[selfile]['id']==item.file_path"  class="col-xs-6  col-sm-3 col-md-2 col-lg-1 file_list">
                                <img v-if="item.file_type.indexOf('image')!=-1" :src="baseurl+'static/uploads/thumb/'+item.file_url" />
                                <img v-if="item.file_type.indexOf('image')==-1" :src="baseurl+'static/uploads/thumb/file.png'" />
                                <!-- 'baseurl+'static/uploads/thumb/'+item.file_url' -->
                                <p class="text-center">{{item.file_name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	
		</div>
    </div>   
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="<?=base_url()?>static/js/bootstrap.min.js"></script>
<script>
    var wap = new Vue({
        el:'#wrapper',
        data:{
            baseurl:'<?=base_url()?>',
            selfile:0,
            fileitem:<?=json_encode($fileitem)?>,
            file:<?=json_encode($file)?>
        },
        computed:{
            hiddenitem:function(){
                return this.fileitem[this.selfile]['id']
            }
        },
        methods:{
            selitem:function(event=''){
                this.selfile=event;
            }
        }

    })
</script>

<script>

$p_id='';


function addWebuploadCurrent(id) {
        $(".webupload_current").removeClass("webupload_current");
        $("#"+id).addClass("webupload_current");
        $p_id=id;
        console.log(id);
    }
var APP='<?=site_url('admin/Uploadfile/upload/')?>';
    uploader = WebUploader.create({
        fileNumLimit:10,
        duplicate :true,//可以上传重复的
        auto: true,
        //swf: BASE_URL + '/Uploader.swf',
        server: APP,
        
        pick: '.filePicker',
         accept: {
             title:'Files',
             extensions: '*',//类型
             mimeTypes: '*'//mime类型
            //  extensions: 'gif,jpg,jpeg,bmp,png,pdf,doc,docx,txt,xls,xlsx,ppt,pptx,zip,mp3,mp4,text,csv',
            //  mimeTypes: 'image/*,text/*,video/*'
            //         //word
            //     +',application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            //         //excel
            //     +',application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            //         //ppt
            //     +',application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation'
            //     +',application/pdf'
            //     +',application/zip'
            //     +',application/csv'
         }
    });
    uploader.on('uploadBeforeSend', function (obj, data, headers) {
        //console.log($('.hiddenitem').val());
        //data.formData= { "fileitem": $('.hiddenitem').val()};
        data.fileitem=$('.hiddenitem').val();
    });
    uploader.on('fileQueued', function (file) {
        $(".webupload_current").before('<label>正在上傳，請稍等...</label>');
    });
    uploader.on( 'uploadSuccess', function( file, data) {
        $("#" + file.id).remove();
        $(".webupload_current").prev().remove();
        $(".webupload_current").val(data.name);
        console.log(data);
        if(data.status==1){
            wap.$data.file.push(data.file);
            //wap.$data.file.push(data.fileitem);
            // if(data.file_type.indexOf('image')>-1){
            //     $('.lists').append('<div class="col-xs-6  col-sm-3 col-md-2 col-lg-1 file_list">\
            //         <img src="<?=base_url()?>static/uploads/'+data.file.file_name+'">\
            //         <p class="text-center">'+data.file.client_name+'</p>\
            //     </div>');
            // }else{
            //     $('.lists').append('<div class="col-xs-6  col-sm-3 col-md-2 col-lg-1 file_list">\
            //         <img src="<?=base_url()?>static/uploads/file.png">\
            //         <p class="text-center">'+data.file.client_name+'</p>\
            //     </div>');
            // }
            
        }
        
    });
    uploader.on('error', function (type) {
        if (type === 'F_DUPLICATE') {

        }else if(type == "Q_EXCEED_SIZE_LIMIT"){
            alert( maxSize + '少于最少尺寸，換個大點的文件吧');
        }
        else if (type === 'F_EXCEED_SIZE') {
            alert( minSize + '大于最大尺寸，換個小點的文件吧');
        }
    });

    $(function(){
        $('.add_fileItem').click(function(){
            layer.prompt({title: '添加文件名', formType: 3}, function(text, index){
                loading = layer.load(1, {
                    shade: [0.1,'#000'] //0.1透明度的白色背景
                });
                $.ajax({
                    url:"<?=site_url('admin/home/addfileitem')?>",
                    data:{'filename':text},
                    dataType:"JSON",
                    type:"POST",
                    success: function(data){
                        layer.close(loading);
                        console.log(data);
                        if(data.code=='1'){
                            wap.$data.fileitem.push(data.fileitem);
                            
                        }else{
                            layer.msg(data.msg)
                        }
                        
                    },
                    error:function(d){layer.close(loading);}
                    
                });
            layer.close(index);

            });
        });

    })

	



</script>
</body>
</html>