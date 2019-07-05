
<div class="default_color section scrollspy" >
    <div class="container"   >
<div id="login-page" class="row" style="width: 45%;margin: auto">
    <div class="col s12 z-depth-4 card-panel" >
        <form class="login-form"  action='index.php?action=login' method="post">
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="vue/images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">Material Design Admin Template </p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input id="username" type="text" name ="username">
                    <label for="username" class="center-align">Username</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password" type="password" name = "password">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12  login-text">
                    <input type="checkbox" id="remember-me" />
                    <label for="remember-me">Remember me</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class='waves-effect waves-light light-blue btn right' type='submit' name='submit'>
                        Login
                    </button>

                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="index.php?action=enregistrer">S'enregistrer!</a>'
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
                </div>
            </div>

        </form>
    </div>
</div>
</div>
</div>
