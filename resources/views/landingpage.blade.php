<!DOCTYPE html>
<head>
    <title>FoodforAll</title>
    <!--link rel="stylesheet" href="{{asset('css/app.css')}}"-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
    @import url('https://fonts.googleapis.com/css?family=Raleway');
    @import url('https://fonts.googleapis.com/css?family=Oswald');

    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        width: 100%;
    }

    .intro {
        height: 100%;
        width: 100%;
        margin: auto;
        background: url({{ asset('assets/background.jpg') }});
        display: table;
        top: 0;
        background-size: cover;
    }

    .intro .inner {
        display: table-cell;
        vertical-align: middle;
        width: 100%;
        max-width: none;
    }
    .content {
        max-width: 500px;
        margin: 0 auto;
        text-align: center;
    }

    .login {
        font-family: 'Oswald', sans-serif;
        color: #ffd84d; /*to confirm*/
        font-size: 110%;
        padding: 20px 10px;
        text-decoration: none;
    }

    .login:hover {
        color: #fff;
    }

    .content h1 {
        font-family: 'Raleway', sans-serif;
        color: #F9F3F4; /*Change Color*/
        text-shadow: 0px 0px 300px #000; /*optional*/
        font-size: 500%;
    }

    .cta {
        border-radius: 9px;
        font-family: 'Oswald', sans-serif;
        background-color: #e6b400;
        color: #fff;
        font-size: 135%;
        padding: 10px 20px;
        border: solid #e6b400 3px;
        text-transform: uppercase;
        text-decoration: none;
    }

    .cta:hover {
        color: #fff;
        border: solid #fff 3px;
    }

    @media screen and (max-width: 768px) {
        .content h1 {
            font-size: 250%;
        }
        .cta {
            font-size: 110%;
            padding: 7px 15px;
        }
    }

</style>
</head>
<body>
<section class="intro">
    <div class="outer">
    <a class="login" href="#">Login</a>
    </div>

    <div class="inner">
        <div class="content">
        <h1>Food for All</h1>
        <a class="cta" href="{{asset('/isorg')}}">Get Started</a>
        </div>
    </div>
</section>
</body>
</html>