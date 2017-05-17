<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Birds Tracker</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="/res/img/favicon.png">

    <!-- bootstrap -->
    <link rel="stylesheet" type="text/css" href="/vendor/components/bootstrap/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" type="text/css" href="/ext/google-fonts/google-fonts.css">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="/res/css/mainStyle.css">
    {block name="stylesheets"}{/block}

    <!-- jQuery -->
    <script type="application/javascript" src="/vendor/components/jquery/jquery.min.js"></script>
</head>

<body>
<nav class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="/res/img/logo.png" class="logo navbar-left" alt="logo">
            <span class="logo-title navbar-left">
                    Birds Tracker
                </span>
        </div>
        {block name="top-right-navbar"}{/block}
    </div>
</nav>
{block name="content"}{/block}

<div id="popup"></div>

<!-- bootstrap -->
<script type="application/javascript" src="/vendor/components/bootstrap/js/bootstrap.min.js"></script>
<!-- Google API Service -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGU_2xmTU8FVCthyScIOTGrSQ4ND9tFqk" type="text/javascript"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<!-- js -->
{block name="scripts"}{/block}

</body>

</html>
