<div class="ui container">
    <div class="ui labeled input">
        <div class="ui label">
            <i class="add user icon"></i>
            Nouvel utilisateur...
        </div>
        <input type="text">
    </div>
<table class="ui sortable striped table">
    <thead>
    <tr>
        <th>
            <div class="ui checkbox">
                <input type="checkbox">
                <label></label>
            </div>
        </th>
        <?php if ($sens == 'desc' && $sField == 'firstname') { ?>
        <th class="sorted descending"><?= $this->tag->linkTo(['users/index/' . $pager->current . '/firstname/asc/', 'Prénom']) ?></th>
        <?php } else { ?>
        <th><?= $this->tag->linkTo(['users/index/' . $pager->current . '/firstname/desc/', 'Prénom']) ?></th>
        <?php } ?>

        <?php if ($sens == 'desc' && $sField == 'lastname') { ?>
            <th class="sorted descending"><?= $this->tag->linkTo(['users/index/' . $pager->current . '/lastname/asc/', 'Nom']) ?></th>
        <?php } else { ?>
            <th><?= $this->tag->linkTo(['users/index/' . $pager->current . '/lastname/desc/', 'Nom']) ?></th>
        <?php } ?>

        <?php if ($sens == 'desc' && $sField == 'login') { ?>
            <th class="sorted descending"><?= $this->tag->linkTo(['users/index/' . $pager->current . '/login/asc/', 'Login']) ?></th>
        <?php } else { ?>
            <th><?= $this->tag->linkTo(['users/index/' . $pager->current . '/login/desc/', 'Login']) ?></th>
        <?php } ?>

        <?php if ($sens == 'desc' && $sField == 'email') { ?>
            <th class="sorted descending"><?= $this->tag->linkTo(['users/index/' . $pager->current . '/email/asc/', 'Email']) ?></th>
        <?php } else { ?>
            <th><?= $this->tag->linkTo(['users/index/' . $pager->current . '/email/desc/', 'Email']) ?></th>
        <?php } ?>

        <?php if ($sens == 'desc' && $sField == 'role') { ?>
            <th class="sorted descending"><?= $this->tag->linkTo(['users/index', 'Role']) ?></th>
        <?php } else { ?>
            <th><?= $this->tag->linkTo(['users/index', 'Role']) ?></th>
        <?php } ?>

        <th></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($pager->items as $user) { ?>
        <tr>
            <td>
                <div class="ui checkbox">
                    <input type="checkbox">
                    <label></label>
                </div>
            </td>
            <td class="selectable"><?= $this->tag->linkTo(['users/show/' . $user->id . '', $user->firstname]) ?></td>
            <td class="selectable"><?= $this->tag->linkTo(['users/show/' . $user->id . '', $user->lastname]) ?></td>
            <td><?= $user->login ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->getRole()->getName() ?></td>
            <td><button class="ui red basic icon button">
                    <i class="edit icon"></i>
                </button>
                <button class="ui icon button">
                    <i class="remove icon"></i>
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
    <tfoot>
    <tr><th colspan="3">
            <div class="ui right floated pagination menu">
                <?= $this->tag->linkTo(['users/index/' . $pager->before . '/' . $sField . '/' . $sens . '/', '<', 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['users/index/' . $pager->before . '/' . $sField . '/' . $sens . '/', $pager->before, 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['users/index/' . $pager->current . '/' . $sField . '/' . $sens . '/', $pager->current, 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['users/index/' . $pager->next . '/' . $sField . '/' . $sens . '/', $pager->next, 'class' => 'item']) ?>
                <?= $this->tag->linkTo(['users/index/' . $pager->next . '/' . $sField . '/' . $sens . '/', '>', 'class' => 'item']) ?>
            </div>
        </th>
    </tr></tfoot>
</table>
</div>