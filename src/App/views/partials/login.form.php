<form method="POST" action="/login">
    <input type="hidden" name="token" value="<?php echo $data['token']; ?>" />
    <label>Email : <input type="text" name="email" value="<?php echo (isset($_GET['email'])? $_GET['email']:'');?>" placeholder="Email"/></label>
    <label>Password : <input type="password" name="password" value="" placeholder="Password"/></label>
    <input type="submit" value="Login"/>
</form>