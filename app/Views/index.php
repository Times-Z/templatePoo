<div class="row  justify-content-md-center">
    <form action="" method="post">
        <?= $form->input('login', 'Login', [], 'Login')?>
        <?= $form->password('password', 'password', 'password', false)?>
        <?= $form->submit('submit', 'envoyer')?>
    </form>
</div>