<?php
//customer_list.php - shows a list of customer data
?>
<?php include 'includes/config.php';
    require 'includes/Pager.php'; #allows pagination 
# SQL statement?>

<?php get_header();?>
<h1><?=$pageID?></h1>
<?php
 $prev = '<img src="' . $config->virtual_path . '/images/arrow_prev.gif" border="0" />';
$next = '<img src="' . $config->virtual_path . '/images/arrow_next.gif" border="0" />';   
$sql = "select * from hw_Instrument";
//we connect to the db here
$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    
    # Create instance of new 'pager' class
$myPager = new Pager(2,'',$prev,$next,'');
$sql = $myPager->loadSQL($sql,$iConn);  #load SQL, pass in existing connection, add offset

//we extract the data here
$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) > 0)
{//show records
	if($myPager->showTotal()==1){$itemz = "customer";}else{$itemz = "customers";}  //deal with plural
    echo '<p align="center">We have ' . $myPager->showTotal() . ' ' . $itemz . '!</p>';
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
    
	//the showNAV() method defaults to a div, which blows up in our design
    echo $myPager->showNAV();//show pager if enough records     

}else{//inform there are no records
    echo '<p>There are currently no instruments</p>';
}

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer();?>