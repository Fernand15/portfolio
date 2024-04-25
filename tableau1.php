<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Tableau des compétences</title>
    <meta charset="utf-8">
    <script src="jquery.js"></script>
    <style>
        table{
            border: 2px solid black;
            border-collapse:collapse; 
        }
        td{
            border: 1px solid black;
        }
        th{
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <table id="portfolio">

    </table>
    <button onclick="getData()">Get Data</button>

<script>
    $(document).ready(function(){
        console.log("Ready");
        getData();
    })

    function constructTableHead(data) {
        $('#portfolio').append("<tr></tr>");

        $("tr").first().append("<th>Vide</th>");
        for (let i=0; i < data.length;i++){
            $("tr").first().append("<th>"+data[i].titre+"</th>");
        }
        
        $('#portfolio').append("<tr></tr>");

        $("tr").last().append("<th>Vide</th>");
        for (let i=0; i < data.length;i++){
            $("tr").last().append("<th>"+data[i].lib+"</th>");
        }
    }

    function constructTableReal(data){
        for (let i=0;i<data.realisations.length;i++){
            $("#portfolio").append("<tr></tr>");
            $("tr").last().append("<td class='real'>"+data.realisation[i].lib+"</td>");

            for (let j=0;j<data.competences.length;j++){
                $("tr").last().append("<td croix=c"+data.competences[j].id+"r"+data.realisations[i].id"></td>");
            }

        }

        data.croix.forEach(function (croix){
            console.log(croix);
            $("[croix=c"+croix.compentences_id+"r"+croix.realisation_id+"]").addClass("OK").html("XX");
        })
    }


    function getData(){
        $.ajax({
            url:"getDataPortfolio.php",
            dataType:"json",
            method:"post",
            data:{

            },
            success: function(data){
                constructTableHead(data.competences);
                constructTableReal(data);
            }
        })
    }   
/*
    let competences = [
        {"head":"Réalisation", "lib":""},
        {"head":"Gérer le patrimoine informatique","lib":"▸Recenser et identifier les ressources numériques<br> ▸Exploiter des référentiels, normes et standards adoptés par le prestataire informatique<br> ▸Mettre en place et vérifier les niveaux d’habilitation associés à un service<br> ▸Vérifier les conditions de la continuité d’un service informatique<br> ▸Gérer des sauvegardes<br> ▸Vérifier le respect des règles d’utilisation des ressources numériques"},
        {"head":"Répondre aux incidents et aux demandes d'assistance et d'évolution","lib":"▸Collecter, suivre et orienter des demandes<br> ▸Traiter des demandes concernant les services réseau et système, applicatifs<br> ▸Traiter des demandes concernant les applications"},
        {"head":"Développer la présence de l'organisation en ligne", "lib":"▸Participer à la valorisation de l'image de l'organisation sur les médias numériques en tenant compte du cadre juridique et des enjeux économiques<br> ▸Référencer les services en ligne de l'organisation et mesurer leur visibilité<br> ▸Participer à l'évolution d'un site Web en exploitant les données de l'organisation"},
        {"head":"Travailler en mode projet", "lib":"▸Analyser les objectifs et les modalités d'organisation d'un projet<br> ▸Planifier les activités<br> ▸Evaluer les indicateurs de suivi d'un projet et analyser les écarts"},
        {"head":"Mettre à disposition des utilisateurs un service informatique", "lib":"▸Réaliser les tests d'intégration et d'acceptation d'un service<br> ▸Déployer un service<br> ▸Accompagner les utilisateurs dans la mise en place d'un service"},
        {"head":"Organiser son développement professionnel", "lib":"▸Mettre en place son environnement d'apprentissage personnel<br> ▸Mettre en oeuvre des outils et stratégies de veille informationnelle<br> ▸Gérer son identité professionnelle<br> ▸Développer son projet professionnel"}
    ]
    let realisations=[
        "Formation",
        "Réalisation portfolio",
        "Réalisation d'un site web sur ma passion à partir d'un framework personnel",
        "Site Frontend en vue JS",
        "Personnel",
        "Site"
    ]
    let validations=[
        "",
        "",
        "",
        "",
        "",
        ""
    ]
*/

    /*
    $('#portfolio').append("<tr></tr>");
        competences.forEach(function(element){
        $('#portfolio').find("tr").append("<th>"+element.head+"</th>");
    })

    $('#portfolio').append("<tr></tr>");
        competences.forEach(function(element){
        $('#portfolio').find("tr").last().append("<td>"+element.lib+"</td>");
    })

    realisations.forEach(function(element){
        $('#portfolio').append("<tr></tr>");
        $('#portfolio').find("tr").last().append("<th>"+element+"</th>");
    })      
    $('#portfolio').append("<tr></tr>"); 
        validations.forEach(function(element){ 
        $('#portfolio').find("tr").append("<td>"+element+"</td>");
    })
    */
</script>

</body>
</html>