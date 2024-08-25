<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
        You may do your reporting during 
        <span class="font-bold">{{ date('F j, Y', strtotime($start_date)) }}</span>
        until 
        <span class="font-bold">{{ date('F j, Y', strtotime($end_date)) }}</span>.
    </h1>
    @php
        $progress = $progress_badge($accomplished_reporting_count, $total_reporting_count);
    @endphp
    <div class="flex flex-row items-center gap-2 mt-2">
        <p class="text-gray-500 dark:text-gray-400 leading-relaxed">
            Reporting Completed: 
        </p>
        <span class="{{ $progress }} text-sm font-medium me-2 px-2.5 py-0.5 rounded inline-flex items-center">{{ $accomplished_reporting_count . "/" . $total_reporting_count }}</span>
    </div>


    
    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        This simple laravel application simulates the application process for the upcoming batch of developers for the Alliance of Computer Science Students - UPLB. 
    </p>
</div>

<div class="flex flex-col gap-2 bg-gray-200 dark:bg-gray-800 bg-opacity-25 relative pt-6 px-6 border-b border-gray-200 dark:border-gray-700">
    <h1 class="ml-2 text-2xl font-medium text-gray-900 dark:text-white">
        Assigned developers
    </h1>
    <p class="ml-2 text-gray-500 dark:text-gray-400 leading-relaxed">
        The list below contains the developers assigned to you for your reporting part of the process.
    </p>
    <div class="flex flex-col gap-5 pb-6">
        <div x-data="{ isOpen: false }" class="relative">
            <button type="button" @click="isOpen = !isOpen" 
                    class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                <span x-text="'Academic Affairs'"></span>
                <svg :class="isOpen ? 'rotate-180' : ''" class="w-2.5 h-2.5 ms-3 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <ol x-show="isOpen" class="list-decimal z-10 ml-10 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 w-full">
                @foreach($developers['Academic'] as $developer)
                    <li class="my-1">
                        {{ $developer['developer']->first_name . ' "' . $developer['developer']->nickname . '" ' . $developer['developer']->last_name }}
                    </li>
                    @php
                        $statusDetails = $status_badge($developer);
                    @endphp
                    <span class="{{ $statusDetails['class'] }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $statusDetails['text'] }}</span>
                @endforeach
            </ol>
        </div>
        <div x-data="{ isOpen: false }" class="relative">
            <button type="button" @click="isOpen = !isOpen" 
                    class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                <span x-text="'Logistics and Public Affairs'"></span>
                <svg :class="isOpen ? 'rotate-180' : ''" class="w-2.5 h-2.5 ms-3 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <ol x-show="isOpen" class="list-decimal z-10 ml-10 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 w-full">
                @foreach($developers['Logistics'] as $developer)
                    <li class="my-1">
                        {{ $developer['developer']->first_name . ' "' . $developer['developer']->nickname . '" ' . $developer['developer']->last_name }}
                    </li>
                    @php
                        $statusDetails = $status_badge($developer);
                    @endphp
                    <span class="{{ $statusDetails['class'] }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $statusDetails['text'] }}</span>
                @endforeach
            </ol>
        </div>
        <div x-data="{ isOpen: false }" class="relative">
            <button type="button" @click="isOpen = !isOpen" 
                    class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                <span x-text="'Membership and Internal Affairs'"></span>
                <svg :class="isOpen ? 'rotate-180' : ''" class="w-2.5 h-2.5 ms-3 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <ol x-show="isOpen" class="list-decimal z-10 ml-10 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 w-full">
                @foreach($developers['Membership'] as $developer)
                    <li class="my-1">
                        {{ $developer['developer']->first_name . ' "' . $developer['developer']->nickname . '" ' . $developer['developer']->last_name }}
                    </li>
                    @php
                        $statusDetails = $status_badge($developer);
                    @endphp
                    <span class="{{ $statusDetails['class'] }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $statusDetails['text'] }}</span>
                @endforeach
            </ol>
        </div>
        <div x-data="{ isOpen: false }" class="relative">
            <button type="button" @click="isOpen = !isOpen" 
                    class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                <span x-text="'Records and Documentation'"></span>
                <svg :class="isOpen ? 'rotate-180' : ''" class="w-2.5 h-2.5 ms-3 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <ol x-show="isOpen" class="list-decimal z-10 ml-10 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 w-full">
                @foreach($developers['Documentation'] as $developer)
                    <li class="my-1">
                        {{ $developer['developer']->first_name . ' "' . $developer['developer']->nickname . '" ' . $developer['developer']->last_name }}
                    </li>
                    @php
                        $statusDetails = $status_badge($developer);
                    @endphp
                    <span class="{{ $statusDetails['class'] }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $statusDetails['text'] }}</span>
                @endforeach
            </ol>
        </div>
        <div x-data="{ isOpen: false }" class="relative">
            <button type="button" @click="isOpen = !isOpen" 
                    class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                <span x-text="'Finance and Management'"></span>
                <svg :class="isOpen ? 'rotate-180' : ''" class="w-2.5 h-2.5 ms-3 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <ol x-show="isOpen" class="list-decimal z-10 ml-10 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 w-full">
                @foreach($developers['Finance'] as $developer)
                    <li class="my-1">
                        {{ $developer['developer']->first_name . ' "' . $developer['developer']->nickname . '" ' . $developer['developer']->last_name }}
                    </li>
                    @php
                        $statusDetails = $status_badge($developer);
                    @endphp
                    <span class="{{ $statusDetails['class'] }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $statusDetails['text'] }}</span>
                @endforeach
            </ol>
        </div>
        <div x-data="{ isOpen: false }" class="relative">
            <button type="button" @click="isOpen = !isOpen" 
                    class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                <span x-text="'Media and Publicity'"></span>
                <svg :class="isOpen ? 'rotate-180' : ''" class="w-2.5 h-2.5 ms-3 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <ol x-show="isOpen" class="list-decimal z-10 ml-10 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 w-full">
                @foreach($developers['Publicity'] as $developer)
                    <li class="my-1">
                        {{ $developer['developer']->first_name . ' "' . $developer['developer']->nickname . '" ' . $developer['developer']->last_name }}
                    </li>
                    @php
                        $statusDetails = $status_badge($developer);
                    @endphp
                    <span class="{{ $statusDetails['class'] }} text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $statusDetails['text'] }}</span>
                @endforeach
            </ol>
        </div>
    </div>
