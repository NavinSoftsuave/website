<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold">Checkout - {{ $course->title }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-6 p-6 bg-white shadow rounded">
        <p class="mb-4">You are about to purchase: <strong>{{ $course->title }}</strong></p>
        <p class="mb-4">Price: ${{ number_format($course->price / 100, 2) }}</p>

        <!-- Stripe or payment form would go here -->
        <form action="{{ route('payment.process', $course->id) }}" method="POST">
            @csrf
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Proceed to Payment
            </button>
        </form>
    </div>
</x-app-layout>
