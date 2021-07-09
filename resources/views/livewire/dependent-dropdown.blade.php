<div class="max-w-full mx-auto">
    <div>
        <h1 class="text-center font-bold fo">Dropdown Based on Another Dropdown</h1>
    </div>
    <div class="divide-y divide-gray-200">
        <div class="py-5 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="divide-y divide-gray-200">
                <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <label>User</label>
                        <select wire:model="selectedUserId" class="border-2 rounded p-2">
                            <option value="0">Select a User</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <label>Tasks</label>
                        <select class="border-2 rounded p-2">
                            @forelse($tasks as $task)
                                <option value="{{ $task->id }}">{{ $task->title }}</option>
                            @empty
                                <option value="">No Task Found</option>
                            @endforelse
                        </select>
                </div>
            </div>
        </div>
    </div>
</div>
