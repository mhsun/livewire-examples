<div class="max-w-full mx-auto">
    <div>
        <h1 class="text-center font-bold">Live Search</h1>
    </div>
    <div class="mb-4">
        <div class="flex mt-4">
            <input
                class="border border-gray-800 focus:border-blue-500 rounded w-full py-2 px-3 mr-4 text-black"
                placeholder="Type anything to search"
                wire:model.debounce.300ms="search"
            />
        </div>
    </div>

    <div class="border-2 bg-white">
        @foreach($tasks as $task)
            <div class="flex mb-4 items-center p-2">
                <p class="w-full border-b-2 p-1"> {{ $task->title }}</p>
            </div>
        @endforeach
    </div>
</div>
