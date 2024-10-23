<?php
namespace Veneridze\LaravelMessanger;


use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;

class MessangerProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-messanger')
            //->hasConfigFile()
            ->hasMigrations([
                'create_chat_users_table',
                'create_chats_table',
                'create_messages_table'
            ])
            ->publishesServiceProvider('MessangerProvider')
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    //->publishConfigFile()
                    ->publishMigrations();
                    //->copyAndRegisterServiceProviderInApp();
            });
    }

    public function packageBooted(): void
    {
        //$mediaClass = config('media-library.media_model', Media::class);

        //$mediaClass::observe(new MediaObserver);
    }

    public function packageRegistered(): void
    {
        //$this->app->bind(WidthCalculator::class, config('media-library.responsive_images.width_calculator'));
        //$this->app->bind(TinyPlaceholderGenerator::class, config('media-library.responsive_images.tiny_placeholder_generator'));
//
        //$this->app->scoped(MediaRepository::class, function () {
        //    $mediaClass = config('media-library.media_model');
//
        //    return new MediaRepository(new $mediaClass);
        //});
    }
}
