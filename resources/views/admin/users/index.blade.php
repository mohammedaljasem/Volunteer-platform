<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            قائمة المستخدمين
        </h2>
    </x-slot>

    <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow space-y-6">
        <table class="table-auto w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">الاسم</th>
                    <th class="px-4 py-2 border">البريد الإلكتروني</th>
                    <th class="px-4 py-2 border">الدور</th>
                    <th class="px-4 py-2 border">الخيارات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.users.permissions.edit', $user->id) }}" class="text-blue-600 hover:underline">تعديل الصلاحيات</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
