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
php artisan vendor:publish --provider="Veeroll\VeerollServiceProvider"
```

##  Usage
Express Mode - Create Veeroll Video
Below is an example of how to use the expressMode method to create a Veeroll video:

```
use Vendor\Veeroll\Services\VideoService;

$params = [
    "picture_format_id" => 2,
    "duration" => 15,
    "language_id" => 1,
    "voice_over" => 0,
    "captions" => 1,
    "video_type_id" => 7,
    "video_tone_id" => 3,
    "name" => "test",
    "topic" => "test topic",
    "asset_type" => "express_mode",
    "tone_id" => 1,
    "ai_style_id" => 8,
    "voice" => 1
];

$veerollpackage = new VideoService();
$veerollpackage->expressMode($params);

```

## Environment Variables
Make sure to set the following environment variables in your .env file:

```
VEEROLL_SECRET=your-secret-value
VEEROLL_API_KEY=your-api-key
```