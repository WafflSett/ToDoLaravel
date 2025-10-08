@extends('layouts.app')

@section('content')
    <h1 class="text-center text-4xl font-bold mb-10">List of tasks</h1>
    {{-- New todo form --}}
    <div class="w-full my-8">
        <form action="/todos" method="POST" class="flex align-middle justify-between w-2/5 space-x-2">
            @csrf
            <input type="text"
                class="rounded-md dark:border-gray-400 border-gray-400 p-2 px-3 w-2/5 align-middle border-1 bg-gray-200 dark:bg-gray-600 dark:text-gray-100 text-gray-800"
                placeholder="Title" name="Title" @if (isset($editId)) disabled @endif />
            <input type="text"
                class="rounded-md dark:border-gray-400 border-gray-400 p-2 px-3 align-middle border-1 w-full  bg-gray-200 dark:bg-gray-600 text-gray-800 dark:text-gray-100"
                placeholder="Description" name="Description" @if (isset($editId)) disabled @endif />
            <button type="submit"
                class="rounded-lg w-50
                    @if (!isset($editId)) dark:bg-blue-600 bg-blue-500 dark:hover:bg-blue-700 hover:bg-blue-600
                        cursor-pointer
                    @else
                        pointer-events-none
                        bg-gray-400 @endif
                text-white px-3 h-10"
                @if (isset($editId)) disabled @endif>+
                New</button>
        </form>
        @error('Title')
            <div class="text-red-500 text-xs mt-0.5">{{ $message }}</div>
        @enderror
    </div>
    {{-- List of todos --}}
    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
            <tr>
                <th class="px-6 py-3">Title</th>
                <th class="px-6 py-3">Description</th>
                <th class="px-2 py-3 text-center">Completion</th>
                <th class="px-2 py-3 text-center">Edit</th>
                <th class="px-2 py-3 text-center">Delete</th>
                <th class="px-6 py-3 text-end">Last updated</th>
            </tr>
        </thead>
        <tbody class="text-start">
            @foreach ($todos as $todo)
                <tr
                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                    @if (isset($editId) && $editId == $todo->id)
                        {{-- Inline form --}}
                        <form action="/todos/{{ $editId }}" method="post">
                            @csrf
                            @method('PUT')
                            <td class="px-6 py-4 w-2/12">
                                <input type="text" name="Title" value="{{ $todo->title }}"
                                    class="rounded-md dark:border-gray-400 w-50 border-gray-400 p-2 align-middle border-1 bg-gray-200 dark:bg-gray-600 dark:text-gray-100 text-gray-800">
                                @error('Title')
                                    <div class="text-red-500 text-xs mt-0.5">{{ $message }}</div>
                                @enderror
                            </td>
                            <td class="px-6 py-4 w-5/12 space-x-2">
                                <input type="text" name="Description" value="{{ $todo->description }}"
                                    class="rounded-md dark:border-gray-400 border-gray-400 p-2 w-1/2 align-middle border-1 bg-gray-200 dark:bg-gray-600 dark:text-gray-100 text-gray-800">
                                <button type="submit"
                                    class="rounded-lg p-2 px-3 dark:bg-blue-600 bg-blue-500 dark:hover:bg-blue-700 hover:bg-blue-600 text-gray-200">Save</button>
                                <a href="/todos"
                                    class="bg-red-600  dark:bg-red-900 rounded-lg p-2 px-3 hover:bg-red-700 dark:hover:bg-red-950 text-gray-200">Cancel</a>
                            </td>
                        </form>
                    @else
                        <td
                            class="px-6 py-4 w-2/12
                        @if ($todo->isCompleted) line-through @endif
                        ">
                            {{ $todo->title }}
                        </td>
                        <td class="px-6 py-4 w-5/12 truncate @if ($todo->isCompleted) line-through @endif">
                            {{ $todo->description }}
                        </td>
                    @endif
                    {{-- Completion checkbox --}}
                    <td class="px-2 py-4 text-center w-1/12">
                        <form action="/todos/{{ $todo->id }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" {{ $todo->isCompleted == 1 ? 'checked' : '' }} name="isCompleted"
                                @if (!isset($editId)) onChange="this.form.submit()" class="cursor-pointer"
                                @else
                                    disabled @endif>
                        </form>
                    </td>
                    {{-- Edit button --}}
                    <td class="px-2 py-4 text-center w-1/12">
                        <a class="p-2
                                @if (!isset($editId)) bg-amber-300 dark:bg-amber-900
                                    cursor-pointer
                                    dark:hover:bg-amber-950 hover:bg-amber-400
                                @else
                                    pointer-events-none
                                    bg-gray-400 @endif
                             rounded-lg"
                            href="/todos/{{ $todo->id }}/edit">
                            ✏️
                        </a>
                    </td>
                    {{-- Delete button --}}
                    <td class="px-2 py-4 text-center w-1/12">
                        <form action="/todos/{{ $todo->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button
                                class="p-2
                                    @if (!isset($editId)) bg-red-600  dark:bg-red-900
                                        hover:bg-red-700
                                        dark:hover:bg-red-950
                                        cursor-pointer
                                    @else
                                        bg-gray-400 @endif
                                    rounded-lg"
                                type="submit" @if (isset($editId)) disabled @endif>
                                ❌
                            </button>
                        </form>
                    </td>
                    {{-- Dates display --}}
                    <td class="px-6 py-4 text-end w-1/12">
                        @php
                            $lastUpdate = $todo->updated_at;
                            if ($lastUpdate->format('Y') === date('Y')) {
                                echo $lastUpdate->format('M d H:i');
                            } else {
                                echo $lastUpdate->format('Y-m-d H:i');
                            }
                        @endphp
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- Pagination --}}
    <div class="mt-4">
        {{ $todos->links() }}
    </div>
@endsection
