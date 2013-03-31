
<div class="row">
    <div class="large-12 column">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Company</th>
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        <? foreach ($users as $k => $user) { ?>
        <tr class="<?=($k % 2 == 0) ? 'odd' : 'even'?>">
            <td class="name span8"><?php echo $user['User']['name'];  ?> </td>
            <td>
                <?=$this->Html->link('<i class="icon-pencil"></i> ', '/users/edit/' . $user['User']['id'], array('class' => '', 'escape' => FALSE)); ?>
            </td>
            <td>
                <?=$this->Html->link('<i class="icon-trash"></i> ', '/users/delete/' . $user['User']['id'], array('class' => 'del-btn', 'item_name'=> $user['User']['name'], 'escape' => FALSE)); ?>
            </td>
        </tr>
            <? } ?>
        </tbody>
    </table>
    </div>
</div>

