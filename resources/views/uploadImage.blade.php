@extends('default')
@section('js')
<script>
    function checkFile(){
        if (document.getElementById("image").value == "") {
            e.preventDefault();
            alert("Kies een afbeelding.");
        }
    }
</script>
@endsection
@section('content')
<article class="app_content_article">
    <h2 class="app_content_article_title">Foto uploaden</h2>
    <form method="POST" enctype="multipart/form-data" class="app_content_article_form">
        @csrf     
        <label for="image" class="app_content_article_form_label">Je omgevings foto (max 2MB)</label>      
        <input type="file" name="image" id="image" class="app_content_article_form_input app_content_article_form_input--image" required>       
        <button onclick="checkFile()" type="submit" class="app_content_article_form_button">Upload</button>
    </form>
</article>
@endsection