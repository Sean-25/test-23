<?php

namespace App\Models;

class Characters
{
    public static function search()
    {
        $url =  "https://rickandmortyapi.com/api/character?" . http_build_query(request()->input());

        $results = cache()->remember($url, 86400, function() use ($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_URL, $url);
            $results = curl_exec($ch);
            curl_close($ch);
            return $results;
        });

        return $results ? json_decode($results, true) : NULL;
    }
}
