<h1> Login Page </h1>
<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/register">Register</a></li>
</ul>
<ul>
<?php foreach($data['error_messages'] as $error) :?>
    <li><?php echo $error;?></li>
<?php endforeach;?>
</ul>
<?php $data['view.partials']->partial('login.form', array('token'=>$data['token']));?>