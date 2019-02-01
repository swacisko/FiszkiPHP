<!Doctype>


<html>

<head>

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css" >


</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        {{--<div class="navbar-brand">--}}
            {{--<a class="navbar-item" href="https://bulma.io">--}}
                {{--<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">--}}
            {{--</a>--}}

            {{--<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">--}}
                {{--<span aria-hidden="true"></span>--}}
                {{--<span aria-hidden="true"></span>--}}
                {{--<span aria-hidden="true"></span>--}}
            {{--</a>--}}
        {{--</div>--}}

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/">
                    Home
                </a>

                <a class="navbar-item" href="/learning" >
                    Learning
                </a>

                <a class="navbar-item" href="/management" >
                    Management
                </a>

                <a class="navbar-item" href="{{ url()->previous() }}" >
                    Back
                </a>

                {{--<div class="navbar-item has-dropdown is-hoverable">--}}
                    {{--<a class="navbar-link">--}}
                        {{--More--}}
                    {{--</a>--}}

                    {{--<div class="navbar-dropdown">--}}
                        {{--<a class="navbar-item">--}}
                            {{--About--}}
                        {{--</a>--}}
                        {{--<a class="navbar-item">--}}
                            {{--Jobs--}}
                        {{--</a>--}}
                        {{--<a class="navbar-item">--}}
                            {{--Contact--}}
                        {{--</a>--}}
                        {{--<hr class="navbar-divider">--}}
                        {{--<a class="navbar-item">--}}
                            {{--Report an issue--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button is-primary" href="/home">
                            <strong>Sign up or Log in</strong>
                        </a>
                        {{--<a class="button is-light">--}}
                            {{--Log in--}}
                        {{--</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </nav>



    <div class="container">
        @yield('content')
    </div>

</body>

</html>
