<?php
$types = [
    'A',
    'AAAA',
    'ALL',
    'NS',
    'MX',
    'PTR',
    'TXT',
];
$name = $_POST['name'] ?? '';
$type = $_POST['type'] ?? '';
?>

<form class="row g-3 align-items-center mb-3" method="POST" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <div class="col-auto">
        <select class="form-select" name="type">
            <option value="">select type</option>
            <?php
            foreach($types as $it) {
                $selected = $it == $type ? 'selected' : '';
                echo "<option $selected >$it</option>";
            }
            ?>
        </select>
    </div>
    <div class="col-auto">
        <input type="text" class="form-control" placeholder="g.co" name="name" value="<?= htmlentities($name) ?>">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary">Query</button>
    </div>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!$name) echo '<div class="alert alert-danger" role="alert">Missing name.</div>';
    if (!$type) echo '<div class="alert alert-danger" role="alert">Missing type.</div>';
    if ($name && $type) run("dig ${type} ".escapeshellarg($name));
}
?>
