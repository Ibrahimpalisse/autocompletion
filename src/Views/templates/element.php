<div class="container">
    <h1><?= htmlspecialchars($title) ?></h1>

    <div class="breadcrumb">
        <a href="/autocompletion/">Home</a> > <?= htmlspecialchars($title) ?>
    </div>

    <?php if (!empty($elements)) : ?>
        <ul style="list-style: none; padding: 0;"> <!-- Retirer les puces des listes -->
            <?php foreach ($elements as $element) : ?>
                <li>
                    <div class="element-wrapper">
                        <!-- Image à gauche -->
                        <img src="./public/img/<?= htmlspecialchars($element['image_url']) ?>" alt="<?= htmlspecialchars($element['name']) ?>" class="element-image">

                        <!-- Description à droite -->
                        <div class="element-description">
                            <h2><?= htmlspecialchars($element['name']) ?></h2>
                            <span class="genre"><?= htmlspecialchars($element['genre']) ?></span>
                            <p><?= nl2br(htmlspecialchars($element['description'])) ?></p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun élément trouvé pour cet ID.</p>
    <?php endif; ?>
</div>
