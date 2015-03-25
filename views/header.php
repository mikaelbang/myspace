<div id="menu">
    <div id="menuBorder">
        <div class="menuItems">
            <a href="../wall/show" id="active" class="noStyleLinks"><p class="menuItemText">Wall</p></a>
        </div>
        <div class="menuItems">
            <a href="../user/show" class="noStyleLinks"><p class="menuItemText">Profile</p></a>
        </div>
        <div class="menuItemsSearch">
            <input type="search" placeholder="Search" class="search" />
        </div>
        <div id="rightMenuItem">
            <a href="#" class="noStyleLinks"><p class="menuItemText"><?php echo($_SESSION['user']->first_name ." " . $_SESSION['user']->last_name)?></p></a>
        </div>
    </div>
</div>