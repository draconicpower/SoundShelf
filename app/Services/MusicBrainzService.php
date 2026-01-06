<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class MusicBrainzService
{
    /**
     * Fetch artist portrait from MusicBrainz (if available).
     * @param string $artistId
     * @return string|null
     */
    public function getArtistPortrait(string $artistId): ?string
    {
        $url = "https://musicbrainz.org/ws/2/artist/{$artistId}?inc=url-rels&fmt=json";
        $response = \Illuminate\Support\Facades\Http::timeout(5)->get($url);
        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['relations'])) {
                foreach ($data['relations'] as $rel) {
                    if ($rel['type'] === 'image' && isset($rel['url']['resource'])) {
                        return $rel['url']['resource'];
                    }
                }
            }
        }
        return null;
    }
    /**
     * Validate if an artist exists on MusicBrainz.
     *
     * @param string $artistName
     * @return bool
     */
    public function artistExists(string $artistName): array|string
    {
        try {
            $response = Http::timeout(5)->get('https://musicbrainz.org/ws/2/artist/', [
                'query' => $artistName,
                'fmt' => 'json',
                'limit' => 1,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['artists']) && count($data['artists']) > 0) {
                    $artist = $data['artists'][0];
                    return [
                        'id' => $artist['id'] ?? null,
                        'name' => $artist['name'] ?? $artistName,
                    ];
                } else {
                    return false;
                }
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
