<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8" />
        <title>Курс евро</title>
    </head>
    <body>
        <div id="answer"></div>
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.js "></script>
        <script>
            $(document).ready ( function (){
                getRate();
                window.setInterval(getRate, 10000);
            });

            function getRate() {	
                $.ajax({
                    url:"getRate.php",
                    success:function(data){
                        $("#answer").text(data);
                    }
                });
            }
        </script>
    </body>
</html>