<nav class="nav">
  <ul class="nav__list container">
    <?php foreach ($categories as $categoryKey => $category): ?>
    <li class="nav__item">
      <a href="pages/all-lots.html"><?= $category['name']; ?></a>
    </li>
    <?php endforeach; ?>
  </ul> 
</nav>
<section class="lot-item container">
  <h2><?= $lot['lot_name']; ?></h2>
  <div class="lot-item__content">
    <div class="lot-item__left">
      <div class="lot-item__image">
        <img src="<?= $lot['url_img']; ?>" width="730" height="548" alt="Сноуборд">
      </div>
      <p class="lot-item__category">Категория: <span><?= $categoryRow['name_category']; ?></span></p>
      <p class="lot-item__description">Легкий маневренный сноуборд, готовый дать жару в любом парке, растопив
        снег
        мощным щелчкоми четкими дугами. Стекловолокно Bi-Ax, уложенное в двух направлениях, наделяет этот
        снаряд
        отличной гибкостью и отзывчивостью, а симметричная геометрия в сочетании с классическим прогибом
        кэмбер
        позволит уверенно держать высокие скорости. А если к концу катального дня сил совсем не останется,
        просто
        посмотрите на Вашу доску и улыбнитесь, крутая графика от Шона Кливера еще никого не оставляла
        равнодушным.</p>
    </div>
    <div class="lot-item__right">
      <div class="lot-item__state">
        <?php $result = getTiming(htmlspecialchars($lot['date_end'])); ?>
        <div class="lot-item__timer timer <?php if ($result[0] < 1): ?>timer--finishing<?php endif; ?>">
          <?= "$result[0]:$result[1]"; ?> 
        </div>
        <div class="lot-item__cost-state">
          <div class="lot-item__rate">
            <span class="lot-item__amount">Текущая цена</span>
            <span class="lot-item__cost"><?= htmlspecialchars(formateSum($lot['price']) . ' ₽'); ?></span>
          </div>
          <div class="lot-item__min-cost">
            Мин. ставка <span><?= htmlspecialchars(formateSum($lot['price_step']) . ' ₽'); ?></span>
          </div>
        </div>
        <form class="lot-item__form" action="https://echo.htmlacademy.ru" method="post" autocomplete="off">
          <p class="lot-item__form-item form__item form__item--invalid">
            <label for="cost">Ваша ставка</label>
            <input id="cost" type="text" name="cost" placeholder="<?= htmlspecialchars(formateSum($lot['price_step']) . ' ₽'); ?>">
            <span class="form__error">Введите наименование лота</span>
          </p>
          <button type="submit" class="button">Сделать ставку</button>
        </form>
      </div>
      <div class="history">
        <h3>История ставок (<span>10</span>)</h3>
        <table class="history__list">
          <tr class="history__item">
            <td class="history__name">Иван</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">5 минут назад</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Константин</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">20 минут назад</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Евгений</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">Час назад</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Игорь</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">19.03.17 в 08:21</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Енакентий</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">19.03.17 в 13:20</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Семён</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">19.03.17 в 12:20</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Илья</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">19.03.17 в 10:20</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Енакентий</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">19.03.17 в 13:20</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Семён</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">19.03.17 в 12:20</td>
          </tr>
          <tr class="history__item">
            <td class="history__name">Илья</td>
            <td class="history__price">10 999 р</td>
            <td class="history__time">19.03.17 в 10:20</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>