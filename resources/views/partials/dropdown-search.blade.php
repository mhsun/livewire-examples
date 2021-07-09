<div class="flex justify-center items-center h-screen bg-gray-100">
    <div x-data="setup()">
        <ul class="flex justify-center items-center my-4">
            <template x-for="(tab, index) in tabs" :key="index">
                <li class="cursor-pointer py-2 px-4 text-gray-500 border-b-8"
                    :class="activeTab===index ? 'text-green-500 border-green-500' : ''" @click="activeTab = index"
                    x-text="tab"></li>
            </template>
        </ul>

        <div class="w-full bg-indigo-100 p-16 mx-auto border">
            <div x-show="activeTab===0">
                <livewire:dependent-dropdown/>
            </div>
            <div x-show="activeTab===1">
                <livewire:live-search/>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script>
        function setup() {
            return {
                activeTab: 0,
                tabs: [
                    "Dependent Dropdown",
                    "Live Search",
                ]
            };
        }
    </script>
@endpush
