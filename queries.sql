INSERT INTO categories (name, code) 
VALUES 
    ('Доски и лыжи', 'boards'),
    ('Крепления', 'attachment'),
    ('Ботинки', 'boots'),
    ('Одежда', 'clothing'),
    ('Инструменты', 'tools'),
    ('Разное', 'other');

INSERT INTO users (email, name, pass_hash, contacts) 
VALUES 
    ('alesha321@gmail.com', 'Алексей', 'aleksei2010', '+79323423487'),
    ('natalia1967@gmail.com', 'Наталия', 'natasha56ru', '+79829548390');

INSERT INTO lots (name, description, price, url_img, date_end, price_step, id_user, id_category) 
VALUES 
    ('2014 Rossignol District Snowboard',
    'Доски и лыжи',
    10999,
    'img/lot-1.jpg',
    '2024-09-15 14:50:00',
    1000,
    1,
    1),

    ('DC Ply Mens 2016/2017 Snowboard',
    'Доски и лыжи',
    159999,
    'img/lot-2.jpg',
    '2024-09-16',
    11000,
    1,
    1),

    ('Крепления Union Contact Pro 2015 года размер L/XL',
    'Крепления', 
    8000,
    'img/lot-3.jpg',
    '2024-09-19',
    500,
    1,
    2),

    ('Ботинки для сноуборда DC Mutiny Charocal',
    'Ботинки',
    10999,
    'img/lot-4.jpg',
    '2024-09-20',
    700,
    2,
    3),

    ('Куртка для сноуборда DC Mutiny Charocal',
    'Одежда',
    7500,
    'img/lot-5.jpg',
    '2024-09-17',
    100,
    2,
    4),

    ('Маска Oakley Canopy',
    'Разное',
    5400,
    'img/lot-6.jpg',
    '2024-09-29',
    300,
    1,
    6);

INSERT INTO bets (price, id_user, id_lot) 
VALUES 
    (1300, 2, 4),
    (500, 2, 4);


-- получить все категории;
SELECT * from categories;

-- получить самые новые, открытые лоты. 
-- Каждый лот должен включать название, стартовую цену, ссылку на изображение, цену, название категории;
SELECT l.name, price, url_img, price_step, c.name from lots l
join categories c on c.id = l.id_category 
where date_end > CURRENT_TIMESTAMP;

-- показать лот по его ID. Получите также название категории, к которой принадлежит лот;
SELECT l.name, price, url_img, price_step, c.name from lots l
join categories c on c.id = l.id_category 
where l.id = 3;

-- обновить название лота по его идентификатору;
UPDATE lots SET name = 'Маска Trinity X'
where id = 6;

-- получить список ставок для лота по его идентификатору с сортировкой по дате.
SELECT * from lots l
join bets b on b.id_lot = l.id
where l.id = 4
order by l.date_create DESC;