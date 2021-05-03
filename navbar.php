<?php ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="home.php">queueAble</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="queue.php">My Queue</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" 
                    a href="<?php if(isset($_SESSION['user'])){echo "settings.php";} 
                    else{echo "signup.php";}?>"><?php if(isset($_SESSION['user'])){echo "Settings";} else{echo "Sign Up";}?></a>
          </li>
          <li class="nav-item">
                    <a class="nav-link" 
                    a href="<?php if(isset($_SESSION['user'])){echo "logout.php";} 
                    else{echo "login.php";}?>"><?php if(isset($_SESSION['user'])){echo "Log Out";} else{echo "Login";}?></a>
          </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>