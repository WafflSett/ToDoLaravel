@extends('layouts.app')

@section('content')
    <h1 class="text-center text-4xl font-bold mb-10">List of tasks</h1>
    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Description</th>
                <th class="px-6 py-3 text-center">Completion</th>
                <th class="px-6 py-3 text-center">Edit</th>
                <th class="px-6 py-3 text-center">Delete</th>
                <th class="px-6 py-3 text-end">Last updated</th>
            </tr>
        </thead>
        <tbody class="text-start">
            @foreach ($todos as $todo)
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    <td class="px-6 py-4">{{$todo->title}}</td>
                    <td class="px-6 py-4 truncate">{{$todo->description}}</td>
                    <td class="px-6 py-4 text-center"><input type="checkbox" {{$todo->isCompleted==1?'checked':''}}></td>
                    <td class="px-6 py-4 text-center"><a class="p-2 border-gray-500 dark:border-gray-600 bg-amber-300 hover:bg-amber-400 dark:bg-amber-900 dark:hover:bg-amber-950 border-1 rounded-lg">✏️</a></td>
                    <td class="px-6 py-4 text-center"><a class="p-2 border-gray-500 dark:border-gray-600 bg-red-600 hover:bg-red-700 dark:bg-red-900 dark:hover:bg-red-950 border-1 rounded-lg">❌</a></td>
                    <td class="px-6 py-4 text-end">{{$todo->updated_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
