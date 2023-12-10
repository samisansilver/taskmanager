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
                            <th>name</th>
                            <th>title</th>
                            <th>description</th>
                            <th>id</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php $archtasks = \App\Models\Job::where('archive', '1')->get(); @endphp
                        @foreach($archtasks as $archtask)
                            @if( $archtask->archive == 1)
                                <tr>
                                    @php $user = \App\Models\User::findOrFail($archtask->user_id) @endphp
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $archtask->id }}</td>
                                    @if($archtask->status == 1)
                                        <td style="color: red; direction:rtl">{{ $archtask->title }}</td>
                                    @else
                                        <td style="color: green; direction:rtl">{{ $archtask->title }}</td>
                                    @endif
                                    <td style="direction:rtl">{{ $archtask->description }}</td>
                                    <td style="direction:ltr">
                                        @if( $archtask->process == 0 )
                                            <p style="background:orange;color:white;font-size:15px;font-weight: bolder;width: 10%">0%</p>
                                        @elseif($archtask->process == 1 )
                                            <p style="background:yellow;color:black;font-size:20px;font-weight: bolder;width: 30%">25%</p>
                                        @elseif($archtask->process == 2 )
                                            <p style="background:greenyellow;color:black;font-size:20px;font-weight: bolder;width: 50%">50%</p>
                                        @elseif($archtask->process == 3 )
                                            <p style="background:green;color:white;font-size:20px;font-weight: bolder;width: 75%">75%</p>
                                        @else
                                            <p style="background:darkgreen;color:white;font-size:20px;font-weight: bolder;width: 100%">100%</p>
                                        @endif
                                    </td>
                                    <td>
                                    @if(\Illuminate\Support\Facades\Auth::user()->user_role == 1 )
                                         <form action="/unarchive/{{ $archtask->id }}" method="post">
                                             @csrf
                                             <button style="background: blue;color: white" type="submit">unArchive</button>
                                         </form>
                                    </td>
                                    @endif
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
