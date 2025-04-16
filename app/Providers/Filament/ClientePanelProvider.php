<?php

namespace App\Providers\Filament;

use App\Filament\Auth\CustomLogin;
use App\Filament\Cliente\Pages\Dashboard;
use App\Filament\Cliente\Widgets\KpiCustomer;
use App\Http\Middleware\AddUserMenuItems;
use App\Http\Middleware\UserIsCustomer;
use App\Models\Setting;
use Filament\FontProviders\GoogleFontProvider;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Pages;
use Filament\Pages\Auth\EditProfile;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ClientePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->maxContentWidth('full')
            ->id('cliente')
            ->path('painel')
            ->login(CustomLogin::class)
            ->profile()
            ->colors([
                'primary' => "#0C356A",
            ])
            ->theme(asset('css/filament/admin/theme.css'))
            ->font('Poppins', provider: GoogleFontProvider::class)
            ->topNavigation()
            ->brandName(Setting::first()->title)
            ->brandLogo(fn() => view('filament.admin.logo', ['settings' => Setting::first()]))
            ->favicon(asset('images/logo.png'))
            ->discoverResources(in: app_path('Filament/Cliente/Resources'), for: 'App\\Filament\\Cliente\\Resources')
            ->discoverPages(in: app_path('Filament/Cliente/Pages'), for: 'App\\Filament\\Cliente\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Cliente/Widgets'), for: 'App\\Filament\\Cliente\\Widgets')
            ->widgets([
                KpiCustomer::class,
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Admin')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->url('/admin')
                    ->visible(fn(): bool => auth()->user()->is_admin),
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
