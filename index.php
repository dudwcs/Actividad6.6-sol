<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>




    <?php


    use clases\items\{Academia, Baile};
    use clases\people\{Profesor, Alumno};


    //Los require... ya no son necesarios gracias al autoload.php
    // require_once "Persoa.php";
    // require_once 'Profesor.php';
    // require_once 'Alumno.php';
    // require_once 'Academia.php';
    // require_once 'Baile.php';
    require_once 'autoload.php';
    require_once "util.php";



    $academia = new Academia();
    echo "<h1>Academia de baile: " . $academia::ACADEMIA_NOME . "</h1>";
    $profe1 = new Profesor("Silvia", "López López", "666777888", "12345678D");

    $salsa = new Baile("Salsa");
    $bachata = new Baile("Bachata", 12);
    $tango = new Baile("Tango", 16);
    //Mesmo nome, diferente idade
    $afro = new Baile("AFRO", 18);
    $afro2 = new Baile("AFRO", 8);

    $profe1->engadir($salsa);
    $profe1->engadir($bachata);
    $profe1->engadir($tango);
    $profe1->engadir($afro);
    $profe1->engadir($afro2);

    //Para probar o segundo método: 
    // $profe1->engadirSoDiferenteNome($salsa);
    // $profe1->engadirSoDiferenteNome($bachata);
    // $profe1->engadirSoDiferenteNome($tango);
    // $profe1->engadirSoDiferenteNome($afro);
    // $profe1->engadirSoDiferenteNome($afro2);

    $alumno1 = new Alumno("Juan", "Antas Ulla", "650650650");
    $alumno2 = new Alumno("Rita", "Román Rueda", "652652652");

    $alumno1->setNumClases(0);
    $alumno2->setNumClases(4);

    $academia->engadirAlumno($alumno1);
    $academia->engadirAlumno($alumno2);

    $academia->engadirProfe($profe1);

    echo "<h2>{$profe1->getNome()}->verInformacion()</h2>";
    $profe1->verInformacion();

    echo "<h2>{$profe1->getNome()}->calcularSoldo(2)</h2>";
    $soldo = $profe1->calcularSoldo(2);
    echo "O soldo do profe é: " . $soldo . "<br/>";

    echo $profe1->getNome() . " imparte os seguintes bailes: <br/>";
    $profe1->mostrarBailes();

    echo "<h2>{$alumno1->getNome()} aPagar</h2>";
    mostrarImporte($alumno1);
    echo "<h2>{$alumno2->getNome()} aPagar</h2>";
    mostrarImporte($alumno2);


    echo "<h2>{$profe1->getNome()}->eliminar baile...</h2>";
    $profe1->eliminar(new Baile("AFRO"));
    $profe1->mostrarBailes();

    echo "<pre>";
    echo json_encode($profe1, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    echo "</pre>";

    //A.6.6
    $profe1->setDataNacemento(new \DateTimeImmutable("1990-01-01"));
    $profe1->verInformacion();
    $data_string = $profe1->getDataNacemento()->format('d/m/Y');
    echo "$data_string";

    $alumno1->setDataNacemento(new \DateTimeImmutable("2018-01-01"));
    $alumno1->verInformacion();

    $alumno1->setDataNacemento(new \DateTimeImmutable("1990-02-01"));
    $alumno1->verInformacion();

    $clases = get_declared_classes();
    echo "<pre>";
    print_r($clases);
    echo "</pre>";


    ?>
</body>

</html>