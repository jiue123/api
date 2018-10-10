<div class="alert alert-danger" role="alert">
    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    <span class="sr-only">Error:</span>
    <?php
        if ($_GET['error'] == 'exist') {
            echo "Email existed";
        }
    ?>
</div>