<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/global.css">
	<title>Upload Files</title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
</head>
<body>

	<center>
		<h3>
			<label class="switch">
				<input type="checkbox" id="togBtn" onclick="myFunction()">
				<div class="slider round">
					<!--ADDED HTML -->
					<span class="on"></span>
					<span class="off"></span>
					<!--END-->
				</div>
			</label>
		</h3>
		<script type="text/javascript">
			
			function myFunction() {
				var chkbox = document.getElementById('togBtn');
				if (chkbox.checked) {
					window.location.assign("uploads/");
				}
				else {
					window.location.assign("../index.php");
				}
			}

		</script>
	</center>
		<hr>
		<form action="includes/uploadfiles.inc.php" method="POST" id="upload" enctype="multipart/form-data">
			<br>
			<fieldset>
				<legend>Select Files</legend>
				<label for="file[]">File Name:</label>
				<input type="file" name="file[]" id="file" required multiple>
				<input type="submit" name="submit" id="submit" value="Upload">
			</fieldset>

			<div id="bar">
				<span id="bar-fill"><span id="bar-fill-text"></span></span>
			</div>

			<div id="uploads">
				Uploaded file links will appear here.
			</div>

			<script src="js/progress.js"></script>
			<script>
				
				document.getElementById('submit').addEventListener('click', function(e) {
					e.preventDefault();

					var f = document.getElementById('file'),
						pb = document.getElementById('bar-fill'),
						pt = document.getElementById('bar-fill-text');

					app.uploader({
						files: f,
						progressBar: pb,
						progressText: pt,
						processor: 'includes/uploadfiles.inc.php',

						finished: function(data) {
							var uploads = document.getElementById('uploads'),
							succeeded = document.createElement('div'),
							failed = document.createElement('div'),

							anchor,
							span,
							x;

							if (data.failed.length) {
								failed.innerHTML = '<p>Unfortunately, the following failed:</p>'
							}

							uploads.innerText = '';

							for (x = 0; x < data.succeeded.length; x=x+1) {
								anchor = document.createElement('a');
								anchor.href = 'uploads/'+data.succeeded[x].name;
								anchor.innerText = data.succeeded[x].name;
								anchor.target = '_blank';
								anchor.style.display = 'block';
								succeeded.appendChild(anchor);
							}

							for (x = 0; x < data.failed.length; x = x + 1) {
								span = document.createElement('span');
								span.innerText = data.failed[x].name;
								failed.appendChild(span);
							}

							uploads.appendChild(succeeded);
							uploads.appendChild(failed);
						},

						error: function() {
							console.log('Not Working');
						}
					});
				});
			</script>

		</form>

</body>
</html>