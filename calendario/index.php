<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Calendário de compromissos</title>
	<!-- CSS Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<!-- CSS Fullcalendar -->
	<link href="fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />

	<!-- CSS personalizado -->
	<style type="text/css">
		#aviso{
			background-color: #555;
			color: #FF0;
			padding: 10px;
			width: 80%;
			margin: 0px auto;
			margin-bottom: 10px;
			font: bold 16px Arial, sans-serif;
			text-align: center;
			border-top-left-radius: 80px;
			border-bottom-right-radius: 80px;
			display: none;
		}
		.aviso{
			font-size: 30px;
		}
		#calendario{
			width: 80%;
			margin: 0px auto;
		}
	</style>
</head>
<body>
	<main class="container">
		<div id="aviso">
			<span class="aviso">ATENÇÃO!!!</span><br>
			Arquivo "eventos.php" não está funcionando!<br>
			ou náo há compromisso cadastrado!
		</div>

		<div id="calendario"></div>
	</main>





	<!-- Scripts de funcionamento -->
	<script src="fullcalendar/lib/jquery.min.js"></script>
	<script src="fullcalendar/lib/moment.min.js"></script>
	<script src="fullcalendar/fullcalendar.js"></script>

	<!-- Script de tradução -->
	<script src="fullcalendar/lang/pt-br.js"></script>

	<!-- Script principal -->
	<script type="text/javascript">
		$(document).ready(function(){
			//Carrega o calendário e os eventos do BD
			$('#calendario').fullCalendar({
				header:{
					left: 'prev,next today',
					center: 'title',
					right: 'month,agendaWeek,agendaDay'
				},
				editable: false,
				eventLimit: true,
				events:{
					url: 'eventos.php',
					error: function(){
						$('#aviso').show();
					}
				},
				eventRender: function(event, element){
					element.attr('href', 'javascript:void(0);');
					element.click(function(){
						bootbox.alert({
							message: event.description,
							title: event.title,
							className: 'rubberBand animated'
						});
					});
				},
				eventColor: '#000',
				eventTextColor: '#FFF'
			});
		});
	</script>

	<!-- Bootstrap (versão antiga) -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js"></script>


</body>
</html>