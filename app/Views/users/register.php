<?php

$form = new Core\HTML\FormBtStrp();
?>

<form method="post">

    <?php echo $form->input('name', 'Full Name', ["type" => "text"]); ?>
    <?php echo $form->input('email', 'Email Address', ["type" => "email"]); ?>
    <?php echo $form->input('pnumber', 'Phone Number', ["type" => "number"]); ?>
    <?php echo $form->input('email', 'Email Address', ["type" => "email"]); ?>
    <?php echo $form->input('address', 'Address', ["type" => "text"]); ?>
    <?php echo $form->input('address2', 'Address 2', ["type" => "text"]); ?>
    <?php echo $form->select('province', 'Province', [
        "QC" => "QC",
        "ON" => "ON",
        "NS" => "NS",
        "NB" => "NB",
        "MB" => "MB",
        "BC" => "BC",
        "PE" => "PE",
        "SK" => "SK",
        "AB" => "AB",
        "NL" => "NL"
    ]); ?>
    <?php echo $form->input('zip', 'Zip Code', ["type" => "text", "maxlength" => 7]); ?>
    <?php echo $form->input('password', 'Password', ["type" => "password"]); ?>
    <?php echo $form->input('chkpassword', 'Confirm Password', ["type" => "password"]); ?>

    <?php echo $form->submit(); ?>
</form>