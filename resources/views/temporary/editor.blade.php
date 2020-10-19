<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Balloon editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
</head>
<body>
<h1>Balloon editor</h1>
<div id="editor">
    <p>This is some sample content.</p>
</div>
<script>
  /*  ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );*/

  ClassicEditor
      .create( document.querySelector( '#editor' ), {
          cloudServices: {
              tokenUrl: 'https://example.com/cs-token-endpoint',
              uploadUrl: 'https://your-organization-id.cke-cs.com/easyimage/upload/'
          }
      } )
      .then(  )
      .catch(  );

</script>
</body>
</html>