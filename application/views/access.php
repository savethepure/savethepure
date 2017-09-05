<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Access Code</title>
</head>
<body>
    <div style="width:300px;background:black;padding:50px;color:#fff;text-align:center;margin:20% auto;">
        <form method="post" action="<?php echo base_url() ?>access/in_access">
            <input type="text" name="code">
            <input type="submit" value="go">
        </form>
    </div>
</body>
</html>