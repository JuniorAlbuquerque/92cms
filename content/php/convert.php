<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="index, follow">
<title>Template Convertor</title>

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css">

</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12">

<?php

if(isset($_GET["file"])):
	$file = $_GET["file"];
	$fileName = substr($file, 0, -4);
	$html = file_get_contents('http://web.dev/boomerang/'.$file);

	if(file_put_contents('../'.$fileName.'.html', $html)):
		echo "Fisierul ".$fileName." a fost convertit cu succes<br>";
	else:
		echo "Eroare: ".$fileName."<br>";
	endif;

elseif(isset($_GET["revolution"])):
	$folders = explode(",", $_GET["revolution"]);

	foreach($folders as $folder):

		$files = scandir('../html/sliders/revolution-slider/'.$folder);

		echo '<table class="table table-bordered">';
		echo '<thead><tr>';
	    echo '<th>Page</th>';
	    echo '<th>Folder</th>';
	    echo '<th>Output</th>';
	    echo '<th>Status</th>';
	    echo '</tr></thead><tbody>';


	    $pageCount = 0;

	    //Loop pages foreach demo folder

		foreach($files as $file):
			$fileName = substr($file, 0, -4);
			$fileExtension = substr($file, -3);

			if($fileExtension == "php"):
				$pageCount++;

				echo '<tr>';
		        echo '<td scope="row">'.$fileName.'<br></td>';
		        echo '<td>'.$folder.'</td>';
		        echo '<td></td>';

				$html = file_get_contents('http://web.dev/boomerang/html/sliders/revolution-slider/'.$folder.'/'.$file);

				if (!file_exists('../_pack/'.$_GET['c'].'/html/sliders/revolution-slider/'.$folder)) {
				    mkdir('../_pack/'.$_GET['c'].'/html/sliders/revolution-slider/'.$folder);
				}


				if(file_put_contents('../_pack/'.$_GET['c'].'/html/sliders/revolution-slider/'.$folder.'/'.$fileName.'.html', $html)):
					echo '<td class="success">Yes</td>';
				else:
					echo '<td class="warning">No</td>';
				endif;

		        echo '</tr>';
			endif;
		endforeach;

		echo '</tbody></table>';
	endforeach;

elseif(isset($_GET["sliders"])):
	$folders = explode(",", $_GET["sliders"]);

	foreach($folders as $folder):

		$files = scandir('../html/sliders/'.$folder);

		echo '<table class="table table-bordered">';
		echo '<thead><tr>';
	    echo '<th>Page</th>';
	    echo '<th>Folder</th>';
	    echo '<th>Output</th>';
	    echo '<th>Status</th>';
	    echo '</tr></thead><tbody>';


	    $pageCount = 0;

	    //Loop pages foreach demo folder

		foreach($files as $file):
			$fileName = substr($file, 0, -4);
			$fileExtension = substr($file, -3);

			if($fileExtension == "php"):
				$pageCount++;

				echo '<tr>';
		        echo '<td scope="row">'.$fileName.'<br></td>';
		        echo '<td>'.$folder.'</td>';
		        echo '<td></td>';

				$html = file_get_contents('http://web.dev/boomerang/html/sliders/'.$folder.'/'.$file);

				if (!file_exists('../_pack/'.$_GET['c'].'/html/sliders/'.$folder)) {
				    mkdir('../_pack/'.$_GET['c'].'/html/sliders/'.$folder);
				}


				if(file_put_contents('../_pack/'.$_GET['c'].'/html/sliders/'.$folder.'/'.$fileName.'.html', $html)):
					echo '<td class="success">Yes</td>';
				else:
					echo '<td class="warning">No</td>';
				endif;

		        echo '</tr>';
			endif;
		endforeach;

		echo '</tbody></table>';
	endforeach;

else:
	$folders = explode(",", $_GET["d"]);

	foreach($folders as $folder):

		$folder = isset($_GET["sub"]) ? $folder.'/'.$_GET["sub"] : $folder;

		$files = scandir('../html/'.$folder);

		echo '<table class="table table-bordered">';
		echo '<thead><tr>';
	    echo '<th>Page</th>';
	    echo '<th>Folder</th>';
	    echo '<th>Output</th>';
	    echo '<th>Status</th>';
	    echo '</tr></thead><tbody>';


	    $pageCount = 0;

	    //Loop pages foreach demo folder

		foreach($files as $file):
			$fileName = substr($file, 0, -4);
			$fileExtension = substr($file, -3);

			if($fileExtension == "php"):
				$pageCount++;

				echo '<tr>';
		        echo '<td scope="row">'.$fileName.'<br></td>';
		        echo '<td>'.$folder.'</td>';
		        echo '<td></td>';

				$html = file_get_contents('http://web.dev/boomerang/html/'.$folder.'/'.$file);

				if (!file_exists('../_pack/'.$_GET['c'].'/html/'.$folder)) {
				    mkdir('../_pack/'.$_GET['c'].'/html/'.$folder);
				}


				if(file_put_contents('../_pack/'.$_GET['c'].'/html/'.$folder.'/'.$fileName.'.html', $html)):
					echo '<td class="success">Yes</td>';
				else:
					echo '<td class="warning">No</td>';
				endif;

		        echo '</tr>';
			endif;
		endforeach;

		echo '</tbody></table>';
	endforeach;

endif;

?>

		</div>
	</div>
</div>


</body>
</html>
