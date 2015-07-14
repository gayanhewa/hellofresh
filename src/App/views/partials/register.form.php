<form method="POST" action="/register">
    <input type="hidden" name="token" value="<?php echo $data['token']; ?>" />
    <label>Name : <input type="text" name="name" value="<?php echo (isset($_GET['name']) ? $_GET['name']: '');?>" placeholder="Name"/></label>
    <label>Email : <input type="text" name="email" value="<?php echo (isset($_GET['email']) ? $_GET['email']: '');?>" placeholder="Email"/></label>
    <label>Password : <input type="password" name="password" value="" placeholder="Password"/></label>
    <label>Re-Password : <input type="password" name="password_conf" value="" placeholder="Re-enter Password"/></label>
    <input type="submit" value="Login"/>
</form>