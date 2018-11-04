<?php

  function clean($string){
    return htmlentities($string);
  }

  function redirect($location){
    return header("Location: {$location}");
  }

  function set_message($message){
    if(!empty($message)){
      $_SESSION['message'] = $message;
    }
    else{
      $message = "";
    }
  }

  function display_message(){

    if(isset($_SESSION['message'])){

      echo $_SESSION['message'];

      unset($_SESSION['message']);
    }
  }

  // function token_generator(){
  //   $token = $_SESSION['token'] * md5(uniqid(mt_rand(),true));
  //
  //   return $token;
  // }


  function email_exists($email){
    $sql = "SELECT id FROM users WHERE email= $email";

    $result = query($sql);

    if(row_count($result) == 1){
      return true;
    }
    else{
      return false;
    }
  }

    function name_exists($name){
      $sql = "SELECT id FROM users WHERE name= $name";

      $result = query($sql);

      if(row_count($result) == 1){
        return true;
      }
      else{
        return false;
      }
    }
  //////////////Owner Validation function
  function validate_owner_registration(){

    $errors;

    $min = 3;
    $max = 20;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name              = clean($_POST['name']);
      $password          = clean($_POST['password']);
      $email             = clean($_POST['email']);
      $division          = clean($_POST['division']);
      $hotelname         = clean($_POST['hotelname']);
      $hoteladdress      = clean($_POST['hoteladdress']);


      if(strlen($name) < $min){
        $errors[] = "Your first name cannot be less than {$min} characters";
      }

      if(strlen($name) > $max){
        $errors[] = "Your first name cannot be more than {$max} characters";
      }

      if(name_exists($name)){
        $errors[] = "Sorry that name is already registered";
      }

      if(strlen($email) > $max){
        $errors[] = "Your email cannot be more than {$max} characters";
      }

      if(email_exists($email)){
        $errors[] = "Sorry that email is already registered";
      }

      if(!empty($errors)){
        foreach ($errors as $error) {
          echo $error."<br>";
        }
      }
      else{
        if(register_owner($name, $password, $email, $division, $hotelname, $hoteladdress)){
          set_message("<p>The user has been Registered</p>");
          redirect("index.php");
        }
      }

    }
 }

  function register_owner($name, $password, $email, $division, $hotelname, $hoteladdress){

    // $id                = escape($_POST['id']);
    $name              = escape($_POST['name']);
    $password          = escape($_POST['password']);
    $email             = escape($_POST['email']);
    $division          = escape($_POST['division']);
    $hotelname         = escape($_POST['hotelname']);
    $hoteladdress      = escape($_POST['hoteladdress']);




    if(email_exists($email)){
      return false;
    }
    else if(name_exists($name)){
      return false;
    }
    else{
      //$password = md5($password);

      $sql = "INSERT INTO owner(id, name, password, email, division, hotelname, hoteladdress)";
      $sql.= "VALUES(NULL,'$name', '$password', '$email', '$division', '$hotelname', '$hoteladdress')";

      $result = query($sql);
      confirm($result);

      return true;
    }
  }

  //////////////User Validation function
  function validate_user_registration(){

    $errors;

    $min = 3;
    $max = 20;

    if($_SERVER['REQUEST_METHOD'] == "POST"){
      $name              = clean($_POST['name']);
      $password          = clean($_POST['password']);
      $email             = clean($_POST['email']);


      if(strlen($name) < $min){
        $errors[] = "Your name cannot be less than {$min} characters";
      }

      if(strlen($name) > $max){
        $errors[] = "Your name cannot be more than {$max} characters";
      }

      if(name_exists($name)){
        $errors[] = "Sorry that name is already registered";
      }

      if(strlen($email) > $max){
        $errors[] = "Your email cannot be more than {$max} characters";
      }

      if(email_exists($email)){
        $errors[] = "Sorry that email is already registered";
      }

      if(!empty($errors)){
        foreach ($errors as $error) {
          echo $error."<br>";
        }
      }
      else{
        if(register_user($name, $password, $email)){
          set_message("<p>The user has been Registered</p>");
          redirect("index.php");
        }
      }

    }
 }

 function register_user($name, $password, $email){

   $name              = escape($_POST['name']);
   $password          = escape($_POST['password']);
   $email             = escape($_POST['email']);

   if(email_exists($email)){
     return false;
   }
   else if(name_exists($name)){
     return false;
   }
   else{
     //$password = md5($password);

     $sql = "INSERT INTO customer(id, name, password, email)";
     $sql.= "VALUES(NULL,'$name', '$password', '$email')";

     $result = query($sql);
     confirm($result);

     return true;
   }
 }


  //////////////Validation function for login
  function validate_owner_login(){

    $errors;

    $min = 3;
    $max = 20;

    if($_SERVER['REQUEST_METHOD'] == "POST"){

      $id             = clean($_POST['id']);
      $password       = clean($_POST['password']);
      $remember       = isset($_POST['remember']);

      // echo "password: ".$password."<br>";
      // $enpassword=md5($password);
      // echo $enpassword."<br>";

      if(empty($id)){
        $errors[]="Email field cannot be empty";
      }

      if(empty($password)){
        $errors[]="Password field cannot be empty";
      }

      if(!empty($errors)){
        foreach ($errors as $error) {
          echo $error."<br>";
        }
      }
      else{
        if(login_user($id,$password,$remember)){
          redirect("profile.php");
        }
        else{
          echo "Your credentials are not correct";
        }
      }
    }
  }

  //////User login function

  function login_user($id, $password,$remember){

    if($id>=100001 && $id<=200000){
      $sql = "SELECT id,name,password FROM admin WHERE id = '".escape($id)."'";
    }
    else if($id>=200001 && $id<=300000){
      $sql = "SELECT id,name,password FROM owner WHERE id = '".escape($id)."'";
    }
    else if($id>=300001 && $id<=400000){
      $sql = "SELECT id,name,password FROM customer WHERE id = '".escape($id)."'";
    }

    //$sql = "SELECT id,name,password FROM owner WHERE id = '".escape($id)."'";
    $result = query($sql);
    if(row_count($result) == 1){

      $row = fetch_array($result);

      $db_password = $row['password'];

      if($password==$db_password){

        if($remember == "on"){
          setcookie('id',$id,time()+240);
        }

        $_SESSION['id'] = $id;

        return true;
      }
      else{
        echo "Did't match"."<br>";
        return false;
      }

      return true;
    }
    else{
      echo "Can't match";
      return false;
    }

  }
  ///login functions
  function logged_in(){
    if(isset($_SESSION['id']) || isset($_COOKIE['id'])){
      return true;
    }
    else{
      return false;
    }
  }

?>
