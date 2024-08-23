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

    // this is the express mode
    public function createVideo($params)
    {
        $data = [ 
            'json' => $params,
            'headers' => [
                'api-secret' => config('veeroll.secret'),
                'api-key' => config('veeroll.api_key'),
            ],
        ];

        return $this->httpClientService->makeRequest('POST', 'video-express-mode', $data);
    }
    public function updateVideo($params,$id)
    {
        $data = [ 
            'json' => $params,
            'headers' => [
                'api-secret' => config('veeroll.secret'),
                'api-key' => config('veeroll.api_key'),
            ],
        ];

        return $this->httpClientService->makeRequest('PUT', "video/$id", $data);
    }

    public function getVideo($id)
    {
        $data = [ 
            'json' => [],
            'headers' => [
                'api-secret' => config('veeroll.secret'),
                'api-key' => config('veeroll.api_key'),
            ],
        ];
        return $this->httpClientService->makeRequest('GET', "video/$id",$data);
    }

    public function generateVideo($id)
    {
        $data = [ 
            'json' => [],
            'headers' => [
                'api-secret' => config('veeroll.secret'),
                'api-key' => config('veeroll.api_key'),
            ],
        ];
        return $this->httpClientService->makeRequest('GET', "videos/generate-video/$id",$data);
    }

    public function generateAIcontent($params)
    {
        $data = [
            'json' => $[],
            'headers' => [
                'secret' => config('veeroll.secret'),
                'api_key' => config('veeroll.api_key'),
            ],
        ];

        return $this->httpClientService->makeRequest('POST', "videos/generate-ai-content/$id",$data);
    }
}
