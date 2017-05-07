{extends file=ROOT_DIR|cat:"/tpl/framework.tpl"}

{block name="stylesheets"}
    <link rel="stylesheet" type="text/css" href="/res/css/tracker.css">
{/block}

{block name="top-right-navbar"}
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown">{$username}&nbsp;<span class="caret"></span></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Messages</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-time"></i> History</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-wrench"></i> Settings</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/src/routes/logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                </ul>
            </li>
            <li>
                <img src="/res/img/profile.jpg" class="profile-thumbnail">
            </li>
        </ul>
        <form class="navbar-form navbar-right">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-addon" id="basic-addon2"><i class="glyphicon glyphicon-search"></i></span>
            </div>
        </form>
    </div>
{/block}

{block name="content"}
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-1 col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar hidden-xs">
                    <li><a href="#" data-toggle="news-feed" class="menu-link"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;&nbsp;News feed</a></li>
                    <li><a href="#" data-toggle="tracker" class="menu-link"><i class="glyphicon glyphicon-globe"></i>&nbsp;&nbsp;&nbsp;Tracker</a></li>
                    <li><a href="#" data-toggle="report" class="menu-link"><i class="glyphicon glyphicon-pushpin"></i>&nbsp;&nbsp;&nbsp;Report</a></li>
                    <li><a href="#" data-toggle="events" class="menu-link"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;&nbsp;&nbsp;Events</a></li>
                    <li><a href="#" data-toggle="gallery" class="menu-link"><i class="glyphicon glyphicon-camera"></i>&nbsp;&nbsp;&nbsp;Gallery</a></li>
                </ul>
            </div>
            <div class="col-xs-11 col-xs-offset-1 col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div class="container-fluid tab" id="content">
                    {include file=ROOT_DIR|cat:"/tpl/news-feed.tpl"}
                </div>
                <footer>ceva</footer>
            </div>
        </div>
    </div>
{/block}

{block name="scripts"}
    <script type="application/javascript" src="/res/js/sidebar.js"></script>
{/block}
