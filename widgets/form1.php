<?php
//form1.php
    
if(isset($_POST["FirstName"])){//show data
    
    //use var_dump() on thepost data to view it:
    /*
    echo '<pre>';
    var_dump($_POST);
    echo '</pre>';
    */
    $FirstName = $_POST["FirstName"]; 
    $LastName = $_POST["LastName"]; 
    $Email = $_POST["Email"]; 
    $Comments = $_POST["Comments"]; 
    
    echo "
    <p>The user's name is $FirstName  $LastName.</p>
    <p>$FirstName's email is $Email.</p>
    <p>Here is what Amy has to say:</p>
    <p>$Comments</p>
    ";
    
    //echo $_POST["FirstName"];    
}else{//show form
  echo '
  <form action="" method="post">
  <label>
  First Name:<br />
  <input 
    type="text" 
    name="FirstName" 
    placeholder="Enter your first name here" 
    required="required"
    tab="10"
    autofocus
    /><br />
  </label>
  <br />
  
<label>
  Last Name:<br />
  <input 
    type="text" 
    name="LastName" 
    placeholder="Enter your last name here" 
    required="required"
    tab="20"
    /><br />
  </label>
  
  <br />
  <label>
  Comments:<br />
  <textarea name="Comments" placeholder="Comments go here" tab="30"></textarea>
  </label>
  <br />
  
  <label>
    email:<br />
  <input 
    type="email" 
    name="Email" 
    placeholder="Enter your email here" 
    required="required"
    tab="25"
    /><br />
  </label>
  <br />
  
  <input type="submit" />
  </form>
  ';  
    
}