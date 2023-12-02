<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Tamin Konandeha Ro Bebin') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: rtl">
                    <table width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>نام شخص</th>
                            <th>نام شرکت</th>
                            <th>شماره تلفن</th>
                            <th>ایجاد کننده</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $getsuppliers as  $getsupplier)
                        <tr>
                            <td>
                                <form action="/supply/{{ $getsupplier->id }}" method="post">
                                    @csrf
                                    <button style="color: white; background: green; width: 100%;height: 40px" type="submit">مشاهده اطلاعات</button>
                                </form>
                            </td>
                            <td>{{ $getsupplier->person }}</td>
                            <td>{{ $getsupplier->company }}</td>
                            <td>{{ $getsupplier->mobile }}</td>
                            <td>{{ $getsupplier->user_id }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
