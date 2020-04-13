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
        echo "Codigo Leitor: " . $row["codLeitor"]. " Nome Leitor: " . $row["nomeLeitor"]. " Tipo Leitor" . $row["tipoLeitor"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
