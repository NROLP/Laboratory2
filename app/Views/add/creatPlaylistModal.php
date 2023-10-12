<div class="modal fade" id="createPlaylistModal" tabindex="-1" aria-labelledby="createPlaylistModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPlaylistModalLabel">Create New Playlist</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="createPlaylistForm">
                    <div class="mb-3">
                        <label for="playlistName" class="form-label">Playlist Name</label>
                        <input type="text" class="form-control" id="playlistName" name="playlistName" required>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" formaction="/MainSongController/createPlaylist" form="createPlaylistForm">Create Playlist</button>
            </div>
        </div>
    </div>
</div>

<div id="createdPlaylist" class="mt-3"></div>