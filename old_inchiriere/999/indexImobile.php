<?php session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
        <title>_</title>
        <style>
            body {
                font-size: 11px;
                font-family: verdana;
            }
            .mda {
                background-color:#FF8D7B;
            }
        </style>
    </head>
    <body>
        <script>
            function get999() {
                jQuery.ajax({
                    type: "GET",
                    url: "getLastImobile.php",
                    success: function(return_data){
                        var json_data = JSON.parse(return_data);
                        jQuery.each(json_data, function(i, val) {
                            $('#container').prepend('<a href="http://999.md'+val.url+'" target="_blank">'+val.title+'</a><hr />');
                        });
                        if(return_data.length > 2) {
                            oldTitle = document.title;
                            var msg = "New!";
                            try{
                                clearInterval(timeoutId);
                            } catch(e) {

                            }
                            timeoutId = setInterval(function() {
                                document.title = document.title == msg ? ' ' : msg;
                            }, 1000);
                            window.onmousemove = function() {
                                clearInterval(timeoutId);
                                document.title = '_';
                                $('.mda').removeClass('mda');
                                window.onmousemove = null;
                            };
                        }
                    }
                });
                setTimeout('get999()', 5000);
           }
           setTimeout('get999()', 5000);
        </script>
        <div id="container"></div>
    </body>
</html>