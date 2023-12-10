<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Karato Edit Kon') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: rtl">
                    <table  style="width:100%">
                        <thead>
                            <th>ردیف</th>
                            <th>عنوان</th>
                            <th>توضیحات</th>
                            <th>حذف</th>
                            <th>تکمیل شده</th>
                        </thead>
                        <tbody>
                        @foreach($list->sortDesc() as $items)
                            @if($items->archive == 0)
                        <tr>
                                <td>
                                    <a style="background: green; color: white; padding: 10px" href="/taskgroup/showtask/{{$items->id}}">نمایش</a>
                                </td>
                                <td>
                                    @if($items->status == 0)
                                    <a style="color: red" href="/taskgroup/delete/{{$items->id}}">{{ $items->title }}</a>
                                    @else
                                    <a style="color: green" href="/taskgroup/delete/{{$items->id}}">{{ $items->title }}</a>
                                    @endif
                                </td>
                                <td>
                                    {{ $items->description }}</a>
                                </td>
                                <td>
                                        <form action="/taskgroup/delete/{{$items->id}}" method="post">
                                            @csrf
                                            <button style="color: red; font-weight: bolder" type="submit">Delete</button>
                                        </form>
                                </td>
                                <td>
                                    <form action="/taskgroup/update/{{$items->id}}" method="post">
                                        @csrf
                                        <button style="color: darkgreen; font-weight: bolder" type="submit">Done</button>
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
