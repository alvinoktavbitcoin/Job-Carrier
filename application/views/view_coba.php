<html>
<head>
</head>
<body>
	<?php
		foreach($hasil["data_lowongan"]->result() as $row)
		{
			echo "$row->id";
		}
	
	?>
</body>
</html>