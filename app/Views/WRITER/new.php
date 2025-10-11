<?php
echo <<<HTML
<form method="post" action="/writer">
    <fieldset>
        <label for="writer">writer</label>
        <input type="writer" pattern=".*\D.*" name="writer" id="writer"><br>

        <label for="bio">bio</label>
        <input type="text" pattern=".*\D.*" name="bio" id="bio"><br>

        <hr>
        <button type="submit" name="btn-save">
            <i class="fa fa-save"></i>&nbsp;Mentés
        </button>
        <a href="/book"><i class="fa fa-cancel"></i>&nbsp;Mégse</a>
    </fieldset>
</form>
HTML;
