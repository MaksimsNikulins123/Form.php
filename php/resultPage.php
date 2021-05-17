<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        display:flex;  
        justify-content: center;
        
    }
    tr, td {
        padding: 10px; 
    }
    tr {
        background: #606060;
        color: #fff;
    }
    td{
        margin: 0 auto; 
        background: #b5b5b5
    }
    p{
        margin:0;
    }

</style>
<body>

<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $domainValue = test_input($_POST["domainValue"]);
    $deleteValue = test_input($_POST["deleteValue"]);
   
};



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        $delete = mysqli_query($connect,"DELETE FROM `subscriberegistration` WHERE id='$deleteValue'");
        $emails = mysqli_query($connect, "SELECT * FROM `subscriberegistration`");
        for($data = []; $row = mysqli_fetch_assoc($emails); $data[] = $row );
      
    ?>



<form action="resultPage.php" method="POST">
    <input type="hidden" name="domainValue" id="input" value="" >
    <input type="hidden" name="deleteValue" id="input2" value="" >
<table>
<tr>
    <th>Domains</th>
    <th colspan="2"><button>All</button> 
        <?php
        $providersArray = array();
    for ($i=0; $i < count($data); $i++) { 
        $domain = $data[$i]['domain'];
        if(in_array($domain,$providersArray)){
            continue;
        }else {
            $providersArray[] = $domain;
                echo
            '
                <button 
                    type="submit" 
                    onclick="filterEmailsByDomain(this)"
                    class="'. $domain. '">'
                    . $domain . 
                '</button> 
            '; 
        };
    };
        ?>
    </th>
    
</tr>
<tr>
    <th>Date</th>
    <th>Email</th>
    <th>Action</th>
</tr>



<?php
        $sortEmailsArray = array();

                for ($i=0; $i < count($data) ; $i++){
                    if($data[$i]['domain'] == $domainValue) {
                        $sortEmailsArray[] = $data[$i];
                    } else {
                        continue;
                        };
            
                };


                if(empty($domainValue)){
                    if(empty($deleteValue)){
                        foreach($emails as $email) {
                            ?>   
                        <tr>
                    
                        <td><?= $email['date'] ?></td>
                        <td><?= $email['email'] ?></td>
                        <td>
                    
                    
                        <?php
                        echo
                        '
                            <button 
                                type="submit" 
                                onclick="deleteEmailFromDataBase(this)"
                                class="'. $email['id']. '">
                                delete 
                            </button> 
                        ';
                        ?> 
                        </td> 
                    </tr>
             
                        <?php       
                            }
                    }else {
                        $delete;
                        
                        foreach($emails as $email) {
                            ?>   
                        <tr>
                    
                        <td><?= $email['date'] ?></td>
                        <td><?= $email['email'] ?></td>
                        <td>
                    
                    
                        <?php
                        echo
                        '
                            <button 
                                type="submit" 
                                onclick="deleteEmailFromDataBase(this)"
                                class="'. $email['id']. '">
                                delete 
                            </button> 
                        ';
                        ?> 
                        </td> 
                    </tr>
             
                        <?php       
                            }
                    }
                    
                }else if(!empty($domainValue)){
                    if(empty($deleteValue)) {
                        foreach($sortEmailsArray as $email) {
                            ?>
                        <tr>
                    
                        <td><?= $email['date'] ?></td>
                        <td><?= $email['email'] ?></td>
                        <td>
                    
                    
                        
                    <?php
                        echo
                        '
                            <button 
                                type="submit" 
                                onclick="deleteEmailFromDataBase(this)"
                                class="'. $email['id']. '">
                                delete 
                            </button> 
                        ';
                        ?>
                        </td> 
                    </tr>
             
                  <?php
                        }
                    }else {

                        $delete;
                        
                        
                    }
                    
                } 
?>

</table>

</form>

<script>
function filterEmailsByDomain(filter) {
    const sortEmail = filter.className;
    document.getElementById("input").value = sortEmail;
}

function deleteEmailFromDataBase(del) {
    const sortEmail = del.className;
    document.getElementById("input2").value = sortEmail;
}
</script>
</table>
    </form>
 
</body>
</html>


