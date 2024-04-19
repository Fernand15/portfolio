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

function constructTableHead(data){
    $("portfolio").append("<tr id='lig1'></tr>");
    $("portfolio").append("<tr></tr>");
    $("tr").first().append("<th>"+data[0].title+"</th>");
    $("tr").first().append("<th>"+data[1].title+"</th>");
    $("tr").next().append("<th>"+data[0].lib+"</th>");
    $("tr").next().append("<th>"+data[1].lib+"</th>");
}

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