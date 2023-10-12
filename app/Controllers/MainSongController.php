<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\BridgeModel;
use App\Models\TblPlaylistModel;
use App\Models\TblSongModel;

class MainSongController extends BaseController
{
    private $songs, $playlists, $playlistTracks;
    function __construct()
    {
        $this->playlistTracks = new BridgeModel();
        $this->playlists = new TblPlaylistModel();
        $this->songs = new TblSongModel();
    }

    public function index()
    {
        //
    }

    public function display()
    {
        $data = [
            'songs' => $this->songs->findAll(),
            'playlists' => $this->playlists->findAll(),
        ];

        return view('MainPage', $data);
    }

    public function addSong()
    {
        $title = $this->request->getPost('songTitle');
        $file = $this->request->getFile('songPath');
        $titlenew = $title . '.mp3';

        $file->move(ROOTPATH . 'public/songDump', $titlenew);

        $data = [
            'title' => $title,
            'artist' => $this->request->getVar('songArtist'),
            'file' => 'songDump/' . $titlenew,
        ];

        $this->songs->insert($data);

        return redirect()->to('/MainSongController');
    }

    public function createPlaylist()
    {
        $playlistName = $this->request->getVar('playlistName');

        if (!empty($playlistName)) {
            $data = [
                'name' => $playlistName,
            ];

            $this->playlists->save($data);
            return redirect()->to('/MainSongController');
        } else {
        }
    }

    public function addToPlaylist()
    {
        $song_id = $this->request->getPost('song_id');
        $playlist_id = $this->request->getPost('playlistId');

        $playlist = $this->playlists->find($playlist_id);

        // if ($playlist) {
        $data = [
            'playlist_id' => $playlist_id,
            'song_id' => $song_id,
            'songs' => $this->songs->findAll(),
            // 'playlists' => $this->playlists->findAll(),
        ];


        $this->playlistTracks->insert($data);
        return redirect()->to('/MainSongController');


        // } else {
        //     return redirect()->to('/MainSongController')->with('error', 'Playlist not found.');
        // }
        // $builder->insert($data);

        // Redirect to the song list page after adding the song

    }




    public function deleteSong()
    {
        $songId = $this->request->getPost('song_id');

        // Assuming you have a model to handle database operations
        $song = $this->songs->find($songId);

        if ($song) {
            // Delete the song file from the file system
            $file = ROOTPATH . 'public/songDump' . $song['file'];
            if (file_exists($file)) {
                unlink($file);
            }

            // Delete the song from the database
            $this->songs->delete($songId);
        }

        return redirect()->to('/MainSongController');
    }

    public function playlist($playlistId)
    {
        // Fetch songs associated with the selected playlist using your model
        $songs = $this->songs->getSongsForPlaylist($playlistId); // Adjust this based on your data structure
        // Store the songs in the $data array
        $data = [
            'songs' => $songs,
            'playlists' => $this->playlists->findAll(),
            'playlistId' => $playlistId,
        ];

        // Load the view and pass the $data array to it
        return view('Playlist', $data);
    }
}
