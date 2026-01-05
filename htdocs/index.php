<?php
// Directorio base (htdocs)
$baseDir = __DIR__;

// Obtener carpetas
$projects = array_filter(
    scandir($baseDir),
    function ($item) use ($baseDir) {
        return $item !== '.'
            && $item !== '..'
            && is_dir($baseDir . DIRECTORY_SEPARATOR . $item);
    }
);

// Ordenar alfabéticamente
sort($projects);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mis proyectos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>📂 Proyectos en htdocs</h1>

<?php if (empty($projects)): ?>
    <p>No hay proyectos todavía.</p>
<?php else: ?>
    <ul>
        <?php foreach ($projects as $project): ?>
            <li>
                <a href="/<?= htmlspecialchars($project) ?>/">
                    <?= htmlspecialchars($project) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="note">
    <p>Docker · Nginx · PHP-FPM</p>
</div>

</body>
</html>
