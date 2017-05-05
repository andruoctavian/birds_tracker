{extends file=ROOT_DIR|cat:"/tpl/framework.tpl"}

{block name="stylesheets"}
    <link rel="stylesheet" type="text/css" href="/res/css/login.css">
{/block}

{block name="content"}
    <div class="container">
        <form class="form-signin" action="{$action}" method="post">
            <label for="input_username" class="sr-only">Email address</label>
            <input type="text" name="username" id="input_username" class="form-control" placeholder="Username" required autofocus>
            <label for="input_password" class="sr-only">Password</label>
            <input type="password" name="password" id="input_password" class="form-control" placeholder="Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Login</button>
        </form>
    </div>
    <footer>Ceva</footer>
{/block}
