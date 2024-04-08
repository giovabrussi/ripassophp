<?php
session_start();

include ("connection.php");
$numero = $_GET["numero"];

$sql = "SELECT CodAttore, Nome FROM attori 
ORDER BY attori.Nome
LIMIT $numero";

$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $n = 0;
    while ($row = $result->fetch_assoc()){

        $n++;
        echo "ATTORE $n: <br>";
        echo "Nome: ".$row["Nome"]." ";
        echo "Codice: ".$row["CodAttore"]." ";
        
        $cod = $row["CodAttore"];

        $sql2 = "SELECT film.Titolo as n FROM film
        JOIN recita on film.CodFilm = recita.CodFilm
        WHERE recita.CodAttore = $cod";
        
        $r = $connection->query($sql2);

        echo "Numero di film: ". $r->num_rows;

        while ($row2 = $r->fetch_assoc()) {
            echo "<ul>";
            foreach ($row2 as $key => $value) {
                echo "<li>".$value."</li>";
            }
            echo "</ul>";
        }

        echo "<br>";
    }
    
}else{
    echo "nessun attore";
}

echo "<a href='index.html'>Torna alla form</a>";