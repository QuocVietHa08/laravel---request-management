<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request Man</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div >
        @include('inc.navbar')
        @include('inc.message')
       <div class="p-5">
            @yield('content')
       </div> 
    </div>    
</body>
</html>
