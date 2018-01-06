<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="simplemde/debug/simplemde.css" rel="stylesheet" type="text/css">
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="form-group">
			<textarea name="field" id="fieldTest" cols="30" rows="10"># aaa</textarea>
        </div><br>
		<div id="m2h" class="form-group">
		</div>
    </body>

	<script src="simplemde/debug/simplemde.js"></script>
	<script>
		 var simplemde = new SimpleMDE({
        element: document.getElementById("fieldTest"),
        autoDownloadFontAwesome: false,
        status: false,
    });
	
		var testPlain = simplemde.value();
		var testMarkdown = simplemde.markdown(testPlain);
		var d = document.getElementById('m2h');
		d.innerHTML = testMarkdown;
	</script>
</html>
