<div class="d-flex edit-menu">
    <div class="add" title="ajouter">
        <button id="add"><img src="http://bdd.gestion/SAE/assets/svg/add.svg" alt=""></button>
    </div>
    <div class="update" title="modifier">
        <button id="update"><img src="http://bdd.gestion/SAE/assets/svg/edit.svg" alt=""></button>
    </div>
    <div class="delete" title="supprimer">
        <button id="delete"><img src="http://bdd.gestion/SAE/assets/svg/delete.svg" alt=""></button>
    </div>
</div>

<?php
require_once(dirname(__FILE__) . '/modals/addmodal.php');
require_once(dirname(__FILE__) . '/modals/editmodal.php');
require_once(dirname(__FILE__) . '/modals/deletemodal.php');
?>