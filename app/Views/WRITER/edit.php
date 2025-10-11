<?php
var_dump($row);
echo <<<HTML
        <form method='post' action="/writer/Sedit">
            <fieldset>
                <input type="hidden" name="id" value="{$row['id']}">
                <label for="writer">publisher</label>
                <input type="text" pattern=".*\D.*" name="writer" id="publisher" value="{$row['writer']}"><br>
                <label for="bio">genre</label>
                <input type="text" pattern=".*\D.*" name="bio" id="genre" value="{$row['bio']}"><br>
                <hr>
                <button type="submit" name="btn-save">
                    <i class="fa fa-save"></i>&nbsp;Mentés
                </button>
                <a href="/writer"><i class="fa fa-cancel">                    
                    </i>&nbsp;Mégse
                </a>
            </fieldset>
        </form>
    <script src="/js/drag_drop.js" defer></script>
    HTML;