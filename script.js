<script src="js/progress.js"></script>
			<script type="text/javascript">
				
				document.getElementById('submit').addEventListener('click', function(e) {
					e.preventDefault();

					var f = document.getElementById('file'),
					pb = document.getElementById('bar-fill');
					pt = document.getElementById('bar-fill-text');

					app.uploader({
						files: f,
						progressBar: pb,
						progressText: pt,
						processor: 'fileupload.php',

						finished: function(data) {
							console.log(data);
						},

						error: function() {
							console.log('Not Working');
						}
					});
				});
				
			</script>

<script type="text/javascript">

		function element(e1) {
			return document.getElementById('e1');
		}
		
		function uploadFile() {
			var fileinput = document.getElementById('file1');
			var formdata = new FormData();
			for (var i = 0; i < fileinput.files.length; i++) {
				formdata.append("allfile[]", fileinput.files[i]);
			}
			var ajax = new XMLHttpRequest();
			ajax.upload.addEventListener("progress", progressHandler, false);
			ajax.open("POST", "fileupload.php");
			ajax.send(formdata);
		}

		function progressHandler(event) {
			var percent = Math.round(event.loaded/event.total)*100;
			element("bar-fill").style.width= percent+'%';
			element("bar-fill-text").inner.text = percent+'%';
		}

	</script>