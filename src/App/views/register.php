<h1> Registration Page </h1>
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/login">Login</a></li>
</ul>
<ul>
    <?php foreach($data['error_messages'] as $error) :?>
        <li><?php echo $error;?></li>
    <?php endforeach;?>
</ul>
<?php $data['view.partials']->partial('register.form', array('token'=>$data['token']));?>