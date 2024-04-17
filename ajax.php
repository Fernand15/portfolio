<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <script src="jquery.js"></script>
</head>
<script>
$(document).ready(function(){
    console.log("Ready");
    getData();
})
function getData(){
    $.ajax({
        url:"getDataPortfolio.php",
        dataType:"json",
        method:"post",
        data:{

        },
        success: function(data){
            console.log(data);
        }
    })
}
</script>
</html>