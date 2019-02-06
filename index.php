<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Flavio Riper">
        
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="dist/css/custom.css" rel="stylesheet">
    
        <title>Dashboard Unimed</title>
    </head>
    <body>
        <div class="mt-5 pt-5" align = "center">
            <div style = "width:300px; " align = "left">
                <div><img class="log1" src="dist/images/logo.png" style="padding: 20px 0px 0px 120px;"></div>
                <div style = "margin:30px">
                    <form action="resource/usuarioResource.php" method="post" id="login">
                        <label class="login">Usuário  :</label>
                        <input style="border-radius: 10px 10px 0px 10px !important; border: #6c757d solid 1px; width: 242px; padding: 5px 15px 5px 15px; font-size:13px;" type = "text" name = "username" class = "box"/ required><br /><br />
                        <label class="login">Senha :</label>
                        <input style="border-radius: 10px 10px 0px 10px !important; border: #6c757d solid 1px; width: 242px; padding: 2px 15px 2px 15px;" type = "password" name = "password" class = "box" / required><br/><br />
                        <input class="bt-sub" type = "submit" value = " Entrar "/><br />
                    </form>
                    <div id="error" style = "font-size:11px; color:#002856; margin-top:10px"></div>
                </div>
            </div>
        </div>
    </body>
    <?php include('footerTemplate.php'); ?>
    <script>
        $(document).ready(function(){
            var frm = $('#login');
            frm.submit(function(ev) {
                var object = $('#login').serializeArray();
                ev.preventDefault();
                $.ajax({
                    type: frm.attr('method'),
                    url: frm.attr('action'),
                    data: object,
                    success: function(data) {
                        console.log(data)
                        if (data == 'ERROR') {
                            $('#error').text("Your Login Name or Password is invalid");
                        } else {
                            window.location = "dashboard.php";
                        }
                    }
                })
                $(this).each (function(){
                    this.reset();
                });
            });
        })
    </script>