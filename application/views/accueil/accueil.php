<div class="header">
    <i></i>
    <canvas id="spiders" class="hidden-xs" width="1280" height="451"></canvas>

    <section id="head-panel">
        <h2 class="title-main">Trouvez un musicien près de chez vous !</h2>
        <label>Vous recherchez un groupe ?</label>&nbsp;<label>Vous recherchez un musicien ?</label>
        <form class="pure-form pure-form-stacked" id="inscriptionMusicien" type="POST" action="<?php echo base_url('utilisateurs/inscription'); ?>"> <!-- Changer l'ID lors du switch -->
            <fieldset>

                <label for="PRENOM">Prénom : *</label>
                <input id="PRENOM" type="text" placeholder="Prénom">

                <label for="NOM">Nom : *</label>
                <input id="NOM" type="text" placeholder="Nom">

                <label for="ADRESSE_EMAIL">Adresse Email : *</label>
                <input id="ADRESSE_EMAIL" type="email" placeholder="Adresse email">

                <label for="NUMERO_DE_TELEPHONE">Numéro de téléphone :</label>
                <input id="NUMERO_DE_TELEPHONE" type="text" placeholder="Numéro de téléphone">

                <label for="CODE_POSTAL">Code Postal : *</label>
                <input id="CODE_POSTAL" type="number" placeholder="Code postal" maxlength="5">

                <label for="VILLE">Ville : *</label>
                <input id="VILLE" type="text" placeholder="Ville">

                <label for="MOT_DE_PASSE">Mot de passe : *</label>
                <input id="MOT_DE_PASSE" type="password" placeholder="Mot de passe">

                <label for="MOT_DE_PASSE_CONFIRMATION">Confirmation ; *</label>
                <input id="MOT_DE_PASSE_CONFIRMATION" type="password" placeholder="Confirmation du mot de passe">

                <input type="hidden" name="TYPE_MUSICIEN" value="MUSICIEN" />

                <label class="italic">Les champs marqués par un astérix sont obligatoires.</label><br />

                <button type="submit" class="pure-button">S'inscrire</button>
            </fieldset>
        </form>
    </section>
</div> 