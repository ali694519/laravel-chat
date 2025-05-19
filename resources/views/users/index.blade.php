<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Friends') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <h3 class="text-lg font-bold mb-6">{{ __('Select a friend to chat with') }}</h3>

          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($users as $user)
              <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow hover:shadow-lg transition duration-300">
                <div class="flex items-center space-x-4">
                  <div class="w-12 h-12 bg-green-600 text-white flex items-center justify-center rounded-full text-lg font-bold shadow-md">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                  </div>

                  <!-- Name & Action -->
                  <div class="flex-1">
                    <div class="text-white font-semibold">{{ $user->name }}</div>
                    <a href="{{ route('chat.index', ['user_id' => $user->id]) }}"
                       class="text-sm text-white hover:text-slate-900 transition">
                      Start Chat
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
