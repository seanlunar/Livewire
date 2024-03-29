<div>
    {{-- The whole world belongs to you. --}}
    <div class="flex flex-col gap-6 mx-auto py-16">
       <select wire:model='selectedContinent' wire:change='changeContinent'>
        <option value="-1">Select continent</option>
       @foreach ($continents as $continent)
        <option value="{{ $continent->id }}">{{ $continent->name }}</option>
       @endforeach
       </select>
    </div>
    <div class="flex relative">
        <p wire:loading class="absolute left-0 top-0 right-0 bottom-0 bg-white bg-opacity-90 py-2">
            Loading.....
        </p>
        <select wire:model='selectedCountry' class="flex-1">
            <option value="-1">Please select a country</option>

            @foreach ($countries as $country)
             <option value="{{ $country->id }}">{{ $country->name }}</option>

            @endforeach
        </select>

    </div>
</div>
