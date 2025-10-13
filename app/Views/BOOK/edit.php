<?php
echo <<<HTML
        <form method='post' action='/book/Sedit'>
            <fieldset>
                <input type="hidden" name="id" value="{$row['currid']}">

                <label for="ISBN">ISBN</label>
                <input type="number" name="ISBN" id="ISBN" value="{$row['ISBN']}"><br>

                <label for="name">Name</label>
                <input type="text" pattern=".*\D.*" name="name" id="name" value="{$row['name']}"><br>

                <label for="img">Img</label>
                <input type="text" name="img" id="img"><br>

                <input type="file" id="filePicker" style="display:none;">
                <div id="drop-area" style="border:2px dashed #ccc; padding:20px; text-align:center; cursor:pointer;">
                    <p>Drag & drop a file here, or click to select</p>
                </div><br>

                <label for="writer">writer:</label>
                <select name="writer" id="writer">
HTML;
foreach($row["writers"] as $curr){
    echo <<<HTML
        <option value="{$curr['writer']}">{$curr['writer']}</option>
    HTML;
}
echo <<<HTML
                </select><br>

                <label for="lang">Lang</label>
                <input type="text" pattern=".*\D.*" name="lang" id="lang" value="{$row['lang']}"><br>

                <label for="price">Price</label>
                <input type="number" name="price" id="price" value="{$row['price']}"><br>

                <label for="publisher">Publisher</label>
                <input type="text" pattern=".*\D.*" name="publisher" id="publisher" value="{$row['publisher']}"><br>

                <label for="genre">Genre</label>
                <input type="text" pattern=".*\D.*" name="genre" id="genre" value="{$row['genre']}"><br>

                <hr>

                <button type="submit" name="btn-save">
                    <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/book">
                    <i class="fa fa-cancel"></i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    <script src="/js/drag_drop.js" defer></script>
    HTML;