<?php
include_once('include/head.php');
include_once('include/sidenav.php');
?>
<div class="container">
    <div class="content">
        <h1>Afficher la table</h1>
        <?php
        require_once('controllers/afficheTable.php');
        ?>
    </div>
</div>
<?php
include_once('include/footer.php');
