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
  		<nav>
  		  <div class="nav-wrapper">
  		    <a href="{{# SITE_URL #}}connected" class="brand-logo">DVSN</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
              <form action="{{# SITE_URL #}}connected/feed" id="logout_form" method="POST">
                <input type="hidden" name="logout">
                <a onclick="document.getElementById('logout_form').submit();">Logout</a>
              </form>
            </li>
          </ul>
  		  </div>
  		</nav>
      <div class="contents">
        <img class="materialboxed" width="250" height="250" src="{{# SITE_URL #}}filegrabber.php?file={{ imagepath }}"> 
        <br />
        <strong> Firstname: </strong> {{ firstname }} <br />
        <strong> Lastname: </strong> {{ lastname }} <br />
        <strong> Username: </strong> {{ username }} <br />

        </div>
        <footer class="page-footer page-footer-fixed">
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
    </body>
</html>