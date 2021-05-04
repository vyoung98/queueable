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
            <a class="nav-link" href="http://localhost:4200">Friend Request</a>
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

      <?php
                  $query = "SELECT * FROM settings WHERE username=:username";
                  $statement = $db->prepare($query);
                  $statement->bindParam(':username', $username);
                  $statement->execute();
                  $settings_info = $statement->fetchAll();
                  $theme = $statement->fetchAll();
                  $statement->closecursor();
                  foreach ($settings_info as $row) {
                    $theme = $row['theme'];

                    if ($theme == "light"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/light.css';";
                      echo "</script>";
                    }
                    if ($theme == "sky"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/sky.css';";
                      echo "</script>";
                    }
                    if ($theme == "purple"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/purple.css';";
                      echo "</script>";
                    }
                    if ($theme == "dark"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/dark.css';";
                      echo "</script>";
                    }
                  }
                ?>
    </div>
  </nav>