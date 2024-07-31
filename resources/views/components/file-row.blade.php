<div {{ $attributes->merge(['class'=>"file-row py-1 flex justify-between items-center"])}}>
    <a href="{{ $url ?? '' }}" class="name text-sky-600 flex-wrap word-wrap text-justify break-words" style="width:95%" target="_blank">{{ $nombre ?? '' }} *</a>
    @if(!($hideRemove ?? false))
    <div class="remove text-sm text-red-600 cursor-pointer" onclick="{{ $onRemove ?? '' }}">X</div>
    @endif
</div>