</div>

<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
        Applicants with the same reporting assignment   
    </h1>
    <div class="flex flex-row items-center gap-2 mt-2">
        <p class="text-gray-500 dark:text-gray-400 leading-relaxed">
            You may want to contact the following applicants below to have company when it is your time to report to a developer.
        </p>
    </div>

    <!-- teams dropdown -->
    <div x-data="{ selectedTeam: '', isOpen: false }" class="relative mt-3">
        <!-- dropdown toggle -->
        <button type="button" @click="isOpen = !isOpen" 
                class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
            <span x-text="selectedTeam ? selectedTeam : 'Select a Team'"></span>
            <svg :class="isOpen ? 'rotate-180' : ''" class="w-2.5 h-2.5 ms-3 transition-transform transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        
        <!-- dropdown menu -->
        <ul x-show="isOpen" @click.outside="isOpen = false" class="z-10 ml-5 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 py-2.5 w-full">
            @foreach($overlap as $team => $devs)
                <li @click="selectedTeam = '{{ $team }}'; isOpen = false" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    {{ $team }}
                </li>
            @endforeach
        </ul>
        
        <!-- developers list -->
        <div class="mt-4">
            @foreach($overlap as $team => $devs)
                <div x-show="selectedTeam === '{{ $team }}'" class="text-gray-500 dark:text-gray-400 leading-relaxed ml-10">
                    <h2 class="text-lg font-semibold">Developers</h2>
                    <ol class="list-decimal ml-5 mt-3">
                        @foreach($devs as $devName => $applicants)
                            <li>
                                {{ $devName }}
                                <ul class="list-disc ml-5">
                                    @foreach($applicants as $applicant)
                                        <li class="px-4 py-2">
                                            {{ $applicant->first_name . " " . $applicant->last_name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ol>
                </div>
            @endforeach
        </div>
    </div>

</div>

