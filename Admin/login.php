
<?php  
 session_start();  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "mailproject";  
 
//$projectNameLength = strlen($projetName) + 1;
//$base_url = mb_substr($_SERVER['REQUEST_URI'], 0, $projectNameLength);

 $message = "";  
 try  
 {  
      $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["username"]) || empty($_POST["mdp"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM utilisateurs WHERE username = :username AND mdp = :mdp";  
                $statement = $connect->prepare($query);  
                $statement->execute(  
                     array(  
                          'username'     =>     $_POST["username"],  
                          'mdp'     =>     $_POST["mdp"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["username"] = $_POST["username"];  
                     header("location:login_success.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
                }  
           }  
      }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  
 
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      
  </head>
  <body>

  <div class="container" style="width:100%, max-width:600px">
    <h2 align="center">php login</h2>
    <div class="panel panel-primary">
    <div class="panel-heading">
      <h4>Register</h4>
    </div>
      <div class="panel-body">
      <form method="post">
      <div class="form-group">
      <label for="">User name</label>
      <input type="text" name="username" claas="form-control" pattern="[a-zA-Z]+" required>
      </div>

      <div class="form-group">
      <label for="">User password</label>
      <input type="password" name="mdp" claas="form-control" required>
      </div>

      <div class="form-group">
      <input type="submit" name="login" id="login" value="Login" claas="btn btn-info" >
      </div>
      </form>
      
      
      
    </div>
    </div>
  </div>
  </body>
  </html>