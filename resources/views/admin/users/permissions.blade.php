<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            تعديل صلاحيات المستخدم: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow space-y-6">
        <form action="{{ route('admin.users.permissions.update', $user->id) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($permissions as $permission)
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                            @if ($user->hasPermissionTo($permission->name)) checked @endif
                            class="rounded text-green-600 focus:ring-green-500 dark:bg-gray-700 dark:border-gray-600">
                        <span class="text-gray-700 dark:text-gray-300">{{ $permission->name }}</span>
                    </label>
                @endforeach
            </div>

            <div class="mt-6">
                <x-primary-button class="bg-green-600 hover:bg-green-700">
                    حفظ التعديلات
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
