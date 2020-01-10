<?php require_once dirname(__DIR__) . '/layouts/header.php' ?>

<main id="main" role="main">
    <div id="main__form" class="uk-padding uk-position-fixed uk-position-center">
        <form action="/auth/login_process.php" method="post">
            <input type="hidden" name="token" value="<?=$token?>">
            <input type="text" name="email" placeholder="Email" class="uk-input">
            <input type="password" name="password" placeholder="Password" class="uk-input">
            <input type="submit" value="Submit" class="uk-button uk-button-default uk-width-1-1">
        </form>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/layouts/footer.php' ?>
