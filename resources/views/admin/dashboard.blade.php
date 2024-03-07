<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<x-app-layout>
<body>
    
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Role</th>
                <th scope="col" class="px-6 py-3">Statut</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->name }}</td>
                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $user->email }}</td>
                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $user->role }}</td>
                <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->status }}
                    @if($user->status === 'active')
                        <form action="{{ route('blockUser', ['userId' => $user->id]) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Block
                            </button>
                        </form>
                    @else
                        <form action="{{ route('unblockUser', ['userId' => $user->id]) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                Unblock
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</x-app-layout>
</html>
