<b>FRONT PAGE</b>

Base URL http://dj.masaccio.io/ should be saved to a variable, so it can be changed in production.  

I AM A USER

Event Details:

http://dj.masaccio.io/web_service/api/event/read_single.php?id=2

Playlist to rank:

http://dj.masaccio.io/web_service/api/music/read.php?event=2

Rank a song:

http://dj.masaccio.io/web_service/api/music/rank.php

POST details:
{
“id” : 3,
 “rating”:  “1”
}

!important: “rating” must be “1”

I AM A DJ

DJ Login: 

http://dj.masaccio.io/web_service/api/dj/login.php

POST details:

{
"email": "nic@tt.com",
 "password": "123"
}

DJ Logout:

http://dj.masaccio.io/web_service/api/dj/logout.php

DJ Register (Create Profile)

http://dj.masaccio.io/web_service/api/dj/create.php

POST details

{
    "first_name": "Nico",
    "last_name": "Sergio",
    "email": "nic@tt.com",
    "phone": "0536974523",
    "website": "www.tt.com",
    "facebook": "https://www.facebook.com/sergio.nico.7",
    "about": "Quisque consequat neque ipsum, non commodo velit suscipit sed. Aliquam ac consectetur nulla, quis aliquam arcu.",
    "location": "Jerusalem ",
    "image": "",
}

DJ PAGE

DJ Profile

Read Profile
http://dj.masaccio.io/web_service/api/dj/read_single.php
Update Profile

http://dj.masaccio.io/web_service/api/dj/update.php

POST details (ID is defined at login)
{
    "first_name": "Nico",
    "last_name": "Sergio",
    "email": "nic@tt.com",
    "phone": "0536974523",
    "website": "www.tt.com",
    "facebook": "https://www.facebook.com/sergio.nico.7",
    "about": "Aliquam ac consectetur nulla, quis aliquam arcu.",
    "location": "Jerusalem ",
    "image": "",
}

Delete Profile

http://dj.masaccio.io/web_service/api/dj/delete.php

(ID is defined at login)

Show Playlist

http://dj.masaccio.io/web_service/api/song/read.php
(ID is defined at login)

Show single Song

http://dj.masaccio.io/web_service/api/song/read_single.php?id=2

Add Song

http://dj.masaccio.io/web_service/api/song/create.php

(id_dj is defined at login)

POST details:

{
"name": "great balls of fire", 
"genere": "Rock & Roll", 
"url":  "https://www.youtube.com/watch?v=ZD8YPY8RBQc"
"artist": "Jerry Lee lewis"
}

Update Song

http://dj.masaccio.io/web_service/api/song/update.php

{		{
“id”:”8”,
"name": "great balls of fire", 
"genere": "Rock & Roll", 
"url":  "https://www.youtube.com/watch?v=ZD8YPY8RBQc"
"artist": "Jerry Lee lewis"
}

Delete Song

http://dj.masaccio.io/web_service/api/song/delete.php

{
“Id”:“8”
}

Create Event

Show all Events

http://dj.masaccio.io/web_service/api/event/read.php

(Dj is provided at login)

Show Single Event

http://dj.masaccio.io/web_service/api/event/read_single.php?id=2

Create Event

http://dj.masaccio.io/web_service/api/event/create.php

POST details

(id_dj is provided at login)

{ 
"name": "Mor and Jo Wedding", 
"type": "Wedding", 
"permit": "000000", 
"participants": "150",
 "event_date": "24/07/2019", 
"event_start": "19:00", 
"event_end": "24:00"
}

Update Event

http://dj.masaccio.io/web_service/api/event/update.php

POST details

(id_dj is provided at login)
{ 
“Id”: “2”
"name": "Mor and Jo Wedding", 
"type": "Wedding", 
"permit": "000000", 
"participants": "150",
 "event_date": "24/07/2019", 
"event_start": "19:00", 
"event_end": "24:00"
}

Add song to be ranked at event:

http://dj.masaccio.io/web_service/api/music/create.php

POST details

{ 
"id_event": "2", 
"id_song": "2",
 "rating": "0"
 }

Delete Event

http://dj.masaccio.io/web_service/api/event/delete.php

POST details:

{ 
"id": "2" 
}
