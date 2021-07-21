<?php
$name = $_POST['name'] ?? '';
?>

<form class="row g-3 align-items-center mb-3" method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <div class="col-auto">
        Name:
    </div>
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="g.co" name="name" value="<?= htmlentities($name) ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary">Lookup</button>
    </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$name) echo '<div class="alert alert-danger" role="alert">Missing name.</div>';
    if ($name) run("whois ".escapeshellarg($name));
}
?>
