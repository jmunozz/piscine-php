<?php
?>
<html>
	<head>
		<meta charset 'UTF-8'>
		<title>admin</title>
		<link rel='stylesheet' href='backend.css'>
	</head>
	<body>
<?php
			if ($_GET['action'] == 'add')
			{
				if (isset($_POST['submit']) && $_POST['submit'] == 'ok')
				{
					if (!retreive_add($bdd, $_GET['type']))
						include 'err.php';
					else
						include 'success.php';
				}		
				else 
					include 'add_forms.php';
			}
			if ($_GET['action'] == 'del')
			{	
				if (isset($_POST['submit']) && $_POST['submit'] == 'ok')
				{
					if (!retreive_del($bdd, $_GET['type']))
						include 'err.php';
					else
						include 'success.php';
				}		
				else 
					include 'delete_forms.php';
			}
			if ($_GET['action'] == 'mod')
				include 'modify_forms.php';
?>
	</body>
</html>
