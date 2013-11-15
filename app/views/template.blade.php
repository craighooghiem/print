<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    {{HTML::style('css/custom.css')}}
    {{HTML::style('css/uploadify.css')}}

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    {{HTML::script('js/jquery.uploadify.js')}}
</head>

<body>
    <div style="width: 620px;">
        <h1>Print Project</h1>

        @yield('content')

    </div>
</body>

</html>