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
Express Mode - Create Veeroll Video
Below is an example of how to use the expressMode method to create a Veeroll video:

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
    "asset_type" => "express_mode",
    "tone_id" => 1,
    "ai_style_id" => 8,
    "voice" => 1 // true or false
];

$veerollpackage = new VideoService();
$veerollpackage->expressMode($params);

```

## available picture_format_ids

ID  Label              Aspect Ratio  Width  Height

1   Square (1:1)       1:1           1024   1024
2   Vertical (9:16)    9:16          768    1344
3   Wide (16:9)        16:9          1344   768



## available language_id


ID  Label       Language

1	English	    English US
2	English UK	English UK
3	Portuguese	Portuguese
4	Spanish	    Spanish
5	French	    French
6	German  	German
7	Italian	    Italian
8	Dutch	    Dutch
9	Bahasa Indonesia	Bahasa Indonesia
10	Mandarin	Mandarin
11	Filipino	Filipino
12	Latin edit	Latin


## available video_type_id

```
ID  Label

1	Fun facts
2	Listicle
3	Tips
4	Education
5	Short-story
6	Motivation
7   Default
```

## available video_tone_id

```
ID label            tone

1	Corporate	    The video style is corporate.
2	Marketing	    The video purpose is a for marketing
3	Casual	        The video tone should be casual
4	Energetic	    The video tone should be energetic
5	Educational	    The video style is educational
6	Intriguing	    The video tone should be intriguing
7	Humorous	    The video tone should be humorous
8	Serious	        The video tone should be serious
9	Inspirational	The video should be inspirational
10	Motivational	The video style should be motivational
11	Dramatic	    The video style should be dramatic
12	Joyful	        The video tone should be joyful
```

## available ai_style_id , this is for the visuals ( images / videos)
```
ID label                style           description

1	Pencil sketch	    line-art	    black and white hand drawn pencil sketch
2	Comic Book	        comic-book	    Colored comic book style drawing
3	Anime	            anime	        coloured anime style drawing
4	2D isometric	    isometric	    2D isometric style
5	Photo realistic	    photographic	photo realistic picture
6	Origami	            origami	        Origami style drawing
7	Pixel art	        pixel-art	    Pixel art style drawing
8	Movie style	        cinematic	    movie style picture
9	Colour marker	    digital-art	    Colour marker style sketch
10	Neon	            neon-punk	    neon style drawing
11	3D model	        3d-model	    3D render picture
12	Sepia	            line-art	    sepia hand drawn pencil sketch
13	Watercolor	        line-art	    watercolor drawing
14	Fantasy	            digital-art	    Fantasy drawing
15	Polygon	            digital-art	    Polygon style drawing
16	2D Flat	            enhance	        2D explainer video-style picture (flat:0.9, minimal:0.9, simple shapes:0.9)

```

## available tone_id ( music_tones)
```
ID Label

1	Carefree
2	Epic
3	Exciting
4	Funny
5	Groovy
6	Happy
7	Love
8	Mysterious
9	Peaceful
10	Uplifting

```

## Environment Variables
Make sure to set the following environment variables in your .env file:

```
VEEROLL_SECRET=your-secret-value
VEEROLL_API_KEY=your-api-key
```