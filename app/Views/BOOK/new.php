<?php
echo <<<HTML
        <form method='post' action='/book'>
            <fieldset>
                <label for="name">ISBN</label>
                <input type="text" name="ISBN" id="ISBN"><br>
                <label for="name">name</label>
                <input type="text" name="name" id="name"><br>
                <label for="name">img</label>
                <input type="text" name="img" id="img"><br>
                <label for="name">writer</label>
                <input type="text" name="writer" id="writer"><br>
                <label for="name">lang</label>
                <input type="text" name="lang" id="lang"><br>
                <label for="name">price</label>
                <input type="text" name="price" id="price"><br>
                <label for="name">publisher_id</label>
                <input type="text" name="publisher_id" id="publisher_id"><br>
                <label for="name">genre_id</label>
                <input type="text" name="genre_id" id="genre_id"><br>
                <hr>
                <button type="submit" name="btn-save">
                    <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/book"><i class="fa fa-cancel">                    
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    HTML;