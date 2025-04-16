<?php

namespace App\Providers\Filament;

use App\Http\Middleware\AddUserMenuItems;
use App\Http\Middleware\UserIsAdmin;
use App\Http\Middleware\VerifyIsAdmin;
use App\Models\Setting;
use App\Models\User;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Panel;
use Filament\PanelProvider;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->maxContentWidth('full')
            ->default()
            ->id('admin')
            ->path('admin')
            ->colors([
                'primary' => "#0C356A",
            ])
            ->sidebarWidth('20rem')
            ->sidebarCollapsibleOnDesktop()
            ->collapsedSidebarWidth('6rem')
            ->collapsibleNavigationGroups(false)
            // ->topNavigation()
            ->sidebarFullyCollapsibleOnDesktop()
            ->theme(asset('css/filament/admin/theme.css'))
            ->font('Poppins', provider: GoogleFontProvider::class)
            ->darkMode(true)
            // ->brandName(Setting::first()->title)
            // ->brandLogo(asset('images/logo.png'))
            ->brandLogo(fn() => view('filament.admin.logo', ['settings' => Setting::first()]))
            ->favicon(asset('images/logo.png'))
            ->brandLogoHeight('3rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                // Pages\Dashboard::class,
            ]) 
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([

                // Widgets\AccountWidget::class,
                // Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                VerifyIsAdmin::class
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Usuário')
                    ->url('/painel')
                    ->icon('heroicon-o-cog-6-tooth'),
                'logout' => MenuItem::make()->label('Sair'),
            ])
            ->renderHook(
                // This line tells us where to render it
                'panels::sidebar.footer',
                // This is the view that will be rendered
                fn() => view('filament.customFooter'),
            )->spa();
    }
}
