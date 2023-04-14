<x-layout>

    <x-profile :patient="$patient" route="device" />

    <x-cardlist title="Device Controls">
        <a class="button" href="/device/{id}/turn_now">Click here to turn device</a>
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

        <form method="POST" action="{{ route('device.refill', [$patient->device_id]) }}">
            @csrf
            <button class="button" data-variant="secondary" type="submit">
                Refill
            </button>
        </form>

        <form method="POST" action="{{ route('device.seek', [$patient->device_id]) }}">
            @csrf
            <button class="button" data-variant="secondary" type="submit">
                Sync disk
            </button>
        </form>
    </x-cardlist>

</x-layout>
