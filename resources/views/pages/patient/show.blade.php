<x-layout>

    <x-profile :patient="$patient" route="device" />

    <x-cardlist title="Device Controls">
        <a class="button" href="/device/{id}/turn_now">Click here to turn device</a>
    </x-cardlist>

</x-layout>
