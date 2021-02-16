<html>
    <head>

 	<meta name="robots" content="noindex, nofollow"/>
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script type="text/javascript">
            function delayer(){
                window.location = "https://www.amazon.com/dp/{{ $key }}?tag=bkto-20"
            }
        </script>
    </head>
    <body onLoad="setTimeout('delayer()', 500)">
        <div style="text-align: center; margin-top: 250px;"><h1>S H U F F L E L O O T</h1></div>
        <hr style="width: 20%">
        <div style="text-align: center; color: #888;">Forwarding to retailer website...</div>
        <div style="margin-top: 20px; text-align: center;"><img src="{{  asset('images/ajax-loader.gif') }}"></div>
    </body>
</html>
