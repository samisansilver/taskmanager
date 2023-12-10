<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Karato Edit Kon') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:ltr">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: ltr">
                    <form action="{{ route('saveTasks') }}" method="post">
                        @csrf
                        <input type="text" name="title" value="{{ $request->title }}" hidden="hidden">
                        <input type="text" name="description" value="{{ $request->description }}" hidden="hidden">
                        <input type="text" name="persons" value="{{ $request->persons }}" hidden="hidden">
                    <table>
                                <thead>
                                    <tr>
                                        <td>row</td>
                                        <td>Person</td>
                                        <td>Title</td>
                                        <td>Description</td>
                                    </tr>
                                </thead>
                        @for($x = 1; $x <= $request->persons ; $x++)
                                <tbody>
                                    <tr>
                                        <td>{{ $x }}</td>
                                        <td>
                                            <select name="user.{{$x}}">
                                        @php $users = \App\Models\User::all() @endphp
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{ $user->name }}</option>
                                        @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="title_user.{{$x}}"></td>
                                        <td><input type="text" name="desc_user.{{$x}}"></td>
                                    </tr>
                                </tbody>
                            @endfor
                    </table>
                        <button type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
