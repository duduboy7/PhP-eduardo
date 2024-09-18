<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pastas no servidor</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;500&family=Righteous&display=swap" rel="stylesheet">

    <!-- CSS personalizado -->
    <style type="text/css">
        /* Desativar as bordas do navbar-toggler */
        .navbar-toggler{
            border: none !important;
            outline: none !important;
        }
        .navbar{
            box-shadow: 0px 2px 4px #AAA;
        }
        /* Fonte personalizada */
        body{
            font-family: 'Jost', sans-serif;
        }
        h1, h2, h3, h4, h5, h6{
            font-family: 'Righteous', cursive;
        }
        .espaco{
            padding-top: 50px;
        }
    </style>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body class="d-flex flex-column h-100">
    <header>
      <nav class="bg-warning fixed-top shadow-sm py-3">
        <div class="container text-center">
            <h4>Pastas no servidor D:/servidor-web &nbsp;&nbsp;&nbsp; <a href="/phpmyadmin">phpMyAdmin</a></h4>
        </div>
      </nav>
    </header>

	<main class="container mt-5 espaco">
        <?php
            if ($dir = opendir('./')) {
                while (false !== ($arquivo = readdir($dir))) {
                    if ($arquivo != '.' && 
                        $arquivo != '..' && 
                        $arquivo != 'index.php') {
                        echo '<a href="' . $arquivo . '">' . $arquivo . '</a><br>';
                    }
                }
                closedir($dir);
            }
        ?>
    </main>
    





    <!-- Rodapé no final dapágina -->
    <footer class="footer mt-auto py-4 bg-dark">
      <div class="container text-center">
        <h6 class="text-light">Lista de pastas no servidor</h6>
      </div>
    </footer>


    <!-- Scripts Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Script para fechar o navbar ao clicar em um link -->
    <script type="text/javascript">
        $(".nav-link").on("click", function(){
            $('.navbar-collapse').collapse('hide');
        });
    </script>
</body>
</html>