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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./themes/purple.css">
        <link rel="stylesheet" id="switcher-id" href="">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <meta name="author" content="Vivian Tran vt5en & Valerie Young vy5br">
        <meta name="description" content="Assignment 1">  
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
    <body>
      <?php include('header.html')?>

          <div class="container">
            <div class="row">
              <div class="col-sm">


                <h1>My Calendar</h1>

                <div class="month">      
                  <ul>
                    <li class="prev">&#10094;</li>
                    <li class="next">&#10095;</li>
                    <li>
                      March<br>
                      <span style="font-size:18px">2021</span>
                    </li>
                  </ul>
                </div>
        
                <ul class="weekdays">
                  <li>Mo</li>
                  <li>Tu</li>
                  <li>We</li>
                  <li>Th</li>
                  <li>Fr</li>
                  <li>Sa</li>
                  <li>Su</li>
                </ul>
        
                <ul class="days">  
                  <li>1</li>
                  <li>2</li>
                  <li>3</li>
                  <li>4</li>
                  <li>5</li>
                  <li>6</li>
                  <li>7</li>
                  <li>8</li>
                  <li>9</li>
                  <li>10</li>
                  <li>11</li>
                  <li>12</li>
                  <li>13</li>
                  <li>14</li>
                  <li>15</li>
                  <li>16</li>
                  <li>17</li>
                  <li>18</li>
                  <li><span class="active">19</span></li>
                  <li>20</li>
                  <li>21</li>
                  <li>22</li>
                  <li>23</li>
                  <li>24</li>
                  <li>25</li>
                  <li>26</li>
                  <li>27</li>
                  <li>28</li>
                  <li>29</li>
                  <li>30</li>
                  <li>31</li>
                </ul>
        
              </div>
              
              <div class="col-sm">
                <div class="form-group">
                    <h2>View</h2>
                    <div class="centered-views">
                      <button type="button" class="btn">day</button>
                      <button type="button" class="btn">week</button>
                      <button type="button" class="btn">month</button>
                    </div>  
                </div>
                <div class="button">
                    <h2>Customize</h2>
                </div>
                <div class="theme-switches">
                <div data-theme="light" class="switch" id="switch-1"></div>
                <div data-theme="sky" class="switch" id="switch-2"></div>
                <div data-theme="purple" class="switch" id="switch-3"></div>
                <div data-theme="dark" class="switch" id="switch-4"></div>
                </div>
                <script>
                  let switches = document.getElementsByClassName('switch');
                  let style = localStorage.getItem('style');
                  if (style == null) {
                    setTheme('light');
                  } else {
                    setTheme(style);
                  }

                  for (let i of switches) {
                    i.addEventListener('click', function () {
                      let theme = this.dataset.theme;
                      setTheme(theme);
                      // THIS ARROW FUNCTION SHOWS THE THEME WHEN THE BUTTON IS CLICKED
                      let color = () => {
                        return theme;
                      } 
                      alert("The current theme is: " + color());
                    });
                  }

                    function setTheme(theme) {
                    if (theme == 'light') {
                      document.getElementById('switcher-id').href = './themes/light.css';
                    } else if (theme == 'sky') {
                      document.getElementById('switcher-id').href = './themes/sky.css';
                    } else if (theme == 'purple') {
                      document.getElementById('switcher-id').href = './themes/purple.css';
                    } else if (theme == 'dark') {
                      document.getElementById('switcher-id').href = './themes/dark.css';
                    }
                    localStorage.setItem('style', theme);

                    }
                    
                  </script>
                <div class="form-group">
                    <h2><label for="exampleFormControlTextarea1">Your Message</label></h2>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success"><a href="eventcreation.php">Create</a></button>
                
                <button type="submit" class="btn btn-success"><a href="queue.php">My Queues</a></button>
              </div>
            </div>
          </div>
    </body>
</html>