<?php
/**
 * WEB SCRAPING AND PARSING TASK
 * Created by Raffaele Longo Elia
 * Date: 24/08/2017
 * Time: 13:41
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Web scraping and parsing task</title>
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <style>
            body{
                font-family: "Trebuchet MS", sans-serif;
                margin: 50px;
                background-color: #f2f2f2;
            }

            input[type=text] {
                width: 85%;
                padding: 14px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit] {
                width: 10%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 10px;
                margin: 0 auto;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            div {
                width: 80%;
                border-radius: 5px;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>Web scraping and parsing</h1>
            <p>Insert an URL in the textbox below to get statistics about the web page</p><br>
            <div>
                <form id="url_form" name="url_form" action="parser.php">
                    <input type="text" name="url" placeholder="Insert your URL...">

                    <input type="submit" value="Start">
                </form>
            </div>
            <div id="response" style="overflow: auto;text-align: left">
            </div>
        </center>
    </body>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#url_form").submit(function(e){
                $.ajax({
                    data: $(this).serialize(),
                    type: 'get',
                    url: $(this).attr('action'),
                    success: function(response) {
                        $('#response').html(response);
                    }
                });
                return false; // cancel original event to prevent form submitting
            });
        });
    </script>
</html>