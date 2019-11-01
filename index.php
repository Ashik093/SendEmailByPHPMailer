<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>

      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">Send Email</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">PHPMailer <span class="sr-only">(current)</span></a>
              </li>

          </div>
        </nav>
        <div id="msg"></div>
        <div class="col-md-6 col-md-offset-3" >

            <form method="post">
              <div class="form-group">
                <label>TO</label>
                <input type="email" class="form-control" id="email" placeholder="Enter reciever email">
              </div>
              <div class="form-group">
                <label>Your Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Your Name">
              </div>
              <div class="form-group">
                <label>Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject">
              </div>
              <div class="form-group">
                <label>Body</label>
                <textarea  class="form-control" id="body"></textarea>
              </div>
              <button type="button" id="submit" class="btn btn-primary">Button</button>
            </form>

        </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <script type="text/javascript">
        $(document).ready(function(){
          $("#submit").on('click',function(){
            sendEmail();
          });

          function sendEmail(){

            var email=$("#email");
            var name=$("#name");
            var subject=$("#subject");
            var body=$("#body");
            if(isNotEmpty(email) && isNotEmpty(name) && isNotEmpty(subject) && isNotEmpty(body)){
              $.ajax({
                url:'sendEmail.php',
                method:'POST',
                data:{
                  email:email.val(),
                  name:name.val(),
                  subject:subject.val(),
                  body:body.val(),
                },
                success:function(data){
                  $('#email').val('');
                  $('#name').val('');
                  $('#subject').val('');
                  $('#body').val('');
                  $('#msg').html(data);
                }
              })
            }
          }

          function isNotEmpty(caller){
            if(caller.val()==""){
              caller.css('border','1px solid red');
			  
              return false;
            }else{
              caller.css('border','');
            }
            return true;
          }
        });
      </script>
  </body>
</html>
