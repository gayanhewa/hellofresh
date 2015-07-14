<ul>
<?php foreach($data['users'] as $user):?>
    <li><?php echo $user->name;?> - <?php echo $user->email;?></li>
<?php endforeach;?>
</ul>