<?php 
// include database connection file
include('db_config.php');

if(isset($_POST["from_date"], $_POST["to_date"])) {
    $orderData = "";
    $query = "SELECT * FROM evenement WHERE date_evenement BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ORDER BY id_evenement desc";
    $result = mysqli_query($con, $query);

    $orderData .='
    <table class="table table-bordered">  
    <tr>  
    <th width="5%">id evenement</th>  
    <th width="30%">Nom evenement</th>  
    <th width="40%">nbrplaces</th>  
    <th width="15%">date evenement</th>  
    <th width="10%">location</th>  
    </tr>';

    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))  
        {
            $orderData .='
            <tr>  
            <td>'.$row["id_evenement"].'</td>  
            <td>'.$row["nom"].'</td>  
            <td>'.$row["nbmax_participants"].'</td>  
            <td>'.$row["date_evenement"].'</td>  
            <td>'.$row["localisation"].'</td>  
            </tr>';  
        }
    }
    else  
    {  
        $orderData .= '  
        <tr>  
        <td colspan="5">No Order Found</td>  
        </tr>';  
    }  
    $orderData .= '</table>';  
    echo $orderData;  
}
?>
