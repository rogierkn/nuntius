## Installation

**Register service provider**  
Add ``Nuntius\NuntiusServiceProvider::class`` to the providers in your ``config/app.php``

**Register Nuntius middleware**  
Add ``'canUseNuntius' => \Nuntius\Http\Middleware\CanUseNuntius::class`` to the routeMiddleware array in ``app/Http/kernel.php``  

**Register the gate to check if User can use Nuntius**  
Create a gate in the ``boot()`` method in your app's ``app/Providers/AuthServiceProvider`` and define your way of checking if a User is authorized.
````php
Gate::define(config('nuntius.gate'), function($user) {
    return $user->isAdmin();
});
````