$(document).ready(function () {
  // Get references to the button and modal
  const modal = $("#myModal");
  const modalData = $("#modalData");
  const musicID = $("#musicID");
  const audio = document.getElementById('audio');
  const playlist = document.getElementById('playlist');
  const playlistItems = playlist.querySelectorAll('li');
  let currentTrack = 0;

  // Function to open the modal with the specified data
  function openModalWithData(dataId) {
    // Set the data inside the modal content
    modalData.text("Data ID: " + dataId);
    musicID.val(dataId);
    // Display the modal
    modal.css("display", "block");
  }

  // Function to play a track by index
  function playTrack(trackIndex) {
    if (trackIndex >= 0 && trackIndex < playlistItems.length) {
      const track = playlistItems[trackIndex];
      const trackSrc = track.getAttribute('data-src');
      audio.src = trackSrc;
      audio.play();
      currentTrack = trackIndex;
    }
  }

  // Function to play the next track
  function nextTrack() {
    currentTrack = (currentTrack + 1) % playlistItems.length;
    playTrack(currentTrack);
  }

  // Function to play the previous track
  function previousTrack() {
    currentTrack = (currentTrack - 1 + playlistItems.length) % playlistItems.length;
    playTrack(currentTrack);
  }

  // Add click event listeners to playlist items
  playlistItems.forEach((item, index) => {
    item.addEventListener('click', () => {
      playTrack(index);
    });
  });

  // Event listener for audio track end
  audio.addEventListener('ended', () => {
    nextTrack();
  });

  // Event listener for closing the modal
  modal.click(function (event) {
    if (event.target === modal[0] || $(event.target).hasClass("close")) {
      modal.css("display", "none");
    }
  });

  // You can add more code here for handling addSongModal and createPlaylistModal if needed
});

