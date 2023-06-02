@extends('default')
@section('js')
<script>

</script>
@endsection
@section('content')
<article class="app_content_article">
    <section>
        <h2>Dier toevoegen</h2>
        <form method='POST' enctype="multipart/form-data" class='app_content_article_form'>
            @csrf
            <label for='name' class='app_content_article_form_label'>Naam dier*</label>
            <input name='name' id='name' type='text' class='app_content_article_form_input'/>

            <label for='age' class='app_content_article_form_label' >Leeftijd dier*</label>
            <input name='age' id='age' type='number' min='0' max='150' class='app_content_article_form_input app_content_article_form_input--number'  required/>
            
            <label for='breed' class='app_content_article_form_label' >Soort dier*</label>
            <select name='breed' id='breed' class='app_content_article_form_select' >
                @foreach($breed as $breed)
                    @include('components.species--option')
                @endforeach
            </select>

            <label for='location' class='app_content_article_form_label' >Woonplaats*</label>
            <input name='location' id='location' type='text' class='app_content_article_form_input' required/>

            <label for='salary' class='app_content_article_form_label' >Salaris*</label>
            <input name='salary' id='salary' type='number' min='1' class='app_content_article_form_input app_content_article_form_input--number' required/>

            <label for='start_date' class='app_content_article_form_label' >begindatum*</label>
            <input name='start_date' id='start_date' type='date' class='app_content_article_form_input app_content_article_form_input--date' required/>

            <label for='from_time' class='app_content_article_form_label' >begintijd</label>
            <input name='from_time' id='from_time' type='time' class='app_content_article_form_input app_content_article_form_input--time' />

            <label for='end_date' class='app_content_article_form_label' >einddatum*</label>
            <input name='end_date' id='end_date' type='date' class='app_content_article_form_input app_content_article_form_input--date' required/>

            <label for='to_time' class='app_content_article_form_label' >eindtijd</label>
            <input name='to_time' id='to_time' type='time' class='app_content_article_form_input app_content_article_form_input--time' />

            <label for='comment' class='app_content_article_form_label' >Commentaar (max 2000 karakters)</label>
            <textarea name='comment' id='comment' maxlength='2000' class='app_content_article_form_input app_content_article_form_input--comment' ></textarea>

            <label for='image' class='app_content_article_form_label' >Afbeelding*</label>
            <input type="file" name="image" id="image" class='app_content_article_form_input app_content_article_form_input--image' required> 

            <p class='app_content_article_form_paragraph'>Alles met een * is verplicht.</p>

            <button type='submit' class='app_content_article_form_button' >Plaats verzoek</button>
        </form>
    </section>
</article>
@endsection