# DJ-Friend

 1. See a list of all DJs (no password required)
http://dj.masaccio.io/web_service/api/dj/read.php

2. See one DJ by id (no password required)
url/web_service/api/dj/read_single.php?id=2

3. Create a DJ (should be used to register a DJ | no password required however it require proof of human)
http://dj.masaccio.io/web_service/api/dj/create.php

{
"first_name": "מרסלו",
"last_name": "מרקוני",
"email": "marcelomarconi@gmail.com",
"phone": "054-4596941",
"website": "www.marconi-dj.tv",
"facebook": "facebook.com/marconitv",
"about": "אינטרנט מתקיימים אתרי ועד בין שימושים עיתון על אל גורם, מכילים יש האגורה רשתות דפי לגורם הרשת ממשקי והשפעה כמות. האוכלוסייה נכון בעיקר מרשתת או מכך אינטרנט באינטרנט העצומה כחלק, שמתרחשת חיים תחומי או העולם לפחות סחר כך הבית כספים. ",
"location": "מרכז",
"image": ""
}


4. update a DJ (requires password twice once to access second time to update)
http://dj.masaccio.io/web_service/api/dj/create.php

{
    "id": "2",
    "first_name": "מרסלו",
    "last_name": "מרקוני",
    "email": "marcelomarconi@gmail.com",
    "phone": "054-4596941",
    "website": "www.marconi-dj.tv",
    "facebook": "facebook.com/marconitv",
    "about": "אינטרנט מתקיימים אתרי ועד בין שימושים עיתון על אל גורם, מכילים יש האגורה רשתות דפי לגורם הרשת ממשקי והשפעה כמות. האוכלוסייה נכון בעיקר מרשתת או מכך אינטרנט באינטרנט העצומה כחלק, שמתרחשת חיים תחומי או העולם לפחות סחר כך הבית כספים. ",
    "location": "מרכז",
    "image": ""
}

5. delete a DJ (password required)
http://dj.masaccio.io/web_service/api/dj/delete.php
{
     "id": "2"
}

========================================================================
EVENT

1. See a list of all Events by certain DJ (to be decided if no password is required)
url/web_service/api/event/read.php?dj=2

2. See a single Event by certain DJ (no password is required)
url/web_service/api/event/read_single.php?id=2

3. Create an event (password required)
url/web_service/api/event/create.php
{
    "id_dj": "1",
    "name": "החתונה של מור ואסף",
    "type": "חתונה",
    "permit": "000000",
    "participants": "150",
    "event_date": "24/07/2019",
    "event_start": "19:00",
    "event_end": "24:00"
  }
4. update an event (password required)
url/web_service/api/event/update.php
{
    "id": "2",
    "id_dj": "1",
    "name": "החתונה של מור ואסף",
    "type": "חתונה",
    "permit": "000000",
    "participants": "150",
    "event_date": "24/07/2019",
    "event_start": "19:00",
    "event_end": "24:00"
}
5. delete an event (password required)
http://dj.masaccio.io/web_service/api/event/delete.php
{
   "id": "2"
}

==============================================================

SONG (A DJs playlist)

1. See the playlist of certain DJ (to be decided if no password is required)
http://dj.masaccio.io/web_service/api/song/read.php?dj=2

2. See a single song by id (password required)
http://dj.masaccio.io/web_service/api/song/read_single.php?id=2

3. Add a song to a DJ's playlist (password required)
http://dj.masaccio.io/web_service/api/song/create.php

 {
    "id_dj": "2",
    "name": "great balls of fire",
    "genere": "Rock & Roll",
    "url": "ZD8YPY8RBQc", ###the part after "https://www.youtube.com/watch?v=...."###
    "artist": "Jerry Lee lewis"
  }
4. update a song in a DJ's playlist (password required)
http://dj.masaccio.io/web_service/api/song/update.php

{
    "id": "8",
    "id_dj": "2",
    "name": "Latinoamerica",
    "genere": "Latino",
    "url": "DkFJE8ZdeG8",
    "artist": "Calle 13"
}
5. delete a song from a DJ's playlist (password required)
http://dj.masaccio.io/web_service/api/song/delete.php

{
    "id": "8"
}

======================================================================

Music(the playlist to be ranked during certain event)

1. See the playlist certain DJ prepared to be ranked in an event(no password is required)
http://dj.masaccio.io/web_service/api/music/read.php?event=2

2. Add a song to be ranked in an event(password required)
http://dj.masaccio.io/web_service/api/music/create.php
 {
    "id_event": "2",
    "id_song": "2",
    "rating": "0" ###MUST BE SET TO ZERO###
 }
3. Rank a song to during an event(no password required limited by by date and time of the event)
http://dj.masaccio.io/web_service/api/music/rank.php
 {
    "id": "2",
    "rating": "1" ###MUST BE SET TO ONE###
 }

4. delete a song from the ranking (password required)
url/web_service/api/music/delete.php
 {
    "id": "2",
 }
5. delete all songs from an event (password required)
http://dj.masaccio.io/web_service/api/music/delete_all.php
 {
    "id_event": "2"
 }
