<?php

namespace App\Models;

use CodeIgniter\Model;

class TblSongModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_song';
    protected $primaryKey       = 'song_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'artist', 'file'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



    public function getSongsForPlaylist($playlistId)
    {
        // Assuming you have a pivot table named 'playlist_songs'
        // and a column 'playlist_id' that links playlists to songs
        // and 'song_id' that links songs to playlists

        $builder = $this->db->table('tbl_song');
        $builder->select('tbl_song.*'); // Select the song fields you need
        $builder->join('bridge', 'bridge.song_id = tbl_song.song_id');
        $builder->where('bridge.playlist_id', $playlistId);

        return $builder->get()->getResultArray();
    }
}


