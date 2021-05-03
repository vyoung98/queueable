<!DOCTYPE html>
<html lang="en">
<?php 
  require('connect-db.php');
  session_start();?>
    <head>
        <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
        <link rel="manifest" href="icon/site.webmanifest">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="./themes/purple.css">
        <link rel="stylesheet" href="./styles/style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <meta name="author" content="Vivian Tran vt5en & Valerie Young vy5br">
        <meta name="description" content="POTD 1">  
        <title>queueAble: Finding Time for What's Important</title>  
        <style type="text/css">
            h1	{font-family: 'Rubik', Arial;
                }
            h2   {font-family: 'Rubik', 'Arial';
                  font-size: 25px;
                }
            p   {font-family: 'Rubik', 'Arial';
                }
        </style>
       
    </head>

<?php
    //checks that the user is logged in
    if (isset($_SESSION['user'])){
        //checks that there is a donor selected to edit
        if (!isset($_SESSION['id']))
        {
            echo "<script>
                alert('Nothing to edit, returning to queues');
                window.location.href='queue.php';
                </script>";
        }
        $show_title = $_SESSION['id'];
        $username = $_SESSION['user'];

        $query = "SELECT * FROM shows WHERE show_title = :show_title AND username = :username";
        $statement = $db->prepare($query);
        $statement->bindParam(':show_title', $show_title);
        $statement->bindParam(':username', $username);
        $statement->execute();
            
        // fetchAll() returns an array for all of the rows in the result set
        $show_info = $statement->fetchAll();
        // closes the cursor and frees the connection to the server so other SQL statements may be issued
        $statement->closecursor();
        $show_season = $show_info[0]['season'];
        $show_episode = $show_info[0]['episode'];

        //checks for post
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (!empty($_POST['action']) && ($_POST['action'] == 'Cancel'))
            {
                unset($_SESSION['id']);
                header("Location: queue.php");
            }
            else
            {
                $show_title = $_SESSION['id'];
                $show_episode = $_POST['episode'];
                $show_season = $_POST['season'];
                $username = $_SESSION['user'];

                $query = "UPDATE shows SET season=:show_season, episode=:show_episode
                    WHERE username=:username AND show_title=:show_title";
                $statement = $db->prepare($query);
                $statement->bindValue(':show_title', $show_title);
                $statement->bindValue(':username', $username); 
                $statement->bindValue(':show_season', $show_season);                
                $statement->bindValue(':show_episode', $show_episode);
                $statement->execute();
                $statement->closeCursor();
                unset($_SESSION['id']);
                echo "<script>
                alert('Show updated');
                window.location.href='queue.php';
                </script>";
            }
        }
?>

<div class="container" style="text-align: center;">
      
        <h4>
        Editing Show <?php if(isset($_SESSION['id'])){echo $_SESSION['id'];}?>
        </h4>
        <!-- a form -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="editForm" method="post">

            <div class="form-row">
                    <div class = "col">
                        <label for="shelter_name">Season</label>
                        <input type="text" class="form-control" id="season" name="season" placeholder="Enter the season" required
                        value="<?php echo $show_season;?>">
                    </div>
                    <div class = "col">
                        <label for="donation_amt">Episode</label>
                        <input type="number" class="form-control" id="episode" name="episode" placeholder="Enter the episode" min="1" required
                        value="<?php echo $show_episode;?>">
                    </div>
            </div>

            <div class="row">
                <div class="form-group col-md">
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </br>
                <div class="form-group col-md">
                <input type="submit" value="Cancel" name="action" class="btn btn-secondary" />
                </div>
            </div>
          
        </form>
          
  
</div>

<?php
    }
    else
    {
        echo "<script>
                alert('Please log in.');
                window.location.href='login.php';
                </script>";
    }
?>