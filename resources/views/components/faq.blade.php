<section class="py-16 px-4 md:px-8 max-w-4xl mx-auto" data-aos="fade-up">
  <h2 class="text-4xl font-bold text-title mb-12 text-center">
    Frequently Asked Questions
  </h2>

  <div 
    x-data="{ openIndex: null }"
    class="grid gap-8 md:grid-cols-2">
    
    <!-- FAQ item #1 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          type="button"
          @click="openIndex === 1 ? openIndex = null : openIndex = 1"
          :aria-expanded="(openIndex === 1).toString()"
          :aria-controls="'faq-panel-1'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          What destinations do you offer tours to?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 1 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 1"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-1"
        role="region"
        :aria-labelledby="'faq-button-1'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          We offer tours across India—including the North Eastern states—as well as select international destinations, all tailored according to your travel preferences.
        </div>
      </div>
    </div>

    <!-- FAQ item #2 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          id="faq-button-2"
          type="button"
          @click="openIndex === 2 ? openIndex = null : openIndex = 2"
          :aria-expanded="(openIndex === 2).toString()"
          :aria-controls="'faq-panel-2'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          How do I book a tour package?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 2 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 2"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-2"
        role="region"
        :aria-labelledby="'faq-button-2'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          You can browse our package listings on the website, choose a date & destination, submit a booking request and then our team will follow up to confirm availability and payment.
        </div>
      </div>
    </div>

    <!-- FAQ item #3 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          id="faq-button-3"
          type="button"
          @click="openIndex === 3 ? openIndex = null : openIndex = 3"
          :aria-expanded="(openIndex === 3).toString()"
          :aria-controls="'faq-panel-3'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          What’s included in the tour price?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 3 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 3"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-3"
        role="region"
        :aria-labelledby="'faq-button-3'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          The price generally includes accommodation, transportation (as specified), some meals and sightseeing as outlined in the itinerary. Specific inclusions/exclusions will be listed in your package’s details.
        </div>
      </div>
    </div>

    <!-- FAQ item #4 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          id="faq-button-4"
          type="button"
          @click="openIndex === 4 ? openIndex = null : openIndex = 4"
          :aria-expanded="(openIndex === 4).toString()"
          :aria-controls="'faq-panel-4'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          Can I customise my tour itinerary?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 4 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 4"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-4"
        role="region"
        :aria-labelledby="'faq-button-4'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          Yes — we specialise in tailor-made tours. Provide us your interests, dates and budget and we'll craft an itinerary just for you.
        </div>
      </div>
    </div>

    <!-- FAQ item #5 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          id="faq-button-5"
          type="button"
          @click="openIndex === 5 ? openIndex = null : openIndex = 5"
          :aria-expanded="(openIndex === 5).toString()"
          :aria-controls="'faq-panel-5'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          What payment methods do you accept?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 5 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 5"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-5"
        role="region"
        :aria-labelledby="'faq-button-5'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          We accept bank transfers, online payment gateways (e.g., credit/debit), and where applicable, card payments. Our team will guide you during booking.
        </div>
      </div>
    </div>

    <!-- FAQ item #6 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          id="faq-button-6"
          type="button"
          @click="openIndex === 6 ? openIndex = null : openIndex = 6"
          :aria-expanded="(openIndex === 6).toString()"
          :aria-controls="'faq-panel-6'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          What is your cancellation and refund policy?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 6 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 6"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-6"
        role="region"
        :aria-labelledby="'faq-button-6'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          Our cancellation policy varies by package and date. Some deposits may be non-refundable or subject to conditions. Please check your booking confirmation for the specific terms.
        </div>
      </div>
    </div>

    <!-- FAQ item #7 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          id="faq-button-7"
          type="button"
          @click="openIndex === 7 ? openIndex = null : openIndex = 7"
          :aria-expanded="(openIndex === 7).toString()"
          :aria-controls="'faq-panel-7'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          Is travel insurance included?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 7 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 7"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-7"
        role="region"
        :aria-labelledby="'faq-button-7'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          Travel insurance is not always included by default. We strongly recommend purchasing comprehensive travel insurance covering trip cancellation, medical emergencies and personal belongings.
        </div>
      </div>
    </div>

    <!-- FAQ item #8 -->
    <div x-data="{}" class="bg-white rounded-xl shadow-md px-6">
      <h3>
        <button
          id="faq-button-8"
          type="button"
          @click="openIndex === 8 ? openIndex = null : openIndex = 8"
          :aria-expanded="(openIndex === 8).toString()"
          :aria-controls="'faq-panel-8'"
          class="flex items-center justify-between w-full py-5 text-left font-bold text-title hover:text-orange-primary focus:outline-none">
          How do you ensure safety during tours?
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
               viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="h-4 w-4 shrink-0 transition-transform duration-200"
               :class="{ 'rotate-180': openIndex === 8 }">
            <path d="m6 9 6 6 6-6"></path>
          </svg>
        </button>
      </h3>
      <div
        x-show="openIndex === 8"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 max-h-0"
        x-transition:enter-end="opacity-100 max-h-xl"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 max-h-xl"
        x-transition:leave-end="opacity-0 max-h-0"
        x-cloak
        id="faq-panel-8"
        role="region"
        :aria-labelledby="'faq-button-8'"
        class="overflow-hidden text-sm pb-5">
        <div class="prose prose-sm max-w-none text-body-text leading-relaxed pt-1">
          We partner with experienced local guides, use trusted transport and accommodation providers, and maintain small group sizes where needed. Your safety and comfort are our top priorities.
        </div>
      </div>
    </div>

  </div>
</section>
