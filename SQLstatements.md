SELECT name FROM `game` WHERE 1

*//for picking genre
SELECT name FROM game
WHERE game.genre = 'Open World'

*//for picking rating
SELECT name FROM game
WHERE game.rating = 'Open World'

*//for picking price range
SELECT name FROM game
WHERE (game.price >=50)
AND (game.price <=80)


