<h1>Home Page</h1>
<ul>

    <?php if($data['user'] == false):?>
        <li> <a href="/login"> Login </a></li>
        <li> <a href="/register"> Register </a></li>
    <?php else:?>
        <li> <a href="/logout"> Logout </a></li>
    <?php endif;?>
    <li> <a href="/search"> Search </a></li>

</ul>