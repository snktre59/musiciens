<div class="header">
    <i></i>
    <canvas id="spiders" class="hidden-xs" width="1280" height="451"></canvas>

    <section id="CONNEXION">
        <h2 class="title-main">Déjà Inscrit ? Connectez-vous</h2>
        <?php $attributs = array('id' => 'FORMULAIRE_CONNEXION_MUSICIEN', 'class' => 'pure-form pure-form-stacked'); ?>
        <?php echo form_open("utilisateurs/connexion", $attributs); ?><!-- Changer l'ID lors du switch -->
            <fieldset>
                <label for="ADRESSE_EMAIL_CONNEXION">Adresse Email : *</label>
                <input id="ADRESSE_EMAIL_CONNEXION" type="email" name="ADRESSE_EMAIL_CONNEXION" placeholder="Adresse email" value="<?php echo set_value('ADRESSE_EMAIL_CONNEXION'); ?>">
                <?php echo form_error('ADRESSE_EMAIL_CONNEXION'); ?>

                <label for="MOT_DE_PASSE_CONNEXION">Mot de passe : *</label>
                <input id="MOT_DE_PASSE_CONNEXION" type="password" name="MOT_DE_PASSE_CONNEXION" placeholder="Mot de passe" value="<?php echo set_value('MOT_DE_PASSE_CONNEXION'); ?>">
                <?php echo form_error('MOT_DE_PASSE_CONNEXION'); ?>

                <label class="italic">Les champs marqués par un astérix sont obligatoires.</label>

                <label class="italic"><a href="<?php echo base_url('utilisateurs/mot_de_passe_oublie'); ?>">Mot de passe oublié ?</a></label><br />

                <button type="submit" class="pure-button">Connexion</button>
            </fieldset>
        <?php echo form_close(); ?>
    </section>

    <section id="INSCRIPTION">
        <h2 class="title-main">Trouvez un musicien près de chez vous !</h2>
        <label>Vous recherchez un groupe ?</label>&nbsp;<label>Vous recherchez un musicien ?</label>
        <?php $attributs = array('id' => 'FORMULAIRE_INSCRIPTION_MUSICIEN', 'class' => 'pure-form pure-form-stacked'); ?>
        <?php echo form_open("utilisateurs/inscription", $attributs); ?><!-- Changer l'ID lors du switch -->
            <fieldset>

                <label for="PRENOM">Prénom : *</label>
                <input id="PRENOM" type="text" name="PRENOM" placeholder="Prénom" value="<?php echo set_value('PRENOM'); ?>">
                <?php echo form_error('PRENOM'); ?>

                <label for="NOM">Nom : *</label>
                <input id="NOM" type="text" name="NOM" placeholder="Nom" value="<?php echo set_value('NOM'); ?>">
                <?php echo form_error('NOM'); ?>

                <label for="ADRESSE_EMAIL">Adresse Email : *</label>
                <input id="ADRESSE_EMAIL" type="email" name="ADRESSE_EMAIL" placeholder="Adresse email" value="<?php echo set_value('ADRESSE_EMAIL'); ?>">
                <?php echo form_error('ADRESSE_EMAIL'); ?>

                <label for="NUMERO_DE_TELEPHONE">Numéro de téléphone :</label>
                <input id="NUMERO_DE_TELEPHONE" type="text" name="NUMERO_DE_TELEPHONE" placeholder="Numéro de téléphone" value="<?php echo set_value('NUMERO_DE_TELEPHONE'); ?>">
                <?php echo form_error('NUMERO_DE_TELEPHONE'); ?>

                <label for="CODE_POSTAL">Code Postal : *</label>
                <input id="CODE_POSTAL" type="number" name="CODE_POSTAL" placeholder="Code postal" maxlength="5" value="<?php echo set_value('CODE_POSTAL'); ?>">
                <?php echo form_error('CODE_POSTAL'); ?>

                <label for="VILLE">Ville : *</label>
                <input id="VILLE" type="text" name="VILLE" placeholder="Ville" value="<?php echo set_value('VILLE'); ?>">
                <?php echo form_error('VILLE'); ?>

                <label for="MOT_DE_PASSE">Mot de passe : *</label>
                <input id="MOT_DE_PASSE" type="password" name="MOT_DE_PASSE" placeholder="Mot de passe" value="<?php echo set_value('MOT_DE_PASSE'); ?>">
                <?php echo form_error('MOT_DE_PASSE'); ?>

                <label for="MOT_DE_PASSE_CONFIRMATION">Confirmation ; *</label>
                <input id="MOT_DE_PASSE_CONFIRMATION" type="password" name="MOT_DE_PASSE_CONFIRMATION" placeholder="Confirmation du mot de passe" value="<?php echo set_value('MOT_DE_PASSE_CONFIRMATION'); ?>">
                <?php echo form_error('MOT_DE_PASSE_CONFIRMATION'); ?>

                <input type="hidden" name="TYPE_UTILISATEUR" value="MUSICIEN" />

                <label class="italic">Les champs marqués par un astérix sont obligatoires.</label><br />

                <button type="submit" class="pure-button">S'inscrire</button>
            </fieldset>
        <?php echo form_close(); ?>
    </section>
</div> 