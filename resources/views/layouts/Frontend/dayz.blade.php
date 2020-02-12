<!DOCTYPE html>
<html lang="en">
<head>
    @includeIf("layouts.Frontend.parts.header")
</head>
<body class="skin-default-dark fixed-layout">
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">DayZ</p>
    </div>
</div>
<div id="main-wrapper">

    <!-- header -->
@includeIf("layouts.Frontend.parts.HtmlHeader")
<!-- end header -->

    <!-- home -->
@includeIf("layouts.Frontend.parts.slideBar")
<!-- end home -->
    <!-- content -->
    <section class="content">
        <div id="app">
            <div class="page-wrapper">
                <div class="container-fluid">
                    @yield("content")
                </div>
            </div>
        </div>
    </section>
    <!-- end content -->
</div>
<!-- JS -->
@includeIf("layouts.Frontend.parts.scripts")
</body>
</html>
