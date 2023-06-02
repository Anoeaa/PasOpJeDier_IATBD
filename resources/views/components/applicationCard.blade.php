<li class="app_content_article_section_list_item app_content_article_section_list_item--profile">
    <h4 class="app_content_article_section_list_item_title">{{$application->applicant_name}} -> {{$application->animal_name}}</h4>
    <a href="/user/{{$application->applicant}}" class="app_content_article_section_list_item_link app_content_article_section_list_item_link--profile app_content_article_section_list_item_link--left">Bekijk profiel</a>
    <a href="/refuseApp/{{$application->application_id}}" class="app_content_article_section_list_item_link app_content_article_section_list_item_link--right app_content_article_section_list_item_link--remove">Weiger</a>
    <a href="/acceptApp/{{$application->application_id}}/{{$application->animal}}" class="app_content_article_section_list_item_link app_content_article_section_list_item_link--right">Accepteer</a>
</li>