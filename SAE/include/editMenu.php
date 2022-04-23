<div class="d-flex edit-menu">
    <div class="add">
        <button id="add"><img src="http://bdd.gestion/SAE/assets/svg/add.svg" alt=""></button>
    </div>
    <div class="update">
        <button id="update"><img src="http://bdd.gestion/SAE/assets/svg/edit.svg" alt=""></button>
    </div>
    <div class="delete">
        <button id="delete"><img src="http://bdd.gestion/SAE/assets/svg/delete.svg" alt=""></button>
    </div>
</div>

<?php
require_once(dirname(__FILE__) . '/modals/addmodal.php');
require_once(dirname(__FILE__) . '/modals/editmodal.php');
require_once(dirname(__FILE__) . '/modals/deletemodal.php');
?>