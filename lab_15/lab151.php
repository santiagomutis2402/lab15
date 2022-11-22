<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo de DataTable JQuery</title>
    <!--<link rel="stylesheet" type="text/css" href="css/estilo.css">-->
    <link rel="stylesheet" type="text/css" href="/dsvii/laboratorio_15/librerias/jquery.dataTables.min.css">
    <script type="text/javascript" lang="javascript" src="/dsvii/laboratorio_15/librerias/jquery-3.1.1.js"></script>
    <script type="text/javascript" lang="javascript" src="/dsvii/laboratorio_15/librerias/jquery.dataTables.min.js"></script>
</head>

<body>
    <h1>Consulta de noticias</h1>
    <?php
    require_once("class/noticias.php");

    $obj_noticia = new noticia();
    $noticias = $obj_noticia->consultar_noticias();

    $nfilas = count($noticias);
    echo $nfilas;
    if ($nfilas > 0) {
        print("<table id='grid' class='display' cellspacing='0'>\n");
        print("<thead>");
        print("<tr>\n");
        print("<th>Titulo</th>\n");
        print("<th>Texto</th>\n");
        print("<th>Categoria</th>\n");
        print("<th>fecha</th>\n");
        print("<th>imagen</th>\n");
        print("</tr>\n");
        print("</thead>");
        print("<tbody>");

        foreach ($noticias as $resultado) {
            print("<tr>\n");
            print("<td>" . $resultado['titulo'] . "</td>\n");
            print("<td>" . $resultado['texto'] . "</td>\n");
            print("<td>" . $resultado['categoria'] . "</td>\n");
            print("<td>" . date("j/n/y", strtotime($resultado['fecha'])) . "</td>\n");

            if ($resultado['imagen'] != "") {
                print("<td><a target='_blank' href='img/" . $resultado['imagen'] . "'><img border='0' src='img/iconotexto.gif'></a></td>");
            } else {
                print("<td>&nbsp;</td>\n");
            }
            print("</tr>\n");
            print("</tbody>");
        }
        print("</table>\n");
    } else {
        print("no hay noticias disponibles");
    }

    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#grid').DataTable({
                "lengthMenu": [5, 10, 20, 50],
                "order": [
                    [0, "asc"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "zeroRecords": "no existen resultados en su busqueda",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(Buscando entre _MAX_ registros en total",
                    "search": "buscar: ",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
            $("*").css("font-family", "arial").css('font-size', '12px');
        });
    </script>

</body>

</html>