<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VOICE.TEXT</title>

    <!-- Styles -->
    <!-- <link href="css/destyle.css" rel="stylesheet"> -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

  </head>
  <body>
    <h1>VOICE.TEXT</h1>
    <div id="app">
      <web-speech-api-component></web-speech-api-component>

      <!-- <textarea id="textarea" rows=10 cols=80></textarea>
      <button id="button" onclick="toggleStartStop()"></button> -->

    </div>

    <!-- <script type="text/javascript" src="js/recognition.js"></script> -->

    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>