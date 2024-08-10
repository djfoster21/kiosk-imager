<div class="w-screen h-screen bg-black text-white flex justify-center overflow-hidden flex-wrap">
    <div class="h-full w-full flex justify-center">
        <img id="image-odd" src="" class="w-auto h-full opacity-0 absolute" alt=""/>
        <img id="image-even" src="" class="w-auto h-full opacity-0 absolute"  alt=""/>
    </div>

</div>
<script type="text/javascript">
    let images = [
        @foreach($images as $image)
        "{{ '/storage/images/'. $image->filename  }}",
        @endforeach
    ];
    let currentIndex = 0;

    // get the image element
    let imgElementOdd = document.getElementById('image-odd');
    let imgElementEven = document.getElementById('image-even');
    updateImage();
    setInterval(function () {
        updateImage();
    }, 30000);
    function updateImage() {
        // update the image source

        if(currentIndex % 2 === 0) {
            imgElementEven.src = images[currentIndex];
            imgElementEven.classList.remove('opacity-0');
            imgElementOdd.classList.add('opacity-0');
        } else {
            imgElementOdd.src = images[currentIndex];
            imgElementOdd.classList.remove('opacity-0');
            imgElementEven.classList.add('opacity-0');
        }
        // increase index or reset
        currentIndex++;
        if (currentIndex === images.length) {
            currentIndex = 0;
        }
    }
</script>
<style>
    * {
        transition: opacity ease-in-out 1s;
    }
</style>
