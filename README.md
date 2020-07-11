#Game Catalog

   This a games catalog API. 

   The game has players who play it very frequently. The games come in versions so players can own a game in one or more versions of the game.

The system stores only one game play record per player per game per day even if the player played the game(s) multiple times in a day provided they played it alone. 
If the player played with other people, the system records who started the game and those invited to join.

   -    Assumption 1: Each of game only allows a maximum of 4 players. 
   -    Assumption 2: Players can only play together if they have the same game versions. 
   
###Test data:

The application has the following test data:

   -    Players: name, email, nickname, password, date joined, last login
   -    Games: store their name, version, date added
   
#### What the API's do:
-   Return all the games
-   Return all the players, their games and their gameplays (overall and for each game)
-   Return all the games played per day and their players
-   Return all the games played within a date range
-   Return the top 100 players month by month with a link to see the games they played

#### The system also has the following records:
-   3,835 days of gaming.
-   There are 10,000 players in the system.
-   5 games (Call of Duty, Mortal Kombat, FIFA, Just Cause, Apex Legend) with different versions from 2010 to 2020.
-   There are at least 1,500 gameplays every day.
-   A game should not have a gameplay before the date it was added
NOTE
