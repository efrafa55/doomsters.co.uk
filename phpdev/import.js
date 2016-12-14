(function() {
	var flickerAPI = "http://doomlist.herokuapp.com/api/albums";
	$.getJSON( flickerAPI )
	.done(function( mainlist ) {
		$.each( mainlist, function( key, album ) {
			var mediaid = Object.keys(album)[0];
			var mediatype = "bandcamp";
			var albumdetails = Object.values(album);
			var albumname = album[mediaid].album;
			var artistname = album[mediaid].artist;
			var channel = album[mediaid].channel;
			var added = album[mediaid].added;
			
			$( "#main" ).append(mediaid + " - " + artistname + " - " + albumname + " - " + channel + " - " + added + "<br>" );
			
			$.post("addalbum.php", { mediaid: mediaid, mediatype: mediatype, albumname: albumname, artistname: artistname, channel: channel, added: added })
			.done(function(data) {
				console.log(data);
			});
		});
	});
})();