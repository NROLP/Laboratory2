<div class="modal fade" id="addToPlaylist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Playlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form method="post" action="/MainSongController/addToPlaylist"> <!-- Add the form to submit the selected playlist -->
                    <input type="text" name="song_id" id="song_id" value="<?= isset($songs['song_id']) ? $songs['song_id'] : '' ?>">

                    <select name="playlistId" class="form-control">
                        <?php foreach ($playlists as $playlist) : ?>
                            <option value="<?= $playlist['playlist_id'] ?>"><?= $playlist['name'] ?></option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="btn btn-primary"> <!-- Add a JavaScript function to set the song title and submit the form -->
                        Add to Playlist
                    </button>
                </form>
            </div>

            <div class="modal-footer">
                <a href="#" data-bs-dismiss="modal">Close</a>
                <!-- <button type="button" class="btn btn-primary">  -->
                <!-- Add to Playlist
                </button> -->
            </div>
        </div>
    </div>
</div>