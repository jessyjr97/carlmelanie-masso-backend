<?php
$titre = 'Report-Problem';
ob_start(); ?>
<section class="contact py-lg-4 py-md-3 py-sm-3 py-3">
    <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
        <h3 class="title text-center mb-md-4 mb-sm-3 mb-3 mb-2"><?php echo localize($titre) ?></h3>
        <span>Le courriel a été envoyé aux administrateurs. Merci.</span>
    </div></section>
<?php $contenu = ob_get_clean();
$onHomePage = false;
require 'gabarit.php'; ?>
