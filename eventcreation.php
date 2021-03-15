<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

        <link rel="stylesheet" href="/styles/style.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
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
    <body>
      <?php include('header.html')?>
    


          <div class="container">
            <form class="needs-validation" novalidate>
              <div class="form-group">
                <label for="title">Event Title</label>
                <input type="text" class="form-control" id="title" placeholder="Title" required>
              </div>
              <!-- <div class="invalid-feedback">
                Please input a title.
              </div> -->

              <div class="form-group">
                <label for="inviteFriend">Invite a Friend:</label>
                <select class="form-control" id="inviteFriend">
                  <option>None</option>
                  <option>Vivian</option>
                  <option>Val</option>
                </select>
              </div>

              <div class="form-group">
                <label class="control-label" for="date">Date</label>
                <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text" required>
              </div>

              <div class="form-row">
                <div class="col">
                <label class="control-label" for="date">Start Time</label>
                  <input type="text" class="form-control" id="starttime" placeholder="00:00" required>
                </div>

                <div class="col">
                <label class="control-label" for="date">End Time</label>
                  <input type="text" class="form-control" id="endtime" placeholder="01:00" required>
                </div>
              </div>

              <p></p>
              <div class="form-group">
                <label for="descr">Description</label>
                <textarea class="form-control" id="descr" rows="3"></textarea>
              </div>

              <br><br>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <script type="text/javascript" src="js/script.js"></script>
          <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
          </script>
    </body>
</html>