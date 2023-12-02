<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Karato Negah Kon') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table style="width: 100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>id</th>
                            <th>title</th>
                            <th>description</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($getuserjobs as $getuserjob)
                            @if( $getuserjob->archive == null)
                            <tr>
                                <td style="width: 10%">
                                    <form action="/force/{{ $getuserjob->id }}" method="post">
                                        @if($getuserjob->force == 0)
                                            <input name="force" value="1" hidden="">
                                        @else
                                            <input name="force" value="0" hidden="">
                                        @endif
                                    @csrf
                                    <button style="" type="submit">
                                        @if( $getuserjob->force == 0 )
                                            <img style="width: 30px" src="/img/star-white.png">
                                        @else
                                            <img style="width: 55px" src="/img/yellow-star.webp" alt="">
                                        @endif
                                    </button>
                                    </form>
                                </td>
                                <td>{{ $getuserjob->id }}</td>
                                @if($getuserjob->status == 1)
                                    <td style="color: red; direction:rtl">{{ $getuserjob->title }}</td>
                                @else
                                    <td style="color: green; direction:rtl">{{ $getuserjob->title }}</td>
                                @endif
                                <td style="direction:rtl">{{ $getuserjob->description }}</td>
                                <td style="direction:ltr">
                                @if( $getuserjob->process == 0 )
                                        <p style="background:orange;color:white;font-size:15px;font-weight: bolder;width: 10%">0%</p>
                                    @elseif($getuserjob->process == 1 )
                                        <p style="background:yellow;color:black;font-size:20px;font-weight: bolder;width: 30%">25%</p>
                                    @elseif($getuserjob->process == 2 )
                                        <p style="background:greenyellow;color:black;font-size:20px;font-weight: bolder;width: 50%">50%</p>
                                    @elseif($getuserjob->process == 3 )
                                        <p style="background:green;color:white;font-size:20px;font-weight: bolder;width: 75%">75%</p>
                                    @else
                                        <p style="background:darkgreen;color:white;font-size:20px;font-weight: bolder;width: 100%">100%</p>
                                @endif
                                </td>
                                <td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_role == 1 )
                                    <form action="/delete/{{ $getuserjob->id }}" method="post">
                                        @csrf
                                        <button style="color: red; font-weight: bolder" type="submit">Delete</button>
                                    </form>
                                </td>
                                   @endif
                                <td>
                                    <form action="/update/{{ $getuserjob->id }}" method="post">
                                        @csrf
                                        <button style="color: darkgreen; font-weight: bolder" type="submit">Done</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="/edit-task/{{ $getuserjob->id }}" method="post">
                                        @csrf
                                        <button style="color: darkorange; font-weight: bolder" type="submit">Edit</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
