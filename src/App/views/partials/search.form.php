<form method="POST" action="/search">
    <input type="hidden" name="token" value="<?php echo $data['token']; ?>" />
    <label>Search : <input type="text" name="search" value="<?php echo isset($_GET['search'])? $_GET['search']: '';?>" placeholder="Search"/></label>
    <input type="submit" value="Search"/>
</form>