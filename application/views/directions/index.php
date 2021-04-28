<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Directions API</title>
    <link rel="stylesheet" href="/user_guide/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // we are getting all of the directions so that when the user first requests the page the page 
            // will already be rendering the directions
            $.get('/partials/index', function(res) {
            // this url returns html string so we can dump that straight into div#directions
            $('#directions').html(res);
            });
            $('form').submit(function(){
            // there are three arguments that we are passing into $.post function
            //     1. the url we want to go to: '/directions/direction'
            //     2. what we want to send to this url: $(this).serialize()
            //            $(this) is the form and by calling .serialize() function on the form it will 
            //            send post data to the url with the names in the inputs as keys
            //     3. the function we want to run when we get a response:
            //            function(res) { $('#directions').html(res) }
            $.post($(this).attr('action'), $(this).serialize(), function(res) {
                $('#directions').html(res);
            });
            // We have to return false for it to be a single page application. Without it,
            // jQuery's submit function will refresh the page, which defeats the point of AJAX.
            // The form below still contains 'action' and 'method' attributes, but they are ignored.
            return false;
            });
        });
    </script>
</head>
<body>
<div class="container">
    <h3>Type your desired destination</h3>
    <form action="/directions/direction" method="POST">
        <label for="from_location">From: </label>
        <input type="text" name="from_location" id="from_location" placeholder="Type your current location here...">

        <label for="to_location">To: </label>
        <input type="text" name="to_location" id="to_location" placeholder="Type your destination here...">

        <input type="submit" value="Get Directions!">
    </form>

    <div id="directions"></div>

</body>
</html>