
<div id="menu">
    <div id="menuBorder">
        <a href="../wall/show" class="noStyleLinks"><div class="menuItems">
            <p class="menuItemText">Wall</p>
        </div></a>
        <a href="../user/show" class="noStyleLinks"><div class="menuItems">
            <p class="menuItemText">Profile</p>
        </div></a>
        <div class="menuItemsSearch">
            <input type="search" placeholder="Search" class="search" />
        </div>
        <div id="rightMenuItem">
            <a href="#" class="noStyleLinks"><p class="menuItemText"><?php echo($_SESSION['user']->first_name ." " . $_SESSION['user']->last_name)?></p></a>
        </div>
    </div>
</div>
