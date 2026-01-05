<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class MusicBrainzService
{
    /**
     * Validate if an artist exists on MusicBrainz.
     *
     * @param string $artistName
     * @return bool
     */
    public function artistExists(string $artistName): bool|string
    {
        try {
            $response = Http::timeout(5)->get('https://musicbrainz.org/ws/2/artist/', [
                'query' => $artistName,
                'fmt' => 'json',
                'limit' => 1,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return isset($data['artists']) && count($data['artists']) > 0;
            }
            if ($response->status() === 503 || $response->status() === 429) {
                return 'MusicBrainz API is temporarily unavailable or rate-limited. Please try again later.';
            }
        } catch (\Exception $e) {
            return 'Could not connect to MusicBrainz. Please try again later.';
        }
        return false;
    }
}
