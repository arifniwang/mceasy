<!doctype html>
<html lang="en">

<head>
    @include('template.head')

    @stack('top')

    <title>McEasy - @yield('title')</title>
</head>

<body>
    @include('template.menu')

    <main id="app">
        @yield('content')
    </main>

    @include('template.script')

    @stack('bottom')
</body>

</html>
