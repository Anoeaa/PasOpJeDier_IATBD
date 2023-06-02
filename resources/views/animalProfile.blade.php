@extends('default')
@section('js')
<script>
    window.onload = function(){
        if({{$user->id}} == {{$animal->owner}}){
            applyButton = document.getElementById("js-applyButton");
            if(applyButton != null){
                applyButton.remove();
            }
           
        } else if({{$user->id}} != {{$animal->owner}}){
            removeButton = document.getElementById("js-removeButton");
            if(removeButton != null){
                removeButton.remove();
            }
        }
    }
</script>
@endsection
@section('content')
<article class="app_content_article">
    <h2 class="app_content_article_title">{{$animal->name}}</h2>
    <figure class="app_content_article_section_list_item_figure">
        <img class="app_content_article_section_list_item_figure_img" src="\storage\images\{{$animal->image}}" alt="Foto van het dier">
    </figure>
    <h3 class="app_content_article_title--animal">{{$animal->breed}}, {{$animal->age}} Jaar oud</h3>
    <h3 class="app_content_article_title--animal">Woont in {{$animal->location}}</h3>
    <h3 class="app_content_article_title--animal app_content_article_title--animal--price">€{{$animal->salary}}</h3>
    <h4 class="app_content_article_title--animal">Van {{$animal->start_date}} {{$animal->from_time}}</h4>
    <h4 class="app_content_article_title--animal">Tot {{$animal->end_date}} {{$animal->to_time}}</h4>
    <h5 class="app_content_article_title--animal app_content_article_title--animal--info">Extra Info</h5>
    <p class="app_content_article_comment">{{$animal->comment}}</p>
    <a href="/removeAnimal/{{$animal->animal_id}}" id="js-removeButton" class="app_content_article_button">Verwijder verzoek</a>
    <section class="app_content_article_form" id="js-applyButton">
        <form method="POST">
            @csrf
            <input type="hidden" name="animal" value={{$animal->animal_id}}>
            <input type="hidden" name="animal_name" value={{$animal->name}}>
            <input type="hidden" name="owner" value={{$animal->owner}}>
            <button  class="app_content_article_form_button " type="submit">Ik wil oppassen!</button>
        </form>
    </section>
</article>
@endsection