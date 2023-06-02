@extends('default')
@section('js')
<script>
    window.onload = function(){
        console.log("SOADI")
        if({{$user->id}} != {{$userProfile->id}}){
            var elementsToDelete = ["js-applications", "js-addImage", "js-addAnimal"]
            for (i = 0; i < elementsToDelete.length; i++){
                removeElement(elementsToDelete[i]);
            }
        }
        
        var animals = {!! json_encode($animal->toArray(), JSON_HEX_TAG) !!};
        var animalsToCheck = [];

        
        for (const [key, value] of Object.entries(animals)) {
            console.log(key, value);
            animalsToCheck.push(value);
        }

        for (let i = 0; i < animalsToCheck.length; i++) {
            if({{$user->id}} != animalsToCheck[i]["owner"]){
                var animalCardId = "js-removeButton-" + String(animalsToCheck[i]["animal_id"]);
                var animalCard = document.getElementById(animalCardId);
                if(animalCard != null){
                    animalCard.remove()
                }
            }
        }
    }

    function removeElement(item){
        var element = document.getElementById(item);
        if(element != null){
            element.remove();
        }
    }
</script>
@endsection

@section('content')
<article class="app_content_article">
    <h2 class="app_content_article_title">{{$userProfile->name}}</h2>
    <section class="app_content_article_section">
        <h3 class="app_content_article_section_title">Over mij</h3>
        <a href="/uploadImage" id="js-addImage" class="app_content_article_section_link app_content_article_section_link--add">Voeg afbeelding toe</a>
        <ul class="app_content_article_section_list app_content_article_section_list--middle">
            @foreach($image as $image)
                @include('components.profileImageCard')
            @endforeach
        </ul>
    </section>
    <section id="js-applications" class="app_content_article_section app_content_article_section--application">
        <h3 class="app_content_article_section_title">Inkomende verzoeken</h3>
        <ul class="app_content_article_section_list app_content_article_section_list--middle">
            @foreach($application as $application)
                @include('components.applicationCard')
            @endforeach
        </ul>
    </section>
    <section class="app_content_article_section">
        <h3 class="app_content_article_section_title">Mijn dieren</h3>
        <a href="/apply" id="js-addAnimal" class="app_content_article_section_link app_content_article_section_link--add">Voeg dier toe</a>
        <ul class="app_content_article_section_list app_content_article_section_list--middle">
            @foreach($animal as $animal)
                @include('components.animalCard')
            @endforeach
        </ul>
    </section>
    <section class="app_content_article_section">
        <h3 class="app_content_article_section_title">Mijn recensies</h3>
        <ul class="app_content_article_section_list">
            @foreach($review as $review)
                @include('components.reviewCard')
            @endforeach
        </ul>
       
    </section>
</article>
@endsection