<div style="padding:40px">

    <input
        type="text"
        wire:model.live="search"
        placeholder="Type here"
        style="border:1px solid #000; padding:8px;"
    >

    <p style="margin-top:20px; font-weight:bold">
        Value: {{ $search }}
    </p>

</div>
