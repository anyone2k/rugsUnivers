<?php

$form = new Core\HTML\FormBtStrp();
?>

<form method="post">

    <?php echo $form->input('email', 'Email Address', ['type' => 'email']); ?>

    <?php echo $form->input('password', 'Password', ['type' => 'password']); ?>


    <?php echo $form->submit(); ?>
</form>