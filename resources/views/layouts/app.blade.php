<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <Link rel="stylesheet" href="/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Almarai:wght@700;800&family=Amatic+SC:wght@400;700&family=El+Messiri:wght@400;500;600;700&family=Finlandica:ital,wght@0,400;0,600;0,700;1,500&family=Kufam:ital,wght@0,500;0,700;1,400;1,500;1,600;1,700;1,800&family=Nanum+Myeongjo:wght@400;700;800&family=Tajawal:wght@400;500;700;800&display=swap"
        rel="stylesheet">
    <title>{{ env('APP_NAME', 'Default Title') }}</title>
</head>

<body>
{{--            @yield("navigation")--}}
<!-- ================================ top header ============================== -->
<div class="top-header">
    <p>
        THE KPI INSTITUTE
    </p>
</div>

<div class="main-content-Navigation-container">
    <div class="main-content-Navigation">
        <div class="main-content-Navigation-img">
            <img src="./downloads/Icon1_19.png" alt="">
            <p>
                TKI RESEARCH LIBRARY
            </p>
        </div>

        <div class="main-content-Navigation-auth">
            <p>
                <a href="">Login</a>
            </p>
            <p>
                <a href="">Register</a>
            </p>
        </div>

    </div>
</div>
            @yield("content")
            @yield("footer")
</body>

</html>
