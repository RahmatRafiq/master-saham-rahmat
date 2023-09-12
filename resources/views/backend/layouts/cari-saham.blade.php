<!DOCTYPE html>
<html lang="en">

<!-- HEAD -->
@include('backend.includes.head')
@vite(['resources/js/app.js'])
<!--HEAD-->

<body>
    <!-- SIDEBAR -->
    @include('backend.includes.sidebar')
    <!-- SIDEBAR -->

    <!-- CONTENT -->

    @include('backend.includes.content.cari-saham')
    <!-- CONTENT -->

    <!-- JS -->
    @include('backend.includes.js')
    </!-- JS ->
</body>

</html>
