<div>
    {{-- In work, do what you enjoy. --}}
    <div class="py-6 px-4 flex justify-between bg-white dark:bg-slate-800">
        <div class="">
            <p class="text-lg font-semibold text-gray-800 dark:text-gray-100">Departments</p>
        </div>
        @livewire('department.new-department-modal')
    </div>
    @livewire('department.departments-list-cards')
</div>
