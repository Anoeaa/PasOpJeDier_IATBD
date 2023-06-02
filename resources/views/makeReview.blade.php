@extends('default')
@section('content')
<section class="app_content_article">
    <h2 class="app_content_article_title">Recensie voor {{$userReview->name}}</h2>
       
    <form method="POST" class="app_content_article_form">
        @csrf
        <label for="rating" class="app_content_article_form_label">Score  (0 - 10)*</label>
        <select name="rating" id='rating' class="app_content_article_form_select">
            <option value="0" class="app_content_article_form_select_option">0</option>
            <option value="1" class="app_content_article_form_select_option">1</option>
            <option value="2" class="app_content_article_form_select_option">2</option>
            <option value="3" class="app_content_article_form_select_option">3</option>
            <option value="4" class="app_content_article_form_select_option">4</option>
            <option value="5" class="app_content_article_form_select_option">5</option>
            <option value="6" class="app_content_article_form_select_option">6</option>
            <option value="7" class="app_content_article_form_select_option">7</option>
            <option value="8" class="app_content_article_form_select_option">8</option>
            <option value="9" class="app_content_article_form_select_option">9</option>
            <option value="10" class="app_content_article_form_select_option">10</option>
        </select>
        <label for="comment" class="app_content_article_form_label">Commentaar</label>
        <textarea name="comment" id='comment' class="app_content_article_form_input--comment"></textarea>
        <p class="app_content_article_form_paragraph">Alles met een * is verplicht.</p>

        <input type="hidden" name="reviewed" value="{{$userReview->id}}">
        <button type="submit" class="app_content_article_form_button">Plaats review</button>
        <a  href="/" class="app_content_article_section_link app_content_article_section_link--cancel"> Stop</a>
    </form>

</section>
@endsection