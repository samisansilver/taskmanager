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
                    <table style="width: 100%">
                        <tr>
                        <td>عنوان</td>
                        <td>توضیحات</td>
                        <td>وضعیت</td>
                        </tr>
                        <tr>
                            <td>{{ $findtask->title }}</td>
                            <td>{{ $findtask->description }}</td>
                                @if($findtask->status == 0)
                                    <td style="color: red">انجام نشده</td>
                                @else
                                    <td style="color: green">انجام شده</td>
                            @endif
                        </tr>
                    </table>
                    <table style="width: 100%">
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان</th>
                            <th>توضیح</th>
                            <th>نام شخص</th>
                            <th>وضعیت</th>
                        </tr>
                        @foreach($findtask->getJobs as $item)
                        <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                @php $user = $item->user_id @endphp
                                <td>{{ \App\Models\User::findOrFail($user)->name }}</td>
                                    @if($item->status == 1)
                                        <td style="color: red">انجام نشده</td>
                                    @else
                                        <td style="color: green">انجام شده</td>
                                    @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
