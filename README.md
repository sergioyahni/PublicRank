<p><span style="color: #ff6600;"><strong>FRONT PAGE</strong></span></p>
<p>Base URL&nbsp;<a href="http://dj.masaccio.io/" rel="nofollow">http://dj.masaccio.io/</a>&nbsp;should be saved to a variable, so it can be changed in production.</p>
<p><strong>I AM A USER</strong></p>
<p>Event Details:</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/event/read_single.php?id=2" rel="nofollow">http://dj.masaccio.io/web_service/api/event/read_single.php?id=2</a></li>
</ul>
<p>Playlist to rank:</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/music/read.php?event=2" rel="nofollow">http://dj.masaccio.io/web_service/api/music/read.php?event=2</a></li>
</ul>
<p>Rank a song:</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/music/rank.php" rel="nofollow">http://dj.masaccio.io/web_service/api/music/rank.php</a></li>
</ul>
<p style="padding-left: 30px;">POST details: { &ldquo;id&rdquo; : 3, &ldquo;rating&rdquo;: &ldquo;1&rdquo; }</p>
<p style="padding-left: 30px;">!important: &ldquo;rating&rdquo; must be &ldquo;1&rdquo;</p>
<p><strong>I AM A DJ</strong></p>
<p>DJ Login:</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/dj/login.php" rel="nofollow">http://dj.masaccio.io/web_service/api/dj/login.php</a></li>
</ul>
<p style="padding-left: 30px;">POST details:</p>
<p style="padding-left: 30px;">{ "email": "<a href="mailto:nic@tt.com">nic@tt.com</a>", "password": "123" }</p>
<p>DJ Logout:</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/dj/logout.php" rel="nofollow">http://dj.masaccio.io/web_service/api/dj/logout.php</a></li>
</ul>
<p>DJ Register (Create Profile)</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/dj/create.php" rel="nofollow">http://dj.masaccio.io/web_service/api/dj/create.php</a></li>
</ul>
<p style="padding-left: 30px;">POST details</p>
<p style="padding-left: 30px;">{ <br />"first_name": "Nico", <br />"last_name": "Sergio", <br />"email": "<a href="mailto:nic@tt.com">nic@tt.com</a>", <br />"phone": "0536974523", <br />"website": "<a href="http://www.tt.com/" rel="nofollow">www.tt.com</a>", <br />"facebook": "<a href="https://www.facebook.com/sergio.nico.7" rel="nofollow">https://www.facebook.com/sergio.nico.7</a>", <br />"about": "Quisque consequat neque ipsum, non commodo velit suscipit sed. Aliquam ac consectetur nulla, quis aliquam arcu.", <br />"location": "Jerusalem ", <br />"image": ""&nbsp;<br />}</p>
<p>&nbsp;</p>
<p><strong>DJ PAGE</strong></p>
<p><strong>DJ Profile</strong></p>
<p>Read Profile&nbsp;</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/dj/read_single.php" rel="nofollow">http://dj.masaccio.io/web_service/api/dj/read_single.php</a>&nbsp;</li>
</ul>
<p style="padding-left: 30px;">ID is defined at login</p>
<p>Update Profile</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/dj/update.php" rel="nofollow">http://dj.masaccio.io/web_service/api/dj/update.php</a></li>
</ul>
<p style="padding-left: 30px;">POST details (ID is defined at login)</p>
<p style="padding-left: 30px;">{ <br />"first_name": "Nico", <br />"last_name": "Sergio", <br />"email": "<a href="mailto:nic@tt.com">nic@tt.com</a>", <br />"phone": "0536974523", <br />"website": "<a href="http://www.tt.com/" rel="nofollow">www.tt.com</a>", <br />"facebook": "<a href="https://www.facebook.com/sergio.nico.7" rel="nofollow">https://www.facebook.com/sergio.nico.7</a>", <br />"about": "Aliquam ac consectetur nulla, quis aliquam arcu.", <br />"location": "Jerusalem ", <br />"image": ""<br />}</p>
<p>Delete Profile</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/dj/delete.php" rel="nofollow">http://dj.masaccio.io/web_service/api/dj/delete.php</a></li>
</ul>
<p style="padding-left: 30px;">(ID is defined at login)</p>
<p>Show Playlist</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/song/read.php" rel="nofollow">http://dj.masaccio.io/web_service/api/song/read.php</a>&nbsp;</li>
</ul>
<p style="padding-left: 30px;">(ID is defined at login)</p>
<p>Show single Song</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/song/read_single.php?id=2" rel="nofollow">http://dj.masaccio.io/web_service/api/song/read_single.php?id=2</a></li>
</ul>
<p>Add Song</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/song/create.php" rel="nofollow">http://dj.masaccio.io/web_service/api/song/create.php</a></li>
</ul>
<p style="padding-left: 30px;">(id_dj is defined at login)</p>
<p style="padding-left: 30px;">POST details:</p>
<p style="padding-left: 30px;">{ <br />"name": "great balls of fire", <br />"genere": "Rock &amp; Roll", <br />"url": "<a href="https://www.youtube.com/watch?v=ZD8YPY8RBQc" rel="nofollow">https://www.youtube.com/watch?v=ZD8YPY8RBQc</a>", <br />"artist": "Jerry Lee lewis" <br />}</p>
<p>Update Song</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/song/update.php" rel="nofollow">http://dj.masaccio.io/web_service/api/song/update.php</a></li>
</ul>
<p style="padding-left: 30px;">{<br />&ldquo;id&rdquo;:&rdquo;8&rdquo;, <br />"name": "great balls of fire", <br />"genere": "Rock &amp; Roll", <br />"url": "<a href="https://www.youtube.com/watch?v=ZD8YPY8RBQc" rel="nofollow">https://www.youtube.com/watch?v=ZD8YPY8RBQc</a>",<br />"artist": "Jerry Lee lewis" <br />}</p>
<p>Delete Song</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/song/delete.php" rel="nofollow">http://dj.masaccio.io/web_service/api/song/delete.php</a></li>
</ul>
<p style="padding-left: 30px;">{ &ldquo;Id&rdquo;:&ldquo;8&rdquo; }</p>
<p><strong>Create Event</strong></p>
<p>Show all Events</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/event/read.php" rel="nofollow">http://dj.masaccio.io/web_service/api/event/read.php</a></li>
</ul>
<p style="padding-left: 30px;">(Dj is provided at login)</p>
<p>Show Single Event</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/event/read_single.php?id=2" rel="nofollow">http://dj.masaccio.io/web_service/api/event/read_single.php?id=2</a></li>
</ul>
<p>Create Event</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/event/create.php" rel="nofollow">http://dj.masaccio.io/web_service/api/event/create.php</a></li>
</ul>
<p style="padding-left: 30px;">POST details (id_dj is provided at login)</p>
<p style="padding-left: 30px;">{ <br />"name": "Mor and Jo Wedding", <br />"type": "Wedding", <br />"permit": "000000", <br />"participants": "150", <br />"event_date": "24/07/2019", <br />"event_start": "19:00", <br />"event_end": "24:00" <br />}</p>
<p>Update Event</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/event/update.php" rel="nofollow">http://dj.masaccio.io/web_service/api/event/update.php</a></li>
</ul>
<p style="padding-left: 30px;">POST details&nbsp;(id_dj is provided at login)</p>
<p style="padding-left: 30px;">{ <br />&ldquo;Id&rdquo;: &ldquo;2&rdquo;, <br />"name": "Mor and Jo Wedding", <br />"type": "Wedding", <br />"permit": "000000", <br />"participants": "150", <br />"event_date": "24/07/2019", <br />"event_start": "19:00", <br />"event_end": "24:00" }</p>
<p>Add song to be ranked at event:</p>
<ul>
<li><a href="http://dj.masaccio.io/web_service/api/music/create.php" rel="nofollow">http://dj.masaccio.io/web_service/api/music/create.php</a></li>
</ul>
<p style="padding-left: 30px;">POST details</p>
<p style="padding-left: 30px;">{ <br />"id_event": "2", <br />"id_song": "2", <br />"rating": "0" <br />}</p>
<p>Delete Event</p>
<p><a href="http://dj.masaccio.io/web_service/api/event/delete.php" rel="nofollow">http://dj.masaccio.io/web_service/api/event/delete.php</a></p>
<p style="padding-left: 30px;">POST details:</p>
<p style="padding-left: 30px;">{ "id": "2" }</p>
