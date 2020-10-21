<?php

    if(isset($_GET["operation"]) && isset($_GET["result"])) {

        $operation = urldecode($_GET["operation"]);
        $save = $_GET["operation"]. "=" . $_GET["result"];

        $texte = file_get_contents('history/history.txt');

            if(!$texte){
                $save = $save ."<br>";
                file_put_contents('history/history.txt', $save );
               header('Location: index.php');

            }else{
                $texte .= "\n". $save."<br>";
                file_put_contents('history/history.txt', $texte);
                
                $urlCourante=$_SERVER["PHP_SELF"];
                header('Location: index.php');
        }
    }

    if(isset($_GET["history"])){
            
            $history = file_get_contents('history/history.txt');
           /* str_split($history);*/
            echo "<div class='displayHistory'>$history</div>";
           

        
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Calculatrice</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./style/styleIndex.css">
        
    </head>

    <body>

        <div class="calculator">
            <div class="screen">
                <div id="calculated" ></div>
                <div id="result" ></div>                
            </div>
            <div class="touch">
                <button onclick="history(this)" class="historic">Historique</button>
                <button onclick="saveHistory(this)" class="backup">Sauvegarde</button>

                <button onclick="reset(this)" id="left" class="delete">C</button>
                <button onclick="deletesLast(this)" id="right" class="deleteOne"><=</button>

                <button onclick="selectedValue(this)" value="(" id="left" class="button">(</button>
                <button onclick="selectedValue(this)" value=")" id="middle" class="button">)</button>
                <button onclick="selectedValue(this)" value="%" id="middle" class="button">%</button>
                <button onclick="selectedValue(this)" value="/" id="right" class="button">/</button>

                <button onclick="selectedValue(this)" value="7" id="left" class="button">7</button>
                <button onclick="selectedValue(this)" value="8" id="middle" class="button">8</button>
                <button onclick="selectedValue(this)" value="9" id="middle" class="button">9</button>
                <button onclick="selectedValue(this)" value="*" id="right" class="button">X</button>

                <button onclick="selectedValue(this)" value="4" id="left" class="button">4</button>
                <button onclick="selectedValue(this)" value="5" id="middle" class="button">5</button>
                <button onclick="selectedValue(this)" value="6" id="middle" class="button">6</button>
                <button onclick="selectedValue(this)" value="-" id="right" class="button">-</button>
                
                <button onclick="selectedValue(this)" value="1" id="left" class="button">1</button>
                <button onclick="selectedValue(this)" value="2" id="middle" class="button">2</button>
                <button onclick="selectedValue(this)" value="3" id="middle" class="button">3</button>
                <button onclick="selectedValue(this)" value="+" id="right" class="button">+</button>

                <button onclick="selectedValue(this)" value="0" id="leftLow" class="button">0</button>
                <button onclick="selectedValue(this)" value="." id="low" class="button">,</button>
                <button onclick="resultOperation(this)" id="rightLow" class="button">=</button>
                
            </div>
        </div>

        <script src="./application/applicationCalculator.js">
            $(document).ready(function ()) {  })
        </script>
    </body>
</html>
