<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-applicant.panel-interview :group="$group" :paneldate="$panel_interview_date" :panel="$panel" :groupmates="$groupmates"/>
            </div>
        </div>
    </div>
</x-app-layout>
