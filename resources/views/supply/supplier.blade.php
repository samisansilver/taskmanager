@yield('head')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Namayesh Supplayer') }}
        </h2>
    </x-slot>
    <div class="py-12" style="direction:rtl">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900" style="direction: rtl">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td style="width: 5%">نام شخص</td>
                                <td>{{ $supplier->person }}</td>
                                <td style="width: 5%">نام شرکت</td>
                                <td>{{ $supplier->company }}</td>
                                <td style="width: 5%">تلفن</td>
                                <td>{{ $supplier->phone }}</td>
                                <td style="width: 5%">موبایل</td>
                                <td>{{ $supplier->mobile }}</td>
                            </tr>
                                <td style="width: 5%">آدرس</td>
                                <td>{{ $supplier->address }}</td>
                                <td style="width: 5%">سابقه همکاری</td>
                                <td>{{ $supplier->age }}</td>
                                <td style="width: 5%">شهر</td>
                                <td>{{ $supplier->city }}</td>
                                <td style="width: 5%">سایت</td>
                                <td>{{ $supplier->site }}</td>
                            </tr>
                                <td style="width: 5%">ایمیل</td>
                                <td>{{ $supplier->id }}</td>
                                <td style="width: 5%">کیفیت خدمات</td>
                                <td>
                                    @if( $supplier->quality == 5)
                                        <p>عالی</p>
                                    @elseif( $supplier->quality == 4)
                                        <p>خوب</p>
                                    @elseif( $supplier->quality == 3)
                                        <p>متوسط</p>
                                    @elseif( $supplier->quality == 2)
                                        <p>خوب</p>
                                    @else
                                        <p>بقایی</p>
                                    @endif
                                </td>
                                <td style="width: 5%">کد اقتصادی</td>
                                <td>{{ $supplier->codeeghtesadi }}</td>
                                <td style="width: 5%">شناسه ملی</td>
                                <td>{{ $supplier->shenasemelli }}</td>
                            </tr>
                                <td style="width: 5%">شناسه ثبت</td>
                                <td>{{ $supplier->shenasesabt }}</td>
                                <td style="width: 5%">کد کارگاه</td>
                                <td>{{ $supplier->codekargah }}</td>
                                <td style="width: 5%">کد ثبت اشخاص</td>
                                <td>{{ $supplier->codesabteashkhas }}</td>
                                <td style="width: 5%">-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@yield('scripts')
