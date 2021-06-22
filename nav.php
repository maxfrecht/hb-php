
<nav>
    <div class="brand">LOGO</div>
    <div class="burger-btn"><span class="burger open"></span></div>
    <ul>
        <?php foreach ($links as $link => $href) {
            echo '<li><a href="'.$href.'"> '.$link.'</a></li>';
        } ?>
    </ul>
</nav>
