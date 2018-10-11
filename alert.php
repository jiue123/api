<?php
    if (isset($_SESSION['error'])) {
?>
        <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            ?>
        </div>
<?php
    } else if (isset($_SESSION['success'])) {
?>
        <div class="alert alert-success" role="alert">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            <span class="sr-only">Success:</span>
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
        </div>
<?php
    }
?>
