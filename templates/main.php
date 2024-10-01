<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <?php foreach ($categories as $categoryKey => $category): ?>
        <li class="promo__item promo__item--<?= $category['code']; ?>">
            <a class="promo__link" href="pages/all-lots.html"><?= $category['name']; ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <?php foreach ($lots as $lotsKey => $lot): ?>
        <li class="lots__item lot">
            <div class="lot__image">
                <img src="<?= htmlspecialchars($lot['url_img']); ?>" width="350" height="260" alt="<?= htmlspecialchars($lot['lot_name']); ?>">
            </div>
            <div class="lot__info">
                <span class="lot__category"><?= $lot['description']; ?></span>
                <h3 class="lot__title"><a class="text-link" href="lot.php?id=<?= $lot['lot_id']; ?>"><?= htmlspecialchars($lot['lot_name']); ?></a></h3>
                <div class="lot__state">
                    <div class="lot__rate">
                        <span class="lot__amount">Стартовая цена</span>
                        <span class="lot__cost"><?= htmlspecialchars(formateSum($lot['price']) . ' ₽'); ?></span>
                    </div>
                    <?php $result = getTiming(htmlspecialchars($lot['date_end'])); ?>
                    <div class="lot__timer timer <?php if ($result[0] < 1): ?>timer--finishing<?php endif; ?>">
                        <?= "$result[0]:$result[1]"; ?>
                    </div>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</section>