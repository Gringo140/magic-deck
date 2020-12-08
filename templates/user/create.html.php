<?php

include __DIR__ . "/../header2.html.php";
?>

<div class="container">
    <div class="row">
        <h1 align="center" class="z-depth-5 col s12"><?= $title ?></h1>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="row">

                <div class="input-field col s6">
                    <i class="small material-icons">email</i>

                    <input value="<?= filter_var($user->getEmail(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                           placeholder="eMail" id="email" type="email" name="email"
                           class="validate <?= array_key_exists("email", $errorList) ? "invalid" : ""?>">

                    <?php if (array_key_exists("email", $errorList)) :?>
                    <span class="helper-text" data-error="Email must be valid and no existing"
                          data-success="">Email</span>
                    <?php endif ?>

                </div>

            </div>

            <div class="input-field col s6">
                <i class="small material-icons">https</i>

                <input value="<?= filter_var($user->getPassword(), FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?>"
                       placeholder="Password" id="password" type="password" name="password"
                       class="validate <?= array_key_exists("password", $errorList) ? "invalid" : ""?>">

                <?php if (array_key_exists("password", $errorList)) :?>
                    <span class="helper-text" data-error="Password must be valid"
                          data-success="">Password</span>
                <?php endif ?>

            </div>
            <div class="input-field col s6">
                <i class="small material-icons">https</i>

                <input placeholder="Confirm Password" id="confirm" type="password" name="confirm"
                       class="validate <?= array_key_exists("confirm", $errorList) ? "invalid" : ""?>">

                <?php if (array_key_exists("confirm", $errorList)) :?>
                    <span class="helper-text" data-error="Passwords are not matching"
                          data-success="">Confirm</span>
                <?php endif ?>

            </div>

            <div class="input-field col s6">
                <i class="small material-icons">folder_shared</i>
                <i class="small material-icons">done_all</i>
                <i class="material-icons right">keyboard_tab</i>

                <input class="btn waves-effect waves-light col s12" id="color1" type="submit" name="user-create"
                       value="Enter the arena...">
                <div class="progress">
                    <div class="indeterminate" id="progress1"></div>
                </div>
                <br>
            </div>
        </div>
</div>
</form>
</div>

<?php
include __DIR__ . "/../footer.html.php";
?>
