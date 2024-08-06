<div {{ $attributes->merge(['class'=>'my-12']) }}>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-xl sm:rounded-lg py-5 px-7">
            {{ $slot }}
        </div>
    </div>
</div>
