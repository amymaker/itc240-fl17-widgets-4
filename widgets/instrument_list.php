<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';?>
<?php get_header();?>
<h1><?=$pageID?></h1>
<?php
$sql = "select * from hw_Instrument";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records

    while($row = mysqli_fetch_assoc($result))
    {
        echo '<p>';
        echo 'Name: <b>' . $row['Name'] . '</b></br> ';
        echo 'Family: <b>' . $row['Family'] . '</b> </br>';
        echo 'Range: <b>' . $row['Range'] . '</b></br> ';
        echo 'Description: <b>' . $row['Description'] . '</b></br> ';
        
        echo '<a href="instrument_view.php?id=' . $row['InstrumentID'] . '">' . $row['Name'] . '</a>';
        
        echo '</p>';
    }    

}else{//inform there are no records
    echo '<p>There are currently no instruments</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer();?>