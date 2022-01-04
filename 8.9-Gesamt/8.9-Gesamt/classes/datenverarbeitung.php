<?php

?>
<form action="datenverarbeitung.php" method="get">
<p>
    <label>Vorname:<br>
    <input type="text" name="vorname" value="">
    </label>
</p>
<p>
<label>Kontakt per:<br>
<input type="radio" name="contact" value="phone"> Telefon<br>
    <input type="radio" name="contact" value="mail" checked> EMail
</label>
</p>
    <p>
        <label>Kontakt per:<br>
            <input type="checkbox" name="phone" value="phone">Telefon<br>
            <input type="checkbox" name="mail" value="mail" checked> EMail
        </label>
    <p><label for="info">Schreiben Sie uns Ihre Meinung:</
        label><br>
        <textarea name="textfield" cols="50" rows="10" id="info">
Ihre Nachricht...
</textarea>
    </p>
</form>