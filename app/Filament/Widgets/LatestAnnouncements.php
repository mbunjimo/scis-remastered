<?php

namespace App\Filament\Widgets;

use App\Models\Announcement;
use Filament\Widgets\Widget;

class LatestAnnouncements extends Widget
{
    protected static string $view = 'filament.widgets.latest-announcements';

    protected int | string | array $columnSpan = 'full';

    public function getAnnouncements()
    {
        return Announcement::query()
            ->where('status', 'active')
            ->whereDate('expiry_date', '>=', now())
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
    }
} 