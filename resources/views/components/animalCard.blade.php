<li class="app_content_article_section_list_item app_content_article_section_list_item--animal">
    <figure class="app_content_article_section_list_item_figure">
        <img class="app_content_article_section_list_item_figure_img" src="\storage\images\{{$animal->image}}" alt="Foto van het dier">
    </figure>
    <section class="app_content_article_section_list_item_section--animal">
    <h3 class="app_content_article_section_list_item_name">{{$animal->name}}</h3>
    <h4 class="app_content_article_section_list_item_breed breed">{{$animal->breed}}</h4>
    <h4 class="app_content_article_section_list_item_age">{{$animal->age}} jaar</h4>
    <h4 class="app_content_article_section_list_item_location location">{{$animal->location}}</h4>
    <h5 class="app_content_article_section_list_item_date">Van {{$animal->start_date}} {{$animal->from_time}}</h5>
    <h5 class="app_content_article_section_list_item_date">Tot {{$animal->end_date}} {{$animal->to_time}}</h5>
    <h6 class="app_content_article_section_list_item_salary">€{{$animal->salary}}</h6>
    </section>
    <a class="app_content_article_section_list_item_link" href="/animal/{{$animal->animal_id}}">Bekijk</a>
    <a class="app_content_article_section_list_item_link app_content_article_section_list_item_link--remove adminRemove" href="/removeAnimal/{{$animal->animal_id}}" id="js-removeButton-{{$animal->animal_id}}">Verwijder verzoek</a>
</li>