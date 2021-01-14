<?php
  $errors = array("name" => "", "email" => "");

  if (isset($_GET["submit"])){
    $name = $_GET["name"];
    if (empty($name)){
      $errors["name"] = "Please enter your name!";
    } else {
      if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $errors["name"] = "Only letters and white space allowed";
      } else {
        echo htmlspecialchars($name) . "<br>";
      }
    }

    //Check Email
    if (empty($_GET["email"])){
      $errors["email"] = 'An email is required';
    } else {
      $email = $_GET["email"];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors["email"] = 'Invalid address!';
      } else {
        echo htmlspecialchars($email);
      }
    }
  }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Server-Side Form Validation</title>
  </head>
  <body>


    <div class="form-container">
      <div class="">
        <h2>My Form</h2>
      </div>
      <div class="">
        <form
          action="index.php"
          method="get"
          target="_self">
            <label for="name">Name</label><br>
            <input type="text" id="name"      name="name" value="" placeholder="Enter your name here"><br>
            <div class="error">
              <?php echo $errors["name"]; ?>
            </div>
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" value="" placeholder="Enter your e-mail"><br>
            <div class="error">
              <?php echo $errors["email"]; ?>
            </div>
            <input type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>


  </body>
</html>
