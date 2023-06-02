<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PasOpJeDier</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link rel="stylesheet" href="/css/main.css">
        @yield('js')
        <script>        
            var menuOpen = false;

            function toggleMenu(){
                var menuWidth = document.getElementById("js-menu")
                var menuIcon = document.getElementById("js-menu-icon")

                if(!menuOpen){
                    menuWidth.style.width = "60%";
                    menuIcon.innerHTML = "&#9932;";
                } else {
                    menuWidth.style.width = "0";
                    menuIcon.innerHTML = "&#9776;";
                }
                menuOpen = !menuOpen
            }
        </script>
    </head>
    <body class="app">
        <header class="app_header">
            <section class="app_header_section">
            <h1 class="app_header_title">PasOpJeDier</h1>
            <button id="js-menu-icon" onclick="toggleMenu()" class="app_header_button">&#9776;</button>

            <nav class="app_header_nav" id="js-menu">
                <ul class="app_header_nav_list">
                    <li class="app_header_nav_list_item"><a class="app_header_nav_list_item_link" href="/">Overzicht</a></li>
                    <li class="app_header_nav_list_item"><a class="app_header_nav_list_item_link" href="/user/{{$user->id}}">Mijn Profiel</a></li>
                    <li class="app_header_nav_list_item">
                        <form method="POST" action="/logout">
                            @csrf
                            <x-dropdown-link class="app_header_nav_list_item_link app_header_nav_list_item_link--logout" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log uit') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                 </ul>
            </nav>
            </section>
        </header>

        <main class="app_content">
            @yield('content')
        </main>
     </body>
</html>