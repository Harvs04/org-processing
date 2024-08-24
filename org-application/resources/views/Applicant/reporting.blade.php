<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <x-applicant.reporting :startdate="$start_date" :enddate="$end_date" :developers="$developers" :totalreportingcount="$total_reporting_count" :accomplishedreportingcount="$accomplished_reporting_count"  />
            </div>
        </div>
    </div>
</x-app-layout>
