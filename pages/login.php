<h1 class="login_header">ACTUATE</h1>

<p class="lead text--center">Please log in.</p>

<div class="module login">    
    <form class="login__form" id="login-form">
        <fieldset class="coloured colours-head">
        <ul class="form-fields">
            <li class="fields">
                <label class="label" for="username">username</label>
                <input tabindex="1" name="username" id="username" type="text" value="" placeholder="Username" autocorrect="off" autocapitalize="off"/>
            </li><!--
         --><li class="fields">
                <label class="label" for="password">password</label>
                <input tabindex="2" name="password" id="password" type="password" value="" placeholder="Password" autocorrect="off" autocapitalize="off"/>
            </li>
            </li><!--
         --><li class="text--center">
                <input type="submit" tabindex="3" class="btn btn--full login__submit" href="#" id="login-submit" value="Login" />
            </li>            
        </ul>
        </fieldset>
    </form><!-- .login__form -->
</div><!-- .login-form -->

<script type="text/javascript">
    $(document).on('ready',function()
    {
        $('.login').loginForm(); // plugin /actuate/loginForm.js
        
        $(".user-id").hide();
        // $('.footer').hide();
    });
</script>