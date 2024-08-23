<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    @if (isset($panel) >= 1)
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
            Your Panel Interview will proceed at {{ $panel->location }} on {{ date('F j, Y', strtotime($panel->date)) }} at exactly {{ date('g:i a', strtotime($panel->start_time)) }}!
        </h1>
        @php
            $status = $panel->status;
            $class = $status === 'starting' 
                        ? 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300'
                        : ($status === 'ongoing' 
                            ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300'
                            : ($status === 'accomplished' 
                                ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300'
                                : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300')); // Red status

            $text = $status === 'starting' 
                        ? 'Pending' 
                        : ($status === 'ongoing' 
                            ? 'In progress' 
                            : ($status === 'accomplished' 
                                ? 'Accomplished' 
                                : 'Failed'));
        @endphp
        <span class="{{ $class }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $text }}</span>
    @else
        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
            You have no scheduled panel interview.
        </h1>
    @endif

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        This simple laravel application simulates the application process for upcoming batch of developers for Alliance of Computer Science Students - UPLB. 
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6">
    <p class="text-gray-500 dark:text-gray-400 leading-relaxed">Your group</p>
    @if (count($groupmates) > 0)
        @foreach ($groupmates as $member)
            {{ $member->nickname }}
        @endforeach
    @endif
</div>
