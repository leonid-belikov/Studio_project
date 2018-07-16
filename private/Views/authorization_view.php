<section id="auth_section">
    <div class="container">
        <div class="row justify-content-end">
            <h1>authorization</h1>
        </div>
        <div class="row">
            <div class="col-2">
                <form id="auth_form">
                    <label for="auth_login">
                        Enter login
                    </label>
                    <input id="auth_login" name="auth_login" placeholder="login">

                    <label for="auth_pwd">
                        Enter password
                    </label>
                    <input type="password" id="auth_pwd" name="auth_pass" placeholder="password">

                    <input type="submit" value="Log in">
                </form>
            </div>
            <div class="col-10">
                <div id="result"></div>
                <div id="reg_link"><a href="/account/registration">Or register.</a></div>
            </div>
        </div>


    </div>
</section>