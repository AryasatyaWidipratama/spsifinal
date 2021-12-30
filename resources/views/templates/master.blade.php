<!doctype html>
<html lang="en">

@include('templates.partials.head')

<body>
    <div class="wrapper">

        @include('templates.partials.sidebar')

        <div class="main-panel">

            @include('templates.partials.top_nav')

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            @include('templates.partials.footer')

        </div>
    </div>

</body>

@include('templates.partials.scripts')

</html>