<div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

    <h1 class="mt-8 text-2xl font-medium text-gray-900 dark:text-white">
    Your Panel Interview will proceed at {{ Auth::user()->panel_group->panel_interview->location }} on {{ date('F j, Y', strtotime(Auth::user()->panel_group->panel_interview->date)) }} at exactly {{ date('g:i a', strtotime(Auth::user()->panel_group->panel_interview->start_time)) }}!
    </h1>

    <p class="mt-6 text-gray-500 dark:text-gray-400 leading-relaxed">
        This simple laravel application simulates the application process for upcoming batch of developers for Alliance of Computer Science Students - UPLB. 
    </p>
</div>

<div class="bg-gray-200 dark:bg-gray-800 bg-opacity-25 p-6">
</div>
