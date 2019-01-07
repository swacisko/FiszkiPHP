<!Doctype>


<html>

<head>

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" >


</head>

<body>


    <div class="buttons are-large is-centered">
        <a class="button is-link" href="/">Home</a>
        <a class="button is-link" href="{{ url()->previous() }}">Back</a>
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>

</html>
