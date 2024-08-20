<?php

namespace Vendor\Veeroll\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Video;
use App\Models\Language;
use App\Models\TextEffect;
use App\Models\MusicLibrary;
use App\Models\VideoEffect;
use App\Http\Resources\VideoResource;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
class HttpClientService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://dev-api.veeroll.com/api/', // Your original project base URL
            'timeout'  => 10.0,
        ]);
    }

    public function makeRequest($method, $uri, $options = [])
    {
        try {
            $response = $this->client->request($method, $uri, $options);
            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            // Handle exceptions or log them
            return ['error' => $e->getMessage()];
        }
    }
}
