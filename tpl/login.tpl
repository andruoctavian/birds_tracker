{extends file=ROOT_DIR|cat:"/tpl/framework.tpl"}

{block name="stylesheets"}
    <link rel="stylesheet" type="text/css" href="/res/css/login.css">
{/block}

{block name="content"}
    <div class="container">
        <form class="form-signin" action="{$action}" method="post">
            <label for="input_username" class="sr-only">Username</label>
            <input
                    type="text" name="username" id="input_username"
                    class="form-control {if isset($error['username'])}error-input{/if}"
                    {if isset($username)}value="{$username}" {/if}
                    placeholder="Username"  required
            >
            <label for="input_password" class="sr-only">Password</label>
            <input type="password" name="password" id="input_password" class="form-control {if isset($error['password'])}error-input{/if}" placeholder="Password" required>
            {if not empty($error)}
                <ul>
                    {foreach from=$error item=err_body}
                        <li class="error-label">{$err_body}</li>
                    {/foreach}
                </ul>
            {/if}
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Login</button>
            {*<button class="btn btn-lg btn-default btn-block" id="register-switch">Register</button>*}
        </form>

    </div>
    {*<div class="container hidden">*}
        {*<form class="form-register">*}
            {*<div class="input-group">*}
                {*<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>*}
                {*<input type="text" name="username" class="form-control" placeholder="Username" required>*}
            {*</div>*}
            {*<div class="input-group">*}
                {*<span class="input-group-addon"><strong>@</strong></span>*}
                {*<input type="email" name="email" class="form-control" placeholder="Email" required>*}
            {*</div>*}
            {*<div class="input-group">*}
                {*<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>*}
                {*<input type="password" name="password" class="form-control" placeholder="Password" required>*}
            {*</div>*}
        {*</form>*}
    {*</div>*}
    <footer>
        <div class="pull-left"><strong>Programare Web 2017<br>Facultatea de Automatica si Calculatoare</strong></div>
        <div class="pull-right"><strong>&copy; Andru-Octavian Mocanu<strong></div>
    </footer>
{/block}

{block name="scripts"}
    <script type="application/javascript" src="/res/js/login.js"></script>
{/block}