<div class="grid grid-cols-3 gap-4">

    @foreach($images as $image)
        <div class="text-center flex justify-center flex-wrap border p-3 rounded-2xl shadow-lg">
            <img src="/storage/images/{{ $image->filename }}" alt="" class="w-auto max-h-64 rounded-2xl"/>
            <div class="w-full font-bold text-lg py-2">
                {{ $image->title }}
            </div>
            <div class="w-full">
                <form method="post" action="{{ route('images.delete') }}">
                    @csrf
                    <input type="hidden" name="image_id" value="{{$image->id}}"/>
                    <x-primary-button>Delete</x-primary-button>
                </form>
            </div>
        </div>

    @endforeach
</div>
