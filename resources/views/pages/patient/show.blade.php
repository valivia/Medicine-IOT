<x-layout>

    <x-profile :patient="$patient" route="device" />

    <x-cardlist title="Device Controls">
        <form method="POST" action="{{ route('device.rotate', [$patient->device_id, -1]) }}">
            @csrf
            <button class="button" data-variant="secondary" type="submit">
                Back
            </button>
        </form>

        <form method="POST" action="{{ route('device.rotate', [$patient->device_id, 1]) }}">
            @csrf
            <button class="button" data-variant="secondary" type="submit">
                Next
            </button>
        </form>
    </x-cardlist>

</x-layout>
