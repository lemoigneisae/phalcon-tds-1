<div class="ui container" style="margin-top: 100px">



    <?php foreach ($aUser as $user) { ?>
    <?php if ($val == null) { ?>
        <div class="ui error message">
            <div class="header">
                Vous allez supprimer :
            </div>
            <ul class="list">
                <li><?= $user->firstname ?>  <?= $user->lastname ?></li>
            </ul>
        </div>


    <button class="ui labeled icon button">
        <i class="delete icon"></i>
        <?= $this->tag->linkTo(['users/delete/' . $user->getId() . '/k', 'Supprimer']) ?>
    </button>
    <button class="ui labeled icon button">
        <i class="stop icon"></i>
        <?= $this->tag->linkTo(['users/index', 'Retour à la liste']) ?>
    </button>
    <?php } ?>

<?php if ($val != null) { ?>
    <div class="ui success message">
        <div class="header">
            User supprimé !
        </div>
        <ul class="list">
            <li><?= $user->firstname ?>  <?= $user->lastname ?></li>
        </ul>
    </div>
    <button class="ui labeled icon button">
        <i class="stop icon"></i>
        <?= $this->tag->linkTo(['users/index', 'Retour à la liste']) ?>
    </button>
    <?php } ?>
    <?php } ?>
</div>