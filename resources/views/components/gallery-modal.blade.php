@props(['images' => collect()])

<div class="hidden fixed inset-0 bg-black/95 z-50 flex items-center justify-center"
     x-show="galleryOpen"
     @click="galleryOpen = false"
     x-transition
     wire:key="gallery-modal">
    
    <!-- Close Button -->
    <button @click="galleryOpen = false"
            class="absolute top-6 right-6 text-white text-3xl hover:text-accent transition z-10"
            aria-label="Close gallery">
        ✕
    </button>

    <!-- Main Image Container -->
    <div class="relative w-full h-full flex items-center justify-center px-4"
         @keydown.left="currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length"
         @keydown.right="currentImageIndex = (currentImageIndex + 1) % galleryImages.length"
         tabindex="0">
        
        <!-- Image -->
        <img :src="galleryImages[currentImageIndex]?.url"
             :alt="galleryImages[currentImageIndex]?.alt"
             class="max-h-[80vh] max-w-full object-contain">

        <!-- Navigation Arrows -->
        @if($images->count() > 1)
            <button @click="currentImageIndex = (currentImageIndex - 1 + galleryImages.length) % galleryImages.length"
                    class="absolute left-4 md:left-8 text-white text-4xl hover:scale-110 transition"
                    aria-label="Previous">
                ←
            </button>

            <button @click="currentImageIndex = (currentImageIndex + 1) % galleryImages.length"
                    class="absolute right-4 md:right-8 text-white text-4xl hover:scale-110 transition"
                    aria-label="Next">
                →
            </button>
        @endif

        <!-- Counter -->
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6 text-white">
            <p class="text-sm text-gray-300" x-text="(currentImageIndex + 1) + ' / ' + galleryImages.length"></p>
        </div>
    </div>
</div>

<script>
    
</script>
