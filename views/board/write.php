<?php require_once dirname(__DIR__) . '/layouts/header.php' ?>

<main id="main" role="main">
    <div id="main__form-board" class="uk-padding uk-position-fixed uk-position-center">
        <form action ="/board/write_process.php" method="post">
            <input type="hidden" name="token" value="<?=$token?>">
            <input type="text" name="title" placeholder="Title" class="uk-input">
            <textarea name="content" placeholder="Content" class="uk-textarea uk-height-small" id="editor"></textarea>
            <input type="submit" value="submit" class="uk-button uk-button-default uk-width-1-1">
        </form>
    </div>
</main>

<?php require_once dirname(__DIR__) . '/layouts/footer.php' ?>
