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

class VideoService
{

    protected $httpClientService;
    public function __construct()
    {
        $this->httpClientService = new HttpClientService();
    }

    public function expressMode($params)
    {
        $data = [
            'json' => $params,
            'headers' => [
                'secret' => config('veeroll.secret'),
                'api_key' => config('veeroll.api_key'),
            ],
        ];

        return $this->httpClientService->makeRequest('POST', 'video-express-mode', $data);
    }

    public function stepByStep($params)
    {
        $data = [
            'json' => $params,
            'headers' => [
                'secret' => config('veeroll.secret'),
                'api_key' => config('veeroll.api_key'),
            ],
        ];

        return $this->httpClientService->makeRequest('POST', 'video', $data);
    }
}
