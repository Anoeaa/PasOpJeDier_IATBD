@extends('default')
@section('content')
@section('js')
<script>
    window.onload = function(){
        var animals = {!! json_encode($animal->toArray(), JSON_HEX_TAG) !!};
        for (let i = 0; i < animals.length; i++) {
            if({{$user->id}} != animals[i]["owner"]){
                var animalCardId = "js-removeButton-" + String(animals[i]["animal_id"]);
                var animalCard = document.getElementById(animalCardId);
                if(animalCard != null){
                    animalCard.remove()
                }
            }
        }
    }

    function filter(kind, value){
        var ul, li
        ul = document.getElementById("js-animals");
        li = ul.getElementsByTagName('li');

        switch(kind){
            case "location":
                var input, filter, h4, i, txtValue;
                input = document.getElementById('js-search');
                filter = input.value.toUpperCase();
                for (i = 0; i < li.length; i++) {
                    h4 = li[i].getElementsByClassName("location")[0];
                    txtValue = h4.textContent || h4.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        if(li[i].id != "breed-hidden"){
                            li[i].id = ""
                            li[i].style.display = "";
                        }
                    } else {
                        if(li[i].id != "breed-hidden"){
                            li[i].id = "location-hidden"
                            li[i].style.display = "none";
                        }
                    }
                }
                break;
            
            case "breed":
                var element = document.getElementById("js-" + value);
                var hideElement = element.checked;
                for (i = 0; i < li.length; i++) {
                    var breed = li[i].getElementsByClassName("breed")[0].innerHTML
                    if(breed == value){
                        if(!hideElement){
                            if(li[i].id != "location-hidden"){
                                li[i].id = "breed-hidden"
                                li[i].style.display = "none";
                            }
                        } else {
                            if(li[i].id != "location-hidden"){
                                li[i].id = ""
                                li[i].style.display = "";
                            }
                            
                        }
                    }
                }
                break;
        }
        
    }
</script>    
@endsection
<article class="app_content_article">
    <section class="app_content_article_section app_content_article_section--filter">
        <h2 class="app_content_article_section_title">Overzicht</h2>
        <input class="app_content_article_section_input" type='text' id='js-search' onkeyup='filter("location", "none")' placeholder='zoek locatie'/>
        <ul class="app_content_article_section_list">
            @foreach($breed as $breed)
                @include('components.filterCheckbox')
            @endforeach
        </ul>
        
    </section>
    
    <section class="app_content_article_section app_content_article_section--animals">
        <h2 class="app_content_article_section_title">Dieren</h2>
        <a class="app_content_article_section_link" href="/apply" id="js-addAnimal">Voeg dier toe</a>
        
        <ul class="app_content_article_section_list  app_content_article_section_list--middle" id="js-animals">
            @foreach($animal as $animal)
                @include('components.animalCard')
            @endforeach
        </ul>
    </section>
</article>
    
@endsection