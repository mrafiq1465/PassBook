<style type="text/css">
    .nav-container {
        padding: 15px 0 30px;
    }
    .top-bar {
        overflow: hidden;
        height: 75px;
        line-height: 83px;
        position: relative;
        background: white;
        margin-bottom: 0;
    }

    .top-bar ul {

        margin: 0;
        padding: 0;
        border: 0;
        overflow: hidden;
    }

    .top-bar-section ul {
        position: relative;
        top: 10px;
    }
    .top-bar .toggle-topbar a {
        color: #cfcfcf;
    }
    .top-bar-section ul li > a {

    }
    .top-bar .toggle-topbar.menu-icon a span {
    -webkit-box-shadow: 0 10px 0 1px #888888, 0 16px 0 1px #888888, 0 22px 0 1px #888888;
    -moz-box-shadow: 0 10px 0 1px #888888, 0 16px 0 1px #888888, 0 22px 0 1px #888888;
    -ms-box-shadow: 0 10px 0 1px #888888, 0 16px 0 1px #888888, 0 22px 0 1px #888888;
    box-shadow: 0 10px 0 1px #888888, 0 16px 0 1px #888888, 0 22px 0 1px #888888;
    }
    #logo {
        padding-left: 1.25em;
    }
    .top-bar .name {
        height: auto;
    }
    @media only screen and (max-width: 480px) {
        body {
            font-size: .75em;
        }
        #phone {
            display: none;
        }
        #main-container {
            min-height: 620px;
        }
        #main-footer {
            margin: 0 auto;
            width: 250px;
        }
        #main-footer .row {
            border: none;
        }
        #main-footer .text-right{
            text-align: left !important;
            margin-top: .75em;
        }
        #main-footer .right {
            float: none !important;
        }
        .user-profile form {
            width: 100%;
        }
        #pass-creation {
            width: auto;
        }

        #pass-creation ul#tab-nav {
            overflow: visible;
        }
        #pass-creation .tab-pane {
            clear: both;
        }
        #pass-creation ul#tab-nav li:first-child a::before {
            content: '';
        }
    }
    @media only screen and (min-width: 78.33333em) {
        .top-bar-section li a:not(.button) {
            line-height: inherit;
            height: auto;
            font-weight: normal;
            color: #181818;
        }
        .top-bar-section li a:not(.button):hover {
            background: #ffffff;
            color: #ed1c24;
        }
        .top-bar-section ul {
            line-height: inherit;
            font-size: 1em;
            top: 0;
        }
    }
</style>
<div class="row">
    <div class="nav-container">
        <nav class="top-bar">
            <ul class="title-area">
                <!-- Title Area -->
                <li class="name">
                    <a href="/" class=""><img id="logo" src="/img/logo.png"></a>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>

            <section class="top-bar-section">
                <!-- Left Nav Section -->
                <ul class="left">
                    <li><a href="/" class="">home</a></li>
                    <li><a href="/pass/create/coupon/" class="">coupon </a></li>
                    <li><a href="#" class="">loyalty cards</a></li>
                    <li><a href="/users" class="">my account</a></li>
                    <li><a href="/pricing" class="">pricing</a></li>
                </ul>
            </section>
        </nav>
    </div>
</div>
