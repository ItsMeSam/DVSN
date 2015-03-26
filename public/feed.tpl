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
            <li><a href="{{# SITE_URL #}}connected/profile/1">Profiles</a><li>
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
          {{. foreach($tpl->variables['feed'] as $value): .}}
            <h3> {{. echo htmlentities($value['title']); .}} </h3>

            <p>
              {{. echo htmlentities($value['contents']); .}}
            </p>

            <p> 
              By <strong> {{. echo $value['by']; .}} </strong> 
            </p>
            <hr>
          {{-end-}}
          <h5> Add your own feed </h5>
          <form action="{{# SITE_URL #}}connected/feed" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input id="feed_title" name="feed_title" type="text" class="validate">
                <label for="feed_title">Title</label>
              </div>
              <div class="input-field col s12">
                <textarea id="feed_contents" name="feed_contents" class="materialize-textarea"></textarea>
                <label for="feed_contents">Feed</label>
              </div>
              <input type="hidden" name="username" value="{{ username }}">
              <button type="submit"class="waves-effect waves-light btn">
                <i class="mdi-content-send right"></i>
                Place feed
              </button>
            </div>
          </form>
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