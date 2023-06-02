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
    </head>
    <body class="banned">
        <h2 class="banned_title">Je bent niet meer welkom op deze website...</h2>
        <form method="POST" action="/logout">
            @csrf
            <x-dropdown-link class="banned_button" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Log uit') }}
            </x-dropdown-link>
        </form>
    </body>
    
</html>