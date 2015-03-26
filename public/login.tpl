<!DOCTYPE html>
  <html>
    <head>
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{# SITE_URL #}}public/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="{{# SITE_URL #}}public/css/global.css"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    </head>
    <body>
  		<ul id="dropdown1" class="dropdown-content">
  		  <li><a href="{{# SITE_URL #}}getconnected/login">Login</a></li>
  		  <li><a href="{{# SITE_URL #}}getconnected/register">Register</a></li>
  		</ul>
  		<nav>
  		  <div class="nav-wrapper">
  		    <a href="#!" class="brand-logo">DVSN</a>
  		    <ul class="right hide-on-med-and-down">
  		      <!-- Dropdown Trigger -->
  		      <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Get connected<i class="mdi-navigation-arrow-drop-down right"></i></a></li>
  		    </ul>
  		  </div>
  		</nav>

        <form method="POST" action="{{# SITE_URL #}}getconnected/login">
            <div class="input-field col s6">
              <i class="mdi-action-account-circle prefix"></i>
              <input name="username" id="username" type="text" class="validate">
              <label for="username">Username</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-lock-outline prefix"></i>
              <input name="password" id="password" type="password" class="validate">
              <label for="password">Password</label>
            </div>
            <button class="btn waves-effect waves-light" type="submit">
              Login
              <i class="mdi-content-send right"></i>
            </button>
        </form>
  
        <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">DVSN</h5>
                <p class="grey-text text-lighten-4">Use the experience gained for education purposes only.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="{{# SITE_URL #}}getconnected/login">Login</a></li>
                  <li><a class="grey-text text-lighten-3" href="{{# SITE_URL #}}getconnected/register">Register</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2015 DVSN. Made with <i class="mdi-action-favorite"></i> by <a class="grey-text" href="https://github.com/itsmesam">Sam</a>. 
            Images by <a class="grey-text" href="https://unsplash.com/">Unsplash</a>
            <a class="grey-text text-lighten-4 right" href="https://github.com/itsmesam/">Follow me on GitHub</a>
            </div>
          </div>
        </footer>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="{{# SITE_URL #}}public/js/materialize.min.js"></script>
      <script type="text/javascript">
            var duration = {{ duration }};
            toast('{{ error }}', duration);
            $(".dropdown-button").dropdown();
      </script>
    </body>
</html>