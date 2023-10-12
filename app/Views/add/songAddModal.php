<div class="modal fade" id="addSongModal" tabindex="-1" aria-labelledby="addSongModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSongModalLabel">Add New Song</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="addSongForm" method="POST" action="/MainSongController/addSong" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="songTitle" class="form-label">Song Title</label>
                        <input type="text" class="form-control" id="songTitle" name="songTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="songArtist" class="form-label">Artist</label>
                        <input type="text" class="form-control" id="songArtist" name="songArtist" required>
                    </div>
                    <div class="mb-3">
                        <label for="songAlbum" class="form-label">Path</label>
                        <input type="file" class="form-control" id="songAlbum" name="songPath" required>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addSongForm">Add Song</button>
            </div>

        </div>
    </div>
</div>