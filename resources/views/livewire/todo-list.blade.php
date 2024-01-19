<div class="flex flex-col mx-auto">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <div class="flex gap-4 justify-between">
        <input type="text" wire:model="todoText" wire:keydown.enter="addTodo" placeholder="type and hit enter">
        <button wire:click='addTodo'>
            Save
        </button>
    </div>
    <div class="py-6">

        @if (count($todos) == 0)
            <p>
                there are no todos
            </p>
        @endif
        @foreach ($todos as $index => $todo)
            <div class="flex gap-4 justify-between items-center py-1">
                <input type="checkbox" {{ $todo->completed ? 'checked':'' }} wire:change='toggleTodos({{ $todo->id }})'>
                <label class="flex-1"  {{ $todo->completed ? 'line-through':'' }}>{{ $todo->todo }} </label>
                <button wire:click='deleteTodo({{ $todo->id }})'>
delete
                </button>
            </div>
        @endforeach
    </div>
</div>
