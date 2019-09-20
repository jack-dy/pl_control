<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url()?>static/css/css.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <section class="wap_app">
        <div class="login_area">
            <h3>登陆管理</h3>
            
            <form class="login_form">
                <div class="login_box">

                    <div class="input-group">
                        <label>密码：</label>
                        <input type="password"  class="pass" id="pass" name="pass">
                    </div>
                    <div class="input-group">
                        <button type="submit">登录</button>
                    </div>
                </div>
            </form>

            
        </div>
    </section>





    <script>

 $(function(){
	$('.login_form').validate({
		debug:false,
		onkeyup:null,
		rules:{
			pass:{required:true}
		},
		messages:{

			pass:{required:"填写密码"}
			
		},
		submitHandler:function(form){  //表单提交后要执行的内容
			loading = layer.load(1, {
			  shade: [0.2,'#000'] //0.1透明度的白色背景
			});
			$.ajax({
				url:"<?=site_url('admin/login/login')?>",
				data:$('.login_form').serialize(),
				dataType:"JSON",
				type:"POST",
				success: function(data){
					console.log(data);
					layer.close(loading);
					if(data.code =='1'){
						
						window.location.href="<?=site_url('admin/home/index')?>";
					}else{
						layer.msg("失败");
					}
				},
				error:function(d){layer.close(loading); console.log(d);}
				
			});
		}
	})
})
</script>
    <script src="<?=base_url()?>static/js/jquery.validate.min.js"></script>
    <script src="<?=base_url()?>static/js/layer/layer.js"></script>
</body>
</html>