<x-filament-widgets::widget>
    <div class="flex flex-col gap-4">
        <div class="flex items-center gap-2">
            <x-filament::icon
                icon="heroicon-o-megaphone"
                class="h-5 w-5 text-primary-500"
            />
            <h2 class="text-lg font-bold tracking-tight">Latest Announcements</h2>
        </div>

        <div class="grid gap-4 lg:grid-cols-3">
            @foreach($this->getAnnouncements() as $announcement)
                <div class="rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                    <div class="flex flex-row gap-4 p-4">
                        @if($announcement->image)
                            <div class="flex-shrink-0 w-24 h-24">
                                <img 
                                    src="{{ Storage::url($announcement->image) }}" 
                                    alt="{{ $announcement->title }}"
                                    class="w-24 h-24 rounded-lg object-cover"
                                />
                            </div>
                        @endif
                    
                        <div class="flex flex-col gap-2 w-full">
                            <div class="space-y-2">
                                <h3 class="text-base font-medium tracking-tight">
                                    {{ $announcement->title }}
                                </h3>
                                
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ Str::limit($announcement->description, 100) }}
                                </p>
                                
                                <div class="flex items-center gap-2 text-sm">
                                    <span class="font-medium">
                                        Expires: {{ $announcement->expiry_date->format('M d, Y') }}
                                    </span>
                                    
                                    <span @class([
                                        'rounded-full px-2 py-1 text-xs font-medium',
                                        'bg-danger-50 text-danger-600' => $announcement->priority === 1,
                                        'bg-warning-50 text-warning-600' => $announcement->priority === 2,
                                        'bg-success-50 text-success-600' => $announcement->priority === 3,
                                    ])>
                                        @if($announcement->priority === 1)
                                            High Priority
                                        @elseif($announcement->priority === 2)
                                            Medium Priority
                                        @else
                                            Low Priority
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-filament-widgets::widget> 