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
</head>

<body>

  <?php include 'add/style.php'; ?>


  <form action="/display" method="get">
    <input type="search" name="search" placeholder="Search song" value="<?= isset($search) ? esc($search) : '' ?>">
    <button type="submit" class="btn btn-primary">Search</button>
  </form>

  <h1>Music Player</h1>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSongModal">
    Add New Song
  </button>

  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    My Playlist
  </button>

  <a href="/MainSongController" class="btn btn-success">Home</a>

  <audio id="audio" controls></audio>

  <ul id="playlist">
    <?php foreach ($songs as $song) : ?>

      <li data-src="<?= base_url($song['file']) ?>">
    <?= $song['title'] ?>

    <div class="btn-group">
        <button class="btn btn-success add-to-playlist-btn" data-song-id="<?= $song['song_id'] ?>" data-bs-toggle="modal" data-bs-target="#addToPlaylist">Add to Playlist</button>

        <form method="post" action="/MainSongController/deleteSong">
            <input type="hidden" name="song_id" value="<?= $song['song_id'] ?>">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this song?')">Delete</button>
        </form>
    </div>
</li>

    <?php endforeach; ?>
  </ul>

  <script src="/jav/scriptBot.js"></script>

</body>


<script>
  $(document).ready(function() {
    $('.add-to-playlist-btn').click(function() {

      var songId = $(this).data('song-id');

      $('#song_id').val(songId);
    });
  });
</script>

</html>