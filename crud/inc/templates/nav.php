<?php
// var_dump($_SESSION['role']);
?>

<div class="nav">
    <div class="left">
        <a class="item" href="/index.php?task=report">All Students</a>
        <?php if (isAdmin()) : ?>
            <a class="item" href="/index.php?task=add">Add New Student</a>
            <a class="item" href="/index.php?task=seed">Seed</a>
        <?php endif; ?>
    </div>
    <div class="right">
        <?php if (!isset($_SESSION['loggedin'])) :
        ?>
            <a class="item" href="/auth.php">Log In</a>
        <?php else :
        ?>
            <a class="item" href="/auth.php?logout=true">Log Out (<?php echo $_SESSION['role'] ?>)</a>
        <?php endif;
        ?>
    </div>
</div>