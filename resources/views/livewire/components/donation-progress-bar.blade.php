<div>
    <div class="flex justify-between mb-1 mt-5">
        <span class="text-sm font-medium text-black-700">Donation: {{'RM'.number_format($arrProject[0]['sum_donation'], 2) .' / '. 'RM'.number_format($arrProject[0]['donation_needed'], 2) }}</span>
        <span class="text-sm font-medium text-blue-700">{{ $arrProject[0]['percentage'] }}</span>
    </div>
    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
        <div id="{{ $project_title }}" class="bg-blue-600 h-2.5 rounded-full" style="width:{{ $arrProject[0]['percentage'] }}"></div>
    </div>
</div>
