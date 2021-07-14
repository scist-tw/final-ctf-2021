<?php
$target = $_POST['target'] ?? '';
?>

<form class="row g-3 align-items-center mb-3" method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <div class="col-auto">
        Target:
    </div>
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="g.co" name="target" value="<?= $target ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary">Ping</button>
    </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$target) echo '<div class="alert alert-danger" role="alert">Missing target.</div>';
    if ($target) {
        echo '<pre>';
        system("ping -c1 ".escapeshellarg($target));
        echo '</pre>';
    }
}
?>
