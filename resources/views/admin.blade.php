@extends('default')
@section('js')
<script>
    window.onload = function(){
        var entries = document.getElementsByClassName("adminRemove")
        for (i = 0; i < entries.length; i++){
            var animalId = entries[i].id[entries[i].id.length - 1]
            entries[i].href = "/adminRemove/" + String(animalId)
        }
    }
    
</script>
@endsection
@section('content')
<article class="app_content_article">
    <h2 class="app_content_article_title">Admin scherm</h2>
    <section class="app_content_article_section app_content_article_section--ban">
        <h3 class="app_content_article_section_title">Verbied iemand toegang</h3>
        <form class="app_content_article_section_form" method="POST">
            @csrf
            <label class="app_content_article_section_form_label" for="user">Naam gebruiker:</label>
            <input class="app_content_article_section_form_input" type="text" name="user" id="user" required>
            <button class="app_content_article_section_form_button" type="submit">Verban</button>
        </form>
    </section>
    <section class="app_content_article_section">
        <h3 class="app_content_article_section_title">Alle oppasaanvragen</h3>
        <ul class="app_content_article_section_list app_content_article_section_list--middle">
            @foreach($animal as $animal)
                @include('components.animalCard')
            @endforeach
        </ul>
    </section>
</article>
@endsection
