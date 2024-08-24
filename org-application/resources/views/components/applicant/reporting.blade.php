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
        <div class="relative">
            <input type="checkbox" id="dropdownToggleOne" class="hidden">
            <label for="dropdownToggleOne" class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                Academic Affairs 
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </label>

            <!-- Dropdown menu -->
            <div class="z-10 hidden w-full bg-gray-200 dark:bg-gray-800 bg-opacity-25 text-white divide-y  rounded-lg  " id="dropdownMenuOne">
                <ol class="list-decimal ml-16 text-md">
                    @foreach ($developers['Academic'] as $developer)
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
        <div class="relative">
            <input type="checkbox" id="dropdownToggleTwo" class="hidden">
            <label for="dropdownToggleTwo" class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                Logistics and Public Affairs 
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </label>

            <!-- Dropdown menu -->
            <div class="z-10 hidden w-full bg-gray-200 dark:bg-gray-800 bg-opacity-25 text-white divide-y  rounded-lg  " id="dropdownMenuTwo">
                <ol class="list-decimal ml-16 text-md">
                    @foreach ($developers['Logistics'] as $developer)
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
        <div class="relative">
            <input type="checkbox" id="dropdownToggleThree" class="hidden">
            <label for="dropdownToggleThree" class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                Membership and Internal Affairs 
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </label>

            <!-- Dropdown menu -->
            <div class="z-10 hidden w-full bg-gray-200 dark:bg-gray-800 bg-opacity-25 text-white divide-y  rounded-lg  " id="dropdownMenuThree">
                <ol class="list-decimal ml-16 text-md">
                    @foreach ($developers['Membership'] as $developer)
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
        <div class="relative">
            <input type="checkbox" id="dropdownToggleFour" class="hidden">
            <label for="dropdownToggleFour" class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                Records and Documentation 
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </label>

            <!-- Dropdown menu -->
            <div class="z-10 hidden w-full bg-gray-200 dark:bg-gray-800 bg-opacity-25 text-white divide-y  rounded-lg  " id="dropdownMenuFour">
                <ol class="list-decimal ml-16 text-md">
                    @foreach ($developers['Documentation'] as $developer)
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
        <div class="relative">
            <input type="checkbox" id="dropdownToggleFive" class="hidden">
            <label for="dropdownToggleFive" class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                Finance and Management
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </label>

            <!-- Dropdown menu -->
            <div class="z-10 hidden w-full bg-gray-200 dark:bg-gray-800 bg-opacity-25 text-white divide-y  rounded-lg  " id="dropdownMenuFive">
                <ol class="list-decimal ml-16 text-md">
                    @foreach ($developers['Finance'] as $developer)
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
        <div class="relative">
            <input type="checkbox" id="dropdownToggleSix" class="hidden">
            <label for="dropdownToggleSix" class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
                Media and Publicity 
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </label>

            <!-- Dropdown menu -->
            <div class="z-10 hidden w-full bg-gray-200 dark:bg-gray-800 bg-opacity-25 text-white divide-y  rounded-lg  " id="dropdownMenuSix">
                <ol class="list-decimal ml-16 text-md">
                    @foreach ($developers['Publicity'] as $developer)
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
</div>

<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">
        Applicants with the same reporting assignment   
    </h1>
    <div class="flex flex-row items-center gap-2 mt-2">
        <p class="text-gray-500 dark:text-gray-400 leading-relaxed">
            You may want to contact the following applicants below to have a company when it is your time to report to a developer.
        </p>
    </div>
    
    <!-- Teams Dropdown -->
    <div class="relative">
        <input type="checkbox" id="teamDropdownToggle" class="hidden">
        <label for="teamDropdownToggle" class="cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-xl font-medium dark:text-white px-5 py-2.5 text-center inline-flex items-center w-full">
            Select a Team
            <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </label>
        
        <ul class="team-dropdown-menu hidden ml-5 cursor-pointer text-white bg-gray-200 dark:bg-gray-800 bg-opacity-25 rounded-lg text-md font-light dark:text-white px-5 py-2.5 w-full">
            @foreach($overlap as $team => $devs)
                <li class="relative">
                    <input type="radio" id="team-{{ $team }}" name="team" class="hidden">
                    <label for="team-{{ $team }}" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                        {{ $team }}
                    </label>
                    
                    <ol class="list-decimal developer-dropdown-menu hidden ml-5">
                        @foreach($devs as $devId => $applicants)
                            <li class="relative">
                                <input type="radio" id="dev-{{ $devId }}" name="developer-{{ $team }}" class="hidden">
                                <label for="dev-{{ $devId }}" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Developer ID: {{ $devId }}
                                </label>
                                
                                <ol class="list-decimal applicants-list hidden ml-5">
                                    @foreach($applicants as $applicant)
                                        <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                            {{ $applicant->first_name }}
                                        </li>
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ol>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<style>
    /* Show team dropdown menu when checkbox is checked */
    #teamDropdownToggle:checked + label + .team-dropdown-menu {
        display: block;
    }

    /* Show developer dropdown menu when team radio is checked */
    input[name="team"]:checked + label + .developer-dropdown-menu {
        display: block;
    }

    /* Show applicants list when developer radio is checked */
    input[name^="developer"]:checked + label + .applicants-list {
        display: block;
    }
</style>

<style>
    #dropdownToggleOne:checked + label + #dropdownMenuOne {
        display: block;
    }
    #dropdownToggleTwo:checked + label + #dropdownMenuTwo {
        display: block;
    }
    #dropdownToggleThree:checked + label + #dropdownMenuThree {
        display: block;
    }
    #dropdownToggleFour:checked + label + #dropdownMenuFour {
        display: block;
    }
    #dropdownToggleFive:checked + label + #dropdownMenuFive {
        display: block;
    }
    #dropdownToggleSix:checked + label + #dropdownMenuSix {
        display: block;
    }
</style>

