<?php
echo <<<HTML
<form method="post" action="/book">
    <fieldset>
        <label for="ISBN">ISBN</label>
        <input type="number" name="ISBN" id="ISBN"><br>

        <label for="name">name</label>
        <input type="text" pattern=".*\D.*" name="name" id="name"><br>

        <label for="img">img</label>
        <input type="text" name="img" id="img"><br>
        <input type="file" id="filePicker" style="display:none;">

        <div id="drop-area" style="border:2px dashed #ccc; padding:20px; text-align:center; cursor:pointer;">
            <p>Drag & drop a file here, or click to select</p>
        </div>
        <br>
        <label for="writer">writer:</label>
        <select name="writer" id="writer">
HTML;
foreach($writer as $curr){
    echo <<<HTML
        <option value="{$curr['writer']}">{$curr['writer']}</option>
    HTML;
}
echo <<<HTML
        </select><br>

        <label for="lang">lang</label>
        <input type="text" pattern=".*\D.*" name="lang" id="lang"><br>

        <label for="price">price</label>
        <input type="number" name="price" id="price"><br>

        <label for="publisher">publisher</label>
        <input type="text" pattern=".*\D.*" name="publisher" id="publisher"><br>

        <label for="genre">genre</label>
        <input type="text" pattern=".*\D.*" name="genre" id="genre"><br>

        <hr>
        <button type="submit" name="btn-save">
            <i class="fa fa-save"></i>&nbsp;Mentés
        </button>
        <a href="/book"><i class="fa fa-cancel"></i>&nbsp;Mégse</a>
    </fieldset>
</form>
<script src="/js/drag_drop.js" defer></script>
HTML;