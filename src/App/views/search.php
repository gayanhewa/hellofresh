<h1> Search Page </h1>
<ul>
    <li><a href="/">Home</a></li>
    <?php if ($data['user'] !== false):?>
        <li><a href="/logout">Logout</a></li>
    <?php endif;?>
</ul>

<?php if ($data['user'] == false):?>
    <h3> Please Login to search </h3>
<?php $data['view.partials']->partial('login.form', array('token'=>$data['token']));?>
<?php else:?>
    Welcome, <?php echo $data['user']->name;?>!
    <?php $data['view.partials']->partial('search.form', array('token'=>$data['token']));?>

    <?php if(isset($data['users'])):?>
        <?php $data['view.partials']->partial('search.result', array('users' => $data['users']));?>
    <?php endif;?>

<?php endif;?>