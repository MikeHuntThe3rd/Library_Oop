<?php
echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <link rel="stylesheet" href="../css/writer_edit.css"/>
</head>
<body>
HTML;
echo <<<HTML
<form method="post" action="/writer">
    <fieldset>
    <h1>
        Új író hozzáadása
    </h1>
        <label for="writer">writer</label>
        <input type="writer" pattern=".*\D.*" name="writer" id="writer"><br>

        <label for="bio">bio</label>
        <input type="text" pattern=".*\D.*" name="bio" id="bio"><br>

        <hr>
        <button type="submit" name="btn-save">
            <i class="fa fa-save"></i>&nbsp;Mentés
        </button>
        <a href="/writer"><i class="fa fa-cancel"></i>&nbsp;Mégse</a>
    </fieldset>
</form>
HTML;
