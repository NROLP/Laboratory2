<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php include 'add/creatPlaylistModal.php'; ?>
    <?php include 'add/playlistModal.php'; ?>
    <?php include 'add/selectSongModal.php'; ?>
    <?php include 'add/songAddModal.php'; ?>
    <?php include 'add/addToPlaylistModal.php'; ?>
    <?php include 'add/style.php'; ?>
</head>

<body>
    <?php foreach ($playlists as $p) : ?>
        <?php if ($p['playlist_id'] == $playlistId) : ?>
            <h1><?= $p['name'] ?></h1>
        <?php endif; ?>
    <?php endforeach; ?>




    <a href="/MainSongController"><button type="button" class="btn btn-primary">
       Home
    </button></a>

    <audio id="audio" controls></audio>

    <ul id="playlist">
        <?php foreach ($songs as $song) : ?>
            <li data-src="<?= base_url($song['file']) ?>">
                <?= $song['title'] ?>

                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addToPlaylist">Add to Playlist</button>

                <!-- Add a delete button with a confirmation dialog -->
                <form method="post" action="/MainSongController/deleteSong">
                    <input type="hidden" name="song_id" value="<?= $song['song_id'] ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

</body>



