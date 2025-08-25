<?php
$sidebar = apply_filters( 'transflash_theme_sidebar', '' );
if ($sidebar == 'layout_1c' || $sidebar == ''){
    return;
}
?>

<?php if(is_active_sidebar('main-sidebar')){ ?>
        <aside id="sidebar" class="sidebar">
            <?php  dynamic_sidebar('main-sidebar'); ?>
        </aside>
<?php } ?>