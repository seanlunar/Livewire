<div>
    {{-- In work, do what you enjoy. --}}
    <div class="flex flex-col items-center">
        <div class="flex p-16 mx-auto justify-center items-center gap-4">
            <input type="number" wire:model="number1" placeholder="Number 1">
            <select class="w-24" wire:model="action" id="">
                <option>+</option>
                <option>-</option>
                <option>*</option>
                <option>/</option>
                <option>%</option>

            </select>
<input type="number" wire:model="number2" placeholder="number2">
<button wire:click="calculate" class="py-2 px-4 bg-indigo-500" {{ $disabled ? 'disabled': '' }}>=</button>

<p>
    {{ $result }}
</p>
        </div>
    </div>
</div>
