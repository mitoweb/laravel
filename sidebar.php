<?php
/*
package: miroku01
filename: sidebar.php
*/

?>
<div>
    <?php if (!is_active_sidebar('sidebar')) {
        return;
    } ?>
    <?php dynamic_sidebar('sidebar'); ?>
</div>