install package
`composer require veeroll-package/composer`


add on providers , config/app.php

  'providers' => ServiceProvider::defaultProviders()->merge([
        VeerollServiceProvider::class,
    ])->toArray(),
