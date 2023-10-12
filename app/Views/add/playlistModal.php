<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Playlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <select name="playlist" class="form-control" id="selectedPlaylist">
                    <?php foreach ($playlists as $playlist): ?>
                        <option value="<?= $playlist['playlist_id'] ?>"><?= $playlist['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="modal-footer">
                <a href="#" data-bs-dismiss="modal">Close</a>
                <button type="button" class="btn btn-primary" onclick="openPlaylist()">
                    Open Playlist
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openPlaylist() {
        // Get the selected playlist ID
        const selectedPlaylistId = document.getElementById('selectedPlaylist').value;
        
        // Redirect to the playlist page with the selected playlist ID
        window.location.href = 'MainSongController/playlist/' + selectedPlaylistId; // Adjust the URL structure as needed
    }
</script>