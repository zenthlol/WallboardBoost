<!DOCTYPE html>
<html lang="en">
@include('template.partials.head')

<body>
    {{-- navbar --}}
    @include('template.partials.navbar2')

    @yield('body')

    {{-- footer --}}
    @include('template.partials.footer')

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>
</html>
