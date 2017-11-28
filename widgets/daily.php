<?php include 'includes/config.php'?>
<?php get_header()?> 

<?php
if(isset($_GET['day']))
{//from the querystring
    $day = $_GET['day'];
    
}else{//from the system clock
    $day = date('l');
}
    
    
?>


<?php
date_default_timezone_set('America/Los_Angeles');


$text = '';
$color = '';
$image = '';

//retrieves day of week, 'Sunday'
$day = date('l');


switch($day){
        
    case 'Monday':
        $coffee = 'Sprockets Inc'; 
        $image = 'mon.jpg';
    break;    
    case 'Tuesday':
        $coffee = 'Sprocket'; 
        $image = 'tue.jpg';
    break;    
    case 'Wednesday':
       $coffee = 'Daisies';
        $image = 'wed.jpg';
    break;    
    case 'Thursday':
       $coffee = 'Metallic Flower'; 
        $image = 'thurs.jpg';
    break;    
    case 'Friday':
       $coffee = 'Movie'; 
        $image = 'fri.jpg';
    break;    
    case 'Saturday':
       $coffee = 'Monkey';
        $image = 'sat.jpg';
    break;    
    case 'Sunday':
       $coffee = 'Lazy Dog'; 
        $image = 'sun.jpg';
    break;    
    
}


?>

<h3>Daily</h3>
<p>Current contents of the variable day: <?=$day?></p>
<img class="image-fluid float-left mr-4 d-none d-lg-block" src="img/<?=$image?>" alt="You have to love <?=$coffee?> on a day like this!" id="coffee" />
    <p><strong class="feature"><?=$day?>'s Daily Special:</strong> </p>
<p><?=$day?>'s is the day for <strong class="feature"><?=$coffee?></strong>, this is one of our top sellers!</p>


<p><a href="?day=Monday">Monday</a></p>
<p><a href="?day=Tuesday">Tuesday</a></p>
<p><a href="?day=Wednesday">Wednesday</a></p>


<?php get_footer();