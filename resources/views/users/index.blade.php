<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Frinds') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="text-lg font-bold mb-4">{{ __('Select a frind to chat with') }}</h3>
          <ul>
            @foreach ($users as $user)
              <li class="mb-2">
                <a href="{{ route('chat.index', ['user_id' => $user->id]) }}" class="text-blue-500 hover:text-blue-700">
                  {{ $user->name }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
