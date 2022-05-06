<?php
if (!empty($_SESSION)) {
    $id = $_SESSION['id'];
    $todayDate = date("Y-m-d");

    // obtenir la date du jour non concaténée sous forme d'entier
    $todayDay = date('d');
    $todayDay = intval($todayDay);

    $todayMonth = date('m');
    $todayMonth = intval($todayMonth);

    $todayYear = date('Y');
    $todayYear = intval($todayYear);

    $yearAgo = $todayYear - 1  . "-" . $todayMonth . "-" . $todayDay;

    $verifCotAdh = $bdd->prepare("SELECT COUNT(adherent.id) FROM adherent, cotiser WHERE adherent.id = cotiser.id AND adherent.id = '$id' AND cotiser.date_cotise BETWEEN '$yearAgo' AND '$todayDate'");
    $verifCotAdh->execute();
    $verifCot = $verifCotAdh->fetch();

    if ($verifCot['0'] != '0') {
        $_SESSION['isCot'] = true;
    } else {
        $_SESSION['isCot'] = false;
    }
}
