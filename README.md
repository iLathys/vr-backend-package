# Veeroll Package

This package allows you to create Veeroll videos using various modes, including express mode.

## Installation

To install the package, run the following command:

```bash
composer require veeroll-package/composer
```

## Configuration
After installing the package, add the VeerollServiceProvider to the providers array in config/app.php:

```
'providers' => ServiceProvider::defaultProviders()->merge([
    Veeroll\VeerollServiceProvider::class,
])->toArray(),
```
## run the command below
```
php artisan vendor:publish --provider="Vendor\Veeroll\VeerollServiceProvider"

```

##  Usage
Below is an example of how to create a Veeroll video:
( note that it will take some time before your images and voice overs will be generated, )
you can always check on key `frames` and `generating_vo` key if voice over is still on process 
and key `generating_ai_image` for images on process for ai generation 
```
use Vendor\Veeroll\Services\VideoService;

$params = [
    "picture_format_id" => 2,
    "duration" => 15, //min of 10 maximum 180(3 minutes) 
    "language_id" => 1,
    "voice_over" => 0, // true or false 
    "captions" => 1, // true or false
    "video_type_id" => 7,
    "video_tone_id" => 3,
    "name" => "test", 
    "topic" => "city lights", // topic of the video that will be used by the AI to generate contents
    "asset_type" => "express_mode", // express_mode => generate AI Images , stock_pictures => generate stock images , plain => solid backgrounds , stock_videos => generate stock videos
    "tone_id" => 1,
    "ai_style_id" => 8,
    "voice" => 1 // true or false
];

$veerollpackage = new VideoService();
$veerollpackage->createVideo($params);

```
## sample response after creating a video
```
 [
  "data" =>  [
    id => 2
  ],
  "message" => "Video created successfully"
]

``` 

## get account credits / balance

```
use Vendor\Veeroll\Services\VideoService;

$veerollpackage = new VideoService();
$veerollpackage->getCredits();
```

## sample response

```
{
    "credits": {
        "ai_credits_balance": "Unlimited",
        "video_credits_balance": "Unlimited",
        "voice_over_credits_balance": "Unlimited",
        "video_duration_credits_balance": "Unlimited",
        "pict_to_video_credits_balance": 0
    }
}

```


## Below is an example of how to generate a video once all your voice overs or images are generated,

```
use Vendor\Veeroll\Services\VideoService;


$veerollpackage = new VideoService();
$videoId = 2;
$veerollpackage->generateVideo($videoId);

```

## To get the generated video urls and download it , you can call on this api to monitor the status of the generation of video
```
use Vendor\Veeroll\Services\VideoService;


$veerollpackage = new VideoService();
$videoId = 2;
$veerollpackage->getVideoURLs($videoId);

```
## a sample reponse will be like this, TAKE NOTE of the status field, if its equal to 0 or false, it means its still on going on the process of generating, with status equal to 1 is finish 

```
[
  "video_export" =>[
    [
      'video_id' => 2,
      'status' => 1, 
      'download_url' => 'https://s3.us-west-2.amazonaws.com/sample.mp4',
      'actual_duration' => 21,
      'date_generated' => "2024-09-26 13:10:01"
      'created_at' => "2024-09-26T05:10:01.000000Z"
      'updated_at' => "2024-09-26T05:13:23.000000Z"
    ]
  ]
]

```



## available picture_format_ids
```
ID  Label              Aspect Ratio  Width  Height

1   Square (1:1)       1:1           1024   1024
2   Vertical (9:16)    9:16          768    1344
3   Wide (16:9)        16:9          1344   768
```

## available language_id

```
ID  Label               Language

1   English             English US
2   English UK          English UK
3   Portuguese          Portuguese
4   Spanish             Spanish
5   French              French
6   German              German
7   Italian             Italian
8   Dutch               Dutch
9   Bahasa Indonesia    Bahasa Indonesia
10  Mandarin            Mandarin
11  Filipino            Filipino
12  Latin edit          Latin

```

## available video_type_id

```
ID  Label

1   Fun facts
2   Listicle
3   Tips
4   Education
5   Short-story
6   Motivation
7   Default

```

## available video_tone_id

```
ID  Label            Tone

1   Corporate        The video style is corporate.
2   Marketing        The video purpose is for marketing.
3   Casual           The video tone should be casual.
4   Energetic        The video tone should be energetic.
5   Educational      The video style is educational.
6   Intriguing       The video tone should be intriguing.
7   Humorous         The video tone should be humorous.
8   Serious          The video tone should be serious.
9   Inspirational    The video should be inspirational.
10  Motivational     The video style should be motivational.
11  Dramatic         The video style should be dramatic.
12  Joyful           The video tone should be joyful.

```

## available ai_style_id , this is for the visuals ( images / videos)
```
ID  Label               Style           Description

1   Pencil sketch       Line-art        Black and white hand-drawn pencil sketch
2   Comic Book          Comic-book      Colored comic book style drawing
3   Anime               Anime           Colored anime style drawing
4   2D isometric        Isometric       2D isometric style
5   Photo realistic     Photographic    Photo realistic picture
6   Origami             Origami         Origami style drawing
7   Pixel art           Pixel-art       Pixel art style drawing
8   Movie style         Cinematic       Movie style picture
9   Colour marker       Digital-art     Colour marker style sketch
10  Neon                Neon-punk       Neon style drawing
11  3D model            3D-model        3D render picture
12  Sepia               Line-art        Sepia hand-drawn pencil sketch
13  Watercolor          Line-art        Watercolor drawing
14  Fantasy             Digital-art     Fantasy drawing
15  Polygon             Digital-art     Polygon style drawing
16  2D Flat             Enhance         2D explainer video-style picture (flat:0.9, minimal:0.9, simple shapes:0.9)


```

## available tone_id ( music_tones)
```
ID  Label

1   Carefree
2   Epic
3   Exciting
4   Funny
5   Groovy
6   Happy
7   Love
8   Mysterious
9   Peaceful
10  Uplifting




## Environment Variables
Make sure to set the following environment variables in your .env file:

```
VEEROLL_SECRET=your-secret-value
VEEROLL_API_KEY=your-api-key
```