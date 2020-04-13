<!DOCTYPE html>
<html>
    <head>
        <title> tbLeitor </title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=800px, initial-scale=1, shrink-to-fit=no">


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>

    <body>
        <div class="container d-flex h-100 p-3 mx-auto flex-column">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Código do Leitor</th>
                        <th scope="col">Nome do Leitor</th>
                        <th scope="col">Tipo do Leitor</th>
                    </tr>
                </thead>
                <tbody>

<?php 
// Puxa arquivo de configurações
$config = parse_ini_file("../config/config.ini.php");

// Cria con
$conn = mysqli_connect($config['localDB'], $config['usuarioDB'], $config['senhaDB'], $config['nomeDB']);

// Check con
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select
$sql = "SELECT codLeitor, nomeLeitor, tipoLeitor FROM tbLeitor";
$result = mysqli_query($conn, $sql)  or die("Erro na query do servidor.");

if (mysqli_num_rows($result) > 0) {
    // Output
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["codLeitor"] . "</td>";
        echo "<td>" .$row["nomeLeitor"] . "</td>";
        echo "<td>" .$row["tipoLeitor"] . "</td>";
        echo "</tr>";
    }
} else {
    echo '<div class="alert alert-warning text-center" role="alert">Nenhum resultado.</div>';
}

mysqli_close($conn);
?>
                <tbody>
            </table>
            <div class="alert alert-primary text-center" role="alert">Use F5 para atualizar ou <a href="?r=1" class="alert-link">clique aqui</a>.</div>
        </div>
    </body>
</html>