<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="<?=site_url('admin/Uploadfile/test1')?>" enctype="multipart/form-data">
        <input type="file" name="userfile" id="aa">
        <input type="submit" value="确定">
    </form>
</body>
</html>