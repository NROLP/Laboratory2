<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MusicsModel;
use App\Models\PlayListModel;
use App\Models\PlayTracksModel;
class MusicController extends BaseController
{
    private $playlist, $songs;
    public function __construct()
    {
        $this -> playlist = new \App\Models\PlayListModel();
        $this -> songs = new \App\Models\MusicModel();
    }

    public function display()
    {
        $data['playlists'] = $this -> playlist -> findAll();
        $data['songs'] = $this -> songs -> findAll();
        
        return view('/MusicTemp/player', $data);
    }

    public function searchSong()
    {

        $LookLike = $this->request->getGet('search');

        if(!empty($LookLike)){

            $data = [
                'songs' => $this->songs->like('SongName',$LookLike)->findAll(),
                'playlists' => $this->playlist->findAll()
            ];

            return view('\MusicTemp\player', $data);
        }
        else
        {
            return redirect()->to('/');
        }
    }

    public function playlist($id = null){

        $db = \Config\Database::connect();
        $builder = $db->table('songs');

        $builder->select(['tbl_song.song_id', 'tbl_song.title', 'tbl_song.artist', 'tbl_song.file','tbl_playlist.playlist_id','tbl_playlist.name']);
        $builder->join('playlist_track', 'songs.id = playlist_track.song_id');
        $builder->join('tbl_playlist', 'playlist_track.playlist_id = playlist.playlist_id');

        if ($id !== null) {
            $builder->where('playlist.playlist_id', $id);
        }

        $query = $builder->get();

        $data = [
            'songs' => $this->songs->findAll(),
            'playlists' => $this->playlist->findAll()
        ];

        if ($query) {
            $data['songs'] = $query->getResultArray();
        } else {
            echo "Query failed";
        }
        
        return view('MusicPlaylist\index', $data);
    }
}
