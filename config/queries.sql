# A few users to fill DB

INSERT INTO
  users (
  dt_add,
  email,
  name,
  password,
  token
)
VALUES
(
  "2018-11-20 12:00:00",
  "adam@foobar.me",
  "Adam",
  "111111",
  "placeholder1"
),
(
  "2018-11-25 18:03:12",
  "eve@foobar.me",
  "Eve",
  "222222",
  "placeholder2"
),
(
  "2018-12-03 19:25:41",
  "steve@foobar.me",
  "Steve",
  "333333",
  "placeholder3"
),
(
  "2018-12-05 22:53:24",
  "lilith@foobar.me",
  "Lilith",
  "444444",
  "placeholder4"
);

# A few post likes

INSERT INTO
  posts_like
SET
  user_id = 4,
  post_id = 3;

INSERT INTO
  posts_like
SET
  user_id = 2,
  post_id = 5;

INSERT INTO
  posts_like
SET
  user_id = 1,
  post_id = 5;

# Bunch of posts

INSERT INTO
  posts
SET
  user_id = 1,
  dt_add = "2019-01-09 10:29:33",
  show_count = 50,
  like_count = DEFAULT,
  title = "First",
  description = "That's one small step for [a] man, one giant leap for mankind"

INSERT INTO
  posts
SET
  user_id = 1,
  dt_add = "2019-01-09 12:00:00",
  show_count = 14,
  like_count = DEFAULT,
  title = "Lorem Ipsum",
  description = "Dicam graeci sit ut, feugait aliquando qui ex. Sea tantas democritum an, cu nam apeirian dissentiet. Pri in mucius instructior. Vis ne liber tollit sanctus."

INSERT INTO
  posts
SET
  user_id = 3,
  dt_add = "2019-03-08 13:52:42",
  show_count = 42,
  like_count = 1,
  title = "Woww",
  description = "Pri mundi elitr volumus at, vim dicat euripidis suscipiantur ei, habeo affert urbanitas ea vel. In discere consequuntur sed."

INSERT INTO
  posts
SET
  user_id = 4,
  dt_add = "2019-04-01 00:14:34",
  show_count = 20,
  like_count = DEFAULT,
  title = "April",
  description = "At vis dicta affert verterem, mei ad iriure sapientem splendide."

INSERT INTO
  posts
SET
  user_id = 4,
  dt_add = "2019-04-10 23:16:39",
  show_count = 23,
  like_count = 2,
  title = "Йцукен",
  description = "Лорем ипсум долор сит амет, ад яуод диам пертинациа нец. Меа ан натум цонсецтетуер. Прима дицам импердиет еи меа. Ат цибо алиенум луптатум нец, ид вис долорем сцрипторем."
