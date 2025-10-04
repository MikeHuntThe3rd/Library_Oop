<?php
echo <<<HTML
        <form method='post' action='/book/Sedit'>
            <fieldset>
                <input type="hidden" name="id" value="{$row[0]['currid']}">
                <label for="name">ISBN</label>
                <input type="text" name="ISBN" id="ISBN" value="{$row[0]['ISBN']}"><br>
                <label for="name">name</label>
                <input type="text" name="name" id="name"  value="{$row[0]['name']}"><br>
                <label for="name">img</label>
                <input type="text" name="img" id="img"><br>
                <input type="file" id="filePicker" style="display:none;">
                <div id="drop-area" style="border:2px dashed #ccc; padding:20px; text-align:center; cursor:pointer;">
                    <p>Drag & drop a file here, or click to select</p>
                </div><br>
                <label for="name">writer</label>
                <input type="text" name="writer" id="writer" value="{$row[0]['writer']}"><br>
                <label for="name">lang</label>
                <input type="text" name="lang" id="lang" value="{$row[0]['lang']}"><br>
                <label for="name">price</label>
                <input type="text" name="price" id="price" value="{$row[0]['price']}"><br>
                <label for="name">publisher</label>
                <input type="text" name="publisher" id="publisher" value="{$row[0]['publisher']}"><br>
                <label for="name">genre</label>
                <input type="text" name="genre" id="genre" value="{$row[0]['genre']}"><br>
                <hr>
                <button type="submit" name="btn-save">
                    <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/book"><i class="fa fa-cancel">                    
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    <script src="/js/drag_drop.js" defer></script>
    HTML;