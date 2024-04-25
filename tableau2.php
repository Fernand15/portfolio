<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <title>Site03-AutoComplete</title>
    <meta charset="utf-8">
    <script src="jquery.js"></script>
    <style>
        table{
            border: 2px solid black;
            border-collapse:collapse; 
        }
        td,th{
            border: 1px solid black;
        }
    </style>

</head>
<body>


    <h1>Portfolio</h1>
    <table id="portfolio">

    </table>

    <script>
    $(document).ready(function(){
        console.log("Ready");
        getData();

    })


    function constructTableHead(data) {

 
        $("#portfolio").append("<tr></tr>");

        $("tr").first().append("<th>Réalisations</th>");
        for (let i=0; i < data.length;i++) {
            $("tr").first().append("<th>"+data[i].titre+"</th>");
        }

        $("#portfolio").append("<tr></tr>");

        $("tr").last().append("<th></th>");
        for (let i=0; i < data.length;i++) {
            $("tr").last().append("<th>"+data[i].lib+"</th>");
        }
    } 

    function constructTableReal(data) {

        for (let i=0;i<data.realisations.length;i++){
            $("#portfolio").append("<tr></tr>");
            $("tr").last().append("<td class='real'>"+data.realisations[i].lib+"</td>");

            for (let j=0;j<data.competences.length;j++){
                $("tr").last().append("<td croix=c"+data.competences[j].id+"r"+data.realisations[i].id+"></td>");

            }
                    }

        data.croix.forEach(function (croix){

            console.log(croix);
            $("[croix=c"+croix.competence_id+"r"+croix.realisation_id+"]").addClass("Good").html("OK");
        })
    }


    function getData() {
        $.ajax( {
          url: "getDataPortfolio.php",
          dataType: "json",
          method:"post",
          data: {

          },
          success: function( data ) {
              console.log(data);
              constructTableHead(data.competences);
              constructTableReal(data); 
          }
        });
    }
    </script>
</body>